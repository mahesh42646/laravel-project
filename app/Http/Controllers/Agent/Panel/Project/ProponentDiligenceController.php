<?php

namespace App\Http\Controllers\Agent\Panel\Project;

use App\Enums\Project\Diligence\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\DiligenceRequest;
use App\Models\Customer\Customer;
use App\Models\Project\Diligence\Diligence;
use App\Models\Project\Project;
use App\Services\Project\DiligenceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProponentDiligenceController extends Controller
{
    public function __construct(
        private readonly DiligenceService $diligenceService
    ) {}

    public function show(string $token, string $projectCode, string $diligenceCode, Request $request): View
    {   
        $customer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));
        $id = base64_decode($diligenceCode);

        return view('public.panel.project.diligence.show', [
            'customer' => $customer,
            'token' => $token,
            'project' => $project,
            'diligence' => Diligence::find($id),
        ]);
    }

    public function edit(string $token, string $projectCode, string $diligenceCode, Request $request): View
    {
        $customer = Customer::findOrFail($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));
        $diligence = Diligence::findOrFail(base64_decode($diligenceCode));
        $expired = $this->diligenceService->checkStatusExpiredAt($diligence);

        return view('public.panel.project.diligence.edit', [
            'customer' => $customer,
            'token' => $token,
            'project' => $project,
            'diligence' => $diligence,
            'expired' => $expired,
        ]);
    }

    public function update(string $token, Project $project, int $id, DiligenceRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $diligence = Diligence::find($id);
            $message = $diligence->messages()->create($request->validated());

            $documents = [];
            foreach ((array) $request->files_names as $index => $fileName) {
                $documents[] = [
                    'name' => $fileName, 
                    'path' => $this->saveImage($request->attachments[$index], $project),
                    'diligence_message_id' => $message->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }

            DB::table('project_diligence_message_documents')->insert($documents);

            if ($diligence->status === StatusEnum::REANALYZE || $diligence->status === StatusEnum::PENDING) {
                $this->notify($project, $request);
            }
        DB::commit();

        return redirect()
            ->route('public.panel.project.show', [$token, base64_encode($project->id)])
            ->withSuccess($request->message);
    }

    private function saveImage(UploadedFile $file, Project $project): string
    {
        return $file->storeAs(
            path: "tenants/{$project->tenant_id}/projects/{$project->id}/diligences", 
            name: Str::random(32).'.'.$file->extension(), 
            options: 'public'
        );
    }

    private function notify(Project $project, Request $request): void
    {
        $payloads = [];
        $professionals = DB::select("SELECT id FROM users WHERE tenant_id = ?", [$project->tenant_id]);
        $customer = Customer::find($request['customer_id']);

        foreach ($professionals as $professional) {
            $payloads[] = [
                'title' => "<strong>Nova diligência!</strong> O artista {$customer->name} enviou uma nova mensagem relacionada a sua documentação, deseja revisar? Caso essa ação já tenha sido realizada por outro profissional, desconsidere essa notificação!",
                'project_id' => $project->id,
                'from_customer_id' => $customer->id,
                'to_professional_id' => $professional->id,
                'tenant_id' => $project->tenant_id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('notification_professionals')->insert($payloads);
    }
}
