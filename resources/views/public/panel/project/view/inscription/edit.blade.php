<x-layout.painel>

    @php
        $tenant = $edital->tenant->city;
        $city = $tenant->name;
        $state = $tenant->uf_id?->getName();
    @endphp

    {{-- BLCOO DE BOAS VINDAS --}}
    <div class="d-md-flex h-100">
        <div class="col-md-12 pl-md-0 mb-4">
            <div class="h-100 p-4" style="background-color: #d5f4ea; border-radius: 20px;">
                <div class="d-flex">
                    <div class="col-md-9 col-8 h-100">
                        <h3 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">{{ $edital->name }}</h3>
                        <h3 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">{{ $city }}-{{ $state }}</h3>
                        <div class="d-md-block d-none">
                            <h4 class="font-weight-bold mb-3" style="color: #475a5c;">{{ $project->identification_name }}</h4>
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

    {{-- ALERTA DE SUCESSO --}}
    <x-alert.success :message="session('success')" />

    {{-- CONTEUDO --}}
    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        <div class="col-md-3 px-md-0 px-3 mb-3">
            <div class="bg-white px-3 py-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                <div class="rounded-lg p-2 mb-2" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Inscrição do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.view.identification.edit', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Identificação do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.view.documents.edit', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Arquivos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.view.complements.edit', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Complementos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <button type="button" class="btn rounded-lg" data-target="#removeProject" data-toggle="modal"
                        style="border: 1px solid #c5c5c5; background-color: #f1f1f4; padding: 2px 6px 2px 4px;"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#808080" viewBox="0 0 256 256">
                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                        </svg>
                        <span class="ml-1">Excluir Projeto</span>
                    </button>
                </div>

                {{-- MODAL DE EXCLUIR PROJETO --}}
                <div class="modal fade" id="removeProject">
                    <div class="modal-dialog modal-md">
                        <form action="{{ route('public.panel.project.view.destroy', [$token, $projectCode]) }}" method="POST" class="modal-content border-0 p-md-3 p-2">
                            @csrf
                            @method('DELETE')

                            <div class="text-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#f04438" viewBox="0 0 256 256" 
                                   class="p-2" style="border-radius: 50%; background-color: #fcdad7;"
                                >
                                    <path d="M215.46,216H40.54C27.92,216,20,202.79,26.13,192.09L113.59,40.22c6.3-11,22.52-11,28.82,0l87.46,151.87C236,202.79,228.08,216,215.46,216Z" opacity="0.2"></path>
                                    <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                                </svg>
                            </div>
                            <h3 class="text-center text-dark mb-3">Excluir proposta</h3>
                            <h6 class="text-center font-normal mb-1">Tem certeza que deseja excluir esse projeto permanentemente ?</h6>
                            <h6 class="text-center font-normal mb-3">Essa ação não poderá ser revertida após a confirmação.</h6>

                            <div class="d-flex justify-content-center mt-4 mb-3">
                                <button type="button" class="btn text-primary px-4" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary font-weight-normal px-4" onclick="showLoader(this)">Confirmar exclusão</button>
                            </div>
                        </form>

                        <script>
                            function showLoader(button, duration = 7000) {
                                const buttonState = (isLoading, text) => {
                                    button.disabled = isLoading;
                                    button.innerHTML = text;
                                }

                                setTimeout(() => buttonState(true, '<spinner></spinner> Aguarde...'), 10);
                                setTimeout(() => buttonState(false, 'Confirmar exclusão'), duration)
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTEUDO EDITAL --}}
        <div class="col-md-9 pl-md-4 mb-3">
            
            <form action="{{ route('public.panel.project.view.inscription.update', [$token, $projectCode]) }}" 
                method="POST" class="card border col-12 px-3 py-4"
            >
                @csrf
                @method('PUT')
                <input type="hidden" name="edital_type_id" value="{{ $edital->type_id->value }}">

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
                                <option value="1" @selected($project->inscription_has_quota?->value === 1)>Sim</option>
                                <option value="0" @selected($project->inscription_has_quota?->value === 0)>Não</option>
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Em qual cota vai concorrer? *</label>
                            <select class="form-control" name="inscription_quota_id" required
                                @disabled($project->inscription_has_quota?->value === 0)
                            >
                                <option value="">Selecione</option>
                                @foreach ($edital->quotas as $quota)
                                    <option value="{{ $quota->id }}"
                                        @selected($project->inscription_quota_id === $quota->id)
                                    >
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
                                            @selected($project->inscription_profile_id?->value === $profile->value)
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
                                    <option value="{{ $priority->value }}"
                                        @selected($project->inscription_profile_priority_id?->value === $priority->value)
                                    >
                                        {{ $priority->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra (Indicar qual)</label>
                            <input type="text" class="form-control" name="inscription_profile_priority_other" 
                                value="{{ $project->inscription_profile_priority_other }}" required
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
                                                @checked($project->inscription_accessibilities->contains($accessibility->id))
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
                                value="{{ $project->inscription_accessibility_other }}"
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
                                    <option value="{{ $arquitetonic->id }}"
                                        @selected($project->inscription_accessibility_arquitetonics->contains($arquitetonic->id))
                                    >
                                        {{ $arquitetonic->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_arquitetonic_other"
                                value="{{ $project->inscription_accessibility_arquitetonic_other }}"
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
                                    <option value="{{ $communicational->id }}"
                                        @selected($project->inscription_accessibility_communicationals->contains($communicational->id))
                                    >
                                        {{ $communicational->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_communicational_other"
                                value="{{ $project->inscription_accessibility_communicational_other }}"
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
                                    <option value="{{ $atitudinal->id }}"
                                        @selected($project->inscription_accessibility_atitudinals->contains($atitudinal->id))
                                    >
                                        {{ $atitudinal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Outra</label>
                            <input type="text" class="form-control" name="inscription_accessibility_atitudinal_other"
                                value="{{ $project->inscription_accessibility_atitudinal_other }}"
                            >
                        </div>
                    </div>

                    {{-- INFORMAR COMO ESSAS MEDIDAS DE ACESSIBILDIADE SERAO IMPLEMENTADAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Informe como essas medidas de acessibilidade serão implementadas ou disponibilizadas de acordo com o projeto proposto.</label>
                            <input type="text" class="form-control" name="inscription_accessibility_description"
                                value="{{ $project->inscription_accessibility_description }}"
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
                                value="{{ $project->inscription_local_execution }}"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Data de início *</label>
                            <input type="date" class="form-control" name="inscription_local_execution_started_at" required
                                value="{{ $project->inscription_local_execution_started_at?->format('Y-m-d') }}"
                            >
                        </div>
                        <div class="col-md-3 pr-md-0 mb-3">
                            <label>Data final *</label>
                            <input type="date" class="form-control" name="inscription_local_execution_finished_at" required
                                value="{{ $project->inscription_local_execution_finished_at?->format('Y-m-d') }}"
                            >
                        </div>
                    </div>

                    {{-- ESTRATEGIA DE DIVULGACAO CONTEUDO--}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Estratégia de divulgação</label>
                            <input type="text" class="form-control" name="inscription_strategy_description" 
                                value="{{ $project->inscription_strategy_description }}"
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
                                                @checked($project->inscription_strategies->contains($strategy->id))
                                            >
                                            <label class="custom-control-label" for="agent-{{ $strategy->id }}">{{ $strategy->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @else

                    {{-- TITULO DO EDITAL  --}}
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
                                <option value="1" @selected($project->inscription_has_quota?->value === 1)>Sim</option>
                                <option value="0" @selected($project->inscription_has_quota?->value === 0)>Não</option>
                            </select>
                        </div>
                        <div class="col-md-6 pr-md-0 mb-3">
                            <label>Em qual cota vai concorrer?</label>
                            <select class="form-control" name="inscription_quota_id" required
                                @disabled($project->inscription_has_quota?->value === 0)
                            >
                                <option value="">Selecione</option>
                                @foreach ($edital->quotas as $quota)
                                    <option value="{{ $quota->id }}"
                                        @selected($project->inscription_quota_id === $quota->id)
                                    >
                                        {{ $quota->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- PRINCIPAIS ACOES REALIZADAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Quais são as suas principais ações e atividades culturais realizadas?</label>
                            <input type="text" class="form-control" name="trajectory_main_actions" 
                                value="{{ $project->trajectory_main_actions }}"
                            >
                        </div>
                    </div>

                    {{-- COMECO DA TRAJETORIA CULTURAL --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Como começou a sua trajetória cultural?</label>
                            <input type="text" class="form-control" name="trajectory_initial" 
                                value="{{ $project->trajectory_initial }}"
                            >
                        </div>
                    </div>

                    {{-- ACOES E PROJETOS DESENVOLVIDOS EM OUTRAS ESFERAS --}}
                    <div class="d-md-flex">
                        <div class="col-md-12 px-md-0 mb-3">
                            <label>Na sua trajetória cultural, você desenvolveu ações e projetos com outras esferas de conhecimento, tais como educação, saúde, etc?</label>
                            <input type="text" class="form-control" name="trajectory_other_actions" 
                                value="{{ $project->trajectory_other_actions }}"
                            >
                        </div>
                    </div>

                @endif

                {{-- BOTAO DE SALVAR DADOS DO PERFIL DE ACESSO --}}
                <div class="d-flex justify-content-end align-items-center mt-3 pr-2">
                    <button type="submit" class="btn d-flex align-items-center text-dark px-4 py-1" onclick="showProgressIndicator(this)"
                        style="border: 1px solid #ced4da; background-color: #fdfdfd"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M216,83.31V208a8,8,0,0,1-8,8H176V152a8,8,0,0,0-8-8H88a8,8,0,0,0-8,8v64H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8H172.69a8,8,0,0,1,5.65,2.34l35.32,35.32A8,8,0,0,1,216,83.31Z" opacity="0.2"></path>
                            <path d="M219.31,72,184,36.69A15.86,15.86,0,0,0,172.69,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V83.31A15.86,15.86,0,0,0,219.31,72ZM168,208H88V152h80Zm40,0H184V152a16,16,0,0,0-16-16H88a16,16,0,0,0-16,16v56H48V48H172.69L208,83.31ZM160,72a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h56A8,8,0,0,1,160,72Z"></path>
                        </svg>
                        <span class="ml-2 font-weight-bold">SALVAR</span>
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
