<?php

namespace App\Http\Controllers\Agent\Panel\Project;

use App\Enums\Edital\DocumentEnum;
use App\Enums\Project\DocumentStatusEnum;
use App\Enums\Project\ProjectStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\ProjectRequest;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Services\Project\DownloadService;
use App\Services\Project\ProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Traits\Pdf\ConfigPdf;
use App\Traits\Pdf\HeaderPdf;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use HeaderPdf, ConfigPdf;

    public function __construct(
        private readonly DownloadService $service,
        private readonly ProjectService $projectService,
    ) {}

    public function show(string $token, string $projectCode, Request $request): View
    {
        $customer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));

        return view('public.panel.project.show', [
            'customer' => $customer,
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'documents' => $this->documents($project),
        ]);
    }

    public function identify(string $token, string $projectCode, Request $request): View
    {
        $customer = Customer::find($request['customer_id']);
        $project = Project::with('edital')->findOrFail(base64_decode($projectCode));

        return view('public.panel.project.identify', [
            'customer' => $customer,
            'project' => $project,
            'token' => $token,
        ]);
    }

    public function edit(string $token, string $projectCode, Request $request): View
    {
        $customer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));
        $expired = $this->projectService->checkStatusExpiredAt($project);

        return view('public.panel.project.edit', [
            'customer' => $customer,
            'project' => $project,
            'token' => $token,
            'expired' => $expired,
        ]);
    }

    public function update(string $token, Project $project, ProjectRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $project->update($request->validated());

            if ($project->identification_project_status === ProjectStatusEnum::REANALYZE) {
                $this->notifyProfessional($project, $request);
            }
        DB::commit();

        return redirect()
            ->route('public.panel.project.identify.edit', [
                $token, 
                base64_encode($project->id),
            ])
            ->withSuccess($request->message);
    }

    private function documents(Project $project): array
    {
        $payloads = [];
        $documents = DB::select(
            "SELECT 
                id, document_id AS code, 
                motive, is_required, status
            FROM project_documents
            WHERE project_id = ?", [$project->id]
        );

        foreach ($documents as $document) {
            $payloads[] = (object) [
                'id' => $document->id,
                'name' => DocumentEnum::tryFrom($document->code)?->getName(),
                'status_name' => $this->getStatusName($document->status),
                'status' => $document->status,
                'motive' => $this->getMotive($document),
                'is_required' => $document->is_required,
            ];
        }

        return $payloads;
    }

    private function getStatusName(string $status): string
    {
        $name = DocumentStatusEnum::tryFrom($status)?->getName();
        $backgroundColor = DocumentStatusEnum::tryFrom($status)?->getBackgroundColor();

        return <<<HTML
            <span style="{$backgroundColor}">{$name}</span>
        HTML;
    }

    private function getMotive(object $document): string
    {
        return match ($document->status) {
            0 => '---',
            1 => 'OK',
            default => $document->motive,
        };
    }

    public function download(string $token, string $projectCode): void
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $projectName = Str::slug($project->name) ?: 'comprovante_de_inscricao';
        $this->config($project->name ?: 'Comprovante de inscrição');

        $tenant = $project->tenant;
        $title = 'DADOS DE IDENTIFICAÇÃO DO PROJETO';
        $this->header($tenant->name, $tenant->company->name, $title);

        $pdf = new TCPDF();
        $pdf::AddPage();
        $pdf::writeHTML($this->service->getHTMLByProjectPanelCustomer($project), true, false, true, false, '');
        $pdf::Output("{$projectName}.pdf", 'D');
    }

    private function notifyProfessional(Project $project, ProjectRequest $request): void
    {
        $payloads = [];
        $professionals = DB::select("SELECT id FROM users WHERE tenant_id = ?", [$project->tenant_id]);
        $customer = Customer::find($request['customer_id']);

        foreach ($professionals as $professional) {
            $payloads[] = [
                'title' => "<strong>Reanálise!</strong> O artista {$customer->name} atualizou os dados do seu projeto, deseja revisar? Caso essa ação já tenha sido realizada por outro profissional, desconsidere essa notificação!",
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
