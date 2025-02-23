<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\Shared\ActiveEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\TenantRequest;
use App\Models\Setting\City;
use App\Models\SuperAdmin\Company\Company;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        return view('super-admin.dash.tenants.index', [
            'tenants' => Tenant::getByUser(),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.dash.tenants.create', [
            'cities' => City::active()->get(),
            'companies' => Company::all(),
        ]);
    }

    public function store(TenantRequest $request): RedirectResponse
    {
        Tenant::create($request->validated() + [
            'logo' => Tenant::saveImage($request)
        ]);

        return redirect()
            ->route('dash.tenants.index')
            ->withSuccess($request->message);
    }

    public function show(Tenant $tenant): View
    {
        return view('super-admin.dash.tenants.show', [
            'tenant' => $tenant,
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function edit(Tenant $tenant): View
    {
        return view('super-admin.dash.tenants.edit', [
            'tenant' => $tenant,
            'companies' => Company::all(),
            'cities' => City::active()->get(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function update(TenantRequest $request, Tenant $tenant): RedirectResponse
    {
        $tenant->update($request->validated() + [
            'logo' => Tenant::updateImage($request, $tenant)
        ]);
     
        return redirect()
            ->route('dash.tenants.index')
            ->withSuccess($request->message);
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'tenants' => Tenant::search($request->name)
        ]);
    }
}
