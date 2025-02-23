<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Painel do Agente Cultural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mapa Cultural">
    <meta name="author" content="Devcactus">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
	{{ $styles ?? '' }}
    <link rel="stylesheet" href="{{ asset('css/app/app.min.css')}}">
</head>
<body>

	{{-- HEADER --}}
    <div class="bg-white py-md-3 py-2 mb-4 shadow">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex jsutify-content-center text-center logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo/original.webp') }}" class="img-fluid" width="250px" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo/mobile-light.webp') }}" class="img-fluid h1" alt="logo">
                    </span>
                </div>
				<div class="d-flex justify-content-center align-items-center">
                    @php
                       $token = request('customer_id').'o1x6J2zq89o'.md5(request('customer_id'));
                    @endphp
                    <a href="{{ route('public.panel.home.index', $token) }}" class="d-flex flex-column justify-content-center align-items-center logo">
                        <span class="logo-lg">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="p-2" width="45" height="45" fill="#FFF" viewBox="0 0 256 256" style="border-radius: 50%; background-color: #343a40;">
                                    <path d="M224,120v96a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V164a4,4,0,0,0-4-4H108a4,4,0,0,0-4,4v52a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a16,16,0,0,1,4.69-11.31l80-80a16,16,0,0,1,22.62,0l80,80A16,16,0,0,1,224,120Z"></path>
                                </svg>
                                <h6 class="text-dark font-weight-medium mt-2">Home</h6>
                            </div>
                        </span>
                        <span class="logo-sm">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="p-2" width="35" height="35" fill="#FFF" viewBox="0 0 256 256" style="border-radius: 50%; background-color: #343a40;">
                                    <path d="M224,120v96a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V164a4,4,0,0,0-4-4H108a4,4,0,0,0-4,4v52a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a16,16,0,0,1,4.69-11.31l80-80a16,16,0,0,1,22.62,0l80,80A16,16,0,0,1,224,120Z"></path>
                                </svg>
                                <h6 class="text-dark font-weight-medium mt-1">Home</h6>
                            </div>
                        </span>
                    </a>
                    <a href="{{ route('public.panel.edital.index', $token) }}"
                        class="d-flex flex-column justify-content-center align-items-center ml-4 logo"
                    >
                        <span class="logo-lg">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="p-2" width="45" height="45" fill="#FFF" style="border-radius: 50%; background-color: #343a40;">
                                    <g fill="#FFF">
                                        <circle cx="17.5" cy="17.5" r="2.5" stroke-width="2"/>
                                        <path stroke="#FFF" stroke-linecap="round" stroke-width="2" d="m21 21l-1.5-1.5" />
                                        <path fill="#FFF" fill-rule="evenodd" d="M4 10c0-3.771 0-5.657 1.172-6.828C6.343 2 8.229 2 12 2c3.771 0 5.657 0 6.828 1.172C20 4.343 20 6.229 20 10v3.169a5 5 0 1 0-4.773 8.786C14.337 22 13.277 22 12 22c-3.771 0-5.657 0-6.828-1.172C4 19.657 4 17.771 4 14zm4-5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zm0 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2z" clip-rule="evenodd"/>
                                    </g>
                                </svg>
                                <h6 class="text-dark font-weight-medium mt-2">Editais</h6>
                            </div>
                        </span>
                        <span class="logo-sm">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="p-2" width="35" height="35" fill="#FFF" style="border-radius: 50%; background-color: #343a40;">
                                    <g fill="#FFF">
                                        <circle cx="17.5" cy="17.5" r="2.5" stroke-width="2"/>
                                        <path stroke="#FFF" stroke-linecap="round" stroke-width="2" d="m21 21l-1.5-1.5" />
                                        <path fill="#FFF" fill-rule="evenodd" d="M4 10c0-3.771 0-5.657 1.172-6.828C6.343 2 8.229 2 12 2c3.771 0 5.657 0 6.828 1.172C20 4.343 20 6.229 20 10v3.169a5 5 0 1 0-4.773 8.786C14.337 22 13.277 22 12 22c-3.771 0-5.657 0-6.828-1.172C4 19.657 4 17.771 4 14zm4-5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zm0 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2z" clip-rule="evenodd"/>
                                    </g>
                                </svg>
                                <h6 class="text-dark font-weight-medium mt-1">Editais</h6>
                            </div>
                        </span>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    @php
                        $customerAuth = session('customer_auth_'.request('customer_id'));
                    @endphp
                    <span type="button" data-toggle="modal" data-target="#openModalProfile"
                        class="d-flex flex-column justify-content-center align-items-center ml-4 logo"
                    >
                        <span class="logo-lg">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ $customerAuth->avatar }}" alt="avatar" class="img-fluid rounded-circle" width="45px"> 
                                <h6 class="text-dark font-weight-medium mt-2">Minha conta</h6>
                            </div>
                        </span>
                        <span class="logo-sm">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ $customerAuth->avatar }}" alt="avatar" class="img-fluid rounded-circle" width="40px">  
                                <h6 class="text-dark font-weight-medium mt-1">Minha conta</h6>
                            </div>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />
    
    {{-- CONTEUDO --}}
    <div class="container">
		{{ $slot }}
    </div>

    <div class="modal fade" id="openModalProfile">
        <div class="modal-dialog modal-md">
            
            <div class="modal-content border-0 p-md-5 p-4">

                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="mb-0">O que deseja fazer?</h3>
                    <span type="button" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                        </svg>
                    </span>
                </div>

                <a href="{{ route('public.panel.profile.edit', $token) }}" 
                    class="btn btn-dark d-flex align-items-center justify-content-center mb-3"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#fcfcfc" viewBox="0 0 256 256">
                        <path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path>
                    </svg>
                    <span class="ml-3 mb-0">EDITAR PERFIL</span>
                </a>
                <a href="{{ route('public.panel.profile.password.edit', $token) }}" 
                    class="btn btn-dark d-flex align-items-center justify-content-center mb-4"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#f7f7f7" viewBox="0 0 256 256">
                        <path d="M48,56V200a8,8,0,0,1-16,0V56a8,8,0,0,1,16,0Zm92,54.5L120,117V96a8,8,0,0,0-16,0v21L84,110.5a8,8,0,0,0-5,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,140,110.5ZM246,115.64A8,8,0,0,0,236,110.5L216,117V96a8,8,0,0,0-16,0v21l-20-6.49a8,8,0,0,0-4.95,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,246,115.64Z"></path>
                    </svg>
                    <span class="ml-3 mb-0">ALTERAR SENHA</span>
                </a>
                <a href="{{ route('public.panel.home.destroy', $token) }}" class="btn d-flex align-items-center justify-content-center shadow-sm" style="border: 1px solid #e5e5e5;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                        <path d="M120,128V48a8,8,0,0,1,16,0v80a8,8,0,0,1-16,0Zm60.37-78.7a8,8,0,0,0-8.74,13.4C194.74,77.77,208,101.57,208,128a80,80,0,0,1-160,0c0-26.43,13.26-50.23,36.37-65.3a8,8,0,0,0-8.74-13.4C47.9,67.38,32,96.06,32,128a96,96,0,0,0,192,0C224,96.06,208.1,67.38,180.37,49.3Z"></path>
                    </svg>
                    <span class="text-dark font-weight-bold ml-3 mb-0">SAIR DO PAINEL</span>
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
	<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/libs/metismenu/metismenu.min.js') }}"></script>
	<script src="{{ asset('js/libs/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('js/libs/node-waves/node-waves.min.js') }}"></script>
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    {{ $scripts ?? '' }}
</body>
</html>
