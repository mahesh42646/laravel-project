<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\CompanyRequest;
use App\Models\SuperAdmin\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('super-admin.dash.companies.index', [
            'companies' => Company::all(),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.dash.companies.create');
    }

    public function store(CompanyRequest $request): RedirectResponse
    {   
        Company::create($request->validated());

        return redirect()
            ->route('dash.companies.index')
            ->withSuccess($request->message);
    }

    public function edit(Company $company): View
    {
        return view('super-admin.dash.companies.edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return redirect()
            ->route('dash.companies.index')
            ->withSuccess($request->message);
    }

    function resetPasswordView(User $user): View
    {
        return view('super-admin.dash.companies.reset-password', 
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

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'companies' => Company::search($request->name)
        ]);
    }
}
