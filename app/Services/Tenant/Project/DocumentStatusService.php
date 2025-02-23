<?php

namespace App\Services\Tenant\Project;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Project\Project;
use App\Enums\Project\IdentificationProjectStatusEnum as Status;
use App\Http\Requests\Project\Tabs\Document\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\Document\RepprovedRequest;
use Illuminate\Support\Facades\Auth;

final class DocumentStatusService
{
    public function saveRepprovedTimeline(Project $project, RepprovedRequest $request): void
    {
        $project->analyze_document()->update([
            'status' => Status::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_document->timelines()->create([
            'status' => TimelineStatusEnum::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveReanalyzeTimeline(Project $project, ReanalyzeRequest $request): void
    {
        $project->analyze_document()->update([
            'status' => Status::REANALYZE,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => "{$request->expired_at} {$request->hour}:00",
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_document->timelines()->create([
            'status' => TimelineStatusEnum::REVIEW,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => "{$request->expired_at} {$request->hour}:00",
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveApprovedTimeline(Project $project): void
    {
        $project->analyze_document()->update([
            'status' => Status::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $project->analyze_document->timelines()->create([
            'status' => TimelineStatusEnum::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getTimeline($timelines): string
    {
        $content = '';

        foreach ($timelines as $timeline) {
            $motive = '';
            $createdAt = ($timeline->status === TimelineStatusEnum::REVIEW)
                ? "Até: {$timeline->expired_at?->format('d/m/Y \à\s H:i:s')}" 
                : $timeline->created_at?->format('d/m/Y H:i:s');

            if ($timeline->motive) {
                $motive = "<div class='bg-light p-3 rounded-lg'>{$timeline->motive}</div>";
            }

            $content .= <<<HTML
                <li class="timeline-item">
                    <span class="timeline-item-icon">
                        {$timeline->status->getIcon()}
                    </span>
                    <div class="timeline-item-description">
                        <div class="d-flex flex-column font-size-15 mb-2">
                            <span class="text-dark font-weight-medium">{$timeline->status->getName()}</span>
                            <span class="text-secondary">{$createdAt}</span>
                        </div>
                        {$motive}
                    </div>
                </li>
            HTML;
        }

        return $content;
    }
}
