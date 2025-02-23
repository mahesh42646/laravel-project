@extends('layouts.super-admin.master-layouts')
@section('title') Novo Usuário @endsection
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

    @if (count($tenants) <= 0)
        <div class="d-flex align-items-center alert alert-warning rounded-lg text-dark">
            <strong class="mr-2">Atenção!</strong> Antes de realizar o cadastro do usuário, deve-se realizar o cadastro das prefeituras!
            <a href="{{ route('dash.tenants.create') }}" class="btn btn-sm btn-dark ml-3 px-4 font-weight-semibold rounded-lg">Cadastrar prefeitura</a>
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('dash.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="text-dark font-weight-bold mb-3">Novo usuário</h4>

                {{-- NOME COMPLETO, DATA DE NASCIMENTO E SEXO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome completo <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-lg text-uppercase" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Data de nascimento</label>
                        <input type="date" class="form-control rounded-lg" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Sexo <span class="text-danger">*</span></label>
                        <div class="d-flex form-control border-0 pl-0">
                            <div class="custom-control custom-radio mr-4">
                                <input type="radio" class="custom-control-input" name="gender_id" id="genderMale" value="1" @checked(old('gender_id') == '1')>
                                <label class="custom-control-label" for="genderMale">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio mr-4">
                                <input type="radio" class="custom-control-input" name="gender_id" id="genderFemale" value="2" @checked(old('gender_id') == '2')>
                                <label class="custom-control-label" for="genderFemale">Feminino</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CPF, RG, ESCOLARIDADE E CARGO/FUNCAO --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">CPF</label>
                        <input type="text" class="form-control rounded-lg" name="cpf" id="cpf" value="{{ old('cpf') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">RG</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="rg" value="{{ old('rg') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Escolaridade</label>
                        <select class="form-control rounde-lg" name="schooling_id">
                            <option value="">Selecione</option>
                            @foreach ($schoolings as $schooling)
                                <option value="{{ $schooling->value }}" @selected(old('schooling_id') == $schooling->value)>
                                    {{ $schooling->getName() }}
                                </option>
                            @endforeach
                        </select>            
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Cargo/Função</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="role_name" value="{{ old('role_name') }}">
                    </div>
                </div>

                {{-- PERFIL DE ACESSO, EMAIL, SENHA DE ACESSO E NUMERO DE CONTATO --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Perfil de acesso <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light rounded-lg" value="Super Administrador" readonly>
                        <input type="hidden" name="role_id" value="1">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control text-lowercase rounded-lg" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Senha de acesso <span class="text-danger">*</span></label>
                        <input type="password" class="form-control rounded-lg" name="password" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="text-dark">Nº de Contato</label>
                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>

                {{-- FOTO DE PERFIL E OBSERVACOES --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Foto do perfil</label>
                        <img src="{{ asset('assets/images/users/noImage.webp') }}" id="profile_display" onclick="triggerClick()" data-toggle="tooltip" data-placement="top" data-original-title="Clique para enviar a foto do perfil">
                        <input type="file" class="form-control" name="new_photo" id="new_profile_photo" accept="image/png,image/jpeg" style="display:none;" onchange="displayProfile(this)">
                    </div>
                    <div class="col-md-9 mb-3">
                        <label class="text-dark">Observações</label>
                        <textarea class="form-control rounded-lg" name="observation" rows="1">{{ old('observation') }}</textarea>
                    </div>
                </div>

                {{-- PREFEITURAS --}}
                <div class="mb-3 mt-3">
                    <h5 class="text-dark font-weight-bold">Prefeituras</h5>
                    <div class="d-flex flex-column">
                        @foreach ($tenants as $tenant)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tenants[]" value="{{ $tenant->id }}" id="tenant-{{ $tenant->id }}">
                                <label class="custom-control-label" for="tenant-{{ $tenant->id }}">{{ $tenant->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- BOTOES DE VOLTAR E SALVAR --}}
                <div class="d-md-flex justify-content-md-between align-items-md-center mt-3">
                    <a href="{{ route('dash.users.index') }}" class="btn btn-light font-weight-medium rounded-lg waves-effect px-4 mb-0">
                        <i class="bx bx-arrow-back font-size-16 align-middle mr-2"></i>Voltar
                    </a>
                    @if (count($tenants) > 0)
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
    <script src="{{ asset('js/super-admin/users/script.js') }}"></script>
@endsection
