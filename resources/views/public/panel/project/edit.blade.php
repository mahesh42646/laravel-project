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

    {{-- REANALISE --}}
    @if ($project->identification_project_status->value === 3 && ! $expired)
        <div class="d-flex align-items-center alert alert-warning text-dark">
            <div class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="45" viewBox="0 -960 960 960" width="45">
                    <path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Z"/>
                </svg>
            </div>
            <div>
                <strong>Atenção!</strong> O analista retornou os dados do seu projeto para reanálise! Motivo: <strong>{{ $project->identification_project_status_motive }}</strong>. Por favor, atualize seus dados para corrigir as pendências.
            </div>
        </div>
    @endif
    @if ($project->identification_project_status->value === 3 && $expired)
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
            </svg>
            <strong class="px-2">Atenção!</strong> Não é possível realizar novas modificações! Você teve até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($project->identification_project_status_expired_at)) }}</strong> para resolver as pendências!
        </div>
        <div class="d-flex align-items-center alert alert-warning text-dark">
            <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Z"/>
                </svg>
            </div>
            <div>
                <strong>Motivo!</strong> {{ $project->identification_project_status_motive }}.
            </div>
        </div>
    @endif

    <form action="{{ route('public.panel.project.identify.update', [$token, $project->id]) }}" method="POST" class="card d-flex p-4">
        @csrf
        @method('PUT')
        
        <h4 class="font-weight-bold text-primary mb-3">Identificação do Projeto</h4>

        {{-- NOME DO PROJETO, VALOR E EDITAL --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-dark">Nome do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg" name="name" value="{{ $project->name }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
                <label class="text-dark">Valor do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg" name="price" value="{{ $project->price }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Edital <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->edital->name }}" readonly>
            </div>
        </div>

        {{-- RESUMO E DESCRICAO DA PROPOSTA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Resumo da proposta</label>
                <textarea class="form-control rounded-lg" name="resume" rows="2">{{ $project->resume }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Descrição da proposta</label>
                <textarea class="form-control rounded-lg" name="description" rows="2">{{ $project->description }}</textarea>
            </div>
        </div>

        {{-- OBJETIVOS E JUSTIFICATIVA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Objetivos e metas</label>
                <textarea class="form-control rounded-lg" name="objectives" rows="2">{{ $project->objectives }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Justificativa</label>
                <textarea class="form-control rounded-lg" name="justification" rows="2">{{ $project->justification }}</textarea>
            </div>
        </div>

        {{-- PUBLICO ALVO E CRONOGRAMA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Público-alvo</label>
                <textarea class="form-control rounded-lg" name="target" rows="2">{{ $project->target }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Cronograma de execução</label>
                <textarea class="form-control rounded-lg" name="cronogram" rows="2">{{ $project->cronogram }}</textarea>
            </div>
        </div>

        {{-- MEDIDAS DE ACESSIBILIDADE E PLANO DE DIVULGACAO --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Medidas de acessibilidade</label>
                <textarea class="form-control rounded-lg" name="accessibility" rows="2">{{ $project->accessibility }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Plano de divulgação</label>
                <textarea class="form-control rounded-lg" name="plan" rows="2">{{ $project->plan }}</textarea>
            </div>
        </div>

        {{-- CONTRAPARTIDA SOCIAL E LOCAIS PREVISTOS PARA ACAO CULTURAL --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Contrapartida social</label>
                <textarea class="form-control rounded-lg" name="contra_partid_social" rows="2">{{ $project->contra_partid_social }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Locais previstos para realização da ação cultural</label>
                <textarea class="form-control rounded-lg" name="locals" rows="2">{{ $project->locals }}</textarea>
            </div>
        </div>

        {{-- BOTAO DE SALVAR --}}
        @if (! $expired)
            <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
                <button type="submit" class="btn btn-primary font-weight-semibold rounded-lg waves-effect px-5">
                    Salvar
                </button>
            </div>
        @endif
        
    </form>
@endsection

@section('scripts')
    <script>
        (async () => {
            const fillUrl = document.querySelector('[data-js="fill-url"]');
            const { Fill } = await import(fillUrl.value);
            Fill.mask({currencyBrl: '[name="price"]'});
        })();
    </script>
@endsection
