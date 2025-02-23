<?php

namespace App\Http\Controllers\Tenant\Professional;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\RoleEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Professional\ProfessionalRequest;
use App\Models\User;
use App\Services\Professional\ProfessionalService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class ProfessionalController extends Controller
{
    public function __construct(
        private readonly ProfessionalService $service
    ) {}

    public function index(): View
    {
        return view('tenant.professionals.index', [
            'professionals' => $this->service->getAll(),
            'total' => $this->service->getTotal(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.professionals.create', [
            'genders' => GenderEnum::cases(),
            'schoolings' => SchoolingEnum::cases(),
            'roles' => RoleEnum::cases(),
        ]);
    }

    public function store(ProfessionalRequest $request): RedirectResponse
    {   
        User::create($request->payload() + [
            'password' => bcrypt($request->password)
        ]);

        return redirect()
            ->route('professionals.index')
            ->withSuccess($request->message());
    }

    public function edit(User $professional): View
    {
        return view('tenant.professionals.edit', [
            'professional' => $professional,
            'genders' => GenderEnum::cases(),
            'schoolings' => SchoolingEnum::cases(),
            'roles' => RoleEnum::cases(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function update(ProfessionalRequest $request, User $professional): RedirectResponse
    {
        $professional->update($request->payload());

        return redirect()
            ->route('professionals.edit', $professional->id)
            ->withSuccess($request->message());
    }

    function resetPassword(Request $request, User $professional): RedirectResponse
    {
        $professional->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()
            ->route('professionals.index')
            ->withSuccess("Senha do usuário {$professional->name} resetada com sucesso!");
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'professionals' => $this->service->search($request->name)
        ]);
    }

    public function searchOccupation(Request $request): JsonResponse
    {
        return response()->json([
            'occupations' => $this->service->searchOccupation($request)
        ]);
    }
}
