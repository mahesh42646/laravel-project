@extends('layouts.super-admin.master-layouts')
@section('title') Dashboard @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <style>
        #scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        #scrollbar::-webkit-scrollbar-track {
            background: #FFF;
        }

        #scrollbar::-webkit-scrollbar-thumb {
            background-color: #929EAC;
            border-radius: 25px;    
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="text-dark font-size-18 mb-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-weight-medium text-dark active">Bem-vindo ao <span class="font-weight-bold text-primary">{{ config('app.name') }}</span> Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xl-4 h-auto">
            <div class="card shadow overflow-hidden h-100">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Bem vindo de volta !</h5>
                                <p>{{ config('app.name') }}</p>
                            </div>
                        </div>
                        <div class="col-4 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.webp') }}" alt="foto" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate text-dark font-weight-semibold mb-0">{{ $user->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $user->role_id?->getName() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 h-auto">
            <div class="row h-100">
                <div class="card w-100 rounded-lg mb-0">
                    <div class="card-body pt-2 shadow">
                        <h3 class="font-weight-semibold text-dark mb-3" style="font-size: 15px;">Visão Geral</h3>

                        <div class="d-md-flex">
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3">
                                <div class="rounded-lg p-3" style="background-color: #FEF5E5">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/prefecture.svg') }}" alt="prefeitura">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Prefeituras</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Ativos: {{ $tenants->active }}</div>
                                    <div class="font-weight-medium mb-4" style="font-size: 11px; color: #101010;">Inativos: {{ $tenants->inactive }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3">
                                <div class="rounded-lg p-3" style="background-color: #E9ECEE">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/user.svg') }}" alt="user">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Usuários</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Ativos: {{ $users->active }}</div>
                                    <div class="font-weight-medium mb-4" style="font-size: 11px; color: #101010;">Inativos: {{ $users->inactive }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3">
                                <div class="rounded-lg p-3" style="background-color: #CBC5F2">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/trophy.svg') }}" alt="artista">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Artistas</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Ativos: {{ $customers->active }}</div>
                                    <div class="font-weight-medium mb-4" style="font-size: 11px; color: #101010;">Inativos: {{ $customers->inactive }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BANNER --}}
    <div class="row mb-3">
        <div class="col-xl-4">
            <img src="{{ asset('assets/images/banner.webp') }}" class="rounded-lg" width="100%" height="140px" alt="banner">
        </div>
        <div class="col-xl-8"></div>
    </div>
@endsection
