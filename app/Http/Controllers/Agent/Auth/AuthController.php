<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Models\Customer\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class AuthController
{
    public function index(): View
    {
        return view('public.auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $customer = Customer::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if (! $customer) {
            return redirect()
                ->route('public.auth.login')
                ->withInput($request->all())
                ->withError('E-mail ou senha <strong>inválida</strong>!');
        }

        session()->put("customer_token_auth_{$customer->id}", date('dmYHis').$customer->id);
        session()->put("customer_auth_{$customer->id}", $customer);
        $customer->update(['last_login_at' => date('Y-m-d H:i:s')]);
        
        return redirect()->route('public.panel.home.index', [
            'token' => "{$customer->id}o1x6J2zq89o".md5($customer->id)
        ]);
    }
}
