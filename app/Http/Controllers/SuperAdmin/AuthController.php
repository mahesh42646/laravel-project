<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\ResetRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Exception;

class AuthController extends Controller
{
    public function login(): View|RedirectResponse
    {
        return view('super-admin.auth.login');
    }

    public function authenticate(AuthRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('dash');
        }

        return redirect()
            ->route('auth.super.admin.login')
            ->withError($request->message);
    }

    public function logout(Request $request): RedirectResponse
    {
        if (session('has_login_invalid')) {
            $this->sessionDestroy($request);

            return redirect()->route('auth.super.admin.login', [
                'invalid' => 'true'
            ]);
        }

        if (session('has_tenant_invalid')) {
            $this->sessionDestroy($request);

            return redirect()->route('auth.super.admin.login', [
                'alert' => 'true'
            ]);
        }

        $this->sessionDestroy($request);

        return redirect()->route('auth.super.admin.login');
    }

    public function forgotPassword(): View
    {
        return view('auth.passwords.forgot-password');
    }

    public function reset(ResetRequest $request): RedirectResponse
    {
        try {
            $user = User::find($request->user_id);
            $user->update(['password' => Hash::make($request->password)]);

            return redirect()
                ->route('login')
                ->withSuccess($request->message);

        } catch (Exception $error) {
            return redirect()
                ->back()
                ->withError("Erro! {$error->getMessage()}");
        }
    }

    private function sessionDestroy(Request $request): void
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
