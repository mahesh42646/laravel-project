<?php

namespace App\Http\Controllers\Tenant\Project\Analyze;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Enums\Project\DocumentStatusEnum;
use App\Models\Project\AnalyzeDocument\Document;
use App\Models\Project\AnalyzeDocument\Timeline;
use App\Models\Project\Project;
use App\Services\Notification\NotificationIFileProjectService;
use App\Services\Tenant\Project\DocumentStatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

final class FileTimelineController
{
    public function __construct(
        private readonly NotificationIFileProjectService $notification,
        private readonly DocumentStatusService $service,
    ) {}

    public function repproved(Project $project, Document $file, Request $request): JsonResponse
    {
        DB::beginTransaction();
            $documentTypeName = $file->document->name;
            $this->notification->toAgent($project, TypeStatus::REPPROVED, $documentTypeName);

            $file->update([
                'status' => DocumentStatusEnum::REPPROVED,
                'analyzed_by' => Auth::id(),
                'motive' => $request->motive,
                'expired_at' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $file->timelines()->create([
                'status' => TimelineStatusEnum::REPPROVED,
                'analyzed_by' => Auth::id(),
                'motive' => $request->motive,
                'expired_at' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $content = $this->service->getTimeline(
                Timeline::where('document_id', $file->id)->get()
            );
        DB::commit();

        return response()->json([
            'message' => "Os dados do documento {$documentTypeName} foram <strong>reprovados</strong>!",
            'content_timeline' => $content,
        ]);
    }

    public function reanalyze(Project $project, Document $file, Request $request): JsonResponse
    {
        DB::beginTransaction();
            $documentTypeName = $file->document->name;
            $this->notification->toAgent($project, TypeStatus::REANALYZE, $documentTypeName);

            $file->update([
                'status' => DocumentStatusEnum::REVIEW,
                'analyzed_by' => Auth::id(),
                'motive' => $request->motive,
                'expired_at' => "{$request->expired_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $file->timelines()->create([
                'status' => TimelineStatusEnum::REVIEW,
                'analyzed_by' => Auth::id(),
                'motive' => $request->motive,
                'expired_at' => "{$request->expired_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $content = $this->service->getTimeline(
                Timeline::where('document_id', $file->id)->get()
            );
        DB::commit();

        return response()->json([
            'message' => "Os dados do documento {$documentTypeName} foram para <strong>reanálise</strong>!",
            'content_timeline' => $content,
        ]);
    }

    public function approved(Project $project, Document $file): JsonResponse
    {
        DB::beginTransaction();
            $documentTypeName = $file->document->name;
            $this->notification->toAgent($project, TypeStatus::APPROVED, $documentTypeName);

            $file->update([
                'status' => DocumentStatusEnum::APPROVED,
                'analyzed_by' => Auth::id(),
                'motive' => null,
                'expired_at' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $file->timelines()->create([
                'status' => TimelineStatusEnum::APPROVED,
                'analyzed_by' => Auth::id(),
                'motive' => null,
                'expired_at' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $content = $this->service->getTimeline(
                Timeline::where('document_id', $file->id)->get()
            );
        DB::commit();

        return response()->json([
            'message' => "Os dados do documento {$documentTypeName} foram <strong>aprovados com sucesso!</strong>",
            'content_timeline' => $content,
        ]);
    }
}
