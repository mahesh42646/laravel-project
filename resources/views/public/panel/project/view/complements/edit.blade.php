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
                    <div class="col-md-9 col-8 h-100">
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
                            <a href="{{ route('public.panel.home.index', $token) }}" class="btn text-white px-3" style="background-color: #00a76f">Voltar para o início</a>
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
    <input type="hidden" data-save-url value="{{ route('public.panel.project.view.complements.store', [$token, $projectCode]) }}">
    <input type="hidden" data-token value="{{ csrf_token() }}">

    {{-- CONTEUDO --}}
    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        <div class="col-md-3 px-md-0 px-3 mb-3">
            <div class="bg-white px-3 py-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                <div class="rounded-lg p-2 mb-2">
                    <a href="{{ route('public.panel.project.view.inscription.edit', [$token, $projectCode]) }}" 
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
                    <a href="{{ route('public.panel.project.view.identification.edit', [$token, $projectCode]) }}" 
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
                    <a href="{{ route('public.panel.project.view.documents.edit', [$token, $projectCode]) }}" 
                        class="d-flex justify-content-between align-items-center"
                    >
                        <span class="ml-2 font-weight-medium text-secondary">Arquivos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Complementos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
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

        {{-- TITULOS --}}
        <div class="col-md-9 pl-md-4 mb-3">
            <div class="bg-white col-12 p-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
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
                <div data-social-medias-container>
                    @foreach ($customer->social_medias as $socialMedia)
                        <div>
                            <div class="d-md-flex justify-content-md-between text-dark" data-item="social-media">
                                <div class="d-flex align-items-center text-dark">
                                    <h1 class="font-weight-bold mb-0 mr-4" style="font-family: cursive;" data-item-index>{{ $loop->iteration }}</h1>
                                    <a href="{{ $socialMedia->link }}" class="d-flex align-items-center" target="_blank">
                                        <h5 class="mb-0"><img src="{{ $socialMedia->media_id->getIcon() }}" width="35" height="35">&nbsp;</h5>
                                        <h5 class="mb-0">{{ $socialMedia->description }} &nbsp;</h5>
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <span type="button" style="padding: 3px 2px;" title="Remover rede social"
                                        data-route="{{ route('public.panel.project.view.complements.destroy', [$token, $projectCode, $socialMedia->id]) }}"
                                        data-name="{{ $socialMedia->description }}" data-icon="{{ $socialMedia->media_id->getIcon() }}"
                                        onclick="destroySocialMedia(this.dataset)"
                                        data-target="#deleteSocialMedia" data-toggle="modal"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#999" viewBox="0 0 256 256">
                                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="hidden" name="ids[]" value="{{ $socialMedia->media_id->value }}">
                                <input type="hidden" name="links[]" value="{{ $socialMedia->link }}">
                                <input type="hidden" name="descriptions[]" value="{{ $socialMedia->description }}">
                            </div>
                            <hr class="my-2">
                        </div>
                    @endforeach
                </div>

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
                        <button type="button" class="form-control btn text-dark px-2 py-1" onclick="saveSocialMedia(this)"
                            style="border: 1px solid #ced4da; background-color: #fdfdfd"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256">
                                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
                            </svg>
                            <span class="ml-1">Adicionar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DE DELETAR REDE SOCIAL --}}
    <div class="modal fade" id="deleteSocialMedia">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-form-destroy method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-body p-4">
                        <h5 class="text-center text-dark">Tem certeza que deseja excluir a rede social?</h5>
                        <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;" data-name-destroy></h5>
    
                        <div class="d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg width="130px" height="130px" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                    <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                </svg>
                            </div>
                        </div>
    
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                style="background-color: #ED406A" onclick="loaderDestroy(this)"
                            >
                                Excluir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/public/panel/project/complements/edit.js') }}"></script>
    </x-slot:scripts>

</x-layout.painel>
