<?php

namespace App\Http\Controllers\Tenant\Project;

use App\Enums\Edital\StatusEnum;
use App\Enums\Project\Diligence\StatusEnum as DiligenceStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Edital\EditalRequest;
use App\Http\Requests\Project\ProjectRequest;
use App\Models\Customer\Customer;
use App\Models\Edital\Edital;
use App\Models\Project\Category;
use App\Models\Project\Project;
use App\Services\Project\ProjectService;
use App\Services\Project\Register\IdentificationService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class ProjectController extends Controller
{
    public function __construct(
        private readonly IdentificationService $service,
        private readonly ProjectService $projectService,
    ) {}
    
    public function create(): View
    {
        return view('tenant.projects.create', [
            'editals' => Edital::active()->get(),
        ]);
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $project = Project::create($request->validated() + ['tenant_id' => session('tenant_id')]);
            Project::saveFiles($request, $project);
        DB::commit();

        return redirect()
            ->route('projects.search.index')
            ->withSuccess($request->message);
    }

    public function edit(Project $project, ProjectService $statusProject): View
    {
        $payload = $this->service->payload($project);

        return view('tenant.projects.edit', [
            'project' => $project,
            'customer' => $project->customer,
            'edital' => $project->edital,
            'city' => $project->edital->tenant->city,
            'statuses' => StatusEnum::cases(),
            'socialMedias' => Customer::getSocialMedias(),
            'diligenceStatuses' => DiligenceStatusEnum::cases(),
            'projectIsApproved' => $statusProject->checkStatusApproved($project),
            'containers' => $payload->identifications,
            'isRequireds' => $payload->is_requireds,
            'categories' => Category::active()->get(),
            'files' => $project->files,
        ]);
    }

    public function update(EditalRequest $request, Edital $edital): RedirectResponse
    {
        $edital->update($request->validated());

        return redirect()
            ->route('projects.search.index')
            ->withSuccess($request->message);
    }

    public function destroy(Project $project): RedirectResponse
    {
        DB::beginTransaction();
            foreach ($project->diligences as $diligence) {
                foreach ($diligence->messages as $message) {
                    $message->documents()->delete();
                }

                $diligence->messages()->delete();
            }

            $project->diligences()->delete();
            $project->files()->delete();
            $project->delete();
        DB::commit();

        return redirect()
            ->route('projects.search.index')
            ->withSuccess('Projeto deletado com sucesso!');
    }

    public function searchCustomerByCpf(Request $request): JsonResponse
    {
        return response()->json([
            'customer' => $this->projectService->searchByCustomerCpf($request->cpf)
        ]);
    }

    public function searchCustomerByCnpj(Request $request): JsonResponse
    {
        return response()->json([
            'customer' => $this->projectService->searchByCustomerCnpj($request->cnpj)
        ]);
    }

    public function searchFile(Request $request): JsonResponse
    {
        return response()->json([
            'files' => $this->projectService->searchByFile($request->edital, $request->type)
        ]);
    }
}
