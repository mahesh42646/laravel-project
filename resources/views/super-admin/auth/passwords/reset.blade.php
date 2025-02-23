@extends('layouts.master-without-nav')
@section('title') Redefinir senha @endsection
@section('body') <body> @endsection

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('login') }}" class="text-dark">
            <i class="fas fa-home h2"></i>
        </a>
    </div>
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
                                        <p>Redefinir senha {{ config('app.name') }}.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.webp') }}" class="img-fluid" alt="{{ config('app.name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{ url('/') }}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo.webp') }}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('reset') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
 
                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar Senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-primary rounded-lg font-weight-medium w-md waves-effect waves-light" >Redefinir Senha</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Lembrou da senha ? <a href="{{ url('login') }}" class="font-weight-medium text-primary">Faça login aqui</a></p>
                        <p>© {{ date('Y') }} {{ config('app.name') }}. Feito com <i class="mdi mdi-heart text-danger"></i> by DevCactus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
