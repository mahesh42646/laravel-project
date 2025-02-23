<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Closure;

final class AuthenticateCustomer
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->token;
        $separator = 'o1x6J2zq89o';

        if (! str_contains($token, $separator)) {
            return $this->redirectToLogin();
        }

        [$userId, $hash] = explode($separator, $token);

        if (! $this->isValidTokenHash($userId, $hash)) return $this->redirectToLogin();
        if (! $this->isValidUserId($userId)) return $this->redirectToLogin();
        if (! $this->isValidSession($userId)) return $this->redirectToLogin('Sua sessão expirou!');

        $request->merge(['customer_id' => $userId]);

        return $next($request);
    }

    private function isValidTokenHash(string $userId, string $hash): bool
    {
        return md5($userId) === $hash;
    }

    private function isValidUserId(string $userId): bool
    {
        return is_numeric($userId);
    }

    private function isValidSession(string $userId): bool
    {
        return (bool) session("customer_token_auth_{$userId}");
    }

    private function redirectToLogin(string $message = ''): RedirectResponse
    {
        return redirect()
            ->route('public.auth.login')
            ->withError($message ?: 'O token de autenticação está <strong>inválido</strong>!');
    }
}
