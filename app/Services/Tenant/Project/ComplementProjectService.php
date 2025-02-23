<?php

namespace App\Services\Tenant\Project;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Project\Project;
use App\Enums\Project\InscriptionProjectStatusEnum as Status;
use App\Http\Requests\Project\Tabs\Complement\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\Complement\RepprovedRequest;
use Illuminate\Support\Facades\Auth;

final class ComplementProjectService
{
    public function saveRepprovedTimeline(Project $project, RepprovedRequest $request): void
    {
        $project->analyze_complement()->update([
            'status' => Status::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_complement->timelines()->create([
            'status' => TimelineStatusEnum::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveReanalyzeTimeline(Project $project, ReanalyzeRequest $request): void
    {
        $project->analyze_complement()->update([
            'status' => Status::REANALYZE,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => "{$request->expired_at} {$request->hour}:00",
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_complement->timelines()->create([
            'status' => TimelineStatusEnum::REVIEW,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => "{$request->expired_at} {$request->hour}:00",
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveApprovedTimeline(Project $project): void
    {
        $project->analyze_complement()->update([
            'status' => Status::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_complement->timelines()->create([
            'status' => TimelineStatusEnum::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
