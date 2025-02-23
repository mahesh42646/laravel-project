<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Edital | Gestor Cultural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema para gestão da editais" />
    <meta name="author" content="Devcactus" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app/app.min.css')}}">
</head>

<body data-layout="horizontal">

    <div id="layout-wrapper">
        <div class="main-content" style="background-color: #fafbfb;">
            <div class="container-fluid">
                {{-- CABECALHO --}}
                <div class="d-md-flex justify-content-md-between border shadow bg-white border-light p-2 mb-4" style="border-radius: 10px;">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center jsutify-content-center mr-3 pl-3">
                            <img src="{{ $tenant->logo_path }}" width="45px" alt="logomarca">
                        </div>
                        <div class="py-3">
                            <div class="font-weight-bold text-dark text-uppercase">{{ $tenant->name }}</div>
                            <div class="font-weight-bold text-dark text-uppercase">{{ $tenant->company->name }}</div>
                            <div class="font-weight-bold text-dark text-uppercase">{{ $edital->name }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{ $edital->banner_path }}" height="50px" alt="logomarca">
                    </div>
                </div>

                {{-- EDITAL --}}
                <div class="d-md-flex align-items-md-center justify-content-md-between border shadow bg-white px-3 pt-3 mb-4" style="border-radius: 10px;">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/banner.webp') }}" class="mr-3" style="height: 75px; border-radius: 10px;" alt="foto edital">
                        <div>
                            <div class="text-primary" style="font-size: 18px; line-height: 22px; font-weight: 600;">Inscrições a partir de</div>
                            <div style="{{ $edital->extended_at ? 'text-decoration: line-through; font-weight: 500; font-size: 15px;' : 'font-weight: 600; font-size: 16px;' }}">
                                {{ $edital->open_at?->format('d/m/Y') }} {{ $edital->horary_open_at }} até {{ $edital->closed_at?->format('d/m/Y') }} {{ $edital->horary_closed_at }}
                            </div>
                            @if ($edital->extended_at)
                                <div class="text-primary" style="font-size: 18px; line-height: 22px; font-weight: 600;">Inscrições prorrogadas até:</div>
                                <div style="font-weight: 600; font-size: 19px;">
                                    {{ $edital->extended_at?->format('d/m/Y') }} {{ $edital->horary_extended_at }}
                                </div>
                            @endif
                            <div style="font-weight: 600; font-size: 16px; line-height: 1;">{{ $edital->name }}</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        @if ($edital->status->value == '1')
                            <button class="w-100 btn btn-primary font-weight-medium" style="border-radius: 10px; padding: 11px 20px;"
                                data-toggle="modal" data-target="#subscribe"
                            >
                                <span class="mr-1">Inscreva-se</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="23" viewBox="0 -960 960 960" width="23" fill="#FFF">
                                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/>
                                </svg>
                            </button>
                        @elseif ($edital->status->value == '2') 
                            <button class="d-flex align-items-center justify-content-center w-100 btn font-weight-medium text-white" style="border-radius: 10px; padding: 11px 20px; background-color: #FFAE1F;"> 
                                <span class="mr-1">Pendente</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="23" viewBox="0 -960 960 960" width="23" class="ml-2" fill="#FFF">
                                    <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                </svg>
                            </button>
                        @else
                            <button class="w-100 btn btn-secondary font-weight-medium" style="border-radius: 10px; padding: 11px 20px;">
                                <span class="mr-1">Encerrado</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="23" viewBox="0 -960 960 960" width="23" fill="#FFF">
                                    <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                {{-- MODAL VER EDITAL --}}
                <div class="modal fade" id="subscribe">
                    <div class="modal-dialog">
                        <div class="modal-content border-0">

                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Inscrição para Edital</h5>
                                <button type="button" class="bg-transparent border-0" data-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#FFF">
                                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                    </svg>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <p class="text-dark font-weight-medium">Para enviar sua proposta para um edital, você precisa criar a sua conta de acesso e após isso, seguir o passo a passo para cadastrar o seu projeto. Clique no botão abaixo para começar a participar deste edital.</p>
                                <div class="d-flex justify-content-center mb-3">
                                    <a href="{{ route('public.register.customers.create',  base64_encode($edital->id)) }}" class="btn btn-primary py-2 rounded-lg w-50 font-weight-medium">QUERO PARTICIPAR</a>
                                </div>
                                <p class="text-secondary font-weight-medium">Ao final do processo, será emitido o Comprovante de Inscrição, com orientações de como acessar o seu painel de controle. Boa Sorte!</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFORMACOES --}}
                <div class="border shadow bg-white px-3 pt-3 mb-4" style="border-radius: 10px;">
                    <h5 class="text-dark font-weight-semibold">INFORMAÇÕES</h5>
                    <div class="d-md-flex">
                        <div class="col-md-8 pl-0 d-flex flex-column mb-3">
                            <h5 class="text-dark">Sobre</h5>
                            @if ($edital->observation)
                                <div>{!! $edital->observation !!}</div>
                            @else
                                <div class="p-3 btn-light">
                                    Não existem informações complementares para este edital.
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 pl-0 mb-3">
                            <h5 class="text-dark">Anexos do Edital</h5>
                            @forelse ($edital->attachments as $attachment)
                                <div class="d-flex align-items-center font-weight-medium mb-2">
                                    <img src="{{ asset('assets/images/pdf.webp') }}" width="18px" class="mr-2" alt="pdf">
                                    <a href="{{ $attachment->file_path }}" class="text-dark" target="_blank">{{ $attachment->name }}</a>
                                </div>
                            @empty 
                                <div class="text-center p-3 btn-light">
                                    Não existem anexos para este edital
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <footer class="container-fluid">
                <div class="d-flex jsutify-content-between">
                    <div class="col-sm-6">{{ date('Y') }} © <span class="text-dark font-weight-semibold">{{ config('app.name') }}</span></div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">Design & Develop by DevCactus</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>
