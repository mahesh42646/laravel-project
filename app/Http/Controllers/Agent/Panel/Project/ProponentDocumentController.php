<?php

namespace App\Http\Controllers\Agent\Panel\Project;

use App\Enums\Project\DocumentStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\DocumentRequest;
use App\Models\Customer\Customer;
use App\Models\Project\Document;
use App\Models\Project\Project;
use App\Services\Project\DocumentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProponentDocumentController extends Controller
{
    public function __construct(
        private readonly DocumentService $documentService,
    ) {}

    public function show(string $token, string $projectCode, string $documentCode, Request $request): View
    {
        $customer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));
        $id = base64_decode($documentCode);

        return view('public.panel.project.document.show', [
            'customer' => $customer,
            'token' => $token,
            'project' => $project,
            'document' => DB::table('project_documents')->where('id', $id)->first(),
        ]);
    }

    public function edit(string $token, string $projectCode, string $documentCode, Request $request): View
    {
        $costumer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));
        $document = Document::find(base64_decode($documentCode));
        $expired = $this->documentService->checkStatusExpiredAt($document);

        return view('public.panel.project.document.edit', [
            'customer' => $costumer,
            'token' => $token,
            'project' => $project,
            'document' => $document,
            'expired' => $expired,
        ]);
    }

    public function update(string $token, Project $project, int $id, DocumentRequest $request): RedirectResponse
    {
        $document = Document::find($id);

        if ($document->path) {
            Storage::delete($document->path);
            $this->saveFile($project, $id, $request);
        } else {
           $this->saveFile($project, $id, $request);
        }

        if ($document->status === DocumentStatusEnum::REANALYZE) {
            $this->notify($project, $request);
        }

        return redirect()
            ->route('public.panel.project.show', [$token, base64_encode($project->id)])
            ->withSuccess($request->message);
    }

    private function saveFile(Project $project, int $id, DocumentRequest $request): void
    {
        $document = $request->document;
        $filePath = $document->storeAs(
            path: "projects/{$project->id}", 
            name: Str::random(32).'.'.$document->extension(), 
            options: 'public',
        );

        DB::table('project_documents')
            ->where('id', $id)
            ->update([
                'path' => $filePath,
                'status' => DocumentStatusEnum::PENDING->value,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    }

    private function notify(Project $project, DocumentRequest $request): void
    {
        $payloads = [];
        $professionals = DB::select("SELECT id FROM users WHERE tenant_id = ?", [$project->tenant_id]);
        $customer = Customer::find($request['customer_id']);

        foreach ($professionals as $professional) {
            $payloads[] = [
                'title' => "<strong>Reanálise!</strong> O artista {$customer->name} carregou novos arquivos relacionados a sua documentação, deseja revisar? Caso essa ação já tenha sido realizada por outro profissional, desconsidere essa notificação!",
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
