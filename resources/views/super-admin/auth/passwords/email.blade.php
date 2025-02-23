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
                                        <p>Redefina sua senha {{ config('app.name') }}.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.webp') }}" class="img-fluid" alt="{{ config('app.name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <h4>Olá, {{ $user->name }}</h4>
                                <p>
                                    <a href="{{ route('reset.password', [$user->id, $token]) }}">Clique aqui</a> para redefinir sua senha</p>
                                <p>Se o pedido de redefinição de senha não for feito por você, ignore este e-mail.</p>
                                <p>Obrigado,</p>
                                <p>{{ config('app.name') }}.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© {{ date('Y') }} {{ config('app.name'); }}. Feito com <i class="mdi mdi-heart text-danger"></i> by DevCactus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
