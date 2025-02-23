<?php

namespace App\Http\Controllers\Agent\Panel\Project;

use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Project\ProponentStatusEnum;
use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\BooleanEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Public\Profile\CustomerRequest;
use App\Services\Project\ProponentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProponentController extends Controller
{
    public function __construct(
        private readonly ProponentService $proponentService
    ) {}

    public function show(string $token, string $projectCode, Request $request): View
    {
        $customer = Customer::find($request['customer_id']);
        $project = Project::findOrFail(base64_decode($projectCode));

        return view('public.panel.project.proponent.show', [
            'customer' => $customer,
            'token' => $token,
            'project' => $project,
        ]);
    }

    public function edit(string $token, string $projectCode, Request $request): View
    {
        $project =  Project::findOrFail(base64_decode($projectCode));
        $expired = $this->proponentService->checkStatusExpiredAt($project);

        return view('public.panel.project.proponent.edit', [
            'customer' => Customer::find($request['customer_id']),
            'token' => $token,
            'project' => Project::findOrFail(base64_decode($projectCode)),
            'genders' => GenderEnum::cases(),
            'breeds' => BreedEnum::cases(),
            'situations' => BooleanEnum::cases(),
            'schoolings' => SchoolingEnum::cases(),
            'mainAreaAtuations' => MainAreaAtuationEnum::cases(),
            'communities' => CommunityTraditionalEnum::cases(),
            'statuses' => ActiveEnum::cases(),
            'socialMedias' => Customer::getSocialMedias(),
            'expired' => $expired,
        ]);
    }

    public function update(string $token, Project $project, CustomerRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $customer = Customer::find($request['customer_id']);
            $customer->update($request->validated() + [
                'profile_photo' => Customer::updateImage($request->profile_photo_update, $customer->profile_photo, $project->tenant_id, 'photo'),
                'cover' => Customer::updateImage($request->profile_cover_update, $customer->cover, $project->tenant_id, 'cover'),
            ]);

            if ($project->identification_proponent_status === ProponentStatusEnum::REANALYZE) {
                $this->notify($project, $request);
            }
        DB::commit();
        
        return redirect()
            ->route('public.panel.project.proponent.edit', [
                $token, base64_encode($project->id)
            ])
            ->withSuccess($request->message);
    }

    private function notify(Project $project, CustomerRequest $request): void
    {
        $payloads = [];
        $professionals = DB::select("SELECT id FROM users WHERE tenant_id = ?", [$project->tenant_id]);
        $customer = Customer::find($request['customer_id']);

        foreach ($professionals as $professional) {
            $payloads[] = [
                'title' => "<strong>Reanálise!</strong> O artista {$customer->name} atualizou seus dados pessoais, deseja revisar? Caso essa ação já tenha sido realizada por outro profissional, desconsidere essa notificação!",
                'project_id' => $project->id,
                'from_customer_id' => $customer->id,
                'to_professional_id' => $professional->id,
                'tenant_id' => $project->tenant_id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('notification_professionals')->insert($payloads);
    }
}
