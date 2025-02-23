@if ($project->diligences->isEmpty())
    <div class="d-flex flex-column align-items-center justify-content-center rounded-lg p-4" style="background-color: #F1F2F3">
        <svg xmlns="http://www.w3.org/2000/svg" height="100" viewBox="0 -960 960 960" width="100" fill="#888">
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Zm-40-60v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z"/>
        </svg>
        <div class="text-secondary text-center font-weight-medium mb-2">
            Ainda não existem diligências registradas para este artista!
        </div>  
        <button type="button" data-toggle="modal" data-target="#addDiligence" class="btn btn-primary rounded-lg font-weight-medium px-5">Nova Diligência</button>
    </div>
@else
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Diligências</h5>
        <button type="button" data-toggle="modal" data-target="#addDiligence" class="btn btn-primary rounded-lg font-weight-medium px-5">Nova Diligência</button>
    </div>
@endif

@foreach ($project->diligences as $diligence)
    <div class="d-md-flex justify-content-between align-items-center mb-2 px-3 py-2" style="background-color: #F5F6F8; border-radius: 10px;">
        <div class="d-flx align-items-center flex-column text-dark my-2">
            <div class="font-weight-semibold font-size-16">{{ $diligence->title }}</div>
            <div>Data de envio: {{ $diligence->created_at?->format('d/m/Y H:i') }}</div> 
            @if ($diligence->expired_at)
                <div>Data de expiração: {{ date('d/m/Y H:i', strtotime($diligence->expired_at)) }}</div>
            @endif
        </div>
        <div class="d-flex align-items-center my-2">
            <div class="btn d-flex align-items-center px-4 py-2 rounded-lg" style="{{ $diligence->status->getStylePublic() }}">
                <span class="font-weight-semibold font-size-15 mb-0" style="line-height: 0;">
                    {{ $diligence->status->getName() }}
                </span>
                {!! $diligence->status?->getIconPublic() !!}
            </div>
            <div class="d-flex align-items-center">
                <button data-toggle="modal" data-target="#showDiligence-{{ $diligence->id }}" class="btn btn-primary py-1 ml-1 px-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                    </svg>
                </button>
                {{-- @if ($project->identification_project_status?->value != '1' && $project->identification_project_status?->value != '2') --}}
                    <button type="button" data-target="#editDiligence-{{ $diligence->id }}" data-toggle="modal" class="btn btn-secondary ml-1 py-1 px-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFF">
                            <path d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z"/>
                        </svg>
                    </button>
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endforeach

{{-- NOVA DILIGENCIA --}}
<div class="modal fade" id="addDiligence" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('projects.tabs.diligence.store', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-body p-4">
                    <h4 class="text-primary font-weight-semibold">Nova Diligência</h4>

                    <div class="mb-3">
                        <label>Proponente <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->customer->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Título <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Conteúdo <span class="text-danger">*</span></label>
                        <textarea class="form-control rounded-lg" name="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Anexar documentos (PDF)</label>
                        <div data-js="container-diligences"></div>
                        <button type="button" onclick="addDiligenceAttachment()" class="d-flex align-items-center btn btn-light font-weight-medium rounded-lg pl-3 pr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                            <span class="ml-2">Adicionar aquivos</span>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label>Data limite <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_limit" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Hora limite <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="hour" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" data-dismiss="modal" class="btn btn-light text-primary px-5 font-weight-medium rounded-lg mr-2">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary px-4 font-weight-medium rounded-lg" onclick="loaderSaveDiligence(event)">
                            Enviar Mensagem
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- VISUALIZAR DILIGENCIAS --}}
@foreach ($project->diligences as $diligence)
    <div class="modal fade" id="showDiligence-{{ $diligence->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content px-3 pt-3 pb-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-dark font-weight-semibold mb-0">
                        {{ $diligence->title }}
                    </h4>
                    <button type="button" data-dismiss="modal" title="Fechar modal"
                        class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                        style="width: 20px !important; height: 20px !important; padding: 10px"
                    >
                        X
                    </button>
                </div>

                @foreach ($diligence->messages as $message)
                    <div class="border rounded-lg px-3 pt-3 pb-2 mb-3" style="background-color: #F5F6F8;">
                        @if ($message->sender_id->value == '1')
                            <div><span class="font-weight-semibold">De:</span> {{ $message->analyst->name }}</div>
                            <div><span class="font-weight-semibold">Para:</span> {{ $message->customer->name }}</div>
                        @else
                            <div><span class="font-weight-semibold">De:</span> {{ $message->customer->name }}</div>
                            <div><span class="font-weight-semibold">Para:</span> {{ $message->analyst->name }}</div>
                        @endif
                        <div><span class="font-weight-semibold">Enviado em:</span> {{ $message->registered_at->format('d/m/Y H:i') }}</div>
                        <hr>
                        {!! $message->content !!}
                        @foreach ($message->documents as $document)
                            <div class="d-flex align-items-center justify-content-between rounded-lg px-3 py-2" style="background-color: #e9ecef">
                                <a href="{{ asset("storage/{$document->path}") }}" target="_blank" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/pdf.webp') }}" width="20px" alt="Pdf">
                                    <span class="font-weight-medium ml-2" style="color: #e7252b">{{ $document->name }}</span> 
                                </a>
                                <a href="{{ asset("storage/{$document->path}") }}" download class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28">
                                        <path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q23-81 85.5-136T440-797v323l-64-62-56 56 160 160 160-160-56-56-64 62v-323q103 14 171.5 92.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H260Z"/>
                                    </svg>
                                    <span class="text-dark font-weight-medium ml-2">Baixar</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach

{{-- EDITAR DILIGENCIAS --}}
@foreach ($project->diligences as $diligence)
    <div class="modal fade" id="editDiligence-{{ $diligence->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('projects.tabs.diligence.update', [$project->id, $diligence->id]) }}" class="modal-content p-4" method="POST">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-dark font-weight-semibold mb-0">
                        Editar {{ $diligence->title }}
                    </h4>
                    <button type="button" data-dismiss="modal" title="Fechar modal"
                        class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                        style="width: 20px !important; height: 20px !important; padding: 10px"
                    >
                        X
                    </button>
                </div>

                <div class="mb-3">
                    <label class="text-dark">Proponente</label>
                    <input type="text" class="form-control bg-light rounded-lg" value="{{ $customer->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="text-dark">Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" onchange="changeStatusDiligence(this)" required>
                        <option value="">Selecione</option>
                        @foreach ($diligenceStatuses as $situation)
                            <option value="{{ $situation->value }}" @selected($diligence->status->value == $situation->value)>
                                {{ $situation->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="{{ $diligence->status->value == '0' || $diligence->status->value == '1' ? 'd-none' : 'd-block' }} mb-4" data-js="container-diligence-motive">
                    <label class="text-dark">Motivo <span class="text-danger">*</span></label>
                    <textarea name="motive" class="form-control rounded-lg" data-js="diligence-motive" rows="3">{{ $diligence->motive }}</textarea>
                </div>
                <button type="submit" class="w-100 btn btn-primary rounded-lg font-weight-medium px-5">Salvar</button>
            </form>
        </div>
    </div>
@endforeach
