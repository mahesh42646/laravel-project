@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="card d-flex p-4">

        @if ($document->expired_at)
            <div class="alert alert-warning text-dark d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
                </svg>
                <strong class="px-2">Atenção!</strong> Existem pendências relacionadas a este documento! Você tem até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($document->expired_at)) }}</strong> para resolver as pendências!
            </div>

            <div class="alert alert-warning text-dark d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Z"/>
                </svg>
                <strong class="px-2">Motivo:</strong> {{ $document->motive }}
            </div>
        @endif

        <h3 class="font-weight-bold text-dark mb-3">Arquivo</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="text-dark">Tipo</label>
                    <input type="text" class="form-control bg-light rounded-lg" readonly
                        value="{{ App\Enums\Edital\DocumentEnum::tryFrom($document->document_id)->getName() }}"
                    >
                </div>
                <div class="mb-3">
                    <label class="text-dark">Status</label>
                    <input type="text" class="form-control bg-light rounded-lg" readonly
                        value="{{ App\Enums\Project\DocumentStatusEnum::tryFrom($document->status)->getName() }}"
                    >
                </div>
                <div class="mb-3">
                    <label class="text-dark">Motivo</label>
                    <textarea class="form-control bg-light rounded-lg" rows="3" readonly>@if ($document->status == '1') OK @else {{ $document->motive ?: '---' }} @endif</textarea>
                </div>
                @if ($document->analyzed_by)
                    <div class="mb-3">
                        <label class="text-dark">Analisado por</label>
                        <input type="text" class="form-control bg-light rounded-lg" value="{{ App\Models\User::find($document->analyzed_by)->name }}" readonly>
                    </div>
                @endif
                @if ($document->created_at)
                    <div class="mb-3">
                        <label class="text-dark">Criado em</label>
                        <input type="text" class="form-control bg-light rounded-lg" value="{{ date('d/m/Y H:i:s', strtotime($document->created_at)) }}" readonly>
                    </div>
                @endif
                @if ($document->updated_at)
                    <div class="mb-3">
                        <label class="text-dark">Atualizado em</label>
                        <input type="text" class="form-control bg-light rounded-lg" value="{{ date('d/m/Y H:i:s', strtotime($document->updated_at)) }}" readonly>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center align-items-center border rounded-lg shadow-sm col-md-8">
                @if ($document->path)
                    <iframe src="{{ asset("storage/{$document->path}") }}" width="100%" height="100%"></iframe>
                @else
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="150" viewBox="0 -960 960 960" width="150" fill="var(--primary)">
                                <path d="M360-460h40v-80h40q17 0 28.5-11.5T480-580v-40q0-17-11.5-28.5T440-660h-80v200Zm40-120v-40h40v40h-40Zm120 120h80q17 0 28.5-11.5T640-500v-120q0-17-11.5-28.5T600-660h-80v200Zm40-40v-120h40v120h-40Zm120 40h40v-80h40v-40h-40v-40h40v-40h-80v200ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Z"/>
                            </svg>
                        </div>
                        <div class="text-primary font-weight-semibold font-size-18">Nenhum documento foi enviado!</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- BOTAO DE VOLTAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
            <a href="{{ route('public.panel.project.show', [$token, base64_encode($project->id)]) }}" class="btn btn-dark rounded-lg font-weight-medium waves-effect mb-0 px-5">
                Voltar
            </a>
        </div>
    </div>
@endsection
