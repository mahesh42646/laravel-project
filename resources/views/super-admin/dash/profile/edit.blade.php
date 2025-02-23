@extends('layouts.super-admin.master-layouts')
@section('title') Atualizar Dados do Perfil @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    @if (session()->has('success'))
        <div class="alert text-dark alert-success alert-dismissible fade show" role="alert">
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
                    <form action="{{ route('dash.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">Nome <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-lg text-uppercase" name="name" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">RG</label>
                                        <input type="text" class="form-control rounded-lg" name="rg" value="{{ old('rg', $user->rg) }}">
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">E-mail <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control rounded-lg text-lowercase" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark">Nº de Contato</label>
                                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ old('phone', $user->phone) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class="text-dark">Foto do Perfil</label>
                                        <img src="{{ $user->avatar }}" id="profile_display" onclick="triggerClick()"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Clique para fazer upload da foto do perfil" style="width: 100px"
                                        />
                                        <input type="file" class="form-control" name="profile_photo_update" id="profile_photo" 
                                            style="display:none;" onchange="displayProfile(this)"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary font-weight-medium rounded-lg px-3">
                                    Atualizar Detalhes
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
    <script src="{{ asset('assets/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        const phones = [{ "mask": "(##) # ####-####"}, { "mask": "(##) # ####-####"}];
        $('[name="phone"]').inputmask({ 
            mask: phones, 
            greedy: false, 
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
        });

        // profile photo
        function triggerClick() {
            document.querySelector('#profile_photo').click();
        }

        function displayProfile(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profile_display').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
@endsection
