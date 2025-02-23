<?php

namespace App\Http\Controllers\Agent\Panel\Home;

use App\Models\Notification\Notification;
use App\Services\Agent\HomeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class HomeController
{
    public function __construct(
        private readonly HomeService $service
    ) {}

    public function index(string $token, Request $request): View
    {
        return view('public.panel.home.index', [
            'customer' => $this->service->getAgent($request),
            'projects' => $this->service->getProjects($request),
            'notification' => Notification::getMessage($request['customer_id'], $token),
            'token' => $token,
        ]);
    }

    public function getPaginatedEditals(string $token): JsonResponse
    {
        return response()->json([
            'edital' => $this->service->getEditals($token),
        ]);
    }

    public function destroy(string $token, Request $request): RedirectResponse
    {
        session()->forget("customer_token_auth_{$request['customer_id']}");
        session()->forget("customer_auth_{$request['customer_id']}");

        return redirect()->route('public.auth.login');
    }
}
