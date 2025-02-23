<?php

namespace App\Http\Controllers\Agent\Register;

use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Shared\BooleanEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Requests\Public\Register\CustomerRequest;
use App\Models\Customer\Customer;
use App\Models\Edital\AgtentType;
use App\Models\Edital\Edital;
use App\Services\Edital\PeriodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final readonly class CustomerController
{
    public function __construct(
        private PeriodService $period,
    ) {}

    public function show(string $editalCode): View
    {
        $edital = Edital::findOrFail(base64_decode($editalCode));
        $this->period->checkExpiration($edital);

        return view('public.register.show', [
            'edital' => $edital,
            'tenant' => $edital->tenant,
        ]);
    }

    public function create(string $editalCode): View
    {
        return view('public.register.create', [
            'edital' => Edital::findOrFail(base64_decode($editalCode)),
            'editalCode' => $editalCode,
            'agents' => AgtentType::active()->get(),
            'genders' => GenderEnum::toArray(),
            'breeds' => BreedEnum::toArray(),
            'situations' => BooleanEnum::cases(),
            'schoolings' => SchoolingEnum::toArray(),
            'mainAreaAtuations' => MainAreaAtuationEnum::toArray(),
            'communities' => CommunityTraditionalEnum::toArray(),
        ]);
    }

    public function store(CustomerRequest $request, Edital $edital): RedirectResponse
    {
        DB::beginTransaction();
            $customer = Customer::create($request->payload());
            $request->bindAgent($customer);
        DB::commit();

        session()->put("customer_token_auth_{$customer->id}", date('dmYHis').$customer->id);
        session()->put("customer_auth_{$customer->id}", $customer);
        $customer->update(['last_login_at' => date('Y-m-d H:i:s')]);
        
        return redirect()->route('public.panel.project.register.inscription.create', [
            'token' => "{$customer->id}o1x6J2zq89o".md5($customer->id),
            'editalCode' => base64_encode($edital->id),
        ]);
    }
}
