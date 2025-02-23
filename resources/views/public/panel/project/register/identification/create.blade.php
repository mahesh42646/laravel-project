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
    <input type="hidden" data-save-url value="{{ route('public.panel.project.register.identification.save', [$token, $projectCode]) }}">
    <input type="hidden" data-containers value="{{ json_encode($containers) }}">
    <input type="hidden" data-register-files-url value="{{ route('public.panel.project.register.documents.create', [$token, $projectCode]) }}">

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
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="rounded-lg p-2 mb-2" style="background-color: #f3f2ff">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ml-2 font-weight-medium text-primary">Identificação do projeto</span>
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

        {{-- TITULO --}}
        <div class="col-md-9 pl-md-4 mb-3">
            
            <div class="bg-white col-12 p-4" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                @include('public.panel.project.register.identification.title.category')
                @include('public.panel.project.register.identification.title.name')
                @include('public.panel.project.register.identification.title.price')
                @include('public.panel.project.register.identification.title.resume')
                @include('public.panel.project.register.identification.title.description')
                @include('public.panel.project.register.identification.title.objective')
                @include('public.panel.project.register.identification.title.justification')
                @include('public.panel.project.register.identification.title.target')
                @include('public.panel.project.register.identification.title.cronogram')
                @include('public.panel.project.register.identification.title.accessibility')
                @include('public.panel.project.register.identification.title.plan')
                @include('public.panel.project.register.identification.title.contrapartid')
                @include('public.panel.project.register.identification.title.local')

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
                @include('public.panel.project.register.identification.content.header')
                @include('public.panel.project.register.identification.content.category')
                @include('public.panel.project.register.identification.content.name')
                @include('public.panel.project.register.identification.content.price')
                @include('public.panel.project.register.identification.content.resume')
                @include('public.panel.project.register.identification.content.description')
                @include('public.panel.project.register.identification.content.objective')
                @include('public.panel.project.register.identification.content.justification')
                @include('public.panel.project.register.identification.content.target')
                @include('public.panel.project.register.identification.content.cronogram')
                @include('public.panel.project.register.identification.content.accessibility')
                @include('public.panel.project.register.identification.content.plan')
                @include('public.panel.project.register.identification.content.contrapartid')
                @include('public.panel.project.register.identification.content.local')
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('js/public/panel/project/identification/create.js') }}"></script>
    </x-slot:scripts>

</x-layout.painel>
