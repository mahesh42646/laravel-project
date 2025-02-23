<?php

namespace App\Http\Controllers\Agent\Register;

use App\Models\Edital\Edital;
use App\Services\Customer\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final readonly class SearchCustomerController
{
    public function __construct(
        private SearchService $service,
    ) {}

    public function searchAgentCpf(Request $request, string $editalCode): JsonResponse
    {
        $agentPF = DB::table('customer_agent_pfs')
            ->select('name')
            ->where('cpf', $request->cpf)
            ->first();

        return response()->json([
            'agent_pf_exist' => $agentPF ? true : false,
            'agent_pf_name' => $agentPF?->name,
            'agent_pf_route' => route('public.auth.login'),
        ]);
    }

    public function searchCnpj(Request $request, Edital $edital): JsonResponse
    {
        return response()->json([
            'customer' => $this->service->searchCnpj($request->cnpj, $edital)
        ]);
    }
}
