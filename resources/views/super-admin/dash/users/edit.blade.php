@extends('layouts.super-admin.master-layouts')
@section('title') Editar Dados do Usuário @endsection
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
            <form action="{{ route('dash.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4 class="text-dark font-weight-bold mb-3">Editar dados do usuário</h4>

                {{-- NOME COMPLETO, DATA DE NASCIMENTO E SEXO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome completo <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-lg text-uppercase" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Data de nascimento</label>
                        <input type="date" class="form-control rounded-lg" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth?->format('Y-m-d')) }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Sexo <span class="text-danger">*</span></label>
                        <div class="d-flex form-control border-0 pl-0">
                            <div class="custom-control custom-radio mr-4">
                                <input type="radio" class="custom-control-input" name="gender_id" id="genderMale" value="1" @checked($user->gender_id == '1')>
                                <label class="custom-control-label" for="genderMale">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio mr-4">
                                <input type="radio" class="custom-control-input" name="gender_id" id="genderFemale" value="2" @checked($user->gender_id == '2')>
                                <label class="custom-control-label" for="genderFemale">Feminino</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CPF, RG, ESCOLARIDADE E CARGO/FUNCAO --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">CPF</label>
                        <input type="text" class="form-control rounded-lg" name="cpf" id="cpf" value="{{ old('cpf', $user->cpf) }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">RG</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="rg" value="{{ old('rg', $user->rg) }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Escolaridade</label>
                        <select class="form-control rounde-lg" name="schooling_id">
                            <option value="">Selecione</option>
                            @foreach ($schoolings as $schooling)
                                <option value="{{ $schooling->value }}" 
                                    @selected(old('schooling_id', $user->schooling_id?->value) == $schooling->value)
                                >
                                    {{ $schooling->getName() }}
                                </option>
                            @endforeach
                        </select>          
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Cargo/Função</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="role_name" value="{{ old('role_name', $user->role_name) }}">
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
                        <input type="email" class="form-control rounded-lg" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-dark">Status <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="is_active" required>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}" 
                                    @selected(old('is_active', $user->is_active?->value) == $status->value)
                                >
                                    {{ $status->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="text-dark">Nº de Contato</label>
                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>
                </div>

                {{-- FOTO DE PERFIL E OBSERVACOES --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="control-label">Foto do perfil</label>
                        <img src="{{ $user->avatar }}" id="profile_display" onclick="triggerClick()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clique para enviar a foto do perfil">
                        <input type="file" class="form-control" name="profile_photo_update" id="profile_photo_update" accept="image/png,image/jpeg" style="display:none;" onchange="displayProfile(this)">
                    </div>
                    <div class="col-md-9 mb-3">
                        <label class="text-dark">Observações</label>
                        <textarea class="form-control rounded-lg" name="observation" rows="1">{{ old('observation', $user->observation) }}</textarea>
                    </div>
                </div>

                {{-- PREFEITURAS --}}
                <div class="mb-3 mt-3">
                    <h5 class="text-dark font-weight-bold">Prefeituras</h5>
                    <div class="d-flex flex-column">
                        @foreach ($tenants as $tenant)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tenants[]"
                                    value="{{ $tenant->id }}" id="tenant-{{ $tenant->id }}"
                                    @checked(
                                        in_array($tenant->id, $user->prefectures->pluck('id')->toArray())
                                    )
                                >
                                <label class="custom-control-label" for="tenant-{{ $tenant->id }}">{{ $tenant->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- BOTOES DE VOLTAR E SALVAR --}}
                <div class="d-md-flex justify-content-md-between align-items-md-center mt-3">
                    <a href="{{ route('dash.users.index') }}" class="btn btn-light rounded-lg waves-effect px-4 font-weight-semibold mb-0">
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
    <script src="{{ asset('js/super-admin/users/script.js') }}"></script>
@endsection
