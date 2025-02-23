<x-layout.painel>

    @php
        $tenant = $edital->tenant->city;
        $city = $tenant->name;
        $state = $tenant->uf_id?->getName();
    @endphp

    {{-- BLCOO DE BOAS VINDAS --}}
    <div class="d-md-flex h-100">
        <div class="col-md-12 px-0 mb-4">
            <div class="h-100 p-md-4 px-2 py-3" style="background-color: #d5f4ea; border-radius: 20px;">
                <div class="d-flex align-items-center">
                    <div class="col-md-9 col-8 h-100 logo">
                        <div class="d-flex jsutify-content-center text-center logo">
                            <span class="logo-lg text-left">
                                <h3 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">{{ $edital->name }}</h3>
                                <h3 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">{{ $city }}-{{ $state }}</h3>
                            </span>
                            <span class="logo-sm text-left">
                                <h5 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">{{ $edital->name }}</h5>
                                <h6 class="font-weight-medium text-uppercase mb-0" style="color: #475a5c;">{{ $city }}-{{ $state }}</h6>
                            </span>
                        </div>
                        <div class="d-md-block d-none">
                            <a href="{{ route('public.panel.home.index', $token)}}" class=" btn text-white px-3" style="background-color: #00a76f">Voltar para o início</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 pr-0">
                        <img src="{{ asset('images/welcome.svg') }}" width="200px" class="img-fluid" alt="bem vindo">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTEUDO --}}
    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        <div class="col-md-3 px-md-0 px-1 mb-3">
            <div class="bg-white px-3 py-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                <div class="rounded-lg p-2 mb-2" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Inscrição do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-secondary">Identificação do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-secondary">Arquivos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg p-2 mb-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-secondary">Complementos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTEUDO EDITAL FOMENTO --}}
        <div class="col-md-9 pl-md-4 px-1 mb-3">
            <form action="{{ route('public.panel.project.register.inscription.store', [$token, $editalCode]) }}" 
                method="POST" class="card border col-12 px-3 py-4"
            >
                <input type="hidden" name="edital_type_id" value="{{ $edital->type_id->value }}">
                @csrf

                @if ($edital->type_id->value === 1)
                
                    {{-- TITULO DO EDITAL --}}
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 mr-2">Formulário de inscrição <strong>EDITAL FOMENTO</strong></h5>
                        <span class="text-secondary" title="Novo edital">
                            <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                            </svg>
                        </span>
                    </div>
                    <hr>

                    {{-- SE VAI CONCORRER AS COTAS E EM QUAIS COTAS VAI CONCORRER --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>Vai concorrer as cotas? *</label>
                            <select class="form-control" name="inscription_has_quota" onchange="checkQuota(this.value)" required>
                                <option value="">Selecione</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Em qual cota vai concorrer? *</label>
                            <select class="form-control" name="inscription_quota_id" required>
                                <option value="">Selecione</option>
                                @foreach ($edital->quotas as $quota)
                                    <option value="{{ $quota->id }}">
                                        {{ $quota->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- PERFIL DO PUBLICO A SER ATINGIDO PELO PROJETO --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Perfil do público a ser atingido pelo projeto *</label>
                            <select class="form-control" name="inscription_profile_id" required>
                                <option value="">Selecione</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->value }}"
                                            @selected(old('inscription_profile_id') === $profile->value)
                                        >
                                            {{ $profile->getName() }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- SE VAI CONCORRER AS COTAS E EM QUAIS COTAS VAI CONCORRER --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label class="font-size-11">Sua ação cultural é voltada prioritariamente para algum destes perfis de público? *</label>
                            <select class="form-control" name="inscription_profile_priority_id" 
                                onchange="changeProfilePriority(this.value)" required
                            >
                                <option value="">Selecione</option>
                                @foreach ($profilePriorities as $priority)
                                    <option value="{{ $priority->value }}">
                                        {{ $priority->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra (Indicar qual)</label>
                            <input type="text" class="form-control" name="inscription_profile_priority_other" 
                                value="{{ old('inscription_profile_priority_other') }}" required
                            >
                        </div>
                    </div>
                    <hr class="mt-0">

                    {{-- SOBRE ACESSIBILIDADE --}}
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="font-weight-bold mb-0 mr-2">SOBRE ACESSIBILIDADE (Opcional)</h5>
                        <span class="text-secondary" title="Acessibilidade">
                            <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                            </svg>
                        </span>
                    </div>
                    
                    {{-- MEDIDAS DE ACESSIBILIDADE EMPREGADAS NO PROJETO E OUTROS --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label class="mb-2">Medidas de acessibilidade empregadas no projeto</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($accessibilities as $accessibility)
                                    <div class="pl-md-{{ $loop->iteration <= 1 ? '0' : '2' }} mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="{{ $accessibility->id }}" 
                                                name="accessibilities[]" id="accessibility-{{ $accessibility->id }}" 
                                                onchange="changeAccessibility(this)"
                                            >
                                            <label class="custom-control-label" for="accessibility-{{ $accessibility->id }}">
                                                {{ $accessibility->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="invisible">Outro</label>
                            <input type="text" class="form-control" name="inscription_accessibility_other" 
                                value="{{ old('inscription_accessibility_other') }}"
                            >
                        </div>
                    </div>

                    {{-- ACESSIBILIDADE ARQUITETONICA E OUTROS --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>Acessibilidade arquitetônica</label>
                            <select class="form-control" name="accessibility_arquitetonics[]" data-accessibility-arquitetonic multiple>
                                <option value="">Selecione</option>
                                @foreach ($accessibilityArquitetonics as $arquitetonic)
                                    <option value="{{ $arquitetonic->id }}">
                                        {{ $arquitetonic->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_arquitetonic_other"
                                value="{{ old('inscription_accessibility_arquitetonic_other') }}"
                            >
                        </div>
                    </div>

                    {{-- ACESSIBILIDADE COMUNICACIONAL --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>Acessibilidade comunicacional</label>
                            <select class="form-control" name="accessibility_communicationals[]" data-accessibility-commnunicational multiple>
                                <option value="">Selecione</option>
                                @foreach ($accessibilityCommunicationals as $communicational)
                                    <option value="{{ $communicational->id }}">
                                        {{ $communicational->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_communicational_other"
                                value="{{ old('inscription_accessibility_communicational_other') }}"
                            >
                        </div>
                    </div>

                    {{-- ACESSIBILIDADE ATITUDINAL --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>Acessibilidade atitudinal</label>
                            <select class="form-control" name="accessibility_atitudinals[]" data-accessibility-atitudinal multiple>
                                <option value="">Selecione</option>
                                @foreach ($accessibilityAtitudinals as $atitudinal)
                                    <option value="{{ $atitudinal->id }}">
                                        {{ $atitudinal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_atitudinal_other"
                                value="{{ old('inscription_accessibility_atitudinal_other') }}"
                            >
                        </div>
                    </div>

                    {{-- INFORMAR COMO ESSAS MEDIDAS DE ACESSIBILDIADE SERAO IMPLEMENTADAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Informe como essas medidas de acessibilidade serão implementadas ou disponibilizadas de acordo com o projeto proposto.</label>
                            <input type="text" class="form-control" name="inscription_accessibility_description"
                                value="{{ old('inscription_accessibility_description') }}"
                            >
                        </div>
                    </div>
                    <hr>

                    {{-- LOCAL ONDE O PROJETO SERA EXECUTADO, DATA DE INICIO E FIM --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>
                                Local onde o projeto será executado *
                                <span class="text-secondary" title="Local">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                        <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                                    </svg>
                                </span>
                            </label>
                            <input type="text" class="form-control" name="inscription_local_execution" required
                                value="{{ old('inscription_local_execution') }}"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Data de início *</label>
                            <input type="date" class="form-control" name="inscription_local_execution_started_at" required
                                value="{{ old('inscription_local_execution_started_at') }}"
                            >
                        </div>
                        <div class="col-md-3 pr-md-0 mb-3">
                            <label>Data final *</label>
                            <input type="date" class="form-control" name="inscription_local_execution_finished_at" required
                                value="{{ old('inscription_local_execution_finished_at') }}"
                            >
                        </div>
                    </div>

                    {{-- ESTRATEGIA DE DIVULGACAO CONTEUDO--}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Estratégia de divulgação</label>
                            <input type="text" class="form-control" name="inscription_strategy_description" 
                                value="{{ old('inscription_strategy_description') }}"
                            >
                        </div>
                    </div>

                    {{-- ESTRATEGIAS DE DIVULGACAO --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0">
                            <label class="mb-2">Estratégias de divulgação</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($strategies as $strategy)
                                    <div class="pl-{{ $loop->iteration === 1 ? '0' : '4' }} mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="{{ $strategy->id }}" 
                                                name="strategies[]" id="agent-{{ $strategy->id }}"
                                            >
                                            <label class="custom-control-label" for="agent-{{ $strategy->id }}">{{ $strategy->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
 
                @else

                    {{-- TITULO DO EDITAL --}}
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 mr-2">Perguntar para <strong>EDITAL PRÊMIO</strong></h5>
                        <span class="text-secondary" title="Novo edital">
                            <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                            </svg>
                        </span>
                    </div>
                    <hr>

                    {{-- SE VAI CONCORRER AS COTAS E EM QUAIS COTAS VAI CONCORRER --}}
                    <div class="d-md-flex">
                        <div class="col-md-6 pl-md-0 mb-3">
                            <label>Vai concorrer as cotas? *</label>
                            <select class="form-control" name="inscription_has_quota" onchange="checkQuota(this.value)" required>
                                <option value="">Selecione</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Em qual cota vai concorrer?</label>
                            <select class="form-control" name="inscription_quota_id" required>
                                <option value="">Selecione</option>
                                @foreach ($edital->quotas as $quota)
                                    <option value="{{ $quota->id }}">
                                        {{ $quota->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="mt-2">

                    {{-- TREJATORIA CULTURAL --}}
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="font-weight-medium mb-0 mr-2">INFORMAÇÕES SOBRE TRAJETÓRIA CULTURAL (Opcional)</h5>
                        <span class="text-secondary" title="Acessibilidade">
                            <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                            </svg>
                        </span>
                    </div>

                    {{-- PRINCIPAIS ACOES REALIZADAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Quais são as suas principais ações e atividades culturais realizadas?</label>
                            <input type="text" class="form-control" name="trajectory_main_actions" 
                                value="{{ old('trajectory_main_actions') }}"
                            >
                        </div>
                    </div>

                    {{-- COMECO DA TRAJETORIA CULTURAL --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Como começou a sua trajetória cultural?</label>
                            <input type="text" class="form-control" name="trajectory_initial" 
                                value="{{ old('trajectory_initial') }}"
                            >
                        </div>
                    </div>

                    {{-- ACOES E PROJETOS DESENVOLVIDOS EM OUTRAS ESFERAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Na sua trajetória cultural, você desenvolveu ações e projetos com outras esferas de conhecimento, tais como educação, saúde, etc?</label>
                            <input type="text" class="form-control" name="trajectory_other_actions" 
                                value="{{ old('trajectory_other_actions') }}"
                            >
                        </div>
                    </div>

                @endif

                {{-- BOTAO DE SALVAR DADOS DE IDENTIFICACAO --}}
                <div class="d-flex justify-content-end align-items-center mt-3 pr-2">
                    <button type="submit" class="btn text-dark px-3 py-1" onclick="showProgressIndicator(this)"
                        style="border: 1px solid #ced4da; background-color: #fdfdfd"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
                        </svg>
                        <span class="ml-1 font-weight-bold">SALVAR RASCUNHO</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($edital->type_id?->value === 1)
        <x-slot:styles>
            <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
        </x-slot:styles>

        <x-slot:scripts>
            <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
            <script src="{{ asset('js/public/panel/project/inscription/create.js') }}"></script>
        </x-slot:scripts>
    @else
        <x-slot:scripts>
            <script src="{{ asset('js/public/panel/project/inscription/create.js') }}"></script>
        </x-slot:scripts>
    @endif

</x-layout.painel>
