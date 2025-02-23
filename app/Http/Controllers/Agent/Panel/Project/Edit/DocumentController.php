<?php

namespace App\Http\Controllers\Agent\Panel\Project\Edit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\Register\DocumentRequest;
use App\Models\Project\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

final class DocumentController extends Controller
{
    public function edit(string $token, string $projectCode): View
    {
        $project = Project::query()
            ->with('files')
            ->findOrFail(base64_decode($projectCode));

        return view('public.panel.project.view.documents.edit', [
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'files' => $project->files,
        ]);
    }

    public function update(string $token, DocumentRequest $request): JsonResponse
    {
        $request->upload();

        return response()->json([
            'message' => $request->message()
        ]);
    }
}
