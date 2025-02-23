@extends('layouts.super-admin.master-layouts')
@section('title') Artistas @endsection
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
                    
                    <div class="row justify-content-bwtween align-items-center">
                        <div class="col-lg-6 mb-3">
                            <h4 class="text-primary mb-0">Lista de artistas</h4>
                        </div>
                        <div class="col-lg-6 mb-3">
                            @csrf
                            
                            <input type="hidden" data-base-url value="{{ url('/') }}">
                            <input type="hidden" data-search-url value="{{ route('dash.artists.search') }}">
                            <input type="search" class="form-control" onkeyup="searchArtist(this)" 
                                placeholder="Pesquisar por nome do artista ou cidade" 
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive col-lg-12">
                            <table class="table table-sm table-hover table-centered table-bordered table-nowrap text-dark nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Cidade</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="contentArtist">
                                    @foreach ($artists as $artist)
                                        <tr>    
                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->cpf }}</td>
                                            <td>{{ $artist->city }}</td>
                                            <td>
                                                <button type="button" title="Excluir artista" data-toggle="modal" 
                                                    data-route="{{ route('dash.artists.destroy', $artist->id) }}" onclick="destroyArtist(this)"
                                                    data-name="{{ $artist->name }}" data-city="{{ $artist->city }}" data-target="#deleteArtist"
                                                    class="btn btn-sm rounded-lg text-white waves-effect bg-danger mb-2 p-0 mb-md-0"
                                                >
                                                    <i class="mdi mdi-trash-can-outline font-size-17 p-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody class="d-none" id="loader">
                                    <tr>
                                        <td colspan="4">
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
                                    {{ $artists->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DE DELETAR ARTISTA --}}
    <div class="modal fade" id="deleteArtist">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-form-destroy method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-body p-4">
                        <h5 class="text-center text-dark">Tem certeza que deseja excluir o artista?</h5>
                        <h5 class="text-center fw-bold lh-1 mb-1" style="color: #ED406A; margin-top: -5px;" data-name-destroy></h5>
                        <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;" data-city-destroy></h5>
    
                        <div class="d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="130px" height="130px" viewBox="0 0 24 24" fill="#ED406A">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
    
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                style="background-color: #ED406A" onclick="loader(this)"
                            >
                                Excluir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/super-admin/artists/search.js') }}"></script>
@endsection
