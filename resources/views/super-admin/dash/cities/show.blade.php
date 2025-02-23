@extends('layouts.super-admin.master-layouts')
@section('title') Ver Dados da Cidade @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">

            <h4 class="text-dark font-weight-bold mb-3">Ver dados da cidade</h4>
            
            {{-- NOME, ESTADO E STATUS --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  rounded-lg bg-light" value="{{ $city->name }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-dark">Estado <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-lg bg-light" value="{{ $city->uf_id?->getName() }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-dark">Status <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-lg bg-light" value="{{ $city->is_active?->getName() }}" readonly>
                </div>
            </div>

            {{-- DESCRICAO --}}
            <div class="mb-3">
                <label class="text-dark">Descrição</label>
                <textarea class="form-control bg-light rounded-lg" rows="3" readonly>{{ $city->description }}</textarea>
            </div>

            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('dash.cities.index') }}" class="btn btn-primary rounded-lg font-weight-medium px-5">
                    Voltar
                </a>
            </div>
        </div>
    </div>
    
@endsection
