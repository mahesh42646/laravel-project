@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="row">
        <div class="card col-xl-12">
            <div class="card-body">
                <h4 class="text-dark text-center font-weight-bold mb-3">{{ $project->name }}</h4>
                @forelse ($notifications as $notification)
                    <div class="d-flex align-items-center text-dark rounded-lg mb-3 p-2" style="{{ $notification->type_id?->getStyle() }}">
                        <span class="mr-3">{!! $notification->type_id?->getIcon() !!}</span> <span>{!! $notification->title !!}</span>
                    </div>
                @empty
                    <div class="d-flex flex-column align-items-center justity-content-center bg-light p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="90" viewBox="0 -960 960 960" width="90" class="mb-2" fill="#555">
                            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM80-560q0-100 44.5-183.5T244-882l47 64q-60 44-95.5 111T160-560H80Zm720 0q0-80-35.5-147T669-818l47-64q75 55 119.5 138.5T880-560h-80Z"/>
                        </svg>
                        <div class="font-weight-bold text-dark font-size-22 mb-0">Nenhuma Notificação!</div>
                        <div class="text-secondary text-center font-size-15">Ainda não existem notificações para este projeto!</div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('public.panel.project.show', [$token, base64_encode($project->id)]) }}" class="btn btn-dark px-5 rounded-lg font-weight-medium">Ver andamento do projeto</a>
            </div>
        </div>
    </div>
@endsection
