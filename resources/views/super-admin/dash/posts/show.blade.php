@extends('layouts.super-admin.master-layouts')
@section('title') Ver Dados da Postagem @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
                <h4 class="text-dark font-weight-bold mb-3">Nova notícia</h4>

                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="text-dark">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg" value="{{ $post->title }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Conteúdo <span class="text-danger">*</span></label>
                            <div>{!! $post->content !!}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="text-dark">Status <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg" value="{{ $post->status->getName() }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Data e hora da publicação <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg" value="{{ $post->registered_at->format('d/m/Y') }} {{ $post->hour }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Foto de capa</label>
                            <div>
                                <img src="{{ $post->image_path }}" class="img-fluid" alt="Foto de capa">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-md-flex justify-content-md-end">
                    <a href="{{ route('dash.posts.index') }}" class="btn btn-light rounded-lg font-weight-medium px-5">
                        Voltar
                    </a>
                </div>
        </div>
    </div>
    
@endsection
