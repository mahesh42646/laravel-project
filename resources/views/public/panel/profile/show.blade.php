@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="card d-flex p-4">
                <h3 class="text-dark font-weight-bold mb-3">Gerenciar Perfil</h3>


                <div class="d-flex mb-4">
                    <a href="{{ route('public.panel.profile.edit', $token) }}" style="border: 1px dashed #888 !important;"
                        class="d-flex flex-column align-items-center justify-content-center btn-light rounded-lg p-3 mr-3"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" height="30" viewBox="0 -960 960 960" width="30" fill="#000">
                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/>
                        </svg>
                        <span class="font-weight-medium">Editar dados do perfil</span>
                    </a>

                    <a href="{{ route('public.panel.profile.password.edit', $token) }}" style="border: 1px dashed #888 !important;"
                        class="d-flex flex-column align-items-center justify-content-center btn-light rounded-lg p-3"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35" fill="#000">
                            <path d="M280-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 120q-100 0-170-70T40-480q0-100 70-170t170-70q81 0 141.5 46T506-560h335l79 79-140 160-100-79-80 80-80-80h-14q-25 72-87 116t-139 44Z"/>
                        </svg>
                        <span class="font-weight-medium">Editar senha de acesso</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
