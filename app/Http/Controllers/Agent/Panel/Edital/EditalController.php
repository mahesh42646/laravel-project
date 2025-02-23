<?php

namespace App\Http\Controllers\Agent\Panel\Edital;

use App\Services\Agent\EditalService;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class EditalController
{
    public function __construct(
        private readonly EditalService $service
    ) {}

    public function index(string $token, Request $request): View
    {
        return view('public.panel.edital.index', [
            'editals' => $this->service->getEditals($token, $request),
            'token' => $token,
        ]);
    }
}
