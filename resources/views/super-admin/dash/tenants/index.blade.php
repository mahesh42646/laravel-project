@extends('layouts.super-admin.master-layouts')
@section('title') Lista de Prefeituras @endsection
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
                    
                    @if (auth()->user()->role_id?->value === 99)
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <a href="{{ route('dash.tenants.create') }}" class="btn btn-primary font-weight-medium pr-3 rounded-lg waves-effect">
                                    <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Nova Prefeitura
                                </a>
                            </div>
                            <div class="col-lg-4 d-md-block d-none"></div>
                            <div class="col-lg-5 text-right mb-3">
                                @csrf
                                
                                <input type="hidden" data-js="search-url" value="{{ route('dash.tenants.search') }}">
                                <input type="search" class="form-control" id="searchTenant" name="search_name" 
                                    placeholder="Pesquisar por Nome"
                                />
                            </div>
                        </div>
                    @endif

                    <div class="row" id="contentTenant">
                        @foreach ($tenants as $tenant)
                            <div class="col-xl-3 rounded-lg p-3 h-auto">
                                <div class="row d-flex flex-column align-items-center justify-content-center border rounded-lg shadow p-3 h-100">
                                    <a href="{{ route('dash.tenants.edit', $tenant->id) }}">
                                        <img src="{{ $tenant->logo_path }}" class="mb-3" width="100px" alt="{{ $tenant->name }}">
                                    </a>
                                    <div class="text-center text-dark font-weight-medium mb-2">{{ $tenant->name }}</div>
                                    <div>
                                        @if ($tenant->is_active?->value == '1')
                                            <a href="{{ route('dash.tenant', $tenant->id) }}" target="_blank"
                                                class="btn btn-dark px-5 font-weight-medium rounded-lg"
                                            >
                                                Acessar
                                            </a>
                                        @else
                                            <div class="btn btn-danger px-5 font-weight-medium rounded-lg">
                                                Inativa
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-12 text-center mt-3" id="paginate">
                        <div class="d-flex justify-content-end">
                            {{ $tenants->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/super-admin/tenants/search.js') }}"></script>
@endsection
