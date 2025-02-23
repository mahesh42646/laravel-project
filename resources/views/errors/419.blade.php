@extends('layouts.master-without-nav')
@section('title') A Página expirou! @endsection
@section('body') <body> @endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 font-weight-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>9</h1>
                        <h4 class="text-uppercase font-weight-semibold">A Página expirou!</h4>
                        <h6 class="text-secondary">A página que você tentou acessar expirou-se por tempo de inatividade</h6>
                        <div class="mt-5 text-center">
                            <a class="btn btn-primary rounded-lg font-weight-medium px-4 waves-effect waves-light" href="{{ url('/') }}">
                                Voltar para o início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <img src="{{ asset('images/errors/419.svg') }}" alt="erro" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
