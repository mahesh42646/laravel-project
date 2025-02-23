@extends('layouts.super-admin.master-layouts')
@section('title') Dados do Prefeitura @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <h4 class="text-dark font-weight-bold mb-3">Ver dados do prefeitura</h4>

            <div class="row">
                <div class="col-md-10">

                    {{-- CIDADE, RAZAO SOCIAL E CNPJ --}}
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="text-dark">Cidade <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->city->name }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-dark">Razão Social <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->name }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-dark">CNPJ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->cnpj }}" readonly>
                        </div>
                    </div>

                    {{-- TELEFONE, EMPRESA VINCULADA E SITUACAO --}}
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="text-dark">Telefone WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->phone }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-dark">Empresa vínculada <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->company->name }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-dark">Situação <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $tenant->is_active->getName() }}" readonly>
                        </div>
                    </div>

                    {{-- OBSERVACOES --}}
                    <div class="mb-3">
                        <label class="text-dark">Observações</label>
                        <textarea class="form-control rounded-lg" rows="1">{{ $tenant->observation }}</textarea>
                    </div>

                </div>
                <div class="col-md-2 flex-column d-flex align-items-center justify-content-center mb-3">
                    <label class="text-dark">Brasão <span class="text-danger">*</span></label>
                    <img src="{{ $tenant->logo_path }}" class="w-100" data-toggle="tooltip" data-placement="top">
                </div>
            </div>
        </div>
    </div>
@endsection
