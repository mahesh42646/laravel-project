@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($project->status->value == '0' && $expired)
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
            </svg>
            <strong class="px-2">Atenção!</strong> Não é possível realizar novas modificações! Você teve até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($diligence->expired_at)) }}</strong> para resolver as pendências!
        </div>
     @endif

     @if ($project->status->value == '0' && ! $expired)
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
            </svg>
            <strong class="px-2">Atenção!</strong> Existem diligências relacionadas ao seu projeto! Você tem até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($diligence->expired_at)) }}</strong> para resolver as pendências!
        </div>
     @endif

    <form action="{{ route('public.panel.project.diligence.update', [$token, $project->id, $diligence->id]) }}" method="POST" enctype="multipart/form-data" class="card d-flex p-4">
        @csrf
        @method('PUT')

        <h3 class="text-dark mb-3">Diligência: <strong>{{ $diligence->title }}</strong></h3>

        @foreach ($diligence->messages as $message)
            <div class="d-flex flex-column mb-3">
                @if ($message->sender_id->value == '1')
                    <div><strong>De:</strong> {{ $message->analyst->name }}</div>
                    <div><strong>Para:</strong> {{ $message->customer->name }}</div>
                @else
                    <div><strong>De:</strong> {{ $message->customer->name }}</div>
                    <div><strong>Para:</strong> {{ $message->analyst->name }}</div>
                @endif
                <div><strong>Situação:</strong> {{ $diligence->status->getName() }}</div>
                <div class="mb-2"><strong>Enviado em:</strong> {{ $message->registered_at?->format('d/m/Y H:i') }}</div>
                <div class="px-3 pt-3 rounded-lg mb-2" style="background-color: #F2F3F4">
                    {!! $message->content !!}
                </div>
                @foreach ($message->documents as $document)
                    <div class="d-flex align-items-center justify-content-between rounded-lg px-3 py-2 mb-2" style="background-color: #e9ecef">
                        <a href="{{ asset("storage/{$document->path}") }}" target="_blank" class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/pdf.webp') }}" width="20px" alt="Pdf">
                            <span class="font-weight-medium ml-2" style="color: #e7252b">{{ $document->name }}</span> 
                        </a>
                        <a href="{{ asset("storage/{$document->path}") }}" download class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28">
                                <path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q23-81 85.5-136T440-797v323l-64-62-56 56 160 160 160-160-56-56-64 62v-323q103 14 171.5 92.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H260Z"/>
                            </svg>
                            <span class="text-dark font-weight-medium ml-2">Baixar</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach

        @if ($project->status->value == '0' && ! $expired)
            <hr>
            <div class="mb-3">
                <h4 class="text-dark font-weight-semibold mb-3">Responder Diligência</h4>
                <div><strong>Título:</strong> {{ $diligence->title }}</div>
                <div class="mb-3"><strong>Para:</strong> {{ $message->analyst->name }}</div>
                <div class="mb-1">Mensagem <span class="text-danger">*</span></div>
                <textarea class="form-control" name="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Anexar documentos (PDF)</label>
                <div data-js="container-diligences"></div>
                <button type="button" onclick="addDiligenceAttachment()" class="d-flex align-items-center btn btn-light font-weight-medium rounded-lg pl-3 pr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    <span class="ml-2">Adicionar aquivos</span>
                </button>
            </div>

            <input type="hidden" name="analyst_id" value="{{ $message->analyst->id }}">
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">

            {{-- BOTAO DE ENVIAR --}}
            <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
                <button type="submit" class="btn btn-primary rounded-lg font-weight-medium waves-effect mb-0 px-5" onclick="loaderSaveDiligence(event)">
                    Enviar
                </button>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/pages/projects/edit/diligence.js') }}"></script>
@endsection
