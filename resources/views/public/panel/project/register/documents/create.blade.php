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
    <input type="hidden" data-save-url value="{{ route('public.panel.project.register.documents.store', $token) }}">
    <input type="hidden" data-check-url value="{{ route('public.panel.project.register.documents.check.required', $token) }}">
    <input type="hidden" data-complement-url value="{{ route('public.panel.project.register.complements.create', [$token, $projectCode]) }}">
    <input type="hidden" data-token value="{{ csrf_token() }}">
    <input type="hidden" data-project-code value="{{ base64_decode($projectCode) }}">

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
                <div class="rounded-lg p-2 mb-2" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Arquivos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg p-2 mb-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-secondary">Complementos</span>
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
            
            <div class="bg-white col-12 p-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                @foreach ($files as $file)
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="d-flex align-items-center text-dark">
                            <h1 class="font-weight-bold mb-0 mr-4">{{ $loop->iteration }}</h1>
                            <h5 class="mb-0">
                                {{ $file->document->name }} &nbsp;
                                <h6 class="mb-0">@if ($file->is_required->value) <span class="text-danger">(obrigatório)</span> @else <span>(opcional)</span> @endif</h6>
                            </h5>
                        </div>
                        <div class="d-flex" data-status="{{ $file->id }}">
                            <span class="d-flex align-items-center mr-2" 
                                style="border: 1px solid #ccc; border-radius: 10px; padding: 3px {{ $file->status->value === 0 ? '4' : '9' }}px;"
                            >
                                {!! $file->status->getIcon() !!}
                                <span class="text-dark ml-1">{{ $file->status->getName() }}</span>
                            </span>
                            <span type="button" class="d-flex align-items-center" data-toggle="modal" data-target="#openModal"
                                style="border: 1px solid #ccc; border-radius: 10px; padding: 3px {{ $file->status->value === 0 ? '21' : '20' }}px;"
                                onclick="toggleContainer('{{ $file->id }}')"
                            >
                                {!! $file->status->getIconAction() !!}
                                <span class="text-dark ml-2">{{ $file->status->getNameAction() }}</span>
                            </span>
                        </div>
                    </div>
                    <hr class="my-2">
                @endforeach

                {{-- BOTAO DE SALVAR DADOS DO PERFIL DE ACESSO --}}
                <div class="d-flex justify-content-end align-items-center mt-5">
                    <button type="button" class="btn text-dark px-3 py-1" onclick="nextPage(this)"
                        style="border: 1px solid #ced4da; background-color: #fdfdfd"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#ff9d0a" viewBox="0 0 256 256">
                            <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
                        </svg>
                        <span class="ml-1 font-weight-bold">CONTINUAR</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    {{-- MODAL DE SELECIONAR OS CAMPOS DE IDENTIFICACAO DO PROJETO --}}
    <div class="modal fade" id="openModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color: #fdfdfd">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center p-3 mt-3">
                    <div class="d-flex align-items-center">
                        <svg width="60" height="60" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_5736_13868)">
                                <rect x="14" y="11" width="60" height="60" rx="30" fill="white"/>
                                <path d="M36.3438 37.7188C36.3438 37.4287 36.459 37.1505 36.6641 36.9454C36.8692 36.7402 37.1474 36.625 37.4375 36.625H50.5625C50.8526 36.625 51.1308 36.7402 51.3359 36.9454C51.541 37.1505 51.6562 37.4287 51.6562 37.7188C51.6562 38.0088 51.541 38.287 51.3359 38.4921C51.1308 38.6973 50.8526 38.8125 50.5625 38.8125H37.4375C37.1474 38.8125 36.8692 38.6973 36.6641 38.4921C36.459 38.287 36.3438 38.0088 36.3438 37.7188ZM37.4375 43.1875H50.5625C50.8526 43.1875 51.1308 43.0723 51.3359 42.8671C51.541 42.662 51.6562 42.3838 51.6562 42.0938C51.6562 41.8037 51.541 41.5255 51.3359 41.3204C51.1308 41.1152 50.8526 41 50.5625 41H37.4375C37.1474 41 36.8692 41.1152 36.6641 41.3204C36.459 41.5255 36.3438 41.8037 36.3438 42.0938C36.3438 42.3838 36.459 42.662 36.6641 42.8671C36.8692 43.0723 37.1474 43.1875 37.4375 43.1875ZM58.2188 31.1562V51.9375C58.2187 52.1239 58.1709 52.3072 58.08 52.47C57.9892 52.6328 57.8582 52.7696 57.6996 52.8676C57.541 52.9655 57.36 53.0213 57.1738 53.0296C56.9875 53.0379 56.8023 52.9985 56.6355 52.915L52.75 50.9723L48.8645 52.915C48.7125 52.9911 48.5449 53.0307 48.375 53.0307C48.2051 53.0307 48.0375 52.9911 47.8855 52.915L44 50.9723L40.1145 52.915C39.9625 52.9911 39.7949 53.0307 39.625 53.0307C39.4551 53.0307 39.2875 52.9911 39.1355 52.915L35.25 50.9723L31.3645 52.915C31.1977 52.9985 31.0125 53.0379 30.8262 53.0296C30.64 53.0213 30.459 52.9655 30.3004 52.8676C30.1418 52.7696 30.0108 52.6328 29.92 52.47C29.8291 52.3072 29.7813 52.1239 29.7812 51.9375V31.1562C29.7812 30.5761 30.0117 30.0197 30.422 29.6095C30.8322 29.1992 31.3886 28.9688 31.9688 28.9688H56.0312C56.6114 28.9688 57.1678 29.1992 57.578 29.6095C57.9883 30.0197 58.2188 30.5761 58.2188 31.1562ZM56.0312 31.1562H31.9688V50.1684L34.7605 48.7711C34.9125 48.6951 35.0801 48.6555 35.25 48.6555C35.4199 48.6555 35.5875 48.6951 35.7395 48.7711L39.625 50.7152L43.5105 48.7711C43.6625 48.6951 43.8301 48.6555 44 48.6555C44.1699 48.6555 44.3375 48.6951 44.4895 48.7711L48.375 50.7152L52.2605 48.7711C52.4125 48.6951 52.5801 48.6555 52.75 48.6555C52.9199 48.6555 53.0875 48.6951 53.2395 48.7711L56.0312 50.1684V31.1562Z" fill="#212636"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_5736_13868" x="0" y="0" width="88" height="88" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="3"/>
                                <feGaussianBlur stdDeviation="7"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_5736_13868"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_5736_13868" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                        <h5 class="font-weight-bold mb-0 mr-md-5 mr-4">
                            <span data-title></span>
                            <span class="font-size-13" data-title-required-name></span> 
                        </h5>
                        <div class="d-flex">
                            <span type="button" class="mr-3" title="Voltar para o campo anterior"
                                data-previous-container="" data-previous-title="" data-previous-required=""
                                onclick="showPreviousContainer(this.dataset)" data-button-previous-container
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M216,88v80a8,8,0,0,1-8,8H120v48L24,128l96-96V80h88A8,8,0,0,1,216,88Z" opacity="0.2"></path>
                                    <path d="M208,72H128V32a8,8,0,0,0-13.66-5.66l-96,96a8,8,0,0,0,0,11.32l96,96A8,8,0,0,0,128,224V184h80a16,16,0,0,0,16-16V88A16,16,0,0,0,208,72Zm0,96H120a8,8,0,0,0-8,8v28.69L35.31,128,112,51.31V80a8,8,0,0,0,8,8h88Z"></path>
                                </svg>
                            </span>
                            <span type="button" title="Ir para o próximo campo"
                                data-next-container="" data-next-title="" data-next-required=""
                                onclick="showNextContainer(this.dataset)" data-button-next-container
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M136,224V176H48a8,8,0,0,1-8-8V88a8,8,0,0,1,8-8h88V32l96,96Z" opacity="0.2"></path>
                                    <path d="M237.66,122.34l-96-96A8,8,0,0,0,128,32V72H48A16,16,0,0,0,32,88v80a16,16,0,0,0,16,16h80v40a8,8,0,0,0,13.66,5.66l96-96A8,8,0,0,0,237.66,122.34ZM144,204.69V176a8,8,0,0,0-8-8H48V88h88a8,8,0,0,0,8-8V51.31L220.69,128Z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <span type="button" class="d-flex align-items-center ml-3 px-md-3 px-2 py-1" 
                        style="background-color: #b3b9c6; border-radius: 10px;" data-dismiss="modal"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#000000" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                        </svg>
                        <span class="ml-1 d-md-block d-none" style="color: #000">FECHAR</span>
                    </span>
                </div>
                
                @foreach ($files as $file)
                    <div data-container="{{ $file->id }}">
                        <div class="d-md-flex p-3">
                            <div class="col-md-8">
                                <div class="d-flex flex-column bg-white mb-3" style="border-radius: 15px; border: 1px solid #d9d7d7;">
                                    
                                    <div data-container-iframe="{{ $file->id }}" class="p-3">
                                        @if ($file->path)
                                            @php
                                                $diskLocal = Storage::disk('local');
                                                $fullFilePath = $diskLocal->path($file->path);
                                                $base64FilePath = base64_encode($diskLocal->get($file->path));
                                                $path = 'data:'.mime_content_type($fullFilePath).";base64,{$base64FilePath}";
                                            @endphp
                                            <iframe src="{{ $path }}" width="100%" height="600px" frameborder="0"></iframe>
                                        @else
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="#635bff" viewBox="0 0 256 256">
                                                    <path d="M208,72V184a8,8,0,0,1-8,8H176V104L136,64H80V40a8,8,0,0,1,8-8h80Z" opacity="0.2"></path>
                                                    <path d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z"></path>
                                                </svg>
                                                <span class="font-weight-medium font-size-18 mt-2">Nenhum arquivo foi selecionado</span>
                                            </div>
                                        @endif
                                    </div>

                                    <input type="hidden" value="{{ json_encode($files->map(fn ($file) => [
                                            'id' => $file->id, 
                                            'is_required' => $file->is_required->value, 
                                            'title' => $file->document->name
                                        ])->toArray()) }}" data-containers
                                    >
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="d-flex flex-column bg-white p-3 mb-3" style="border-radius: 15px; border: 1px solid #d9d7d7;">
                                    <div data-alert="{{ $file->id }}"></div>
                                    <span class="text-danger font-weight-medium mb-3">Selecione um arquivo depois clique em enviar.</span>
                                    <span type="button" class="d-flex align-items-center justify-content-center text-dark p-2"
                                        style="background-color: #dcdfe4; border-radius: 15px" onclick="selectFile('{{ $file->id }}')"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><g data-name="cloud-upload">
                                            <path d="M21.9 12c0-.11-.06-.22-.09-.33a4.17 4.17 0 0 0-.18-.57c-.05-.12-.12-.24-.18-.37s-.15-.3-.24-.44S21 10.08 21 10s-.2-.25-.31-.37-.21-.2-.32-.3L20 9l-.36-.24a3.68 3.68 0 0 0-.44-.23l-.39-.18a4.13 4.13 0 0 0-.5-.15 3 3 0 0 0-.41-.09L17.67 8A6 6 0 0 0 6.33 8l-.18.05a3 3 0 0 0-.41.09 4.13 4.13 0 0 0-.5.15l-.39.18a3.68 3.68 0 0 0-.44.23l-.36.3-.37.31c-.11.1-.22.19-.32.3s-.21.25-.31.37-.18.23-.26.36-.16.29-.24.44-.13.25-.18.37a4.17 4.17 0 0 0-.18.57c0 .11-.07.22-.09.33A5.23 5.23 0 0 0 2 13a5.5 5.5 0 0 0 .09.91c0 .1.05.19.07.29a5.58 5.58 0 0 0 .18.58l.12.29a5 5 0 0 0 .3.56l.14.22a.56.56 0 0 0 .05.08L3 16a5 5 0 0 0 4 2h3v-1.37a2 2 0 0 1-1 .27 2.05 2.05 0 0 1-1.44-.61 2 2 0 0 1 .05-2.83l3-2.9A2 2 0 0 1 12 10a2 2 0 0 1 1.41.59l3 3a2 2 0 0 1 0 2.82A2 2 0 0 1 15 17a1.92 1.92 0 0 1-1-.27V18h3a5 5 0 0 0 4-2l.05-.05a.56.56 0 0 0 .05-.08l.14-.22a5 5 0 0 0 .3-.56l.12-.29a5.58 5.58 0 0 0 .18-.58c0-.1.05-.19.07-.29A5.5 5.5 0 0 0 22 13a5.23 5.23 0 0 0-.1-1z"/>
                                            <path d="M12.71 11.29a1 1 0 0 0-1.4 0l-3 2.9a1 1 0 1 0 1.38 1.44L11 14.36V20a1 1 0 0 0 2 0v-5.59l1.29 1.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/></g>
                                        </svg>
                                        <span class="ml-2 font-weight-medium">Selecionar arquivo (PDF)</span>
                                    </span>
                                    <input type="file" class="d-none" data-file="{{ $file->id }}" accept=".pdf" onchange="showFile(this, '{{ $file->id }}')">
                                    <div class="d-none text-dark font-weight-medium mt-2" data-filename-selected-label="{{ $file->id }}"></div>
                                    <button type="button" class="btn btn-primary mt-3" style="padding: 10px;"
                                        onclick="saveFile(this, '{{ $file->id }}')"
                                    >
                                        ENVIAR ARQUIVO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/public/panel/project/documents/create.js') }}?version=260120251116"></script>
    </x-slot:scripts>

</x-layout.painel>
