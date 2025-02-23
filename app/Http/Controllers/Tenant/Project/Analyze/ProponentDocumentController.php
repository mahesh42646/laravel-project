<?php

namespace App\Http\Controllers\Tenant\Project\Analyze;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Enums\Project\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Tabs\Document\ApprovedRequest;
use App\Http\Requests\Project\Tabs\Document\ReanalyzeRequest;
use App\Http\Requests\Project\Tabs\Document\RepprovedRequest;
use App\Models\Project\Project;
use App\Services\Notification\NotificationService;
use App\Services\Project\Analyze\PrintService;
use App\Services\Project\DownloadService;
use App\Services\Tenant\Project\DocumentStatusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class ProponentDocumentController extends Controller
{
    public function __construct(
        private readonly NotificationService $notification,
        private readonly PrintService $print,
        private readonly DocumentStatusService $service,
        private readonly DownloadService $download,
    ) {}

    public function repproved(Project $project, RepprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toDocument($project, TypeStatus::REPPROVED);
            $this->service->saveRepprovedTimeline($project, $request);
            $project->update(['status' => StatusEnum::REPPROVED]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function reanalyze(Project $project, ReanalyzeRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toDocument($project, TypeStatus::REANALYZE);
            $this->service->saveReanalyzeTimeline($project, $request);
            $project->update(['status' => StatusEnum::PENDING]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function approved(Project $project, ApprovedRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $this->notification->toDocument($project, TypeStatus::APPROVED);
            $this->service->saveApprovedTimeline($project, $request);
            $project->update(['status' => StatusEnum::PENDING]);
        DB::commit();

        return redirect()
            ->route('projects.edit', $project->id)
            ->withSuccess($request->alert());
    }

    public function download(Project $project): BinaryFileResponse
    {
        $this->download->removeOldZipFiles();
        $files = $this->download->zip($project);

        return response()->download($files);
    }
}
