<?php

namespace App\Http\Controllers;

use App\Http\Requests\Setting\SettingRequest;
use App\Models\Setting;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('settings.edit', [
            'setting' => Setting::firstOrCreate([])
        ]);
    }

    public function show(): View
    {
        return view('settings.show', [
            'tenant' => Tenant::find(session('tenant_id'))
        ]);
    }

    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->validated() + [
            'photo' => Setting::saveImage($setting, $request)
        ]);

        return redirect()
            ->route('settings.edit', $setting->id)
            ->withSuccess($request->message);
    }
}
