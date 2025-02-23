@extends('layouts.super-admin.master-layouts')
@section('title') Notícias @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    {{-- ALERT --}}
    @if (session()->has('success'))
        <div class="alert text-dark alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('success') }}
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @csrf
                    
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <a href="{{ route('dash.posts.create') }}"
                                class="btn btn-primary font-weight-medium pr-3 rounded-lg waves-effect"
                            >
                                <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Nova Notícia
                            </a>
                        </div>
                        <div class="col-lg-4 d-md-block d-none"></div>
                        <div class="col-lg-5 text-right mb-3">
                            @csrf
                            
                            <input type="hidden" data-js="base-url" value="{{ url('/') }}">
                            <input type="hidden" data-js="search-url" value="{{ route('dash.posts.search') }}">
                            <input type="search" class="form-control" id="searchPost" name="search_name" placeholder="Pesquisar título" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive col-lg-12">
                            <table class="table table-sm table-hover table-centered table-bordered table-nowrap text-dark nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 2%;">Nº</th>
                                        <th>Título</th>
                                        <th>Publicado em</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="contentPost">
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->registered_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ $post->status->getLabel() }}</td>
                                            <td>
                                                <a href="{{ route('dash.posts.edit', $post->id) }}" title="Editar dados da notícia"
                                                    class="btn btn-white text-primary border-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                                                >
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </a>
                                                <a href="{{ route('dash.posts.show', $post->id) }}" title="Ver dados da notícia"
                                                    class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="loader" style="display: none;">
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center align-items-center text-primary" 
                                                style="font-size: 20px; height: 200px;"
                                            >
                                                <span class="spinner-border spinner-border-sm mr-2" 
                                                    role="status" aria-hidden="true">
                                                </span> Carregando...
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-12 text-center mt-3" id="paginate">
                                <div class="d-flex justify-content-end">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/super-admin/posts/search.js') }}"></script>
@endsection
