<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\ResetRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use DateTime;
use Exception;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login', [
            'setting' => Setting::first()
        ]);
    }

    public function authenticate(AuthRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('panel');
        }

        return redirect()
            ->route('login')
            ->withError($request->message);
    }

    public function authenticatePasswordless(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        $user = User::findOrFail($request->user);

        if (! URL::hasValidSignature($request)) {
            return redirect()
                ->route('login')
                ->withError('Link inválido!');
        }

        Auth::login($user);

        return redirect('/panel');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }

    public function forgotPassword(): View
    {
        return view('auth.passwords.forgot-password');
    }

    public function resetPassword(User $user, string $token): View
    {
        if ($token != $user->remember_token) {
            return view('auth.passwords.token-invalid');
        }

        $today = new DateTime('now');
        $forgotAt = new DateTime($user->email_verified_at ?: date('2022-01-01 10:10:10'));
        $interval = $today->diff($forgotAt);
        $minutes = 10;

        if ($interval->i > $minutes) {
            return view('auth.passwords.token-expired');
        }

        return view('auth.passwords.reset', [
            'user' => $user,
            'token' => $token,
        ]);
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
}
