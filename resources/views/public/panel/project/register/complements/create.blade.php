<x-layout.painel>

    @php
        $tenant = $edital->tenant->city;
        $city = $tenant->name;
        $state = $tenant->uf_id?->getName();
    @endphp

    {{-- BLOCO DE BOAS VINDAS --}}
    <div class="d-md-flex h-100">
        <div class="col-md-12 pl-md-0 mb-4">
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
                            <h4 class="font-weight-bold mb-3" style="color: #475a5c;">{{ $project->identification_name ?: 'NOVO PROJETO' }}</h4>
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
    <input type="hidden" data-save-url value="{{ route('public.panel.project.register.documents.store', $token) }}">
    <input type="hidden" data-check-url value="{{ route('public.panel.project.register.documents.check.required', $token) }}">
    <input type="hidden" data-token value="{{ csrf_token() }}">

    {{-- CONTEUDO --}}
    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        <div class="col-md-3 px-md-0 px-3 mb-3">
            <div class="bg-white px-3 py-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.register.inscription.edit', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Inscrição do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.register.identification.create', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Identificação do projeto</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.register.documents.create', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Arquivos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-1" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Complementos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- TITULOS --}}
        <div class="col-md-9 pl-md-4 mb-3">
            <form action="{{ route('public.panel.project.register.complements.store', [$token, $projectCode]) }}" method="POST" 
                class="bg-white col-12 p-4" style="border: 1px solid #e0e1e3; border-radius: 20px;"
            >
                @csrf
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 mr-2">Links complementares para seu projeto</h5>
                    <span class="text-secondary" title="Redes sociais">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                        </svg>
                    </span>
                </div>
                <hr>

                {{-- LISTA DE REDES SOCIAIS --}}
                <div data-social-medias-container></div>

                {{-- TIPO DE LINK, LINK, DESCRICAO DO LINK E BOTAO DE ADICIONAR LINK --}}
                <div class="d-md-flex mt-4">
                    <div class="col-md-2 pl-md-0 mb-3">
                        <label>Tipo de Link *</label>
                        <select class="form-control" data-type-link>
                            <option value="">Selecione</option>
                            @foreach ($socialMedias as $socialMedia)
                                <option data-id="{{ $socialMedia->value }}" 
                                    data-name="{{ $socialMedia->getName() }}" data-icon="{{ $socialMedia->getIcon() }}"
                                >
                                    {{ $socialMedia->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 pl-md-1 mb-3">
                        <label>Link *</label>
                        <input type="text" class="form-control text-lowercase" data-link-name>
                    </div>
                    <div class="col-md-4 pl-md-1 mb-3">
                        <label>Descrição do Link *</label>
                        <input type="text" class="form-control" data-link-description>
                    </div>
                    <div class="col-md-2 pl-md-1 pr-md-0 mb-3">
                        <label class="invisible">*</label>
                        <button type="button" class="form-control btn text-dark px-2 py-1" onclick="addSocialMedia()"
                            style="border: 1px solid #ced4da; background-color: #fdfdfd"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256">
                                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
                            </svg>
                            <span class="ml-1">Adicionar</span>
                        </button>
                    </div>
                </div>
            
                {{-- DECLARACAO DE AUTENTICIDADE DAS INFORMACOES --}}
                <div class="p-3 mt-3" style="border: 1px solid #ced4da; border-radius: 15px; background-color: #fdfdfd">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="mb-0 mr-2">Declaração de autenticidade das informações</h5>
                        <span class="text-secondary" title="Declaração e termos de uso">
                            <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="currentColor">
                                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"></path>
                            </svg>
                        </span>
                    </div>

                    <div class="custom-control custom-checkbox mr-4 mb-4">
                        <input type="checkbox" class="custom-control-input" id="term" value="1" required>
                        <label class="custom-control-label text-dark" for="term">
                            Aceito os termos de uso e
                            <button type="button" class="btn btn-link text-dark font-weight-bold p-0" data-toggle="modal" data-target="#termOfUse">
                                política de privacidade: 
                            </button>
                        </label>
                                            
                        <div class="modal fade" id="termOfUse">
                            <div class="modal-dialog">
                                <div class="modal-content border-0">
        
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white">Termos de uso e política de privacidade</h5>
                                        <button type="button" class="bg-transparent border-0" data-dismiss="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#FFF">
                                                <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                            </svg>
                                        </button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <p class="text-dark font-weight-medium">
                                            Ao enviar esta proposta, declaro que sou titular dos dados preenchidos e estou ciente que os mesmo serão utilizados pelo Patrocinador com a finalidade de ser avaliado no presente Edital.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BOTAO DE SALVAR DADOS DO PERFIL DE ACESSO --}}
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center px-4 py-1" onclick="save(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fafafa" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                        <span class="ml-2">ENVIAR PROJETO</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/public/panel/project/complements/create.js') }}"></script>
    </x-slot:scripts>

</x-layout.painel>
