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
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00a66d" viewBox="0 0 256 256">
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
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 mr-2">Links complementares para seu projeto</h5>
                </div>
                <hr>

                {{-- LISTA DE REDES SOCIAIS --}}
                @forelse ($customer->social_medias as $socialMedia)
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center text-dark">
                            <h1 class="font-weight-bold mb-0 mr-4">{{ $loop->iteration }}</h1>
                            <h5 class="mb-0"><img src="{{ $socialMedia->media_id->getIcon() }}" width="35" height="35">&nbsp;</h5>
                            <h5 class="mb-0">{{ $socialMedia->description }} &nbsp;</h5>
                        </div>
                    </div>
                    <hr class="my-2">
                @empty
                    <div class="d-flex flex-column align-items-center justify-content-center border bg-light p-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#999999" viewBox="0 0 256 256">
                                <path d="M216,128a88,88,0,1,1-88-88A88,88,0,0,1,216,128Z" opacity="0.2"></path>
                                <path d="M198.24,62.63l15.68-17.25a8,8,0,0,0-11.84-10.76L186.4,51.86A95.95,95.95,0,0,0,57.76,193.37L42.08,210.62a8,8,0,1,0,11.84,10.76L69.6,204.14A95.95,95.95,0,0,0,198.24,62.63ZM48,128A80,80,0,0,1,175.6,63.75l-107,117.73A79.63,79.63,0,0,1,48,128Zm80,80a79.55,79.55,0,0,1-47.6-15.75l107-117.73A79.95,79.95,0,0,1,128,208Z"></path>
                            </svg>
                        </div>
                        <h5 class="text-secondary">Nenhuma rede social foi cadastrada.</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-md">
            <div class="d-flex flex-column justify-content-center align-items-center modal-content border-0 p-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#00a76f" viewBox="0 0 256 256" class="p-3 mb-3"
                    style="border-radius: 50%; background-color: #d5f4ea;"
                >
                    <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path>
                </svg>
                <div class="font-size-17 text-dark text-center"><strong>Parabéns,</strong> inscrição realizada com sucesso!</div>
                <div class="mb-2">NÚMERO DE COMPROVANTE DE INSCRIÇÃO</div>
                <h3 class="font-weight-bold text-dark mb-3">{{ $project->id }}</h3>
                <a href="{{ route('public.panel.project.register.comprovant.print', [$token, $projectCode]) }}" target="_blank" class="btn btn-secondary px-4 mb-3">Ver proposta inscrita</a>
                <a href="{{ route('public.panel.project.register.comprovant.download', [$token, $projectCode]) }}" target="_blank" class="btn btn-primary px-2">DOWNLOAD DA PROPOSTA</a>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>$('#myModal').modal('show')</script>
    </x-slot:scripts>

</x-layout.painel>
