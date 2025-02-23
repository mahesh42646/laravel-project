<?php

namespace App\View\Composers;

use Illuminate\View\View;

class RoleComposer
{
    protected string $role;

    public function __construct()
    {
        $this->role = 'admin';
    }

    public function compose(View $view)
    {
        $view->with('role', $this->role);
    }
}
