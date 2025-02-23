<?php

namespace App\Http\Controllers\Tenant\Project\Analyze;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Enums\Project\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Tabs\Complement\ApprovedRequest;
use App\Http\Requests\Project\Tabs\Complement\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\Complement\RepprovedRequest;
use App\Models\Project\Project;
use App\Services\Notification\NotificationService;
use App\Services\Project\Analyze\PrintService;
use App\Services\Tenant\Project\ComplementProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;

class ProponentComplementController extends Controller
{
    public function __construct(
        private readonly NotificationService $notification,
        private readonly PrintService $print,
        private readonly ComplementProjectService $service,
    ) {}

    public function repproved(Project $project, RepprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toComplement($project, TypeStatus::REPPROVED);
            $this->service->saveRepprovedTimeline($project, $request);
            $project->update(['status' => StatusEnum::REPPROVED]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->message('links complementares'));
    }

    public function reanalyze(Project $project, ReanalyzeRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toComplement($project, TypeStatus::REANALYZE);
            $this->service->saveReanalyzeTimeline($project, $request);
            $project->update(['status' => StatusEnum::PENDING]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->message('links complementares'));
    }

    public function approved(Project $project, ApprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toComplement($project, TypeStatus::APPROVED);
            $this->service->saveApprovedTimeline($project, $request);
            $project->update(['status' => StatusEnum::PENDING]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->message('links complementares'));
    }

    public function print(Project $project): void
    {
        $this->print->prepare(
            tenant: $project->tenant,
            title: 'LINKS COMPLEMENTARES',
        );

        $pdf = new TCPDF();
        $pdf::AddPage();
        $pdf::writeHTML($this->print->getComplementProjectContent($project), true, false, true, false, '');
        $pdf::Output('links-complementares.pdf', 'I');
    }
}
