@php
    $pjWithProfit = $customer->agent_pj_with_profit;
@endphp

<input type="hidden" data-url-mask-money value="{{ asset('js/libs/fill/Fill.js') }}">
<input type="hidden" data-url-search-city value="{{ route('customers.search.city') }}">

<div class="d-md-flex">

    {{-- BARRA LATERAL ESQUERDA --}}
    <div class="col-md-3">
        <div class="row">
            <div class="card border col-12 px-3 py-4">
                <div class="text-secondary font-weight-medium mb-2">Tipo de perfil</div>
                <div class="rounded-lg py-2 px-1 mb-2" style="background-color: #f3f2ff">
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#635BFF">
                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                    </svg>
                    <span class="ml-2 font-weight-medium text-primary">PJ com fins lucrativos</span>
                </div>
            </div>
        </div>
    </div>

    {{-- PERFIL DE ACESSO DO AGENTE CULTURAL PESSOA FISICA --}}
    <div class="col-md-9 pl-md-5">
        <div class="row">
            <form action="{{ route('customers.update', $customer) }}" method="POST" class="card border col-12 px-3 py-4">
                @csrf
                @method('PUT')

                <div class="d-flex">
                    <div class="col-md-12 mb-4">
                        <h5 class="text-dark font-weight-bold">Informações da conta</h5>
                        <input type="hidden" name="type_agent_id" value="{{ $customer->type_agent_id->value }}">
                    </div>
                </div>

                {{-- CNPJ DA ORGANIZACAO E NOME DA ORGANIZACAO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">CNPJ da organização *</label>
                        <input type="text" class="form-control bg-light rounded-lg" 
                            placeholder="00.000.000/0000-00" name="cnpj" value="{{ $pjWithProfit->cnpj }}" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome da organização *</label>
                        <input type="text" class="form-control rounded-lg bg-light text-uppercase" 
                            name="organization_name" value="{{ $pjWithProfit->organization_name }}" required
                        >
                    </div>
                </div>

                {{-- RAZAO SOCIAL E DATA DA CRIACAO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Razão social *</label>
                        <input type="text" class="form-control bg-light rounded-lg text-uppercase" 
                            name="company_name" value="{{ $pjWithProfit->company_name }}" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Data da criação *</label>
                        <input type="date" class="form-control bg-light rounded-lg" name="registered_at" 
                            value="{{ $pjWithProfit->registered_at->format('Y-m-d') }}" required
                        >
                    </div>
                </div>

                {{-- NOME DO REPRESENTANTE LEGAL E CPF DO REPRESENTANTE LEGAL --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome do representante legal *</label>
                        <input type="text" class="form-control rounded-lg bg-light text-uppercase" 
                            value="{{ $pjWithProfit->representant_name }}" name="representant_name" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">CPF do representante legal *</label>
                        <input type="text" inputmode="numeric" class="form-control bg-light rounded-lg" 
                            name="representant_cpf" value="{{ $pjWithProfit->representant_cpf }}" required
                        >
                    </div>
                </div>

                {{-- CIDADE E ENDERECO COMPLETO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Cidade *</label>
                        <select class="w-100 form-control bg-light select2" name="city_id"  data-city>
                            <option value="{{ $pjWithProfit->city_id }}" selected>
                                {{ $pjWithProfit->city->name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Endereço completo *</label>
                        <input type="text" class="form-control bg-light rounded-lg" name="address" value="{{ $pjWithProfit->address }}" required>
                    </div>
                </div>

                {{-- TELEFONE E RESPONSAVEL PELO CADASTRO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Telefone *</label>
                        <input type="text" inputmode="numeric" class="form-control bg-light rounded-lg" name="phone"
                            placeholder="(00) 00000-0000" value="{{ $pjWithProfit->phone }}" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Responsável pelo cadastro *</label>
                        <input type="text" class="form-control bg-light text-uppercase rounded-lg" 
                            name="responsible_name" value="{{ $pjWithProfit->responsible_name }}" required
                        >
                    </div>
                </div>
                <div class="container"><hr></div>
               
                {{-- EMAIL --}}
                <div class="d-md-flex">
                    <div class="col-md-12 mb-3">
                        <label class="text-dark">E-mail para login *</label>
                        <input type="email" class="form-control text-lowercase bg-light rounded-lg" 
                            name="email" value="{{ $customer->email }}" required
                        >
                    </div>
                </div>
                
                {{-- BOTAO DE SALVAR DADOS --}}
                @if (! auth()->user()->tenant_id)
                    <div class="d-flex justify-content-end align-items-center mt-3 pr-2">
                        <button type="submit" class="btn btn-primary px-4" onclick="showProgressIndicator(this)">
                            Salvar
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<x-slot:styles>
    <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
</x-slot:styles>

<x-slot:scripts>
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/tenant/customer/agent/mei.js') }}"></script>
</x-slot:scripts>
