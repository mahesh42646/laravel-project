<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Cadastro do Artista | Gestor Cultural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mapa Cultural">
    <meta name="author" content="Devcactus">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app/app.min.css')}}">
</head>
<body>

    {{-- HEADER --}}
    <div class="bg-white py-3 mb-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <div class="d-flex jsutify-content-center text-center logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo/roxo.webp') }}" class="img-fluid" width="300px" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo/mobile-light-roxo.png') }}" class="img-fluid" width="55px" alt="logo">
                    </span>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('landing.page.edital') }}" class="d-flex flex-column justify-content-center align-items-center">
                        <span class="mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="p-2" width="45" height="45" fill="#FFF" viewBox="0 0 256 256" style="border-radius: 50%; background-color: var(--blue);">
                                <path d="M224,120v96a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V164a4,4,0,0,0-4-4H108a4,4,0,0,0-4,4v52a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a16,16,0,0,1,4.69-11.31l80-80a16,16,0,0,1,22.62,0l80,80A16,16,0,0,1,224,120Z"></path>
                            </svg>
                        </span>
                        <span class="text-dark font-weight-medium">Home</span>
                    </a>
                    <a href="{{ route('landing.page.edital') }}" class="d-flex flex-column justify-content-center align-items-center ml-4">
                        <span class="mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="p-2" width="45" height="45" fill="#FFF" style="border-radius: 50%; background-color: var(--blue);">
                                <g fill="#FFF">
                                    <circle cx="17.5" cy="17.5" r="2.5" stroke-width="2"/>
                                    <path stroke="#FFF" stroke-linecap="round" stroke-width="2" d="m21 21l-1.5-1.5" />
                                    <path fill="#FFF" fill-rule="evenodd" d="M4 10c0-3.771 0-5.657 1.172-6.828C6.343 2 8.229 2 12 2c3.771 0 5.657 0 6.828 1.172C20 4.343 20 6.229 20 10v3.169a5 5 0 1 0-4.773 8.786C14.337 22 13.277 22 12 22c-3.771 0-5.657 0-6.828-1.172C4 19.657 4 17.771 4 14zm4-5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zm0 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2z" clip-rule="evenodd"/>
                                </g>
                            </svg>
                        </span>
                        <span class="text-dark font-weight-medium">Editais</span>
                    </a>
                    <a href="{{ route('public.auth.login') }}" class="d-flex flex-column justify-content-center align-items-center ml-4">
                        <span class="mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="p-2" width="45" height="45" fill="#FFF" style="border-radius: 50%; background-color: #343a40;">
                                <path d="M15.24 22.27h-.13c-4.44 0-6.58-1.75-6.95-5.67-.04-.41.26-.78.68-.82.4-.04.78.27.82.68.29 3.14 1.77 4.31 5.46 4.31h.13c4.07 0 5.51-1.44 5.51-5.51V8.74c0-4.07-1.44-5.51-5.51-5.51h-.13c-3.71 0-5.19 1.19-5.46 4.39-.05.41-.4.72-.82.68a.751.751 0 01-.69-.81c.34-3.98 2.49-5.76 6.96-5.76h.13c4.91 0 7.01 2.1 7.01 7.01v6.52c0 4.91-2.1 7.01-7.01 7.01z"/>
                                <path d="M15 12.75H3.62c-.41 0-.75-.34-.75-.75s.34-.75.75-.75H15c.41 0 .75.34.75.75s-.34.75-.75.75z"/>
                                <path d="M5.85 16.1c-.19 0-.38-.07-.53-.22l-3.35-3.35a.754.754 0 010-1.06l3.35-3.35c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06L3.56 12l2.82 2.82c.29.29.29.77 0 1.06-.14.15-.34.22-.53.22z"/>
                            </svg>  
                        </span>
                        <span class="text-dark font-weight-medium">Entrar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />

    <div class="container">
        <h3 class="mb-4 text-dark">Criar conta agente cultural</h3>
    </div>
    
    {{-- CONTEUDO --}}
    <form action="{{ route('public.register.customers.store', $edital->id) }}" method="POST" 
        class="container card p-4" style="border-radius: 25px;"
    >
        @csrf

        {{-- TIPO DE AGENTE --}}
        <div class="d-flex align-items-center text-dark mb-4">
            <h5 class="mr-2 font-weight-medium mb-0">Tipo de agente</h5>
            <span class="text-secondary" title="Selecione apenas uma opção">
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="currentColor">
                    <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
            </span>
        </div>
        <div class="d-md-flex flex-wrap">
            @php
                $editalPeopleTypes = $edital->peoples_types->pluck('id')->toArray();
            @endphp
            @foreach ($agents as $agent)
                @if (in_array($agent->people_type_id, $editalPeopleTypes))
                    <div class="col-md-4 mb-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="{{ $agent->id }}" name="type_agent_id" 
                                id="agent-{{ $agent->id }}" onchange="changeAgentType(this)" data-agent-type
                            >
                            <label class="custom-control-label" for="agent-{{ $agent->id }}">{{ $agent->name }}</label>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <hr>

        <input type="hidden" data-url-mask-money value="{{ asset('js/libs/fill/Fill.js') }}">
        <input type="hidden" data-url-search-city value="{{ route('customers.search.city') }}">
        <input type="hidden" data-genders value="{{ json_encode($genders) }}">
        <input type="hidden" data-breeds value="{{ json_encode($breeds) }}">
        <input type="hidden" data-schoolings value="{{ json_encode($schoolings) }}">
        <input type="hidden" data-main-area-atuations value="{{ json_encode($mainAreaAtuations) }}">
        <input type="hidden" data-communities value="{{ json_encode($communities) }}">
        <input type="hidden" data-exist-agent-pf-url value="{{ route('public.register.search.agent.pf.exist', $editalCode) }}">
        <div data-form></div>

        {{-- BOTAO DE SALVAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3 pl-2 pr-md-2">
            <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-4 py-2" data-save-button onclick="save(event)">
                Criar agente cultural
            </button>
        </div>
    </form>

    <script src="{{ asset('js/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
	<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/libs/metismenu/metismenu.min.js') }}"></script>
	<script src="{{ asset('js/libs/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('js/libs/node-waves/node-waves.min.js') }}"></script>
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script type="module" src="{{ asset('js/public/register/artist.js') }}"></script>
</body>
</html>
