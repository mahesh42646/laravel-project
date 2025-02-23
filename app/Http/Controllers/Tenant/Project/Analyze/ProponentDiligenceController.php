<?php

namespace App\Http\Controllers\Project\Analyze;

use App\Enums\Notification\TypeStatusEnum;
use App\Enums\Project\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Tabs\ProponentDiligenceRequest;
use App\Http\Requests\Project\Tabs\ProponentDiligenceStatusRequest;
use App\Models\Notification\Notification;
use App\Models\Project\Diligence\Diligence;
use App\Models\Project\Project;
use App\Services\Notification\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProponentDiligenceController extends Controller
{
    public function __construct(
        private readonly NotificationService $notification 
    ) {}

    public function store(ProponentDiligenceRequest $request, Project $project): RedirectResponse
    {
        DB::beginTransaction();
            $project->update([
                'status' => StatusEnum::PENDING
            ]);

            $diligence = $project->diligences()->create($request->validated());
            $message = $diligence->messages()->create($request->validated());

            $documents = [];
            foreach ((array) $request->files_names as $index => $fileName) {
                $documents[] = [
                    'name' => $fileName, 
                    'path' => $this->saveImage($request->attachments[$index], $project->id),
                    'diligence_message_id' => $message->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }

            $this->initialNotifyCustomer($project, $diligence, $request);
            DB::table('project_diligence_message_documents')->insert($documents);
        DB::commit();

        return redirect()
            ->route('projects.edit', ['project' => $project->id, 'tab' => 'diligence'])
            ->withSuccess($request->message);
    }

    public function update(ProponentDiligenceStatusRequest $request, Project $project, Diligence $diligence): RedirectResponse
    {
        DB::beginTransaction();
            $diligence->update($request->validated());
            $this->notifyCustomer($project, $diligence, $request);

            if ($request->status == '1') {
                $diligence->update([
                    'expired_at' => null
                ]);
            }

            if ($project->isDiligencesApproveds() && $project->getStatusGeneral() == 'approved') {
                $project->update([
                    'status' => StatusEnum::APPROVED
                ]);
            }
        DB::commit();

        return redirect()
            ->route('projects.edit', ['project' => $project->id, 'tab' => 'diligence'])
            ->withSuccess($request->message);
    }

    private function saveImage(UploadedFile $file, int $projectId): string
    {
        return $file->storeAs(
            path: 'tenants/' . session('tenant_id') . '/projects'. '/' . $projectId . '/diligences', 
            name: Str::random(32).'.'.$file->extension(), 
            options: 'public'
        );
    }

    private function notifyCustomer(Project $project, Diligence $diligence, ProponentDiligenceStatusRequest $request): void
    {
        Notification::create([
            'title' => $this->message($request->status, $diligence),
            'type_id' => $request->status,
            'project_id' => $project->id,
            'from_user_id' => auth()->id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    private function message(int|string $status, Diligence $diligence): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = auth()->user()->name;
        $motive = request()->motive ?: '';

        return match ($status) {
            '0' => "<strong>Pendente!</strong> A diligência \"{$diligence->title}\" foi analisada e continua em estado de <strong>pendência</strong> pelo Analista {$analyst}, em: {$createdAt}",
            '1' => "<strong>Parabéns!</strong> A diligência \"{$diligence->title}\" foi analisada e <strong>aprovada</strong> pelo Analista {$analyst}, em: {$createdAt}",
            '2' => "<strong>Não foi dessa vez!</strong> A diligência \"{$diligence->title}\" foi analisada e <strong>reprovada</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> A diligência \"{$diligence->title} \" foi analisada e enviada para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }

    private function initialNotifyCustomer(Project $project, Diligence $diligence, ProponentDiligenceRequest $request): void
    {
        Notification::create([
            'title' => $this->initialMessage($diligence),
            'type_id' => TypeStatusEnum::REANALYZE,
            'project_id' => $project->id,
            'from_user_id' => auth()->id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    private function initialMessage(Diligence $diligence): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = auth()->user()->name;

        return <<<HTML
            <strong>Atenção!</strong> Existe uma diligência de {$diligence->title} que foi criada pelo analista {$analyst}, em: {$createdAt}, por favor revisar essa diligência!
        HTML;
    }
}
