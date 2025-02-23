@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    @if ($project->identification_project_status_expired_at)
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
            </svg>
            <strong class="px-2">Atenção!</strong> Existem pendências relacionadas a identificação do seu projeto! Você tem até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($project->identification_project_status_expired_at)) }}</strong> para resolver as pendências!
        </div>
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Z"/>
            </svg>
            <strong class="px-2">Motivo:</strong> {{ $project->identification_project_status_motive }}
        </div>
    @endif

    @if ($project->edital->type_id->value === 2)
        <div class="alert alert-warning rounded-lg mb-3">
            <div class="d-flex align-items-center justify-content-between text-dark mb-0">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="m40-120 440-760 440 760H40Zm440-120q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Z"/>
                    </svg>
                    <h6 class="ml-2 mb-0"><strong class="mr-1">Atenção!</strong> Este edital é do tipo premiado!</h6>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="card d-flex p-4">
        <h4 class="font-weight-bold text-dark mb-3">Identificação do Projeto</h4>

        {{-- NOME DO PROJETO, VALOR E EDITAL --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-dark">Nome do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->name }}" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Valor do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->price_masked }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Edital <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->edital->name }}" readonly>
            </div>
        </div>

        @if ($project->edital->type_id->value === 1)

            {{-- RESUMO E DESCRICAO DA PROPOSTA --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Resumo da proposta</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->resume }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Descrição da proposta</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->description }}</textarea>
                </div>
            </div>

            {{-- OBJETIVOS E JUSTIFICATIVA --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Objetivos e metas</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->objectives }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Justificativa</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->justification }}</textarea>
                </div>
            </div>

            {{-- PUBLICO ALVO E CRONOGRAMA --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Público-alvo</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->target }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Cronograma de execução</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->cronogram }}</textarea>
                </div>
            </div>

            {{-- MEDIDAS DE ACESSIBILIDADE E PLANO DE DIVULGACAO --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Medidas de acessibilidade</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->accessibility }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Plano de divulgação</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->plan }}</textarea>
                </div>
            </div>

            {{-- CONTRAPARTIDA SOCIAL E LOCAIS PREVISTOS PARA ACAO CULTURAL --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Contrapartida social</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->contra_partid_social }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Locais previstos para realização da ação cultural</label>
                    <textarea class="form-control bg-light rounded-lg" rows="4" readonly>{{ $project->locals }}</textarea>
                </div>
            </div>
        @endif

        {{-- BOTAO DE VOLTAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
            <a href="{{ route('public.panel.project.show', [$token, base64_encode($project->id)]) }}" class="btn btn-dark rounded-lg waves-effect font-weight-medium mb-0 px-5">
                Voltar
            </a>
        </div>
    </div>
@endsection
