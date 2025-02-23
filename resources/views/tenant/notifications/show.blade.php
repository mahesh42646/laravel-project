@extends('layouts.master-layouts')
@section('title') Ver notificação @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    <div class="row">
        <div class="card col-xl-12">
            <div class="card-body text-dark">
                
                <div class="d-md-flex align-items-md-center notification-item">
                    <div class="col-md-1 text-center mb-2">
                        <img src="{{ $notification->from_customer->avatar }}" class="mr-3 rounded-circle avatar-md" alt="artista">
                    </div>
                    <div class="col-md-10 mb-2">
                        <h6 class="mb-0">{!! $notification->title !!}</h6>
                        <div class="font-sixe-12"><strong>Projeto:</strong> {{ $notification->project->name }}</div>
                        <div class="font-size-12">
                            <i class="mdi mdi-clock-outline mr-2"></i>{{ $notification->created_at?->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    <div class="col-md-1 px-0 mb-2">
                        <a href="{{ route('projects.edit', $notification->project_id) }}" class="w-100 btn btn-dark rounded-lg font-weight-medium px-3">Revisar</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
