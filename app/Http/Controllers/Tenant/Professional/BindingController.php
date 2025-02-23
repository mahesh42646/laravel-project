<?php

namespace App\Http\Controllers\Tenant\Professional;

use App\Http\Controllers\Controller;
use App\Models\Edital\Edital;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class BindingController extends Controller
{
    public function index(User $professional): View
    {
        return view('tenant.professionals.binding.index', [
            'professional' => $professional,
            'editals' => $professional->editals(),
        ]);
    }

    public function destroy(Edital $edital, int $avaliator): RedirectResponse
    {
        $edital->avaliators()->detach($avaliator);

        return redirect()
            ->route('professionals.bindings.index', $avaliator)
            ->withSuccess('Avaliador <strong>desvinculado</strong> com sucesso!');
    }
}
