@extends('layouts.master-layouts')
@section('title') Perfil de Acesso @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-xl-4 h-auto">
            <div class="card shadow overflow-hidden h-100">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Perfil de Acesso</h5>
                                <p>{{ config('app.name') }}</p>
                            </div>
                        </div>
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
                            <h5 class="font-size-15 text-truncate mb-0">{{ $user->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $user->role_id?->getName() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 h-auto">
            <div class="row h-100">
                
                <div class="card w-100 rounded-lg mb-0">
                    <div class="card-body shadow">

                        <h4 class="text-primary font-weight-bold mb-3">Perfil de Acesso</h4>
                        
                        {{-- NOME E APELIDO --}}
                        <div class="d-md-flex">
                            <div class="col-md-6 pl-md-0 mb-3">
                                <label class="text-dark mb-1">Nome</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark mb-1">RG</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->rg ?: '-' }}" readonly>
                            </div>
                        </div>

                        {{-- TELEFONE E EMAIL --}}
                        <div class="d-md-flex">
                            <div class="col-md-6 pl-md-0 mb-3">
                                <label class="text-dark mb-1">Telefone</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->phone ?: '-' }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark mb-1">Email</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        {{-- PERFIL DE ACESSO E ATIVO --}}
                        <div class="d-md-flex">
                            <div class="col-md-6 pl-md-0 mb-3">
                                <label class="text-dark mb-1">Perfil de Acesso</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->role_id?->getName() }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-dark mb-1">Ativo</label>
                                <input type="text" class="form-control rounded-lg bg-light" value="{{ $user->is_active?->getName() }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
