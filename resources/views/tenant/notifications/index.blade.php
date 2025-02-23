<x-layout.panel>

    <div class="d-flex flex-column align-items-center justity-content-center bg-light p-3 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" height="90" viewBox="0 -960 960 960" width="90" class="mb-2" fill="#555">
            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM80-560q0-100 44.5-183.5T244-882l47 64q-60 44-95.5 111T160-560H80Zm720 0q0-80-35.5-147T669-818l47-64q75 55 119.5 138.5T880-560h-80Z"/>
        </svg>
        <div class="font-weight-bold text-dark font-size-22 mb-0">Nenhuma Notificação!</div>
        <div class="text-secondary text-center font-size-15">Ainda não existem notificações para sua plataforma!</div>
    </div>

    {{-- <div class="row">
        <div class="card col-xl-12">
            <div class="card-body text-dark">
                @forelse ($alerts as $alert)
                    <div class="d-md-flex align-items-md-center notification-item">
                        <div class="col-md-1 text-center mb-2">
                            <img src="{{ $alert->avatar }}" class="mr-3 rounded-circle avatar-md" alt="artista">
                        </div>
                        
                        <div class="col-md-10 mb-2">
                            <h6 class="mb-0">{!! $alert->title !!}</h6>
                            <div class="font-sixe-12"><strong>Projeto:</strong> {{ $alert->project->name }}</div>
                            <div class="font-size-12">
                                <i class="mdi mdi-clock-outline mr-2"></i>{{ $alert->created_at }}
                            </div>
                        </div>

                        <div class="col-md-1 px-0 mb-2">
                            <a href="{{ route('projects.edit', $alert->project->id) }}" class="w-100 btn btn-dark rounded-lg font-weight-medium px-3">Revisar</a>
                        </div>
                    </div>
                @empty
                    <div class="d-flex flex-column align-items-center justity-content-center bg-light p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="90" viewBox="0 -960 960 960" width="90" class="mb-2" fill="#555">
                            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM80-560q0-100 44.5-183.5T244-882l47 64q-60 44-95.5 111T160-560H80Zm720 0q0-80-35.5-147T669-818l47-64q75 55 119.5 138.5T880-560h-80Z"/>
                        </svg>
                        <div class="font-weight-bold text-dark font-size-22 mb-0">Nenhuma Notificação!</div>
                        <div class="text-secondary text-center font-size-15">Ainda não existem notificações para sua plataforma!</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div> --}}

    <x-slot:scripts>
        <script src="{{ asset('assets/js/pages/notification.init.js') }}"></script>
    </x-slot:scripts>

</x-layout.panel>
