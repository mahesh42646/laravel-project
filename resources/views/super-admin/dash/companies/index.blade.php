@extends('layouts.super-admin.master-layouts')
@section('title') Lista de Empresas @endsection
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
                            <a href="{{ route('dash.companies.create') }}" class="btn btn-primary font-weight-medium pr-3 rounded-lg waves-effect">
                                <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Nova Empresa
                            </a>
                        </div>
                        <div class="col-lg-4 d-md-block d-none"></div>
                        <div class="col-lg-5 text-right mb-3">
                            @csrf
                            
                            <input type="hidden" data-js="search-url" value="{{ route('dash.companies.search') }}">
                            <input type="search" class="form-control" id="searchCompany" name="search_name" 
                                placeholder="Pesquisar por Nome ou CNPJ"  
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive col-lg-12">
                            <table class="table table-sm table-hover table-centered table-nowrap table-bordered text-dark nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Telefone</th>
                                        <th>Registrado em</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody id="contentCompany">
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->cnpj }}</td>
                                            <td>{{ $company->phone ?: '-' }}</td>
                                            <td>{{ $company->created_at?->format('d/m/Y H:i') }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('dash.companies.edit', $company->id) }}" title="Editar dados da empresa"
                                                    class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/super-admin/companies/search.js') }}"></script>
@endsection
