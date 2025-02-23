<?php

namespace App\Http\Controllers\Agent\Panel\Profile;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class PasswordController
{
    public function edit(string $token, Request $request): View
    {
        return view('public.panel.profile.password', [
            'customer' => session("customer_auth_{$request['customer_id']}"),
            'token' => $token,
        ]);
    }

    public function update(string $token, Request $request): RedirectResponse
    {
        $customer = session("customer_auth_{$request['customer_id']}");
        $customer->update([
            'password' => $request->new_password
        ]);

        return redirect()
            ->route('public.panel.profile.password.edit', $token)
            ->withSuccess('Senha <strong>atualizada</strong> com sucesso!');
    }
}
