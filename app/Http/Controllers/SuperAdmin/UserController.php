<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\UserRequest;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): View
    {
        return view('super-admin.dash.users.index', [
            'users' => User::admin()->simplePaginate(50),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.dash.users.create', [
            'schoolings' => SchoolingEnum::cases(),
            'tenants' => Tenant::active()->get(),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {   
        DB::beginTransaction();
            $user = User::create($request->validated() + [
                'password' => bcrypt($request->password),
                'profile_photo' => User::saveImage($request),
            ]);

            $user->prefectures()->sync($request->tenants);
        DB::commit();

        return redirect()
            ->route('dash.users.index')
            ->withSuccess($request->message);
    }

    public function edit(User $user): View
    {
        return view('super-admin.dash.users.edit', [
            'user' => $user,
            'schoolings' => SchoolingEnum::cases(),
            'tenants' => Tenant::active()->get(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        DB::beginTransaction();
            $user->prefectures()->sync($request->tenants);
            $user->update($request->validated() + [
                'profile_photo' => User::updateImage($request, $user)
            ]);
        DB::commit();

        return redirect()
            ->route('dash.users.index')
            ->withSuccess($request->message);
    }

    function resetPasswordView(User $user): View
    {
        return view('super-admin.dash.users.reset-password', 
            compact('user')
        );
    }

    function resetPassword(Request $request, User $user): RedirectResponse
    {
        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()
            ->route('dash.users.index')
            ->withSuccess("Senha do usuário {$user->name} resetada com sucesso! Nova senha: <strong>{$request->new_password}</strong>");
    }
}
