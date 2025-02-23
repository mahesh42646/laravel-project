@extends('layouts.customers.master')
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card d-flex p-4">

        @if ($document->status->value == '3' && ! $expired)
            <div class="alert alert-warning text-dark d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
                </svg>
                <strong class="px-2">Atenção!</strong> Existem pendências relacionadas a este arquivo! Você tem até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($document->expired_at)) }}</strong> para resolver as pendências!
            </div>  
            <div class="alert alert-info rounded-lg mb-3">
                <div class="d-flex align-items-center justify-content-between text-dark mb-0">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>
                        <h6 class="ml-2 mb-0">Envie o arquivo (PDF) novamente para que o analista realize uma nova verificação!</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if ($document->status->value == '3' && $expired)
            <div class="alert alert-warning text-dark d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M74.62-140 480-840l405.38 700H74.62ZM480-247.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200Z"/>
                </svg>
                <strong class="px-2">Atenção!</strong> Não é possível realizar novas modificações! Você teve até o dia <strong class="px-2">{{ date('d/m/Y H:i', strtotime($document->expired_at)) }}</strong> para resolver as pendências!
            </div>   
        @endif

        <h3 class="font-weight-bold text-primary mb-3">Arquivo</h3>

        <form action="{{ route('public.panel.project.document.update', [$token, $project->id, $document->id]) }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            @method('PUT')

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="text-dark">Tipo</label>
                    <input type="text" class="form-control rounded-lg" readonly
                        value="{{ $document->document_id?->getName() }}"
                    >
                </div>
                <div class="mb-3">
                    <label class="text-dark">Status</label>
                    <input type="text" class="form-control rounded-lg" readonly
                        value="{{ $document->status?->getName() }}"
                    >
                </div>
                @if ($document->motive)
                    <div class="mb-3">
                        <label class="text-dark">Motivo</label>
                        <textarea class="form-control bg-lgiht rounded-lg" rows="3" readonly>{{ $document->motive }}</textarea>
                    </div>
                @endif
                @if ($document->updated_at)
                    <div class="mb-3">
                        <label class="text-dark">Última atualização</label>
                        <input type="text" class="form-control rounded-lg" value="{{ date('d/m/Y H:i:s', strtotime($document->updated_at)) }}" readonly>
                    </div>
                @endif
                @if ($document->status->value != '1' && ! $expired)
                    <div class="mb-3">
                        <label class="text-dark">Selecionar novo arquivo</label>
                        <div>
                            <input type="file" class="d-none" accept=".pdf" name="document" onchange="displayFile(this)">
                            <div class="d-flex justify-content-center align-items-center bg-light px-4 py-2" title="Carregar arquivo"
                                style="border: 1px dashed #8a8a8a; border-radius: 10px; cursor: pointer;" onclick="triggerClick()"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28" fill="var(--dark)">
                                    <path d="M440-160H260q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H520v-286l64 62 56-56-160-160-160 160 56 56 64-62v286Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-block btn-primary px-5 rounded-lg font-weight-semibold" onclick="loader(event)">Carregar</button>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center align-items-center border rounded-lg shadow-sm col-md-8">
                @if ($document->path)
                    <iframe data-js="container-new-document" src="{{ asset("storage/{$document->path}") }}" width="100%" height="100%"></iframe>
                @else
                    <iframe data-js="container-new-document" class="d-none" src="" width="100%" height="100%"></iframe>
                    <div class="d-flex flex-column align-items-center justify-content-center" data-js="container-document-empty">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="150" viewBox="0 -960 960 960" width="150" fill="#DCDFE4">
                                <path d="M360-460h40v-80h40q17 0 28.5-11.5T480-580v-40q0-17-11.5-28.5T440-660h-80v200Zm40-120v-40h40v40h-40Zm120 120h80q17 0 28.5-11.5T640-500v-120q0-17-11.5-28.5T600-660h-80v200Zm40-40v-120h40v120h-40Zm120 40h40v-80h40v-40h-40v-40h40v-40h-80v200ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Z"/>
                            </svg>
                        </div>
                        <div class="text-secondary font-weight-semibold font-size-18">Nenhum documento foi enviado!</div>
                    </div>
                @endif
            </div>
        </form>

        {{-- BOTAO DE VOLTAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
            <a href="{{ route('public.panel.project.show', [$token, base64_encode($project->id)]) }}" class="btn bg-white border-primary text-primary rounded-lg waves-effect mb-0 px-5">
                Voltar
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        const fileName = document.querySelector('[name="document"]');

        function triggerClick() {
            if (fileName) {
                fileName.click();
            }
        }

        function displayFile(element) {
            const containerNewDocument = document.querySelector('[data-js="container-new-document"]');
            const containerDocumentEmpty = document.querySelector('[data-js="container-document-empty"]');

            if (element.files[0]) {
                const reader = new FileReader();
                reader.onload = function(element) {
                    if (containerDocumentEmpty) {
                        containerDocumentEmpty.classList.remove('d-flex');
                        containerDocumentEmpty.classList.add ('d-none');
                    }
                    
                    if (containerNewDocument.classList.contains('d-none')) {
                        containerNewDocument.classList.remove('d-none');
                    }

                    containerNewDocument.src = element.target.result;
                }

                reader.readAsDataURL(element.files[0]);
            }
        }

        function loader(event) {
            if (fileName.value == '') {
                event.preventDefault();

                return Swal.fire({
                    iconColor: 'var(--blue)',
                    icon:  'info',
                    title: '<span style="color: var(--blue)">Arquivo obrigatório!</span>',
                    html: `Selecione o arquivo que deseja enviar!`,
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: { htmlContainer: 'mt-1' }
                });
            }

            setTimeout(() => {
                event.target.disabled = true;
                event.target.innerHTML = (
                    `<span class="spinner-border spinner-border-sm" 
                        role="status" aria-hidden="true"></span>
                    Aguarde...`
                );
            }, 10);

            setTimeout(() => {
                event.target.disabled = false;
                event.target.innerText = 'Salvar';
            }, 6000);
        }
    </script>
@endsection