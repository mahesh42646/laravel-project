@extends('layouts.super-admin.master-layouts')
@section('title') Editar notícia @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection
@section('css') <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css"> @endsection

@section('content')

    {{-- ALERTA --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('dash.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4 class="text-dark font-weight-bold mb-3">Editar notícia</h4>

                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="text-dark">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-lg" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Conteúdo <span class="text-danger">*</span></label>
                            <input id="x" type="hidden" name="content" value="{{ $post->content }}">
                            <trix-editor input="x"></trix-editor>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="text-dark">Status <span class="text-danger">*</span></label>
                            <select class="form-control rounded-lg" name="status" required>
                                <option value="">Selecione</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->value }}" 
                                        @selected(old('status', $post->status->value) == $status->value)
                                    >
                                        {{ $status->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Data e hora da publicação <span class="text-danger">*</span></label>
                            <div class="d-flex">
                                <input type="date" class="form-control rounded-lg" name="registered_at" value="{{ old('registered_at', $post->registered_at->format('Y-m-d')) }}" required>
                                <input type="time" class="form-control rounded-lg" name="hour" value="{{ old('hour', $post->registered_at->format('H:i')) }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Foto de capa</label>
                            <input type="file" class="form-control pl-0" name="image">
                        </div>
                        <div class="mb-3">
                            <img src="{{ $post->image_path }}" class="img-fluid" alt="Foto de capa">
                        </div>
                    </div>
                </div>

                <div class="d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-5" onclick="loader(this)">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <input type="hidden" data-attach-file-url value="{{ route('dash.posts.attach.file') }}">

@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script>
        function loader(button) {
            setTimeout(() => {
                button.disabled = true;
                button.innerHTML = (
                    `<span class="spinner-border spinner-border-sm" 
                        role="status" aria-hidden="true"></span>
                    Aguarde...`
                );
            }, 10);

            setTimeout(() => {
                button.disabled = false;
                button.innerText = 'Salvar';
            }, 6000);
        }

        (function() {
            const attachFileUrl = document.querySelector('[data-attach-file-url]');
            const csrfToken = document.querySelector('[name="_token"]');

            addEventListener('trix-attachment-add', function(event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment)
                }
            })

            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)

                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }

                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }

            function uploadFile(file, progressCallback, successCallback) {
                var key = createStorageKey(file)
                var formData = createFormData(key, file)
                var xhr = new XMLHttpRequest()

                xhr.open('POST', `${attachFileUrl.value}?_token=${csrfToken.value}`, true)

                xhr.upload.addEventListener('progress', function(event) {
                    var progress = event.loaded / event.total * 100
                    progressCallback(progress)
                })

                xhr.addEventListener('load', function(event) {
                    if (xhr.status == 200) {
                        const path = JSON.parse(xhr.response).url;
                        successCallback({
                            url: path,
                            href: `${path}?content-disposition=attachment`
                        })
                    }
                })

                xhr.send(formData)
            }

            function createStorageKey(file) {
                var date = new Date()
                var day = date.toISOString().slice(0,10)
                var name = date.getTime() + '-' + file.name
                return ['tmp', day, name].join('/')
            }

            function createFormData(key, file) {
                var data = new FormData()
                data.append('key', key)
                data.append('Content-Type', file.type)
                data.append('file', file)
                return data
            }
        })();

    </script>
@endsection
