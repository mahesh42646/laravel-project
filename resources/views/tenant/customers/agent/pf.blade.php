@php
    $pf = $customer->agent_pf;
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
                    <span class="ml-2 font-weight-medium text-primary">Pessoa Física</span>
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
                        <input type="hidden" name="type_agent_id" value="{{  $customer->type_agent_id->value }}">
                    </div>
                </div>
                
                {{-- CPF, DATA DE NASCIMENTO E NOME COMPLETO --}}
                <div class="d-md-flex">
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">CPF *</label>
                        <input type="text" class="form-control bg-light rounded-lg" placeholder="000.000.000-00" name="cpf" value="{{ $pf->cpf }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Data de nascimento *</label>
                        <input type="date" class="form-control bg-light rounded-lg" name="date_of_birth" value="{{ $pf->date_of_birth->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome Completo *</label>
                        <input type="text" class="form-control bg-light rounded-lg text-uppercase" name="name" value="{{ $pf->name }}" required>
                    </div>
                </div>

                {{-- RG E NOME SOCIAL --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">RG *</label>
                        <input type="text" class="form-control bg-light rounded-lg text-uppercase" name="rg" value="{{ $pf->rg }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome Social</label>
                        <input type="text" class="form-control bg-light rounded-lg" name="nickname" value="{{ $pf->nickname }}">
                    </div>
                </div>

                {{-- GENERO E RACA --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Gênero *</label>
                        <select class="form-control bg-light rounded-lg" name="gender_id" required>
                            <option value="">Selecione</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->value }}"
                                    @selected($gender === $pf->gender_id)
                                >
                                    {{ $gender->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Raça *</label>
                        <select class="form-control bg-light rounded-lg" name="breed_id" required>
                            <option value="">Selecione</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->value }}" 
                                    @selected($breed === $pf->breed_id)
                                >
                                    {{ $breed->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- LGBT E ESCOLARIDADE --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Você é LGBTQIAPN+? *</label>
                        <select class="form-control bg-light rounded-lg" name="is_lgbt" required>
                            <option value="">Selecione</option>
                            <option value="1" @selected($pf->is_lgbt->value === 1)>Sim</option>
                            <option value="0" @selected($pf->is_lgbt->value === 0)>Não</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Escolaridade *</label>
                        <select class="form-control bg-light rounded-lg" name="schooling_id" required>
                            <option value="">Selecione</option>
                            @foreach ($schoolings as $schooling)
                                <option value="{{ $schooling->value }}" 
                                    @selected($schooling === $pf->schooling_id)
                                >
                                    {{ $schooling->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- RENDA INDIVIDUAL E PRINCIPAL AREA DE ATUACAO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Renda Individual *</label>
                        <input type="text" name="income" class="form-control bg-light rounded-lg" 
                            value="{{ number_format($pf->income, 2, ',', '.') }}" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Principal área de atuação *</label>
                        <select class="form-control bg-light rounded-lg" name="area_atuation_id" required>
                            <option value="">Selecione</option>
                            @foreach ($mainAreaAtuations as $areaAtuation)
                                <option value="{{ $areaAtuation->value }}" 
                                    @selected($areaAtuation === $pf->area_atuation_id)
                                >
                                    {{ $areaAtuation->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- OUTRAS AREAS DE ATUACAO E COMUNIDADES TRADICIONAIS --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Outras áreas de atuação</label>
                        <input type="text" class="form-control bg-light rounded-lg" value="{{ $pf->area_atuation_other }}" name="area_atuation_other">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Comunidades tradicionais *</label>
                        <select class="form-control bg-light rounded-lg" name="community_traditional_id" required>
                            <option value="">Selecione</option>
                            @foreach ($communities as $community)
                                <option value="{{ $community->value }}" 
                                    @selected($community === $pf->community_traditional_id)
                                >
                                    {{ $community->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- SER TEM DEFICIENCIA PCD E EM CASO DE PCD QUAL --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Você tem deficiência PCD ?</label>
                        <select class="form-control bg-light rounded-lg" name="is_pcd">
                            <option value="">Selecione</option>
                            <option value="1" @selected($pf->is_pcd->value === 1)>Sim</option>
                            <option value="0" @selected($pf->is_pcd->value === 0)>Não</option> 
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Em caso sem para PCD qual ?</label>
                        <input type="text" class="form-control bg-light rounded-lg" name="deiciency_name" value="{{ $pf->deiciency_name }}">
                    </div>
                </div>

                {{-- SE E BENEFICIARIO DE ALGUM PROGRAMA SOCIAL --}}
                <div class="d-md-flex">
                    <div class="col-md-12 mb-3">
                        <label class="text-dark">Beneficiário de algum programa social ?</label>
                        <select class="form-control bg-light rounded-lg" name="is_beneficiary_program_social">
                            <option value="">Selecione</option>
                            <option value="1" @selected($pf->is_beneficiary_program_social->value === 1)>Sim</option>
                            <option value="0" @selected($pf->is_beneficiary_program_social->value === 0)>Não</option> 
                        </select>
                    </div>
                </div>

                {{-- CIDADE E ENDERECO COMPLETO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Cidade *</label>
                        <select class="w-100 form-control bg-light select2" name="city_id"  data-city>
                            <option value="{{ $pf->city_id }}" selected>
                                {{ $pf->city->name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Endereço completo</label>
                        <input type="text" class="form-control bg-light rounded-lg" name="address" value="{{ $pf->address }}">
                    </div>
                </div>

                {{-- TELEFONE E NOME DO RESPONSAVEL PELO CADASTRO --}}
                <div class="d-md-flex">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Telefone</label>
                        <input type="text" inputmode="numeric" class="form-control bg-light rounded-lg" name="phone" value="{{ $pf->phone }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome do responsável pelo cadastro *</label>
                        <input type="text" class="form-control text-uppercase bg-light rounded-lg" name="responsible_name" value="{{ $pf->responsible_name }}" required>
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="d-md-flex">
                    <div class="col-md-12">
                        <label class="text-dark">E-mail</label>
                        <input type="email" class="form-control bg-light rounded-lg" name="email" value="{{ $customer->email }}" required>
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
    <script src="{{ asset('js/tenant/customer/agent/pf.js') }}"></script>
</x-slot:scripts>
