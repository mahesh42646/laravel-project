@extends('layouts.master-without-nav')
@section('title') Login @endsection
@section('body') <body class="bg-white"> @endsection

@section('content')

    <div class="container p-3">
        <div class="d-md-flex align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-semibold text-dark mb-3 mt-5">Bem vindo de volta ao login base 👋</h2>
                <h5 class="font-weight-normal text-dark mb-0">Hoje é um novo dia. É o teu dia.</h5>
                <h5 class="font-weight-normal text-dark mb-4">Faça login para começar a gerenciar seus trabalhos.</h5>

                <form method="POST" action="{{ route('authenticate') }}" class="form-horizontal">
                    @csrf
                    
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <span>{!! session('error') !!}</span>
                        </div>
                        {{ session()->forget('error') }}
                    @endif
                    @if (session()->has('success'))
                        <div class="alert text-dark alert-success">
                            <span>{{ session('success')}}</span>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="text-dark font-size-15 mb-1">Email</label>
                        <input name="email" type="email" class="form-control font-size-16 rounded-lg" style="background-color: #F7FAFF;"
                            value="{{ old('email') }}" id="email" placeholder="meuemail@email.com" required autofocus
                        >
                    </div>
                    <div class="form-group">
                        <label for="userpassword" class="text-dark font-size-15 mb-1">Senha</label>
                        <input type="password" name="password" class="form-control font-size-16 rounded-lg" style="background-color: #F7FAFF;"
                            value="{{ old('password') }}" placeholder="**********" required
                        >
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ url('forgot-password') }}" class="font-size-14">Esqueceu sua senha?</a>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn text-white btn-block waves-effect waves-light border-0 font-size-16"
                            style="background-color: #172D3A; border-radius: 10px;"
                        >
                            Entrar
                        </button>
                    </div>
                </form>

                <div class="mt-5 text-center">
                    <p>© {{ date('Y') }} {{ config('app.name') }} TODOS OS DIREITOS RESERVADOS</p>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block pl-5">
                <img src="{{ asset('assets/images/login.webp') }}" alt="login" class="img-fluid" style="border-radius: 20px;">
            </div>
        </div>
    </div>
@endsection
