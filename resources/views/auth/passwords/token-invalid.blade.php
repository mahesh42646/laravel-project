@extends('layouts.master-without-nav')
@section('title') Redefinir senha @endsection
@section('body') <body> @endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-6">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div class="d-md-flex justify-content-md-center align-items-md-center p-3">
                                <div class="col-md-6">
                                    <img src="{{ asset('assets/images/token-invalid.svg') }}" class="img-fluid" alt="token-invalido">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="text-primary font-weight-bold">Token Inválido!</h3>
                                    <p>O token informado está inválido! Caso queira recuperar a senha de acesso novamente, <a href="{{ route('forgot.password') }}" class="font-weight-medium text-primary">Clique aqui</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Lembrou da senha ? <a href="{{ route('login') }}" class="font-weight-medium text-primary">Faça login aqui</a></p>
                        <p>© {{ date('Y') }} {{ config('app.name') }}. Feito com <i class="mdi mdi-heart text-danger"></i> by DevCactus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
