<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\BrazilianStatesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\CityRequest;
use App\Models\Setting\City;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        return view('super-admin.dash.cities.index', [
            'cities' => City::paginate(50),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.dash.cities.create', [
            'states' => BrazilianStatesEnum::cases()
        ]);
    }

    public function store(CityRequest $request): RedirectResponse
    {
        City::create($request->validated());

        return redirect()
            ->route('dash.cities.index')
            ->withSuccess($request->message);
    }

    public function edit(City $city): View
    {
        return view('super-admin.dash.cities.edit', [
            'city' => $city,
            'states' => BrazilianStatesEnum::cases(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        return redirect()
            ->route('dash.cities.index')
            ->withSuccess($request->message);
    }

    public function show(City $city): View
    {
        return view('super-admin.dash.cities.show', [
            'city' => $city
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'cities' => City::search($request->name)
        ]);
    }
}
