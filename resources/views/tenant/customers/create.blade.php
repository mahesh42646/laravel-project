<x-layout.panel>

    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('customers.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Criar conta agente cultural</h3>
    </div>
    
    <form action="{{ route('customers.store') }}" method="POST" class="card p-3">
        @csrf

        {{-- TIPO DE AGENTE --}}
        <div class="d-flex align-items-center text-dark mb-4">
            <h5 class="mr-2 font-weight-medium mb-0">Tipo de agente</h5>
            <span class="text-secondary" title="Selecione apenas uma opção">
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="currentColor">
                    <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
            </span>
        </div>
        <div class="d-md-flex">
            <div class="col-md-3 pl-0 mb-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" value="1" name="agent_type_pf" 
                        id="pf" onchange="changeAgentType(this)" data-agent-type
                    >
                    <label class="custom-control-label" for="pf">Pessoa física</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" value="2" name="agent_type_collective_without_cnpj" 
                        id="collectiveWithoutCnpj" onchange="changeAgentType(this)" data-agent-type
                    >
                    <label class="custom-control-label" for="collectiveWithoutCnpj">Coletivo sem CNPJ</label>
                </div>
            </div>
            <div class="col-md-4 pl-0 mb-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" value="3" name="agent_type_pj_with_profit" 
                        id="pjWithProfit" onchange="changeAgentType(this)" data-agent-type
                    >
                    <label class="custom-control-label" for="pjWithProfit">Pessoa jurídica com fins lucrativos</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" value="4" name="agent_type_mei" 
                        id="mei" onchange="changeAgentType(this)" data-agent-type
                    >
                    <label class="custom-control-label" for="mei">MEI</label>
                </div>
            </div>
            <div class="col-md-5 pl-0 mb-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" value="5" name="agent_type_pj_without_profit" 
                        id="pjWithoutProfit" onchange="changeAgentType(this)" data-agent-type
                    >
                    <label class="custom-control-label" for="pjWithoutProfit">Pessoa jurídica sem fins lucrativos</label>
                </div>
            </div>
        </div>
        <hr>

        <input type="hidden" data-url-mask-money value="{{ asset('js/libs/fill/Fill.js') }}">
        <input type="hidden" data-url-search-city value="{{ route('customers.search.city') }}">
        <input type="hidden" data-genders value="{{ json_encode($genders) }}">
        <input type="hidden" data-breeds value="{{ json_encode($breeds) }}">
        <input type="hidden" data-schoolings value="{{ json_encode($schoolings) }}">
        <input type="hidden" data-main-area-atuations value="{{ json_encode($mainAreaAtuations) }}">
        <input type="hidden" data-communities value="{{ json_encode($communities) }}">
        <div data-form></div>

        {{-- BOTAO DE SALVAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3 pl-2 pr-md-2">
            <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-4 py-2" onclick="loader(this)">
                Criar agente cultural
            </button>
        </div>
    </form>

    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
    </x-slot:styles>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('js/tenant/customer/script.js') }}"></script>
    </x-slot:scripts>

</x-layout.panel>
