@extends('layouts.super-admin.master-layouts')
@section('title') Atualizar Senha @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('success') }}
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-xl-4 h-auto">
            <div class="card shadow overflow-hidden h-100">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.webp') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-dark mb-0">{{ $user->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $user->role_id?->getName() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 h-auto">
            <div class="row h-100">
                <div class="card w-100 rounded-lg mb-0">
                    <form action="{{ route('dash.profile.change.password') }}" method="POST" class="card-body p-4 shadow">
                        @csrf
                        @method('PUT')

                        <h4 class="text-primary font-weight-bold mb-3">Atualizar Senha</h4>
                        
                        <div class="mb-3">
                            <label class="text-dark mb-1">Senha atual</label>
                            <input type="password" name="password_current" class="form-control rounded-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark mb-1">Nova Senha</label>
                            <input type="password" name="new_password" class="form-control rounded-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark mb-1">Confirmar Senha</label>
                            <input type="password" name="new_password_confirmation" class="form-control rounded-lg" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary font-weight-medium rounded-lg px-4">Alterar Senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
