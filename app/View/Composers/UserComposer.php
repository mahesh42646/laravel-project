<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class UserComposer
{
    protected User $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}
