@extends('layouts.master-layouts')
@section('title') Novo Projeto @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection

@section('content')

    {{-- BREADCRUMB --}}
    @component('components.breadcrumb')
        @slot('title') <span class="text-dark">Cadastrar Novo Projeto</span> @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') <a href="{{ route('projects.search.index') }}">Projetos</a> @endslot
        @slot('li_3') Novo Projeto @endslot
    @endcomponent

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- IDENTIFICACAO DO PROPONENTE --}}
        <div class="card p-4 rounded-lg shadow mb-4">
            <h5 class="text-primary font-weight-bold mb-4">IDENTIFICAÇÃO DO(A) PROPONENTE</h5>

            {{-- TIPO DE PESSOA --}}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="text-dark">Tipo <span class="text-danger">*</span></label>
                    <div class="d-flex align-items-center">
                        <div class="custom-control custom-radio mr-4">
                            <input type="radio" class="custom-control-input" name="type" id="pf" value="PF" onchange="changeType(this.value)">
                            <label class="custom-control-label" for="pf">Pessoa Física</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="type" id="pj" value="PJ" onchange="changeType(this.value)">
                            <label class="custom-control-label" for="pj">Pessoa Jurídica</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CAMPOS OCULTOS --}}
            <input type="hidden" name="customer_company_name">
            <input type="hidden" name="customer_cnpj">

            {{-- CNPJ E EMPRESA --}}
            <div class="row d-none" data-js="container-company">
                <div class="col-md-4 mb-3">
                    <label class="text-dark">CNPJ</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="company-cnpj" readonly>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="text-dark">Empresa</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="company-name" readonly>
                </div>
            </div>

            {{-- CPF, RG, NOME COMPLETO E GENERO --}}
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label class="text-dark">CPF <span class="text-danger">*</span></label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="cpf" readonly>
                    <input type="hidden" data-js="search-customer-cpf-url" value="{{ route('projects.search.customer.cpf') }}">
                    <input type="hidden" data-js="search-customer-cnpj-url" value="{{ route('projects.search.customer.cnpj') }}">
                    <input type="hidden" data-js="search-file-edital-url" value="{{ route('projects.search.file') }}">
                    <input type="hidden" name="customer_id">
                    <input type="hidden" data-js="type-people">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">RG</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="rg" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Nome Completo</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="name" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Gênero</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="gender" readonly>
                </div>
            </div>

            {{-- NOME SOCIAL, RACA, LGBT E ESCOLARIDADE --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Nome Social</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="name_social" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Raça</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="breed" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Você é LGBTQIAPN+?</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="is_lgbt" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Escolaridade</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="schooling" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Renda Individual</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="income" readonly>
                </div>
            </div>

            {{-- PRINCIPAL AREA DE ATUACAO, OUTRAS AREAS DE ATUACAO E COMUNIDADES TRADICIONAIS --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Principal área de Atuação</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="area_atuation" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Outras Áreas de Atuação</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="area_atuation_other" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Comunidades Tradicionais</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="community_traditional" readonly>
                </div>
            </div>

            {{-- CIDADE, ENDERECO, TELEFONE E EMAIL --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Cidade</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="city" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Endereço Completo</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="address" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">Telefone</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="phone" readonly>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="text-dark">E-mail</label>
                    <input type="text" class="form-control bg-light rounded-lg" data-js="email" readonly>
                </div>
            </div>
        </div>

        {{-- IDENTIFICACAO DO PROJETO --}}
        <div class="card p-4 rounded-lg shadow mb-4">
            <h5 class="text-primary font-weight-bold mb-4">IDENTIFICAÇÃO DO PROJETO</h5>

            {{-- NOME DO PROJETO E VALOR --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Nome do Projeto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-lg" name="name" placeholder="Ex: Fotografias do Sertão" required>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
                    <label class="text-dark">Valor do Projeto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-lg" name="price" placeholder="R$ 0,00" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-dark">Edital <span class="text-danger">*</span></label>
                    <select class="form-control rounded-lg" name="edital_id" onchange="changeEdital(this)" required>
                        <option value="">Selecione</option>
                        @foreach ($editals as $edital)
                            <option value="{{ $edital->id }}" @selected(old('edital_id') == $edital->id) data-edital-type-id="{{ $edital->type_id?->value }}">
                                {{ $edital->name ? $edital->name.' - ' : '' }} {{ $edital->vacancies }} vagas
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- EDITAL PREMIADO --}}
            <div class="d-none mb-3" data-js="container-edital-premiation">
                <label class="text-dark">Resumo da proposta <span class="text-danger">*</span></label>
                <textarea class="form-control rounded-lg" name="resume" data-js="resume-premiation" rows="3" required>{{ old('resume') }}</textarea>
            </div>

            {{-- EDITAL NORMAL --}}
            <div class="d-none" data-js="container-edital-default">

                {{-- RESUMO E DESCRICAO DA PROPOSTA --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Resumo da proposta</label>
                        <textarea class="form-control rounded-lg" name="resume" data-js="resume-default" rows="2">{{ old('resume') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Descrição da proposta</label>
                        <textarea class="form-control rounded-lg" name="description" rows="2">{{ old('description') }}</textarea>
                    </div>
                </div>

                 {{-- OBJETIVOS E JUSTIFICATIVA --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Objetivos e metas</label>
                        <textarea class="form-control rounded-lg" name="objectives" rows="2">{{ old('objectives') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Justificativa</label>
                        <textarea class="form-control rounded-lg" name="justification" rows="2">{{ old('justification') }}</textarea>
                    </div>
                </div>

                {{-- PUBLICO ALVO E CRONOGRAMA --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Público-alvo</label>
                        <textarea class="form-control rounded-lg" name="target" rows="2">{{ old('target') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Cronograma de execução</label>
                        <textarea class="form-control rounded-lg" name="cronogram" rows="2">{{ old('cronogram') }}</textarea>
                    </div>
                </div>

                {{-- MEDIDAS DE ACESSIBILIDADE E PLANO DE DIVULGACAO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Medidas de acessibilidade</label>
                        <textarea class="form-control rounded-lg" name="accessibility" rows="2">{{ old('accessibility') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Plano de divulgação</label>
                        <textarea class="form-control rounded-lg" name="plan" rows="2">{{ old('plan') }}</textarea>
                    </div>
                </div>

                {{-- CONTRAPARTIDA SOCIAL E LOCAIS PREVISTOS PARA ACAO CULTURAL --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Contrapartida social</label>
                        <textarea class="form-control rounded-lg" name="contra_partid_social" rows="2">{{ old('contra_partid_social') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Locais previstos para realização da ação cultural</label>
                        <textarea class="form-control rounded-lg" name="locals" rows="2">{{ old('locals') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- ARQUIVOS --}}
        <div data-js="container-files"></div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary rounded-lg font-weight-semibold px-5 py-2 mb-3"
                onclick="loader(event)"
            >
                Salvar
            </button>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/projects/script.js') }}"></script>
@endsection
