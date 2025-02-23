<?php

namespace App\Http\Controllers\Agent\Panel\Project\Register;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Project\Project;
use App\Services\Project\Register\IdentificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class IdentificationController extends Controller
{
    public function __construct(
        private readonly IdentificationService $service
    ) {}

    public function create(string $token, string $projectCode): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $payload = $this->service->payload($project);

        return view('public.panel.project.register.identification.create', [
            'project' => $project,
            'edital' => $payload->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'containers' => $payload->identifications,
            'isRequireds' => $payload->is_requireds,
            'categories' => Category::active()->get(),
        ]);
    }

    public function save(string $token, string $projectCode, Request $request): JsonResponse
    {
        DB::beginTransaction();
            $project = Project::findOrFail(base64_decode($projectCode));
            $this->service->update($project, $request);

            $identificationProject = $project->identification_project()->create([
                'status' => AnalyzeStatusEnum::PENDING,
                'customer_id' => $project->customer_id,
            ]);

            $identificationProject->timelines()->create([
                'status' => TimelineStatusEnum::SENT,
                'customer_id' => $project->customer_id,
            ]);
        DB::commit();
        
        return response()->json([
            'message' => 'Os dados da identificação do projeto foram <strong>salvos</strong> com sucesso!'
        ]);
    }
}
