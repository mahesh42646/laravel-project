<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('editals.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Editar dados do edital</h3>
    </div>

    <form action="{{ route('editals.update', $edital->id) }}" method="POST" class="card border p-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- IMAGEM DE CABECALHO E RODAPE --}}
        <div class="d-md-flex">
            <div class="col-md-2 p-2" >
                <div style="border: 1px dashed #CCC; border-radius: 10px;" title="Imagem de cabeçalho">
                    <img src="{{ $edital->photo_path }}" type="button" class="img-fluid" style="height: 100px;"
                        width="100%" alt="brasao" onclick="triggerLogo()" data-image-logo
                    >
                    <input type="file" name="logo" data-file-logo class="d-none" accept="image/*" onchange="showLogo(this)">
                </div>
            </div>
            <div class="col-md-10 d-flex justify-content-center align-items-center">
                <div class="col-md-12 d-flex align-items-center justify-content-center" title="Imagem do tipo banner" style="height: 100px; border: 1px dashed #CCC;border-radius: 10px;">
                    <img src="{{ $edital->banner_path }}" type="button" class="img-fluid" style="height: 70px;"
                        width="60%" height="70px" alt="rodape" onclick="triggerBanner()" data-image-banner
                    >
                    <input type="file" name="banner" data-file-banner class="d-none" accept="image/*" onchange="showBanner(this)">
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
                            @selected($edital->type_id === $type)
                        >
                            {{ $type->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-10 mb-3">
                <label class="control-label text-dark">Nome do Edital (Projeto) <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-uppercase rounded-lg" name="name" value="{{ $edital->name }}" required>
            </div>
        </div>
                 
        {{-- VALOR DO PROJETO, NUMERO DE VAGAS, DATA DE ABERTURA, HORA DE ABERTURA, DATA DE ENCERRAMENTO E HORA DE ENCERRAMENTO --}}
        <div class="d-md-flex">
            <div class="col-md-2 mb-3">
                <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
                <label class="control-label text-dark">Valor do Projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg" name="price" value="{{ number_format($edital->price, 2, ',', '.') }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label class="control-label text-dark">Nº de Vagas <span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control rounded-lg" name="vacancies" value="{{ $edital->vacancies }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Data de Abertura <span class="text-danger">*</span></label>
                <input type="date" class="form-control rounded-lg" name="open_at" value="{{ $edital->open_at->format('Y-m-d') }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Hora de Abertura <span class="text-danger">*</span></label>
                <input type="time" class="form-control rounded-lg" name="horary_open_at" value="{{ $edital->horary_open_at }}" required>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Data de Encerramento <span class="text-danger">*</span></label>
                <input type="date" class="form-control rounded-lg" name="closed_at" value="{{ $edital->closed_at->format('Y-m-d') }}" required>  
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Hora de Encerramento <span class="text-danger">*</span></label>
                <input type="time" class="form-control rounded-lg" name="horary_closed_at" value="{{ $edital->horary_closed_at }}" required>
            </div>
        </div>
                        
        {{-- TIPO DE PARTICIPACAO E SE O EDITAL POSSUI COTAS --}}
        <div class="d-md-flex">
            <div class="col-md-6 mb-3">
                <label class="control-label text-dark">Tipo de Participação <span class="text-danger">*</span></label>
                <div class="form-control border-0 pl-0 d-flex align-items-center">
                    @foreach ($peopleTypes as $peopleType)
                        <div class="custom-control custom-checkbox mb-0 pr-3">
                            <input type="checkbox" class="custom-control-input" value="{{ $peopleType->id }}"
                                name="people_types[]" id="people-type-{{ $peopleType->id }}"
                                onchange="changeTypePeople(this, '{{ $peopleType->name }}')"
                                @checked($edital->peoples_types->contains('id', $peopleType->id))
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
                <div class="form-control border-0 pl-0 d-flex align-items-center">
                    @foreach ($quotas as $quota)
                        <div class="custom-control custom-checkbox mb-0 pr-3">
                            <input type="checkbox" class="custom-control-input" value="{{ $quota->id }}" 
                                name="quotas[]" id="quota-{{ $quota->id }}"
                                @checked($edital->quotas->contains('id', $quota->id))
                            >
                            <label class="custom-control-label" for="quota-{{ $quota->id }}">
                                {{ $quota->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- IDENTIFICACAO DO PROJETO, PERMISSAO DE INSCRICAO, STATUS E PERIODO DE PRORROGACAO DO EDITAL  --}}
        <div class="d-md-flex">
            <div class="col-md-3 mb-3">
                <label class="control-label text-dark">Identificação do projeto <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-lg bg-light" value="Informar campos obrigatórios e opcionais"
                    data-target="#openModalIdentificationProject" data-toggle="modal" style="cursor: pointer;" readonly
                >
            </div>
            <div class="col-md-3 mb-3">
                <label class="control-label text-dark">Permissão de inscrição <span class="text-danger">*</span></label>
                <select class="form-control rounded-lg" name="register_type_id" required>
                    <option value="">Selecione</option>
                    @foreach ($registerTypes as $registerType)
                        <option value="{{ $registerType->value }}" 
                            @selected($edital->register_type_id === $registerType)
                        >
                            {{ $registerType->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Status <span class="text-danger">*</span></label>
                <select class="form-control rounded-lg" name="status" required>
                    <option value="">Selecione</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" 
                            @selected($edital->status === $status)
                        >
                            {{ $status->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Prorrogar edital</label>
                <input type="date" class="form-control rounded-lg" name="extended_at" value="{{ $edital->extended_at?->format('Y-m-d') }}">  
            </div>
            <div class="col-md-2 pl-md-1 mb-3">
                <label class="control-label text-dark">Hora</label>
                <input type="time" class="form-control rounded-lg" name="horary_extended_at" value="{{ $edital->horary_extended_at }}">
            </div>
        </div>

        {{-- DESCRICAO DO EDITAL --}}
        <div class="d-md-flex">
            <div class="col-md-12 mb-3">
                <label class="control-label text-dark">Descrição do edital</label>
                <textarea class="form-control rounded-lg" name="observation" rows="3">{{ $edital->observation }}</textarea>
            </div>
        </div>
        <div class="d-md-flex">
            <div class="col-md-12">
                <hr class="py-0" style="margin: 0px 0px 20px 0px;">
            </div>
        </div>

        {{-- TIPOS DE DOCUMENTACOES --}}
        @foreach ($documentTypes as $peopleTypeName => $documents)
            <div class="d-{{ in_array($peopleTypeName, $documentNames) ? '' : 'none' }}" data-people-type-name="{{ $peopleTypeName }}">
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
                                                        @checked(
                                                            in_array($document->id, $edital->documents->pluck('document_id')->toArray()) &&
                                                            $edital->documents->firstWhere('document_id', $document->id)->is_required
                                                        )
                                                    >
                                                    <label class="custom-control-label" for="required-{{ $document->id }}">Obrigatório</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="checkbox" class="custom-control-input" value="{{ $document->id }}" 
                                                        name="documentation_type_optionals[]" id="optional-{{ $document->id }}"
                                                        onchange="toggleDocumentationOptional(this, 'required-{{ $document->id }}')"
                                                        @checked(
                                                            in_array($document->id, $edital->documents->pluck('document_id')->toArray()) &&
                                                            ! $edital->documents->firstWhere('document_id', $document->id)->is_required
                                                        )
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
        <div class="d-flex">
            @foreach ($edital->attachments as $attachment)
                <div class="col-md-3 py-3 pe-3">
                    <div class="align-items-center border border-secondary d-flex flex-column justify-content-center p-3 rounded">
                        <span class="d-flex align-items-center justify-content-center text-dark p-0 mb-2">
                            <a href="{{ $attachment->file_path }}" target="_blank">
                                <img src="{{ asset('assets/images/pdf.webp') }}" width="30px" alt="pdf">
                            </a>
                        </span>
                        <a href="{{ $attachment->file_path }}" class="w-100 text-center font-weight-semibold text-dark mr-2" target="_blank">
                            {{ $attachment->name }}
                        </a>
                        <div>
                            <button type="button" class="btn btn-dark px-3 py-1 mt-2 waves-effect rounded-pill ml-2"
                                title="Remover anexo" data-toggle="modal" data-target="#deleteAttachment"
                                onclick="openModalDeleteAttachment(this.dataset)" data-name="{{ $attachment->name }}"
                                data-route-destroy="{{ route('editals.attachment.destroy', [$edital->id, $attachment->id]) }}"
                            >
                                <i class="mdi mdi-trash-can font-size-16"></i> Excluir
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row card px-4">           
            <h4 class="text-primary font-weight-semibold mb-2">Anexos</h4>
            <div class="d-md-flex flex-wrap" data-container-attachments></div>
            <div class="d-md-flex">
                <div class="col-md-5 pl-md-0 mb-3">
                    <label class="form-label">Nome do arquivo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-uppercase rounded-lg" data-file-name>
                </div>
                <div class="col-md-7 mb-3">
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
                                            @checked(in_array($identification->id, array_keys($editalIdentifications)) && $editalIdentifications[$identification->id])
                                        >
                                        <label class="custom-control-label" for="identification-required-{{ $identification->id }}">
                                            Obrigatório
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-0 pr-md-4">
                                        <input type="checkbox" class="custom-control-input" value="{{ $identification->id }}" 
                                            name="identification_optionals[]" id="identification-optional-{{ $identification->id }}"
                                            onchange="toggleFieldIdentificationOptional(this, 'identification-required-{{ $identification->id }}')"
                                            @checked(in_array($identification->id, array_keys($editalIdentifications)) && ! $editalIdentifications[$identification->id])
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
                Atualizar
            </button>
        </div>
    </form>

    {{-- MODAL DE DELETAR ANEXO --}}
    <div class="modal fade" id="deleteAttachment">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" data-form-attachment-destroy>
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-body p-4">
                        <h5 class="text-center text-dark">Tem certeza que deseja excluir o anexo?</h5>
                        <h5 class="text-center fw-bold lh-1 mb-4" data-name-attachment style="color: #ED406A;"></h5>
    
                        <div class="d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg width="130px" height="130px" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                    <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                </svg>
                            </div>
                        </div>
    
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                style="background-color: #ED406A" onclick="showProgressIndicator(this)"
                            >
                                Excluir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
        <script type="module" src="{{ asset('js/tenant/edital/script.js') }}"></script>
    </x-slot:scripts>

</x-layout.panel>
