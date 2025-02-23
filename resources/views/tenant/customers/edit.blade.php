<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.warnings :$errors />
    <x-alert.success :message="session('success')" />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('customers.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Agente cultural</h3>
    </div>

    @if ($customer->type_agent_id->value === 1)
        @include('tenant.customers.agent.pf')
    @elseif ($customer->type_agent_id->value === 5)
        @include('tenant.customers.agent.mei')
    @elseif ($customer->type_agent_id->value === 3)
        @include('tenant.customers.agent.pj-with-profit')
    @elseif ($customer->type_agent_id->value === 4)
        @include('tenant.customers.agent.pj-without-profit')
    @else
        Nenhum dado foi encontrado
    @endif

</x-layout.panel>
