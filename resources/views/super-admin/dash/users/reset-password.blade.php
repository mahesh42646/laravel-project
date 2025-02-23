@extends('layouts.super-admin.master-layouts')
@section('title') Alterar Senha do Usuário @endsection
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
            <form action="{{ route('dash.users.reset.password.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h4 class="text-dark font-weight-bold mb-3">Atualizar senha do usuário</h4>

                {{-- NOME COMPLETO --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="text-dark">Nome</label>
                        <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->name }}" readonly>
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="text-dark">Email</label>
                        <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->email }}" readonly>
                    </div>
                </div>

                {{-- NOVA SENHA --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="control-label">Nova senha</label>
                        <input type="text" class="form-control bg-light" name="new_password"
                            value="{{ mb_strtolower(substr($user->name, 0, 3)) .  $user->id . '00' }}" readonly
                        >
                    </div>
                </div>

                <div class="d-md-flex justify-content-md-start">
                    <button type="submit" class="btn font-weight-medium rounded-lg btn-primary px-4">Atualizar senha</button>
                </div>
            </form>
        </div>
    </div>
@endsection
