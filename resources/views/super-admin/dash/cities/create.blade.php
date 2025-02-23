@extends('layouts.super-admin.master-layouts')
@section('title') Cadastrar Cidade @endsection
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

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('dash.cities.store') }}" method="POST">
                @csrf

                <h4 class="text-dark font-weight-bold mb-3">Nova Cidade</h4>

                {{-- NOME E ESTADO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="name" value="{{ old('name') }}" 
                            placeholder="Digite o nome da cidade" required
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Estado <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="uf_id" required>
                            <option value="">Selecione</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->value }}" 
                                    @selected(old('uf_id') == $state->value)
                                >
                                    {{ $state->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- DESCRICAO --}}
                <div class="mb-3">
                    <label class="text-dark">Descrição</label>
                    <textarea class="form-control rounded-lg" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-5" onclick="loader(this)">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
    </script>
@endsection
