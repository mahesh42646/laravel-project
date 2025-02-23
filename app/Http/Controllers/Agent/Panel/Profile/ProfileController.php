<?php

namespace App\Http\Controllers\Agent\Panel\Profile;

use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\BooleanEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Requests\Public\Profile\CustomerRequest;
use App\Models\Customer\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class ProfileController
{
    public function show(string $token, Request $request): View
    {
        return view('public.panel.profile.show', [
            'customer' => Customer::find($request['customer_id']),
            'token' => $token,
        ]);
    }

    public function edit(string $token, Request $request): View
    {
        return view('public.panel.profile.edit', [
            'customer' => Customer::find($request['customer_id']),
            'token' => $token,
            'genders' => GenderEnum::cases(),
            'breeds' => BreedEnum::cases(),
            'situations' => BooleanEnum::cases(),
            'schoolings' => SchoolingEnum::cases(),
            'mainAreaAtuations' => MainAreaAtuationEnum::cases(),
            'communities' => CommunityTraditionalEnum::cases(),
            'statuses' => ActiveEnum::cases(),
            'socialMedias' => Customer::getSocialMedias(),
        ]);
    }

    public function update(string $token, CustomerRequest $request): RedirectResponse
    {
        $customer = Customer::find($request['customer_id']);
        $customer->update($request->validated() + [
            'profile_photo' => Customer::updateImage($request->profile_photo_update, $customer->profile_photo, $customer->tenant_id, 'photo'),
            'cover' => Customer::updateImage($request->profile_cover_update, $customer->cover, $customer->tenant_id, 'cover'),
        ]);

        return redirect()
            ->route('public.panel.profile.edit', $token)
            ->withSuccess($request->message);
    }
}
