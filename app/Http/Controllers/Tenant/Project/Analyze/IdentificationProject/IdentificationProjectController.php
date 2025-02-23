<?php

namespace App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Http\Requests\Project\Tabs\IdentificationProject\ApprovedRequest;
use App\Http\Requests\Project\Tabs\IdentificationProject\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\IdentificationProject\RepprovedRequest;
use App\Models\Project\Project;
use App\Services\Notification\NotificationService;
use App\Services\Project\Analyze\PrintService;
use App\Services\Tenant\Project\IdentificationProjectStatusService;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\RedirectResponse;

final class IdentificationProjectController
{
    public function __construct(
        private readonly NotificationService $notification,
        private readonly PrintService $print,
        private readonly IdentificationProjectStatusService $service,
    ) {}

    public function repproved(Project $project, RepprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toIdentificationProject($project, TypeStatus::REPPROVED);
            $this->service->saveRepprovedTimeline($project, $request);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function reanalyze(Project $project, ReanalyzeRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toInscriptionProject($project, TypeStatus::REANALYZE);
            $this->service->saveReanalyzeTimeline($project, $request);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function approved(Project $project, ApprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toInscriptionProject($project, TypeStatus::APPROVED);
            $this->service->saveApprovedTimeline($project, $request);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function print(Project $project): void
    {
        $this->print->prepare(
            tenant: $project->tenant,
            title: 'IDENTIFICAÇÃO DO PROJETO'
        );

        $pdf = new TCPDF();
        $pdf::AddPage();
        $pdf::writeHTML($this->print->getIdentificationProjectContent($project), true, false, true, false, '');
        $pdf::Output('identificacao-do-projeto.pdf', 'I');
    }
}
