<?php

namespace App\Listeners;

use App\Enums\Shared\RoleEnum;
use Illuminate\Http\Request;

class ValidateTenantSession
{
    public function __construct(
        private readonly Request $request
    ) {}

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {
        if (! $this->isRouteSuperAdmin() && ! $event->user->tenant_id && ($event->user->role_id === RoleEnum::MAIN || $event->user->role_id === RoleEnum::SUPER_ADMIN)) {
            session()->put('has_tenant_invalid', true);
        }

        if (! $this->isRouteSuperAdmin() && $event->user->tenant_id) {
            $event->user->update([
                'last_login_at' => date('Y-m-d H:i:s')
            ]);

            session()->put('tenant_id', $event->user->tenant_id);
            session()->put('tenant_name', $event->user->tenant->name);
        }

        if ($this->isRouteSuperAdmin() && ($event->user->role_id !== RoleEnum::MAIN && $event->user->role_id !== RoleEnum::SUPER_ADMIN)) {
            session()->put('has_login_invalid', true);
        }
    }

    private function isRouteSuperAdmin(): bool
    {
        return (
            $this->request->route()->named('auth.super.admin.authenticate')
        );
    }

    // private function destroySession(Request $request): void
    // {
    //     Auth::logout();
 
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    // }
}
