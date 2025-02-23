<?php

namespace App\Http\Controllers\Tenant\Project;

use App\Enums\Project\StatusEnum;
use App\Enums\Project\SubscribeStatusEnum;
use App\Models\Project\Project;
use App\Services\Agent\AgentService;
use App\Services\Project\SearchService;
use App\Services\Project\StatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

final class SearchController
{
    public function __construct(
        private readonly SearchService $search,
        private readonly AgentService $agentService,
        private readonly StatusService $statusService,
    ) {}

    public function index(): View
    {
        return view('tenant.projects.index', [
            'statuses' => StatusEnum::cases(),
            'editals' => $this->search->getEditals(),
            'subscribeStatuses' => SubscribeStatusEnum::cases(),
        ]);
    }

    public function search(): JsonResponse
    {
        $project = Project::with(['customer', 'edital'])
            ->select($this->search->columns())
            ->where('tenant_id', session('tenant_id'))
            ->orderByDesc('id');
    
        return DataTables::eloquent($project)
            ->filter(function ($query) { $this->search->executeFilters($query); })
            ->addColumn('name', fn ($project) => 
                $this->search->name(
                    $this->agentService->getPayload($project->customer)
                )
            )
            ->addColumn('edital', fn ($project) => $this->search->edital($project)) 
            ->addColumn('subscribe', fn ($project) => $this->search->subscriberStatus($project))
            ->addColumn('status', fn ($project) => $this->search->status($project))
            ->addColumn('actions', fn ($project) => 
                $this->search->actions($project,
                    $this->agentService->getPayload($project->customer),
                    $this->statusService->getPayload($project)
                )
            )
            ->rawColumns(['name', 'edital', 'subscribe', 'status', 'actions'])
            ->toJson();
    }
}
