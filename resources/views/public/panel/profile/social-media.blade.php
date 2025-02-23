@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('success') }}
    @endif

    <div class="row mb-3">
        <div class="col-xl-12">
            <form action="{{ route('public.panel.profile.social.midia.store', $token) }}" method="POST" class="card d-flex p-4">
                @csrf

                <h3 class="text-dark font-weight-bold mb-2">Mídias Sociais</h3>
                <div class="mb-2 mt-4" data-js="container-medias"></div>
                <input type="hidden" data-js="social-medias" value="{{ $socialMedias }}">

                <div class="d-flex justify-content-between mb-3">
                    <button type="submit" class="btn btn-primary font-weight-medium px-4 rounded-lg" onclick="loader(event)">Salvar</button>
                    <button type="button" class="align-items-center btn d-flex font-weight-semibold px-3 py-1 rounded-lg text-dark"
                        onclick="addMedia()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                        </svg>
                        <span class="ml-1">Adicionar Mídia</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/public/profile/social-media.js') }}"></script>
@endsection
