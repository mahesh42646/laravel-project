@extends('layouts.master-layouts')
@section('title') Acesso negado @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center mt-4">
        <img class="mw-100" src="{{ asset('assets/images/errors/403.svg') }}" width="400px" alt="Acesso negado">
        
        <h2 class="text-center text-primary font-weight-bold mt-3">
            Acesso negado!
        </h2>
        <div class="text-center" style="margin-top: -10px;">
            Você <strong>não</strong> tem permissão para acessar este conteúdo!
        </div>
    </div>
@endsection
