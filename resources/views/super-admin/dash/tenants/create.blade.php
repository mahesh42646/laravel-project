@extends('layouts.super-admin.master-layouts')
@section('title') Nova Prefeitura @endsection
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

    @if (count($companies) <= 0)
        <div class="d-flex align-items-center alert alert-warning rounded-lg text-dark">
            <strong class="mr-2">Atenção!</strong> Antes de realizar o cadastro da prefeitura, deve-se realizar o cadastro das empresas de assesoria!
            <a href="{{ route('dash.companies.create') }}" class="btn btn-sm btn-dark ml-3 px-4 font-weight-semibold rounded-lg">Cadastrar empresa</a>
        </div>
    @endif

    @if (count($cities) <= 0)
        <div class="d-flex align-items-center alert alert-warning rounded-lg text-dark">
            <strong class="mr-2">Atenção!</strong> Antes de realizar o cadastro da prefeitura, deve-se realizar o cadastro das cidades!
            <a href="{{ route('dash.cities.create') }}" class="btn btn-sm btn-dark ml-3 px-4 font-weight-semibold rounded-lg">Cadastrar cidade</a>
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('dash.tenants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h4 class="text-dark font-weight-bold mb-3">Nova Prefeitura</h4>

                <div class="row">
                    <div class="col-md-10">

                        {{-- CIDADE, RAZAO SOCIAL E CNPJ --}}
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="text-dark">Cidade <span class="text-danger">*</span></label>
                                <select class="form-control rounde-lg" name="city_id" required>
                                    <option value="">Selecione</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @selected(old('city_id') == $city->id)>
                                            {{ $city->name }} - {{ $city->uf_id?->getShortName() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark">Razão Social <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-uppercase rounded-lg" name="name" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="text-dark">CNPJ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-lg" name="cnpj" value="{{ old('cnpj') }}" required>
                            </div>
                        </div>

                         {{-- TELEFONE E EMPRESA VINCULADA --}}
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="text-dark">Telefone WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-lg" name="phone" id="phone" value="{{ old('phone') }}" required>
                            </div>
                            <div class="col-md-9 mb-3">
                                <label class="text-dark">Empresa vínculada <span class="text-danger">*</span></label>
                                <select class="form-control rounded-lg" name="company_id" required>
                                    <option value="">Selecione</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>
                                            {{ $company->name }} CNPJ: {{ $company->cnpj }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- OBSERVACOES --}}
                        <div class="mb-3">
                            <label class="text-dark">Observações</label>
                            <textarea class="form-control rounded-lg" name="observation" rows="1">{{ old('observation') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-2 flex-column d-flex align-items-center justify-content-center mb-3">
                        <label class="text-dark">Brasão <span class="text-danger">*</span></label>
                        <img src="{{ asset('assets/images/users/no-photo.webp') }}" data-js="logo-image" class="w-100" onclick="triggerClick()" data-toggle="tooltip" data-placement="top" data-original-title="Clique para enviar a foto do brasão da prefeitura">
                        <input type="file" class="form-control" name="new_logo" id="newLogo" accept="image/png,image/jpeg,image/webp" style="display:none;" onchange="displayLogo(this)">
                    </div>
                </div>

                {{-- BOTOES DE VOLTAR E SALVAR --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('dash.tenants.index') }}" class="btn btn-light rounded-lg font-weight-semibold waves-effect px-4 mb-0">
                        <i class="bx bx-arrow-back font-size-16 align-middle mr-2"></i>Voltar
                    </a>
                    @if (count($companies) > 0)
                        <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-5" onclick="loader(event)">
                            Salvar
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/super-admin/tenants/script.js') }}"></script>
@endsection
