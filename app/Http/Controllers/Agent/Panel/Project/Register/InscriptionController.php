<?php

namespace App\Http\Controllers\Agent\Panel\Project\Register;

use App\Enums\Edital\TypeEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Enums\Project\ProfileEnum;
use App\Enums\Project\ProfilePriorityEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\Register\InscriptionRequest;
use App\Models\Edital\Edital;
use App\Models\Project\Accessibility\Accessibility;
use App\Models\Project\Accessibility\Arquitetonic;
use App\Models\Project\Accessibility\Atitudinal;
use App\Models\Project\Accessibility\Communicational;
use App\Models\Project\Project;
use App\Models\Project\Strategy;
use App\Services\Agent\InscriptionProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class InscriptionController extends Controller
{
    public function __construct(
        private readonly InscriptionProjectService $service
    ) {}

    public function create(string $token, string $editalCode, Request $request): View
    {
        return view('public.panel.project.register.inscription.create', [
            'customer' => session("customer_auth_{$request['customer_id']}"),
            'edital' => Edital::findOrFail(base64_decode($editalCode)),
            'token' => $token,
            'editalCode' => $editalCode,
            'profiles' => ProfileEnum::cases(),
            'profilePriorities' => ProfilePriorityEnum::cases(),
            'accessibilities' => Accessibility::active()->get(),
            'accessibilityArquitetonics' => Arquitetonic::active()->get(),
            'accessibilityCommunicationals' => Communicational::active()->get(),
            'accessibilityAtitudinals' => Atitudinal::active()->get(),
            'strategies' => Strategy::active()->get(),
        ]);
    }

    public function store(string $token, string $editalCode, InscriptionRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $project = $this->service->createProject($editalCode, $request);
            $this->service->saveDocuments($project);
            $project->update($request->payload());
            $projectCode = base64_encode($project->id);
        DB::commit();

        return redirect()
            ->route('public.panel.project.register.identification.create', [$token, $projectCode])
            ->withSuccess($request->message());
    }

    public function edit(string $token, string $projectCode, Request $request): View
    {
        $customer = session("customer_auth_{$request['customer_id']}");
        $project = Project::with([
                'inscription_accessibilities',
                'inscription_accessibility_arquitetonics',
                'inscription_accessibility_communicationals',
                'inscription_accessibility_atitudinals',
                'inscription_strategies',
            ])
            ->findOrFail(base64_decode($projectCode));

        return view('public.panel.project.register.inscription.edit', [
            'customer' => $customer,
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'profiles' => ProfileEnum::cases(),
            'profilePriorities' => ProfilePriorityEnum::cases(),
            'accessibilities' => Accessibility::active()->get(),
            'accessibilityArquitetonics' => Arquitetonic::active()->get(),
            'accessibilityCommunicationals' => Communicational::active()->get(),
            'accessibilityAtitudinals' => Atitudinal::active()->get(),
            'strategies' => Strategy::active()->get(),
        ]);
    }

    public function update(string $token, string $projectCode, InscriptionRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $project = Project::find(base64_decode($projectCode));
            $project->update($request->payload());

            if ($project->edital->type_id === TypeEnum::NORMAL) {
                $project->inscription_accessibilities()->sync($request->accessibilities);
                $project->inscription_accessibility_arquitetonics()->sync($request->accessibility_arquitetonics);
                $project->inscription_accessibility_communicationals()->sync($request->accessibility_communicationals);
                $project->inscription_accessibility_atitudinals()->sync($request->accessibility_atitudinals);
                $project->inscription_strategies()->sync($request->strategies);
            }
    
            $project->inscription_project->timelines()->create([
                'status' => TimelineStatusEnum::UPDATED,
                'customer_id' => $request['customer_id'],
            ]);
            
            $projectCode = base64_encode($project->id);
        DB::commit();

        return redirect()
            ->route('public.panel.project.register.identification.create', [$token, $projectCode])
            ->withSuccess($request->message());
    }
}
