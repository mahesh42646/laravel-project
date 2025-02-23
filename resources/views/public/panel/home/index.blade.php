<x-layout.painel>

    {{-- ALERTA DE SUCESSO --}}
    <x-alert.success :message="session('success')" />
    <input type="hidden" data-get-editals-url value="{{ route('public.panel.home.editals.index', $token) }}">
    @php $idsFromEditalsMyprojects = []; @endphp

    {{-- BLOCO DE BOAS VINDAS --}}
    <div class="d-md-flex h-100">
        <div class="col-md-12 px-0 mb-3">
            <div class="h-100 p-md-4 px-2 py-3" style="background-color: #d5f4ea; border-radius: 20px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h-100">
                        <div class="d-flex jsutify-content-center text-center logo">
                            <span class="logo-lg text-left">
                                <h3 class="font-weight-bold mb-0" style="color: #003e44;">Bem vindo de volta 👋</h3>
                            </span>
                            <span class="logo-sm text-left">
                                <h5 class="font-weight-bold text-uppercase mb-0" style="color: #003e44;">Bem vindo de volta 👋</h5>
                            </span>
                        </div>
                    </div>
                    <div class="pr-0">
                        <img src="{{ asset('images/welcome.svg') }}" width="150px" class="img-fluid" alt="bem vindo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo">
        <span class="logo-lg">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="mx-4" style="position: absolute; margin-top: -75px; border-radius: 50%;">
                        <div class="d-flex align-items-center">
                            <img src="{{ $customer->avatar }}" width="130px" height="130px" style="border: 8px solid #f8f8fb" 
                                class="img-fluid rounded-circle" width="100%" alt="avatar"
                            >
                            <div class="ml-3 mt-5">
                                <h4 class="font-weight-bold text-dark mb-1">{{ $customer->name }}</h4>
                                <h5 class="font-weight-bold text-secondary">{{ $customer->city }}/{{ $customer->state }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: -20px;">
                    <a href="{{ route('public.panel.profile.edit', $token) }}" class="btn btn-dark px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                            <path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path>
                        </svg>
                        <span class="ml-1">Editar perfil</span>
                    </a>
                </div>
            </div>
        </span>
        <span class="logo-sm">
            <div class="mx-3" style="position: absolute; margin-top: -100px; border-radius: 50%;">
                <div class="d-flex align-items-center">
                    <img src="{{ $customer->avatar }}" width="100px" height="100px" style="border: 8px solid #f8f8fb" 
                        class="img-fluid rounded-circle" width="100%" alt="avatar"
                    >
                    <div class="ml-2 mt-5">
                        <h4 class="font-weight-bold text-dark my-1">{{ $customer->name }}</h4>
                        <h5 class="font-weight-bold text-secondary">{{ $customer->city }}/{{ $customer->state }}</h5>
                    </div>
                </div>
            </div>
        </span>
    </div>
    
    {{-- MEUS PROJETOS --}}
    <div class="card border col-12 p-md-4 p-1 mt-md-4 mt-3">
        <div class="text-secondary font-weight-medium font-size-15 bg-light p-3" 
            style="border-top-left-radius: 20px; border-top-right-radius: 20px;"
        >
            Meus projetos
        </div>
        @if ($projects->isNotEmpty())
            @foreach ($projects as $project)
                <div class="px-md-4 pt-md-4 px-3 pt-3" style="border-top: 1px solid #e0e1e3; border-left: 1px solid #e0e1e3; border-right: 1px solid #e0e1e3;">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="d-flex align-items-center mr-3 mb-3">
                            <div class="d-md-block d-none"><img src="{{ asset('images/project_banner.webp') }}" class="img-fluid mr-3" width="100px" alt="banner" style="border-radius: 14px"></div>
                            <div class="ml-md-3">
                                <h3 class="font-weight-bold text-dark mb-0">{{ $project->name }}</h3>
                                <h6 class="font-weight-normal text-dark mb-0">{{ $project->edital->name }}</h6>
                                @php
                                    $idsFromEditalsMyprojects[] = $project->edital->id;
                                @endphp
                                @if (! $project->is_subscribe_pending)
                                    <div class="text-dark mb-0">Proposta enviada em, {{ $project->sended_at }}</div>
                                    <div class="text-dark mb-0"><span class="font-weight-medium">Protocolo:</span> {{ $project->id }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                @if (! $project->is_subscribe_pending)
                                    <span class="rounded-circle p-2 mb-1" style="background-color: #ffe9e1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ff5200" viewBox="0 0 256 256">
                                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                                            <path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path>
                                        </svg>
                                    </span>
                                    <span class="text-dark text-center">Aguardando análise</span>
                                @else
                                    <span class="rounded-circle p-2 mb-1" style="background-color: #ffe9e1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffb038" viewBox="0 0 256 256">
                                            <path d="M180.92,88,128,128,74.67,88Z" opacity="0.2"></path>
                                            <path d="M200,75.64V40a16,16,0,0,0-16-16H72A16,16,0,0,0,56,40V76a16.07,16.07,0,0,0,6.4,12.8L114.67,128,62.4,167.2A16.07,16.07,0,0,0,56,180v36a16,16,0,0,0,16,16H184a16,16,0,0,0,16-16V180.36a16.09,16.09,0,0,0-6.35-12.77L141.27,128l52.38-39.59A16.09,16.09,0,0,0,200,75.64ZM72,40H184V75.64L178.23,80H77.33L72,76Zm56,78L98.67,96h58.4Zm56,98H72V180l48-36v24a8,8,0,0,0,16,0V144.08l48,36.28Z"></path>
                                        </svg>
                                    </span>
                                    <span class="text-dark text-center">Pendente</span>
                                @endif
                            </div>
                            <a href="{{ $project->is_subscribe_pending ? $project->route->pending : $project->route->view }}" 
                                class="d-flex flex-column justify-content-center align-items-center mx-3"
                            >
                                <span class="rounded-circle p-2 mb-1" style="background-color: #dcdfe4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" fill="#667085" style="border-radius: 50%; background-color: #dcdfe4;">
                                        <g fill="#667085">
                                            <circle cx="17.5" cy="17.5" r="2.9" stroke-width="2"></circle>
                                            <path stroke="#667085" stroke-linecap="round" stroke-width="2" d="m21 21l-1.5-1.5"></path>
                                            <path fill="#667085" fill-rule="evenodd" d="M4 10c0-3.771 0-5.657 1.172-6.828C6.343 2 8.229 2 12 2c3.771 0 5.657 0 6.828 1.172C20 4.343 20 6.229 20 10v3.169a5 5 0 1 0-4.773 8.786C14.337 22 13.277 22 12 22c-3.771 0-5.657 0-6.828-1.172C4 19.657 4 17.771 4 14zm4-5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zm0 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2z" clip-rule="evenodd"></path>
                                        </g>
                                    </svg>
                                </span>
                                <span class="text-dark text-center">Visualizar projeto</span>
                            </a>
                            @if (! $project->is_subscribe_pending)
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <span class="rounded-circle p-2 mb-1" style="background-color: #ffe9e1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ef1216" viewBox="0 0 256 256">
                                            <path d="M208,192H48a8,8,0,0,1-6.88-12C47.71,168.6,56,147.81,56,112a72,72,0,0,1,144,0c0,35.82,8.3,56.6,14.9,68A8,8,0,0,1,208,192Z" opacity="0.2"></path>
                                            <path d="M224,71.1a8,8,0,0,1-10.78-3.42,94.13,94.13,0,0,0-33.46-36.91,8,8,0,1,1,8.54-13.54,111.46,111.46,0,0,1,39.12,43.09A8,8,0,0,1,224,71.1ZM35.71,72a8,8,0,0,0,7.1-4.32A94.13,94.13,0,0,1,76.27,30.77a8,8,0,1,0-8.54-13.54A111.46,111.46,0,0,0,28.61,60.32,8,8,0,0,0,35.71,72Zm186.1,103.94A16,16,0,0,1,208,200H167.2a40,40,0,0,1-78.4,0H48a16,16,0,0,1-13.79-24.06C43.22,160.39,48,138.28,48,112a80,80,0,0,1,160,0C208,138.27,212.78,160.38,221.81,175.94ZM150.62,200H105.38a24,24,0,0,0,45.24,0ZM208,184c-10.64-18.27-16-42.49-16-72a64,64,0,0,0-128,0c0,29.52-5.38,53.74-16,72Z"></path>
                                        </svg>
                                    </span>
                                    <span class="text-dark">Notificação</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="px-md-4 px-3" style="border-top: 1px solid #e0e1e3; border-left: 1px solid #e0e1e3; border-right: 1px solid #e0e1e3;"></div>
            @if ($projects->hasMorePages())
                <div class="d-flex justify-content-end pt-3" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; border: 1px solid #CCC;">
                    {{ $projects->links('components.pagination') }}
                </div>
            @endif
        @else
            <div class="text-center font-weight-medium text-dark py-4" style="border: 1px solid #e0e1e3">
                VOCÊ NÃO ESTÁ INSCRITO EM NENHUM PROJETO, CONFIRA OS EDITAIS ABAIXO E REALIZE A SUA INSCRIÇÃO
            </div>
            <div class="px-md-4 px-3" style="border-top: 1px solid #e0e1e3; border-left: 1px solid #e0e1e3; border-right: 1px solid #e0e1e3;"></div>
        @endif
    </div>

    <input type="hidden" data-ids-editals-my-projects value="{{ json_encode($idsFromEditalsMyprojects) }}">

    {{-- ULTIMOS EDITAIS --}}
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-dark font-weight-medium mb-0">Últimos editais</h4>
            <div>
                <button type="button" class="btn bg-transparent border-0 p-0" data-previous-page-edital-button
                    onclick="getPreviousItems(this.dataset)"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#999999" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM149.66,93.66,115.31,128l34.35,34.34a8,8,0,0,1-11.32,11.32l-40-40a8,8,0,0,1,0-11.32l40-40a8,8,0,0,1,11.32,11.32Z"></path>
                    </svg>
                </button>
                <button type="button" class="btn bg-transparent border-0 p-0 ml-1" data-next-page-edital-button
                    onclick="getNextItems(this.dataset)"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#999999" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="d-md-flex flex-wrap h-auto mb-5" data-edital-list-container></div>
    </div>
    <div class="mt-5"></div>

    <x-slot:scripts>
        <script src="{{ asset('js/public/panel/home/index.js') }}"></script>
    </x-slot:scripts>

</x-layout.painel>
