@extends('layouts.super-admin.master-layouts')
@section('title') Editar Dados da Empresa @endsection
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

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('dash.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4 class="text-dark font-weight-bold mb-3">Editar dados da empresa</h4>

                {{-- NOME DA EMPRESA E CNPJ --}}
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label class="text-dark">Nome da Empresa <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-lg text-uppercase" 
                            value="{{ old('name', $company->name) }}" required
                        >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">CNPJ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" name="cnpj" 
                            value="{{ old('cnpj', $company->cnpj) }}" required
                        >
                    </div>
                </div>

                {{-- NOME DO RESPONSAVEL E CPF --}}
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label class="text-dark">Nome do Responsável <span class="text-danger">*</span></label>
                        <input type="text" name="responsible" class="form-control text-uppercase rounded-lg" 
                            value="{{ old('responsible', $company->responsible) }}" required
                        >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" name="cpf" 
                            value="{{ old('cpf', $company->cpf) }}" required
                        >
                    </div>
                </div>

                {{-- ENDERECO E TELEFONE --}}
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label class="text-dark">Endereço</label>
                        <input type="text" name="address" class="form-control rounded-lg" 
                            value="{{ old('address', $company->address) }}"
                        >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Telefone</label>
                        <input type="text" class="form-control rounded-lg" name="phone" 
                            value="{{ old('phone', $company->phone) }}"
                        >
                    </div>
                </div>

                {{-- OBSERVACOES --}}
                <div class="mb-3">
                    <label class="text-dark">Observações</label>
                    <textarea class="form-control rounded-lg" name="observation" rows="2">{{ old('observation', $company->observation) }}</textarea>
                </div>

                {{-- BOTOES DE VOLTAR E SALVAR --}}
                <div class="d-md-flex justify-content-md-between align-items-md-center mt-3">
                    <a href="{{ route('dash.companies.index') }}" class="btn btn-light rounded-lg font-weight-semibold px-4 waves-effect mb-0">
                        <i class="bx bx-arrow-back font-size-16 align-middle mr-2"></i>Voltar
                    </a>
                    <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-5" onclick="loader(event)">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/super-admin/companies/script.js') }}"></script>
@endsection
