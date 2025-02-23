<?php

namespace App\Http\Controllers\Tenant\Edital;

use App\Models\Edital\Edital;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class AvaliatorController
{
    public function index(int $edital): View
    {
        return view('tenant.editals.avaliator', [
            'avaliators' => User::where('tenant_id', session('tenant_id'))->pluck('name', 'id'),
            'edital' => Edital::with(['tenant.city', 'avaliators'])
                ->select(['id', 'name', 'tenant_id'])
                ->where('id', $edital)
                ->where('tenant_id', session('tenant_id'))
                ->first()
        ]);
    }

    public function store(Edital $edital, Request $request): RedirectResponse
    {
        $avaliatorExist = DB::table('edital_assign_avaliator')
            ->where('edital_id', $edital->id)
            ->where('avaliator_id', $request->avaliator_id)
            ->first();

        if ($avaliatorExist) {
            return redirect()
                ->route('editals.assign.avaliator.index', $edital->id)
                ->withErrors('O avaliador selecionado já está vinculado a este edital!');
        }

        $edital->avaliators()
            ->syncWithoutDetaching([
                $request->avaliator_id => [
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ]);

        return redirect()
            ->route('editals.assign.avaliator.index', $edital->id)
            ->withSuccess('Avaliador <strong>vinculado</strong> com sucesso!');
    }

    public function destroy(Edital $edital, int $avaliator): RedirectResponse
    {
        $edital->avaliators()->detach($avaliator);

        return redirect()
            ->route('editals.assign.avaliator.index', $edital->id)
            ->withSuccess('Avaliador <strong>desvinculado</strong> com sucesso!');
    }
}
