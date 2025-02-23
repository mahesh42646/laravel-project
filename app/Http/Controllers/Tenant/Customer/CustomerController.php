<?php

namespace App\Http\Controllers\Tenant\Customer;

use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\BooleanEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Requests\Tenant\Customer\CustomerRequest;
use App\Http\Requests\Tenant\Customer\CustomerUpdateRequest;
use App\Models\Customer\Customer;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class CustomerController
{
    public function __construct(
        private readonly CustomerService $service
    ) {}

    public function index(): View
    {
        return view('tenant.customers.index', [
            'total' => $this->service->getTotal(),
            'customers' => $this->service->getAll(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.customers.create', [
            'genders' => GenderEnum::toArray(),
            'breeds' => BreedEnum::toArray(),
            'situations' => BooleanEnum::cases(),
            'schoolings' => SchoolingEnum::toArray(),
            'mainAreaAtuations' => MainAreaAtuationEnum::toArray(),
            'communities' => CommunityTraditionalEnum::toArray(),
        ]);
    }

    public function store(CustomerRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $customer = Customer::create($request->payload());
            $request->bindAgent($customer);
        DB::commit();

        return redirect()
            ->route('customers.index')
            ->withSuccess($request->message());
    }

    public function edit(Customer $customer): View
    {
        return view('tenant.customers.edit', [
            'customer' => $customer,
            'genders' => GenderEnum::cases(),
            'breeds' => BreedEnum::cases(),
            'situations' => BooleanEnum::cases(),
            'schoolings' => SchoolingEnum::cases(),
            'mainAreaAtuations' => MainAreaAtuationEnum::cases(),
            'communities' => CommunityTraditionalEnum::cases(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function update(CustomerUpdateRequest $request, Customer $customer): RedirectResponse
    {
        DB::beginTransaction();
            $customer->update($request->payload());
            $request->bindAgent($customer);
        DB::commit();

        return redirect()
            ->route('customers.edit', $customer->id)
            ->withSuccess($request->message());
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        DB::beginTransaction();
            foreach ($customer->projects as $project) {
                foreach ($project->diligences as $diligence) {
                    foreach ($diligence->messages as $message) {
                        $message->documents()->delete();
                    }

                    $diligence->messages()->delete();
                }

                $project->diligences()->delete();
                $project->files()->delete();
            }

            $customer->agent_pf()->delete();
            $customer->agent_mei()->delete();
            $customer->agent_pj_with_profit()->delete();
            $customer->agent_pj_without_profit()->delete();
            $customer->agent_collective()->delete();
            $customer->projects()->delete();
            $customer->social_medias()->delete();
            $customer->notifications()->delete();
            $customer->notification_professionals()->delete();
            $customer->delete();
        DB::commit();

        return redirect()
            ->route('customers.index')
            ->withSuccess('Usuário <strong>excluído</strong> com sucesso!');
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'customers' => $this->service->search($request->name)
        ]);
    }

    public function searchCity(Request $request): JsonResponse
    {
        return response()->json([
            'cities' => $this->service->searchCity($request)
        ]);
    }
}
