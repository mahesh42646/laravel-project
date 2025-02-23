<?php

namespace App\Http\Controllers\Agent\Panel\Project\Edit;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Project\Project;
use App\Services\Project\Register\IdentificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class IdentificationController extends Controller
{
    public function __construct(
        private readonly IdentificationService $service
    ) {}

    public function edit(string $token, string $projectCode): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $payload = $this->service->payload($project);

        return view('public.panel.project.view.identification.edit', [
            'project' => $project,
            'edital' => $payload->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'containers' => $payload->identifications,
            'isRequireds' => $payload->is_requireds,
            'categories' => Category::active()->get(),
        ]);
    }

    public function update(string $token, string $projectCode, Request $request): JsonResponse
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $project->update($request->except('customer_id'));

        return response()->json([
            'message' => 'Os dados foram <strong>salvos</strong> com sucesso!'
        ]);
    }
}
