@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert text-dark alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('success') }}
    @endif

    @if ($project->note)
        <div class="alert text-dark mb-3" style="background-color: #C4F2E4">
            <strong>Parabéns!</strong> o seu projeto foi {{ $project->status->getName() }} com nota {{ $project->note }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex card mb-3">
        <div class="d-md-flex align-items-center p-3" style="border-radius: 10px;">
            <div class="d-flex align-items-center col-md-9 mb-2">
                <div class="mr-3">
                    <img src="{{ asset('images/banner.webp') }}" style="width: 60px;" alt="logo">
                </div>
                <div class="d-flex flex-column font-size-18">
                    <div><strong>Projeto:</strong> {{ $project->name }}</div>
                    <div><strong>Edital:</strong> <a href="{{ route('public.register.customers.show', base64_encode($edital->id)) }}" target="_blank">{{ $edital->name }}</a></div>
                </div>
            </div>
            <div class="w-100 col-md-3 d-md-flex justify-content-md-end mb-2">
                <a href="{{ route('public.panel.project.download', [$token, base64_encode($project->id)]) }}" title="Baixar dados do projeto"
                    class="btn btn-dark rounded-lg waves-effect mb-2 mb-md-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFF">
                        <path d="M720-680H240v-160h480v160Zm0 220q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Z"/>
                    </svg>
                    <span class="font-weight-medium pl-2">Imprimir Comprovante</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-xl-12">
            <div class="card d-flex p-4">

                {{-- IDENTIFICACAO DO CADASTRO DO PROPONENTE --}}
                <div class="d-md-flex justify-content-between align-items-center mb-2 px-3 py-2" style="background-color: #F5F6F8; border-radius: 10px;">
                    <div class="text-dark font-weight-semibold font-size-16 my-2">Identificação do Cadastro</div>
                    <div class="d-flex align-items-center my-2">

                        @if ($project->identification_proponent_status?->value != '0')
                            <div class="btn d-flex align-items-center px-4 py-2 rounded-lg" style="{{ $project->identification_proponent_status?->getStylePublic() }}">
                                <span class="font-weight-semibold font-size-15 mb-0" style="line-height: 0;">
                                    {{ $project->identification_proponent_status?->getName() }}
                                </span>
                                {!! $project->identification_proponent_status?->getIconPublic() !!}
                            </div>
                        @endif
                        <div class="d-flex align-items-center">
                            <a href="{{ route('public.panel.project.proponent.show', [$token, base64_encode($project->id)]) }}" class="btn btn-primary py-1 ml-1 px-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                                </svg>
                            </a>

                            {{-- QUANDO O EDITAL AINDA NAO FOI FINALIZADO E OS DADOS DO PROPONENTE ESTAO PENDENTES OU EM REANALISE --}}
                            @if ($project->identification_proponent_status?->value != '1' && $project->identification_proponent_status?->value != '2' && $edital->status->value != '4')
                                <a href="{{ route('public.panel.project.proponent.edit', [$token, base64_encode($project->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                    </svg>
                                    <span class="pr-1 font-weight-semibold">Editar</span>
                                </a>
                            @endif

                            {{-- QUANDO O EDITAL FOI FINALIZADO E OS DADOS DO PROPONENTE FORAM PARA REANALISE --}}
                            @if ($project->identification_proponent_status?->value == '3' && $edital->status->value == '4')
                                <a href="{{ route('public.panel.project.proponent.edit', [$token, base64_encode($project->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                    </svg>
                                    <span class="pr-1 font-weight-semibold">Editar</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- IDENTIFICACAO DO PROJETO --}}
                <div class="d-md-flex justify-content-between align-items-center mb-2 px-3 py-2" style="background-color: #F5F6F8; border-radius: 10px;">
                    <div class="text-dark font-weight-semibold font-size-16 my-2">Identificação do Projeto</div>
                    <div class="d-flex align-items-center my-2">
                        @if ($project->identification_project_status?->value != '0')
                            <div class="btn d-flex align-items-center px-4 py-2 rounded-lg" style="{{ $project->identification_project_status?->getStylePublic() }}">
                                <span class="font-weight-semibold font-size-15 mb-0" style="line-height: 0;">
                                    {{ $project->identification_project_status?->getName() }}
                                </span>
                                {!! $project->identification_project_status?->getIconPublic() !!}
                            </div>
                        @endif
                        <div class="d-flex align-items-center">
                            <a href="{{ route('public.panel.project.identify.show', [$token, base64_encode($project->id)]) }}" class="btn btn-primary py-1 ml-1 px-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                                </svg>
                            </a>

                            {{-- QUANDO O EDITAL AINDA NAO FOI FINALIZADO E OS DADOS DO PROJETO ESTAO PENDENTES OU EM REANALISE --}}
                            @if ($project->identification_project_status?->value != '1' && $project->identification_project_status?->value != '2' && $edital->status->value != '4')
                                <a href="{{ route('public.panel.project.identify.edit', [$token, base64_encode($project->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                    </svg>
                                    <span class="pr-1 font-weight-semibold">Editar</span>
                                </a>
                            @endif

                            {{-- QUANDO O EDITAL FOI FINALIZADO E OS DADOS DO PROJETO ESTAO PENDENTES OU EM REANALISE --}}
                            @if ($project->identification_project_status?->value == '3' && $edital->status->value == '4')
                                <a href="{{ route('public.panel.project.identify.edit', [$token, base64_encode($project->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                    </svg>
                                    <span class="pr-1 font-weight-semibold">Editar</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- DOCUMENTOS --}}
                @foreach ($documents as $document)
                    <div class="d-md-flex justify-content-between align-items-center mb-2 px-3 py-2" 
                        style="background-color: #F5F6F8; border-radius: 10px;"
                    >
                        <div class="text-dark font-weight-semibold font-size-16 my-2">
                            {{ $document->name }} @if($document->is_required) <span class="text-danger">(OBRIGATÓRIO)</span> @else <span>(OPCIONAL)</span> @endif
                        </div>
                        <div class="d-flex align-items-center my-2">
                            @if ($document->status != '0')
                                <div class="btn d-flex align-items-center px-4 py-2 rounded-lg" style="{{ App\Enums\Project\DocumentStatusEnum::tryFrom($document->status)?->getStylePublic() }}">
                                    <span class="font-weight-semibold font-size-15 mb-0" style="line-height: 0;">
                                        {{ App\Enums\Project\DocumentStatusEnum::tryFrom($document->status)?->getName() }}
                                    </span>
                                    {!! App\Enums\Project\DocumentStatusEnum::tryFrom($document->status)?->getIconPublic() !!}
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <a href="{{ route('public.panel.project.document.show', [$token, base64_encode($project->id), base64_encode($document->id)]) }}" class="btn btn-primary py-1 ml-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                                    </svg>
                                </a>

                                {{-- QUANDO O EDITAL AINDA NAO FOI FINALIZADO E OS DOCUMENTOS ESTAO PENDENTES OU EM REANALISE --}}
                                @if ($document->status != '1' && $document->status != '2' && $edital->status->value != '4')
                                    <a href="{{ route('public.panel.project.document.edit', [$token, base64_encode($project->id), base64_encode($document->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                            <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                        </svg>
                                        <span class="pr-1 font-weight-semibold">Editar</span>
                                    </a>
                                @endif

                                {{-- QUANDO O EDITAL FOI FINALIZADO E OS DOCUMENTOS ESTAO EM REANALISE --}}
                                @if ($document->status == '3' && $edital->status->value == '4')
                                    <a href="{{ route('public.panel.project.document.edit', [$token, base64_encode($project->id), base64_encode($document->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                            <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                        </svg>
                                        <span class="pr-1 font-weight-semibold">Editar</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- DILIGENCIAS --}}
                @foreach ($project->diligences as $diligence)
                    <div class="d-md-flex justify-content-between align-items-center mb-2 px-3 py-2" style="background-color: #F5F6F8; border-radius: 10px;">
                        <div class="text-dark font-weight-semibold font-size-16 my-2"><span class="text-danger">DILIGÊNCIA:</span> {{ $diligence->title }}</div>
                        <div class="d-flex align-items-center my-2">
                            <div class="btn d-flex align-items-center px-4 py-2 rounded-lg" style="{{ $diligence->status->getStylePublic() }}">
                                <span class="font-weight-semibold font-size-15 mb-0" style="line-height: 0;">
                                    {{ $diligence->status->getName() }}
                                </span>
                                {!! $diligence->status?->getIconPublic() !!}
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('public.panel.project.diligence.show', [$token, base64_encode($project->id), base64_encode($diligence->id)]) }}" class="btn btn-primary py-1 ml-1 px-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                                    </svg>
                                </a>
                                @if ($diligence->status->value != '1' && $diligence->status->value != '2')
                                    <a href="{{ route('public.panel.project.diligence.edit', [$token, base64_encode($project->id), base64_encode($diligence->id)]) }}" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                                            <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @if ($project->note)
        <div class="d-flex card p-4 mb-3">
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3" style="color: #1A79F2; background-color: #E4F3F8; border-radius: 10px">
                <div class="font-weight-medium text-uppercase mb-0">{{ $project->status->getName() }}</div>
                <div class="font-weight-bold font-size-22">NOTA {{ $project->note }}</div>
            </div>
        </div>
    @endif
    
@endsection
