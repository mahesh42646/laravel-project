<?php

namespace App\Http\Controllers\Agent\Panel\Project\Register;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\Register\DocumentRequest;
use App\Models\Project\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class DocumentController extends Controller
{
    public function create(string $token, string $projectCode): View
    {
        $project = Project::with('files')
            ->findOrFail(base64_decode($projectCode));

        return view('public.panel.project.register.documents.create', [
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'files' => $project->files,
        ]);
    }

    public function store(string $token, DocumentRequest $request): JsonResponse
    {
        $request->upload();

        return response()->json([
            'message' => $request->message()
        ]);
    }

    public function checkDocumentsRequired(string $token, Request $request): JsonResponse
    {
        $empty = false;
        $ids = explode(',', $request->ids_requireds);
        $documentsRequireds = DB::table('project_documents')
            ->select('path')
            ->whereIn('id', $ids)
            ->get();

        foreach ($documentsRequireds as $documentRequired) {
            if (! $documentRequired->path) {
                $empty = true;
            }
        }

        $project = Project::findOrFail($request->project_code);

        if (! $project->analyze_document) {
            $analyzeDocument = $project->analyze_document()->create([
                'status' => AnalyzeStatusEnum::PENDING,
                'customer_id' => $project->customer_id,
            ]);
    
            $analyzeDocument->timelines()->create([
                'status' => TimelineStatusEnum::SENT,
                'customer_id' => $project->customer_id,
            ]);
        }

        return response()->json([
            'empty' => $empty
        ]);
    }
}
