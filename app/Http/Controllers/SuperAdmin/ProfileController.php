<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfilePasswordRequest;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('super-admin.dash.profile.show', [
            'user' => auth()->user()
        ]);
    }

    public function edit(): View
    {
        return view('super-admin.dash.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $photo = User::updateImage($request, $user);
        $user->update($request->validated() + [
            'profile_photo' => $photo
        ]);

        return redirect()
            ->route('dash.profile.edit')
            ->withSuccess($request->message);
    }

    public function showPassword(): View
    {
        return view('super-admin.dash.profile.password', [
            'user' => auth()->user()
        ]);
    }

    public function changePassword(ProfilePasswordRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()
            ->route('dash.profile.password')
            ->withSuccess($request->message);
    }
}
