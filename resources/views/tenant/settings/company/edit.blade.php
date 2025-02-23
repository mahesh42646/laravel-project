@extends('layouts.master-layouts')
@section('title') Atualizar Dados da Empresa @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('title') Atualizar Dados da Empresa @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Atualizar @endslot
    @endcomponent

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('success') }}
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update', 1) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">Nome da Empresa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-lg" name="name" value="{{ old('name', $setting->name) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">CNPJ</label>
                                        <input type="text" class="form-control rounded-lg" name="cnpj" value="{{ old('cnpj', $setting->cnpj) }}">
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">CPF do Responsável</label>
                                        <input type="text" class="form-control rounded-lg" name="cpf" value="{{ old('cpf', $setting->cpf) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">Nº de Contato</label>
                                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ old('phone', $setting->phone) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="font-weight-semibold text-dark mb-2">Logomarca da Empresa</div>
                                        <img src="{{ $setting->logo_path }}" id="logo" onclick="triggerClick()"
                                            data-toggle="tooltip" data-placement="top" style="width: 100px"
                                            title="Clique para fazer upload da logomarca da empresa" 
                                        />
                                        <input type="file" class="form-control" name="logo" id="profile_photo" 
                                            style="display:none;" onchange="displayLogo(this)"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary font-weight-medium rounded-lg px-3">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section('script')
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        const phones = [{ "mask": "(##) # ####-####"}, { "mask": "(##) # ####-####"}];
        $('[name="phone"]').inputmask({ 
            mask: phones, 
            greedy: false, 
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
        });

        const cpf = [{ "mask": "###.###.###-##"}];
        $('[name="cpf"]').inputmask({ 
            mask: cpf, 
            greedy: false, 
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
        });

        const cnpj = [{ "mask": "##.###.###/####-##"}];
        $('[name="cnpj"]').inputmask({ 
            mask: cnpj, 
            greedy: false, 
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
        });

        // profile photo
        function triggerClick() {
            document.querySelector('#profile_photo').click();
        }

        function displayLogo(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#logo').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
@endsection
