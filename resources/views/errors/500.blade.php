@extends((auth()->check()) ? 'layouts.master-layouts' : 'layouts.master-without-nav')
@section('title') Erro inesperado! @endsection
@section('body') @if(auth()->check()) <body data-topbar="dark" data-layout="horizontal"> @else <body> @endif @endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 font-weight-medium">5<i class="bx bx-buoy bx-spin text-primary display-3"></i>0</h1>
                        <h4 class="text-uppercase font-weight-semibold">Erro inesperado!</h4>
                        <h6 class="text-secondary">Por favor entrar em contato com o administrador do sistema ou desenvolvedor!</h6>
                        @if (! auth()->check())
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary rounded-lg font-weight-medium px-4 waves-effect waves-light" href="{{ url('/') }}">
                                    Voltar para o início
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <img src="{{ asset('images/errors/500.svg') }}" alt="erro" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
