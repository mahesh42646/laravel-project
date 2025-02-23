<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        @include('tenant.settings.sidebar', [
            $active = 'pdf'
        ])

        {{-- LISTA DE TIPOS DE CAMPOS --}}
        <div class="col-md-9 pl-md-5">
            <div class="row">
                <div class="card border col-12 px-3 py-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256">
                                <path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path>
                            </svg>
                        </div>
                        <h5 class="text-dark font-weight-bold ml-2 mb-0">Lista de tipos de campos</h5>
                    </div>

                    {{-- FILTROS --}}
                    <div class="d-md-flex align-items-center mb-3">
                        
                        <div class="mr-4">
                            <a href="{{ route('editals.documents.types.index') }}">
                                <div>
                                    <span class="font-weight-semibold text-{{ ! request()->has('document_type') ? 'primary' : 'secondary' }} mr-1">
                                        Todos
                                    </span>
                                    <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                        {{ number_format($total->pf + $total->pj + $total->collective, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div><hr class="text-{{ ! request()->has('document_type') ? 'primary' : 'light' }} mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                            </a>
                        </div>
                        <div class="mr-4">
                            <a href="{{ route('editals.documents.types.index') }}?document_type=1">
                                <div>
                                    <span class="font-weight-semibold text-{{ request('document_type') == '1' ? 'primary' : 'secondary' }} mr-1">
                                        PESSOA FÍSICA
                                    </span>
                                    <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                        {{ number_format($total->pf, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div><hr class="text-{{ request('document_type') == '1' ? 'primary' : 'light' }} mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                            </a>
                        </div>
                        <div class="mr-4">
                            <a href="{{ route('editals.documents.types.index') }}?document_type=2">
                                <div>
                                    <span class="font-weight-semibold text-{{ request('document_type') == '2' ? 'primary' : 'secondary' }} mr-1">
                                        PESSOA JURÍDICA
                                    </span>
                                    <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                        {{ number_format($total->pj, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div><hr class="text-{{ request('document_type') == '2' ? 'primary' : 'light' }} mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                            </a>
                        </div>
                        <div class="mr-4">
                            <a href="{{ route('editals.documents.types.index') }}?document_type=3">
                                <div>
                                    <span class="font-weight-semibold text-{{ request('document_type') == '3' ? 'primary' : 'secondary' }} mr-1">
                                        COLETIVO
                                    </span>
                                    <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                        {{ number_format($total->collective, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div><hr class="text-{{ request('document_type') == '3' ? 'primary' : 'light' }} mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                            </a>
                        </div>
                    </div>

                    <div style="border-radius: 7px; border: 1px solid #dfdfdf !important;">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table table-hover table-centered table-sm table-nowrap mb-0">
                                    <thead class="text-secondary bg--light">
                                        <tr>
                                            <th class="pl-3 py-2">Nome</th>
                                            <th>Tipo</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark font-weight-medium">
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td class="pl-3 py-2">{{ $document->name }}</td>
                                                <td class="py-2">{{ $document->type->name }}</td>
                                                <td>{!! $document->is_active->icon !!}</td>
                                                <td>
                                                    <span type="button" title="Visualizar" onclick="loadModalView(this.dataset)"
                                                        data-toggle="modal" data-target="#viewDocument" data-view-is-active="{{ $document->is_active->name }}"
                                                        data-view-name="{{ $document->name }}" data-view-type="{{ $document->type->name }}"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256">
                                                            <path d="M128,56C48,56,16,128,16,128s32,72,112,72,112-72,112-72S208,56,128,56Zm0,112a40,40,0,1,1,40-40A40,40,0,0,1,128,168Z" opacity="0.2"></path><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path>
                                                        </svg>
                                                    </span>
                                                    <span type="button" class="ml-1" title="Editar" onclick="loadModalEdit(this.dataset)"
                                                        data-toggle="modal" data-target="#editDocument" data-edit-is-active="{{ $document->is_active->value }}"
                                                        data-edit-name="{{ $document->name }}" data-edit-type="{{ $document->type->value }}"
                                                        data-edit-route-update="{{ route('editals.documents.types.update', $document->id) }}"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#667085" viewBox="0 0 256 256">
                                                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                                                        </svg>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>                       
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center mt-4 px-0" id="paginate">
                        <div class="d-flex justify-content-end">
                            {{ $documents->links('components.pagination') }}
                        </div>
                    </div>
                </div>

                {{-- ADICIONAR NOVO ARQUIVO --}}
                <div class="card border col-12 px-3 py-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256">
                                <path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path>
                            </svg>
                        </div>
                        <h5 class="text-dark font-weight-bold ml-2 mb-0">Adicionar novo arquivo</h5>
                    </div>

                    <form action="{{ route('editals.documents.types.store') }}" method="POST" class="card-body px-0">
                        @csrf
            
                        {{-- NOME E TIPO DE ARQUIVO --}}
                        <div class="d-md-flex">
                            <div class="col-md-4 mb-3">
                                <label>Nome do arquivo *</label>
                                <input type="text" class="form-control text-uppercase" name="name" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label>Tipo de pessoa *</label>
                                <div class="d-flex align-items-center mt-2">
                                    @foreach ($documentTypes as $documentType)
                                        <div class="custom-control custom-radio mr-4">
                                            <input type="radio" class="custom-control-input" name="people_type_id" required
                                                id="documentType-{{ $documentType->id }}" value="{{ $documentType->id }}"  
                                            >
                                            <label class="custom-control-label text-dark" for="documentType-{{ $documentType->id }}">
                                                {{ $documentType->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                            
                        {{-- BOTAO DE CRIAR CAMPO --}}
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit" class="btn btn-primary mr-2" onclick="loader(this)">
                                Criar campo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DE VISUALIZAR DOCUMENTOS --}}
    <div class="modal fade" id="viewDocument">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <h4 class="text-dark font-weight-bold mb-3">Tipo de campo</h4>

                    {{-- NOME DO ARQUIVO, TIPO DE PESSOA E STATUS --}}
                    <div class="mb-3">
                        <label>Nome do arquivo</label>
                        <input type="text" class="form-control bg-light" data-view-modal-name readonly>
                    </div>
                    <div class="mb-3">
                        <label>Tipo de pessoa</label>
                        <input type="text" class="form-control bg-light" data-view-modal-type readonly>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="text" class="form-control bg-light" data-view-modal-is-active readonly>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-dark rounded-lg font-weight-semibold px-4 py-2" data-dismiss="modal">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DE EDITAR DOCUMENTOS --}}
    <div class="modal fade" id="editDocument">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="" method="POST" class="modal-body p-4" data-edit-form-document>
                    @csrf
                    @method('PUT')

                    <h4 class="text-dark font-weight-bold mb-3">Editar tipo de campo</h4>

                    {{-- NOME DO ARQUIVO, TIPO DE PESSOA E STATUS --}}
                    <div class="mb-3">
                        <label>Nome do arquivo</label>
                        <input type="text" class="form-control text-uppercase" name="name" data-edit-modal-name required>
                    </div>
                    <div class="mb-3">
                        <label>Tipo de pessoa</label>
                        <select class="form-control" name="people_type_id" data-edit-modal-type required>
                            @foreach ($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-control" name="is_active" data-edit-modal-is-active required>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}">{{ $status->getName() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-light waves-effect rounded-lg font-weight-semibold px-4 py-2" data-dismiss="modal">
                            Fechar
                        </button>
                        <button type="submit" class="btn btn-dark rounded-lg font-weight-semibold px-4 py-2" onclick="loader(this)">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            function loadModalView(payload) {
                const name = document.querySelector('[data-view-modal-name]');
                const type = document.querySelector('[data-view-modal-type]');
                const isActive = document.querySelector('[data-view-modal-is-active]');

                name.value = payload.viewName;
                type.value = payload.viewType;
                isActive.value = payload.viewIsActive;
            }

            function loadModalEdit(payload) {
                const formUpdate = document.querySelector('[data-edit-form-document]');
                const name = document.querySelector('[data-edit-modal-name]');
                const type = document.querySelector('[data-edit-modal-type]');
                const isActive = document.querySelector('[data-edit-modal-is-active]');

                name.value = payload.editName;
                type.value = payload.editType;
                isActive.value = payload.editIsActive;
                formUpdate.action = payload.editRouteUpdate;
            }

            function loader(button) {
                setTimeout(() => {
                    button.disabled = true;
                    button.innerHTML = (
                        `<span class="spinner-border spinner-border-sm mr-2" 
                            role="status" aria-hidden="true">
                        </span> Aguarde...`
                    );
                }, 20);

                setTimeout(() => {
                    button.disabled = false;
                    button.innerHTML = 'Criar campo';
                }, 7000);
            }
        </script>
    </x-slot:scripts>

</x-layout.panel>

