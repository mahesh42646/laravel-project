@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    @if ($project->identification_proponent_status_expired_at)
        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
            </svg>
            <strong class="px-2">Atenção!</strong> Existem pendências relacionadas a identificação do seu cadastro! Você tem até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($project->identification_proponent_status_expired_at)) }}</strong> para resolver as pendências!
        </div>

        <div class="alert alert-warning text-dark d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                <path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Z"/>
            </svg>
            <strong class="px-2">Motivo:</strong> {{ $project->identification_proponent_status_motive }}
        </div>
    @endif

    <div class="card d-flex p-4">
        <h4 class="font-weight-bold text-dark mb-3">Identificação do Cadastro</h4>

        {{-- TIPO E SITUACAO --}}
        <div class="row">
            <div class="col-md-10 mb-3">
                <label class="text-dark">Tipo <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center">
                    <input type="radio" @checked($customer->type == 'PF') readonly>
                    <label class="ml-1 mb-0 text-dark">Pessoa Física</label>
                    <input type="radio" class="ml-4" @checked($customer->type == 'PJ') readonly>
                    <label class="ml-1 mb-0 text-dark">Pessoa Jurídica</label>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Situação <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->is_active?->getName() }}" readonly>
            </div>
        </div>

        {{-- CNPJ, NOME EMPRESARIAL E STATUS --}}
        <div class="row {{ $customer->type == 'PF' ? 'd-none' : '' }} " data-js="container-company">
            <div class="col-md-4 mb-3">
                <label class="text-dark">CNPJ <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->cnpj }}">
            </div>
            <div class="col-md-8 mb-3">
                <label class="text-dark">Nome Empresarial <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg text-uppercase" value="{{ $customer->company_name }}">
            </div>
        </div>

        {{-- CPF, RG, NOME COMPLETO E GENERO --}}
        <div class="row">
            <div class="col-md-2 mb-3">
                <label class="text-dark">CPF <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->cpf }}" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">RG <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->rg }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Nome Completo <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg text-uppercase" value="{{ $customer->name }}" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Gênero <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->gender_id?->getName() }}" readonly>
            </div>
        </div>

        {{-- NOME SOCIAL, RACA, LGBTQA, ESCOLARIDADE E RENDA INDIVIDUAL --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-dark">Nome Social</label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->name_social }}">
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Raça <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->breed_id?->getName() }}">
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Você é LGBTQIAPN+? <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->is_lgbt?->getName() }}">
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Escolaridade <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->schooling_id?->getName() }}">
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Renda Individual <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->income }}" readonly>
            </div>
        </div>

        {{-- PRINCIPAL AREA DE ATUACAO, OUTRAS AREAS DE ATUACAO E COMUNIDADES TRADICIONAIS --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-dark">Principal área de atuação <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->area_atuation }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label class="text-dark">Outras áreas de atuação</label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->area_atuation_other }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label class="text-dark">Comunidades tradicionais</label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->community_traditional }}" readonly>
            </div>
        </div>

        {{-- CIDADE, ENDERECO, TELEFONE E EMAIL --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-dark">Cidade <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->city }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label class="text-dark">Endereço completo</label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->address }}">
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">Telefone <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->phone }}" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label class="text-dark">E-mail <span class="text-danger">*</span></label>
                <input type="email" class="form-control bg-light text-lowercase rounded-lg" value="{{ $customer->email }}" readonly>
            </div>
        </div>

        {{-- BOTAO DE VOLTAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
            <a href="{{ route('public.panel.project.show', [$token, base64_encode($project->id)]) }}" class="btn btn-dark font-weight-medium rounded-lg waves-effect mb-0 px-5">
                Voltar
            </a>
        </div>
    </div>
@endsection
