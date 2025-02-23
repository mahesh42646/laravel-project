<?php

namespace App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Http\Requests\Project\Tabs\IdentificationProject\ApprovedRequest;
use App\Http\Requests\Project\Tabs\IdentificationProject\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\IdentificationProject\RepprovedRequest;
use App\Models\Project\IdentificationProject\Cronogram\Timeline;
use App\Models\Project\Project;
use App\Services\Notification\NotificationIdentificationProjectService;
use App\Services\Tenant\Project\IdentificationProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class IdentificationProjectCronogramController
{
    public function __construct(
        private readonly NotificationIdentificationProjectService $notification,
        private readonly IdentificationProjectService $service,
    ) {}

    public function repproved(Project $project, RepprovedRequest $request): JsonResponse
    {
        DB::beginTransaction();
            $this->notification->toAgent($project, TypeStatus::REPPROVED, 'cronogram');

            if ($project->identification_project_cronogram) {
                $project->identification_project_cronogram()->update([
                    'status' => AnalyzeStatusEnum::REPPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $project->identification_project_cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::REPPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    $project->identification_project_cronogram->timelines
                );
            } else {
                $cronogram = $project->identification_project_cronogram()->create([
                    'status' => AnalyzeStatusEnum::REPPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::REPPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    Timeline::where('identification_project_cronogram_id', $cronogram->id)->get()
                );
            }
            
        DB::commit();

        return response()->json([
            'message' => $request->message('cronograma de execução do projeto'),
            'content_timeline' => $content,
        ]);
    }

    public function reanalyze(Project $project, ReanalyzeRequest $request): JsonResponse
    {
        DB::beginTransaction();
            $this->notification->toAgent($project, TypeStatus::REANALYZE, 'cronogram');

            if ($project->identification_project_cronogram) {
                $project->identification_project_cronogram()->update([
                    'status' => AnalyzeStatusEnum::REANALYZE,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => "{$request->expired_at} {$request->hour}:00",
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $project->identification_project_cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::REVIEW,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => "{$request->expired_at} {$request->hour}:00",
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    $project->identification_project_cronogram->timelines
                );
            } else {
                $cronogram = $project->identification_project_cronogram()->create([
                    'status' => AnalyzeStatusEnum::REANALYZE,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => "{$request->expired_at} {$request->hour}:00",
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::REVIEW,
                    'analyzed_by' => Auth::id(),
                    'motive' => $request->motive,
                    'expired_at' => "{$request->expired_at} {$request->hour}:00",
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    Timeline::where('identification_project_cronogram_id', $cronogram->id)->get()
                );
            }
            
        DB::commit();

        return response()->json([
            'message' => $request->message('cronograma de execução do projeto'),
            'content_timeline' => $content,
        ]);
    }

    public function approved(Project $project, ApprovedRequest $request): JsonResponse
    {
        DB::beginTransaction();
            $this->notification->toAgent($project, TypeStatus::APPROVED, 'cronogram');

            if ($project->identification_project_cronogram) {
                $project->identification_project_cronogram()->update([
                    'status' => AnalyzeStatusEnum::APPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => 'Ok',
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $project->identification_project_cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::APPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => null,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    $project->identification_project_cronogram->timelines
                );
            } else {
                $cronogram = $project->identification_project_cronogram()->create([
                    'status' => AnalyzeStatusEnum::APPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => null,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $cronogram->timelines()->create([
                    'status' => TimelineStatusEnum::APPROVED,
                    'analyzed_by' => Auth::id(),
                    'motive' => null,
                    'expired_at' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $content = $this->service->getTimeline(
                    Timeline::where('identification_project_cronogram_id', $cronogram->id)->get()
                );
            }
            
        DB::commit();

        return response()->json([
            'message' => $request->message('cronograma de execução do projeto'),
            'content_timeline' => $content,
        ]);
    }
}
