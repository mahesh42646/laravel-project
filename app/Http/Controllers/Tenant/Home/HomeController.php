<?php

namespace App\Http\Controllers\Tenant\Home;

use App\Models\Customer\Customer;
use App\Models\Edital\Edital;
use App\Models\Notification\NotificationProfessional;
use App\Models\Project\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class HomeController
{
    public function __invoke(): View|RedirectResponse
    {
        if (session('has_tenant_invalid')) {
            return redirect()->route('auth.super.admin.logout');
        }

        return view('tenant.home.index', [
            'customers' => Customer::getAll(),
            'editals' => Edital::getAll(),
            'projects' => Project::getAll(),
            'lastProjects' => [],
            'projectPrice' => 100,
            'notifications' => NotificationProfessional::getMessages(),
            'user' => Auth::user(),
        ]);
    }
}
