<?php

namespace App\Services\Tenant\Project;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Http\Requests\Project\Tabs\IdentificationProject\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\IdentificationProject\RepprovedRequest;
use App\Models\Project\IdentificationProject\Price\Timeline;
use Illuminate\Support\Facades\Auth;

final class IdentificationProjectService
{
    public function saveRepprovedTimeline($identificationProjectRelation, $identificationProject, RepprovedRequest $request): string
    {
        $identificationProjectRelation->update([
            'status' => AnalyzeStatusEnum::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $identificationProject->timelines()->create([
            'status' => TimelineStatusEnum::REPPROVED,
            'motive' => $request->motive,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->getTimeline(
            $identificationProject->timelines
        );
    }

    public function saveReanalyzeTimeline($identificationProjectRelation, $identificationProject, ReanalyzeRequest $request): string
    {
        if (! $identificationProject) {
            $identify = $identificationProjectRelation->create([
                'status' => AnalyzeStatusEnum::REANALYZE,
                'motive' => $request->motive,
                'analyzed_by' => Auth::id(),
                'expired_at' => "{$request->expired_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            Timeline::create([
                'identification_project_price_id' => $identify->id,
                'status' => TimelineStatusEnum::REVIEW,
                'motive' => $request->motive,
                'analyzed_by' => Auth::id(),
                'expired_at' =>  "{$request->expired_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $timelines = Timeline::where('identification_project_price_id', $identify->id)->get();

            return $this->getTimeline($timelines);
        } else {
            $identificationProjectRelation->update([
                'status' => AnalyzeStatusEnum::REANALYZE,
                'motive' => $request->motive,
                'analyzed_by' => Auth::id(),
                'expired_at' => "{$request->expired_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $identificationProject->timelines()->create([
                'status' => TimelineStatusEnum::REVIEW,
                'motive' => $request->motive,
                'analyzed_by' => Auth::id(),
                'expired_at' => "{$request->registered_at} {$request->hour}:00",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return $this->getTimeline(
            $identificationProject->timelines
        );
    }

    public function saveApprovedTimeline($identificationProjectRelation, $identificationProject): string
    {
        $identificationProjectRelation->update([
            'status' => AnalyzeStatusEnum::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $identificationProject->timelines()->create([
            'status' => TimelineStatusEnum::APPROVED,
            'motive' => null,
            'analyzed_by' => Auth::id(),
            'expired_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->getTimeline(
            $identificationProject->timelines
        );
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
