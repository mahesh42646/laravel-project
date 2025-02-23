<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin\Tenant\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (session('has_login_invalid')) {
            return redirect()->route('auth.super.admin.logout');
        }
        
        return view('super-admin.dash.index', [
            'tenants' => Tenant::getAll(),
            'users' => Tenant::getUsersAll(),
            'customers' => Tenant::getCustomersAll(),
        ]);
    }

    public function byTenant(int $id): RedirectResponse
    {
        $tenant = Tenant::find($id);
        $user = User::find(auth()->id());
        
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s')
        ]);

        session()->put('tenant_id', $id);
        session()->put('tenant_name', $tenant->name);

        return redirect()->route('panel');
    }
}
