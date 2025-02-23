<?php

namespace App\Http\Controllers\Tenant\Setting\Profile;

use App\Http\Requests\Tenant\Profile\ProfilePasswordRequest;
use App\Http\Requests\Tenant\Profile\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\View\View;

final class ProfileController
{
    public function show(): View
    {
        return view('tenant.settings.profile.show', [
            'user' => auth()->user()
        ]);
    }

    public function edit(): View
    {
        return view('tenant.settings.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update($request->payload());

        return redirect()
            ->route('profile.edit')
            ->withSuccess($request->message());
    }

    public function showPassword(): View
    {
        return view('tenant.settings.profile.password');
    }

    public function changePassword(ProfilePasswordRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()
            ->route('profile.password')
            ->withSuccess($request->message());
    }
}
