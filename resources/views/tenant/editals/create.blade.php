<x-layout.panel>

    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('editals.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Criar edital</h3>
    </div>

    <form action="{{ route('editals.store') }}" method="POST" class="card border p-3" enctype="multipart/form-data">
        @csrf

        {{-- IMAGEM DE CABECALHO E RODAPE --}}
        <div class="d-md-flex">
            <div class="col-md-2 p-2">
                <div style="border: 1px dashed #CCC; border-radius: 10px;" title="Imagem de cabeçalho">
                    <img src="{{ asset('images/brasao.webp') }}" type="button" class="img-fluid" style="height: 100px;"
                        width="100%" alt="brasao" data-image-logo
                    >
                    <input type="file" name="logo" class="d-none" data-file-logo>
                </div>
            </div>
            <div class="col-md-10 d-flex justify-content-center align-items-center">
                <div class="col-md-12 d-flex align-items-center justify-content-center" title="Imagem do tipo banner" style="height: 100px; border: 1px dashed #CCC;border-radius: 10px;">
                    <img src="{{ asset('images/rodape.webp') }}" type="button" class="img-fluid" style="height: 70px;"
                        width="60%" height="70px" alt="rodape" data-image-banner
                    >
                    <input type="file" name="banner" class="d-none" data-file-banner>
                </div>
            </div>
        </div>
        <hr class="py-0" style="margin: 0px 10px 10px 5px;">

        {{-- TIPO E NOME DO EDITAL --}}
        <div class="d-md-flex">
            <div class="col-md-2 mb-3">
                <label class="control-label text-dark">Tipo de edital <span class="text-danger">*</span></label>
                <select class="form-control rounded-lg" name="type_id" required>
                    <option value="">Selecione</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" 
                            @selected(old('type_id') == $type->value)
                        >
                            {{ $type->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-10 mb-3">
                <label class="control-label text-dark">Nome do Edital (Projeto) <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-uppercase rounded-lg" name="name" value="{{ old('name') }}" required>
            </div>
        </div>
                 
        {{-- VALOR DO PROJETO, NUMERO DE VAGAS, DATA DE ABERTURA, HORA DE ABERTURA, DATA DE ENCERRAMENTO E HORA DE ENCERRAMENTO --}}
        <div class="d-md-flex">
            <div class="col-md-2 mb-3">
                <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
                <label class="control-label text-dark">Valor do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg" name="price" value="{{ old('price') }}" placeholder="R$ 0,00" required>
            </div>
            <div class="col-md-2 mb-3">
                <label class="control-label text-dark">Nº de Vagas <span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control rounded-lg" name="vacancies" value="{{ old('vacancies') }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Data de Abertura <span class="text-danger">*</span></label>
                <input type="date" class="form-control rounded-lg" name="open_at" value="{{ old('open_at') }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Hora de Abertura <span class="text-danger">*</span></label>
                <input type="time" class="form-control rounded-lg" name="horary_open_at" value="{{ old('horary_open_at') }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Data de Encerramento <span class="text-danger">*</span></label>
                <input type="date" class="form-control rounded-lg" name="closed_at" value="{{ old('closed_at') }}" required>  
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Hora de Encerramento <span class="text-danger">*</span></label>
                <input type="time" class="form-control rounded-lg" name="horary_closed_at" value="{{ old('horary_closed_at') }}" required>
            </div>
        </div>
                        
        {{-- TIPO DE PARTICIPACAO E SE O EDITAL POSSUI COTAS --}}
        <div class="d-md-flex">
            <div class="col-md-6 mb-3">
                <label class="control-label text-dark">Tipo de Participação <span class="text-danger">*</span></label>
                <div class="form-control border-0 pl-0 d-flex flex-wrap align-items-center">
                    @foreach ($peopleTypes as $peopleType)
                        <div class="custom-control custom-checkbox mb-0 pr-3">
                            <input type="checkbox" class="custom-control-input" value="{{ $peopleType->id }}"
                                name="people_types[]" id="people-type-{{ $peopleType->id }}"
                                onchange="changeTypePeople(this, '{{ $peopleType->name }}')"
                            >
                            <label class="custom-control-label" for="people-type-{{ $peopleType->id }}">
                                {{ $peopleType->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label text-dark">O edital possui cotas? <span class="text-danger">*</span></label>
                <div class="form-control border-0 pl-0 d-flex flex-wrap align-items-center">
                    @foreach ($quotas as $quota)
                        <div class="custom-control custom-checkbox mb-0 pr-3">
                            <input type="checkbox" class="custom-control-input" value="{{ $quota->id }}" 
                                name="quotas[]" id="quota-{{ $quota->id }}"
                            >
                            <label class="custom-control-label" for="quota-{{ $quota->id }}">
                                {{ $quota->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- IDENTIFICACAO DO PROJETO E PERMISSAO DE INSCRICAO --}}
        <div class="d-md-flex">
            <div class="col-md-6 mb-3">
                <label class="control-label text-dark">Identificação do projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg bg-light" value="Informar campos obrigatórios e opcionais"
                    data-target="#openModalIdentificationProject" data-toggle="modal" style="cursor: pointer;" readonly
                >
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label text-dark">Permissão de inscrição <span class="text-danger">*</span></label>
                <select class="form-control rounded-lg" name="register_type_id" required>
                    <option value="">Selecione</option>
                    @foreach ($registerTypes as $registerType)
                        <option value="{{ $registerType->value }}" 
                            @selected(old('register_type_id') == $registerType->value)
                        >
                            {{ $registerType->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- DESCRICAO DO EDITAL --}}
        <div class="d-md-flex">
            <div class="col-md-12 mb-3">
                <label class="control-label text-dark">Descrição do edital</label>
                <textarea class="form-control rounded-lg" name="observation" rows="3">{{ old('observation') }}</textarea>
            </div>
        </div>
        <div class="d-md-flex">
            <div class="col-md-12">
                <hr class="py-0" style="margin: 0px 0px 20px 0px;">
            </div>
        </div>

        {{-- TIPOS DE DOCUMENTACOES --}}
        @foreach ($documentTypes as $peopleTypeName => $documents)
            <div class="d-none" data-people-type-name="{{ $peopleTypeName }}">
                <div class="d-md-flex mb-2">
                    <div class="col-md-12 accordion" id="accordion-{{ str_replace(' ', '', $peopleTypeName) }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button type="button" class="d-flex justify-content-between align-items-center w-100 accordion-button font-size-18 font-weight-bold px-3 py-1"
                                    data-toggle="collapse" data-target="#collapse-{{ str_replace(' ', '', $peopleTypeName) }}" aria-expanded="true"
                                    style="border: 0; border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #ffebb3;"
                                >
                                    <span data-label-document-type>DOCUMENTAÇÃO {{ $peopleTypeName }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                        <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm45.66-109.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32,0l-40-40a8,8,0,0,1,11.32-11.32L128,140.69l34.34-34.35A8,8,0,0,1,173.66,106.34Z"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="collapse-{{ str_replace(' ', '', $peopleTypeName) }}" class="accordion-collapse collapse show" data-parent="#accordion-{{ str_replace(' ', '', $peopleTypeName) }}">
                                <div class="accordion-body font-size-12">
                                    <div class="d-flex flex-wrap border-0 pl-0 d-flex align-items-center">
                                        @foreach ($documents as $document)
                                            <div class="col-md-6 d-flex mb-1 custom-control custom-checkbox mb-1 px-0 pb-1 border-bottom">
                                                <div class="col-6 pl-2">
                                                    <label>{{ $document->name }}</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="checkbox" class="custom-control-input" value="{{ $document->id }}" 
                                                        name="documentation_type_requireds[]" id="required-{{ $document->id }}"
                                                        onchange="toggleDocumentationRequired(this, 'optional-{{ $document->id }}')"
                                                    >
                                                    <label class="custom-control-label" for="required-{{ $document->id }}">Obrigatório</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="checkbox" class="custom-control-input" value="{{ $document->id }}" 
                                                        name="documentation_type_optionals[]" id="optional-{{ $document->id }}"
                                                        onchange="toggleDocumentationOptional(this, 'required-{{ $document->id }}')"
                                                    >
                                                    <label class="custom-control-label" for="optional-{{ $document->id }}">Opcional</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- ANEXOS --}}
        <div class="row card px-4">           
            <h4 class="text-primary font-weight-semibold mb-2">Anexos</h4>
            <div class="d-md-flex flex-wrap" data-container-attachments></div>
            <div class="d-md-flex">
                <div class="col-md-5 pl-md-0 pl-0 mb-3">
                    <label class="form-label">Nome do arquivo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-uppercase rounded-lg" data-file-name>
                </div>
                <div class="col-md-7 pl-0 mb-3">
                    <label class="invisible mb-0">Arquivo</label>
                    <div class="form-control border-0 p-0">
                        <button type="button" class="d-flex align-items-center waves-effect btn px-3" 
                            style="background-color: #b9bfc8" data-button-attachment
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000">
                                <path d="M450-180H260q-82.92 0-141.46-57.62Q60-295.23 60-378.15q0-73.39 47-130.54 47-57.16 119.92-67.62Q246.15-666 317.12-723q70.96-57 162.88-57 108.54 0 184.27 75.73T740-520v20h12.31q63.23 4.92 105.46 50.85Q900-403.23 900-340q0 66.92-46.54 113.46Q806.92-180 740-180H510v-291.39l74 72.77 42.15-41.76L480-586.54 333.85-440.38 376-398.62l74-72.77V-180Z"/>
                            </svg>
                            <span class="ml-2">Escolher arquivo</span>
                        </button>
                    </div>
                    <input type="file" class="d-none" accept=".pdf" onchange="showAttachment(this)" data-file-attachment>
                </div>
            </div>
        </div>

        {{-- MODAL DE SELECIONAR OS CAMPOS DE IDENTIFICACAO DO PROJETO --}}
        <div class="modal fade" id="openModalIdentificationProject">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border: 1px solid transparent;">
                    <div class="p-3" style="background-color: #dcdfe4; border-top-right-radius: 22px; border-top-left-radius: 22px;">
                        <h5 class="font-weight-bold text-dark mb-0">INFORMAR CAMPOS OBRIGATÓRIOS E OPCIONAIS NA IDENTIFICAÇÃO DO PROJETO</h5>
                    </div>
                       
                    <div class="text-dark p-4">
                        @foreach ($identifications as $identification)
                            <div class="d-flex justify-content-between">
                                <div class="font-weight-medium">{{ $identification->name }}</div>
                                <div class="d-flex">
                                    <div class="custom-control custom-checkbox mb-0 pr-md-5 pr-3">
                                        <input type="checkbox" class="custom-control-input" value="{{ $identification->id }}" 
                                            name="identification_requireds[]" id="identification-required-{{ $identification->id }}"
                                            onchange="toggleFieldIdentificationRequired(this, 'identification-optional-{{ $identification->id }}')"
                                        >
                                        <label class="custom-control-label" for="identification-required-{{ $identification->id }}">
                                            Obrigatório
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-0 pr-md-4">
                                        <input type="checkbox" class="custom-control-input" value="{{ $identification->id }}" 
                                            name="identification_optionals[]" id="identification-optional-{{ $identification->id }}"
                                            onchange="toggleFieldIdentificationOptional(this, 'identification-required-{{ $identification->id }}')"
                                        >
                                        <label class="custom-control-label" for="identification-optional-{{ $identification->id }}">
                                            Opcional
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-1">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTAO DE SALVAR --}}
        <div class="d-md-flex justify-content-md-end align-items-md-center mt-3 pl-2 pr-md-2">
            <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-4 py-2" onclick="save(event)">
                Criar edital
            </button>
        </div>
    </form>
    
    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
        <script type="module" src="{{ asset('js/tenant/edital/script.js') }}"></script>
    </x-slot:scripts>

</x-layout.panel>
