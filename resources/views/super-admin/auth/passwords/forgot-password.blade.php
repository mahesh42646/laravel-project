@extends('layouts.master-without-nav')
@section('title') Esqueci minha senha @endsection
@section('body') <body> @endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Solicitação</h5>
                                        <p>Redefinir a senha {{ config('app.name'); }}.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.webp') }}" alt="perfil" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{ url('/') }}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo.webp') }}" alt="avatar" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ url('forgot-password') }}">
                                    @csrf
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            <span>{{ session('error') }}</span>
                                        </div>
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            <span>{{ session('success') }}</span>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" 
                                            placeholder="Digite o e-mail" autofocus required
                                        >
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-primary w-md waves-effect waves-light">
                                                Redefinir
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Lembrou da senha ? <a href="{{ url('/') }}" class="font-weight-medium text-primary"> Faça login aqui</a> </p>
                        <p>© {{ date('Y') }} {{ config('app.name'); }}. Feito com <i class="mdi mdi-heart text-danger"></i> by DevCactus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
