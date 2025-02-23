@extends('layouts.super-admin.master-layouts')
@section('title') Lista de Usuários @endsection
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
                            <a href="{{ route('dash.users.create') }}" class="btn btn-dark font-weight-medium pr-3 rounded-lg waves-effect">
                                <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Novo Usuário
                            </a>
                        </div>
                        <div class="col-lg-4 d-md-block d-none"></div>
                        <div class="col-lg-5 text-right mb-3">
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive col-lg-12">
                            <table class="table table-sm table-hover table-centered table-nowrap table-bordered text-dark nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Perfil de acesso</th>
                                        <th>Prefeituras associadas</th>
                                        <th>Data de registro</th>
                                        <th>Status</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody id="contentUser">
                                    @php 
                                        $currentPage = $users->currentPage();
                                        $limit = 50;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="font-weight-bold">{{ $loop->iteration + $limit * ($currentPage - 1) }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->cpf ?: '-' }}</td>
                                            <td>{{ $user->role_id?->getName() }}</td>
                                            <td class="text-center">{{ $user->prefectures->count() }}</td>
                                            <td>{{ $user->created_at?->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <span class="{{ $user->is_active?->getColor() }}">
                                                    {{ $user->is_active?->getName() }}
                                                </span>
                                            </td>
                                            <td class="d-flex">
                                                @if ($user->role_id?->value == '1')
                                                    <a href="{{ route('dash.users.edit', $user->id) }}" title="Editar dados do usuário"
                                                        class="btn btn-dark btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                                                    >
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('dash.users.reset.password.view', $user->id) }}" title="Atualizar senha do usuário"
                                                    class="btn btn-dark btn-sm rounded-lg waves-effect mb-2 mx-1 mb-md-0"
                                                >
                                                    <i class="mdi mdi-key"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="loader" style="display: none;">
                                    <tr>
                                        <td colspan="8">
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
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
