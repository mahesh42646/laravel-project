<x-layout.panel>

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-2"> 
        <span>
            <a href="{{ route('projects.search.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Avaliação do projeto</h3>
    </div>
    <div class="mb-3">
        <h4 class="text-dark mb-0">{{ $edital->name }}</h4>
        <h5 class="text-uppercase text-secondary">{{ $city->name }}-{{ $city->uf_id?->getName() }}</h5>
    </div>

    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    @if ($project->getStatusGeneral() == 'approved' && ! $project->note)
        <div class="rounded-lg text-dark mb-3 p-3" style="background-color: #cff3d7;">
            Projeto <strong>aprovado</strong> com sucesso! Finalize a análise deste projeto, informando a sua nota!
            <button type="button" title="Analisar dados do projeto"
                class="btn btn-dark btn-sm rounded-lg waves-effect mb-2 px-3 mb-md-0 ml-2"
                data-proponent-status-icon="{{ $project->identification_proponent_status?->getIcon() }}" 
                data-project-status-icon="{{ $project->identification_project_status?->getIcon() }}"
                data-document-status-icon="{{ $project->getDocumentStatusIcon() }}"
                data-status-general="{{ $project->getStatusGeneral() }}"
                data-route-classified="{{ route('projects.analyze.classified', $project->id) }}"
                data-route-approved="{{ route('projects.analyze.approved', $project->id) }}"
                data-route-repproved="{{ route('projects.analyze.repproved', $project->id) }}"
                data-csrf="{{ csrf_token() }}" data-motive="{{ $project->motive }}" 
                data-note="{{ $project->note }}" onclick="showModalAnalyze(this)"
            >
                Informar Nota
            </button>
        </div>
    @endif

    {{-- ADICIONAR NOTA, CASO O PROJETO TENHA SIDO APROVADO --}}
    @if ($projectIsApproved && ! $project->note && ! $project->is_selected->value && ! $project->is_substitute->value)
        @php
            if ($project->status->value !== 1) {
                $project->update(['status' => 1]);
            }
        @endphp
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: #121b22;">
            <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#15B79F"/>
            </svg>
            <strong>Proposta aprovada com sucesso!</strong> Finalize a análise deste projeto, informando a sua nota!
            <button type="button" class="btn btn-sm btn-success font-weight-medium rounded-lg waves-effect px-3 ml-3"
                data-target="#addNote" data-toggle="modal"
            >
                <span class="mr-1 mb-0">Informar nota</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#FFF" viewBox="0 0 256 256">
                    <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                </svg>
            </button>
        </div>

        {{-- MODAL DE ADICIONAR NOTA --}}
        <div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('projects.tabs.note.update', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                        @csrf
                        @method('PUT')

                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50 " fill="#34c38f" viewBox="0 0 256 256" style="border-radius: 50%; background-color: #d6fdef; padding: 5px;">
                                    <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path>
                                </svg>
                            </div>
                            
                            <h5 class="mb-0">Proposta aprovada em todas as etapas!</h5>
                            <div class="font-size-14 mb-4">DESEJA INFORMA NOTA ?</div>

                            <div class="w-75" style="border-top-left-radius: 15px; border-top-right-radius: 15px; border: 1px solid #CCC; border: 1px solid #CCC;">
                                <div class="d-flex align-items-center p-4">
                                    <div class="mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#f1b44c" viewBox="0 0 256 256" style="border-radius: 50%; background-color: #ffeac6; padding: 5px;">
                                            <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div>Tem certeza que deseja <strong class="text-dark">informar a nota para este projeto ?</strong></div>
                                        <div>Nota sugerida pelo sistema: 7,5</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-1 mx-5 px-0 mb-4" style="border-radius: 15px; border: 1px solid #CCC">
                                    <button type="button" class="btn btn-sm waves-effect px-4 py-2" onclick="addNote('-')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                            <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128Z"></path>
                                        </svg>
                                    </button>
                                    <div>
                                        <input type="number" class="form-control text-center py-3" min="0" step="0.1" name="note" 
                                            style="border: none; font-size: 30px; color: #ccc;" required
                                        >
                                    </div>
                                    <button type="button" class="btn btn-sm waves-effect px-4 py-2" onclick="addNote('+')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                            <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-75 bg--light pt-3 border-top px-4" 
                                style="border: 1px solid #ccc; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;"
                            >
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="bg-white border-dark btn mb-3 mr-2 px-3 px-4 py-1 waves-effect" 
                                        onclick="showProgressIndicator(this, 'Salvar nota')"
                                    >
                                        Salvar nota
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mt-4 mb-3">
                                <button type="button" class="btn btn-primary waves-effect rounded-lg font-weight-normal px-3 py-2" 
                                    data-dismiss="modal"
                                >
                                    INFORMAR NOTA DEPOIS
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- PROJETO AVALIADO COM NOTA 10, O QUE DESEJA FAZER --}}
    @if ($projectIsApproved && $project->note && ! $project->is_selected->value && ! $project->is_substitute->value)
        <div class="d-flex justify-content-between rounded-lg p-3" style="background-color: #525a6a">
            <div class="d-flex align-items-center">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#15B79F"/>
                </svg>
                <span class="text-white font-size-15 ml-2">
                    Projeto avaliado com <strong>nota {{ $project->note }}</strong>, o que deseja fazer ?
                </span>
            </div>
            <div>
                <button type="button" data-target="#editNote" data-toggle="modal"
                    class="btn btn-sm card mb-0 text-dark font-weight-medium rounded-lg waves-effect px-3 ml-3"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                    </svg>
                    <span class="mr-1 mb-0">Editar nota</span>
                </button>
                <a href="{{ route('projects.tabs.note.select.project', $project->id) }}"
                    class="btn btn-sm card mb-0 text-dark font-weight-medium rounded-lg waves-effect px-2 ml-3"
                    onclick="showProgressIndicator(this, 'Selecionar projeto')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#50a5f1" viewBox="0 0 256 256">
                        <path d="M232,128c0,12.51-17.82,21.95-22.68,33.69-4.68,11.32,1.42,30.65-7.78,39.85s-28.53,3.1-39.85,7.78C150,214.18,140.5,232,128,232s-22-17.82-33.69-22.68c-11.32-4.68-30.65,1.42-39.85-7.78s-3.1-28.53-7.78-39.85C41.82,150,24,140.5,24,128s17.82-22,22.68-33.69C51.36,83,45.26,63.66,54.46,54.46S83,51.36,94.31,46.68C106.05,41.82,115.5,24,128,24S150,41.82,161.69,46.68c11.32,4.68,30.65-1.42,39.85,7.78s3.1,28.53,7.78,39.85C214.18,106.05,232,115.5,232,128Z" opacity="0.2"></path><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34Z"></path>
                    </svg>
                    <span class="mr-2 mb-0">Selecionar projeto</span>
                </a>
                <a href="{{ route('projects.tabs.note.substitute.project', $project->id) }}"
                    class="btn btn-sm card mb-0 text-dark font-weight-medium rounded-lg waves-effect px-2 ml-3"
                    onclick="showProgressIndicator(this, 'Enviar para suplência')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#f1b44c" viewBox="0 0 256 256">
                        <path d="M232,128c0,12.51-17.82,21.95-22.68,33.69-4.68,11.32,1.42,30.65-7.78,39.85s-28.53,3.1-39.85,7.78C150,214.18,140.5,232,128,232s-22-17.82-33.69-22.68c-11.32-4.68-30.65,1.42-39.85-7.78s-3.1-28.53-7.78-39.85C41.82,150,24,140.5,24,128s17.82-22,22.68-33.69C51.36,83,45.26,63.66,54.46,54.46S83,51.36,94.31,46.68C106.05,41.82,115.5,24,128,24S150,41.82,161.69,46.68c11.32,4.68,30.65-1.42,39.85,7.78s3.1,28.53,7.78,39.85C214.18,106.05,232,115.5,232,128Z" opacity="0.2"></path>
                        <path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34Z"></path>
                    </svg>
                    <span class="mr-2 mb-0">Enviar para suplência</span>
                </a>
            </div>
        </div>

        {{-- MODAL DE EDITAR NOTA --}}
        <div class="modal fade" id="editNote" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('projects.tabs.note.update', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                        @csrf
                        @method('PUT')

                        <div class="d-flex align-items-center flex-column justify-content-center">
 
                            <div class="font-size-14 mb-4">DESEJA ATUALIZAR A NOTA ?</div>

                            <div class="w-75" style="border-top-left-radius: 15px; border-top-right-radius: 15px; border: 1px solid #CCC; border: 1px solid #CCC;">
                                <div class="d-flex align-items-center p-4">
                                    <div class="mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#f1b44c" viewBox="0 0 256 256" style="border-radius: 50%; background-color: #ffeac6; padding: 5px;">
                                            <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div>Tem certeza que deseja <strong class="text-dark">atualizar a nota para este projeto ?</strong></div>
                                        <div>Nota sugerida pelo sistema: 7,5</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-1 mx-5 px-0 mb-4" style="border-radius: 15px; border: 1px solid #CCC">
                                    <button type="button" class="btn btn-sm waves-effect px-4 py-2" onclick="addNote('-')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                            <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128Z"></path>
                                        </svg>
                                    </button>
                                    <div>
                                        <input type="number" class="form-control text-center py-3" min="0" step="0.1" name="note" 
                                            style="border: none; font-size: 30px; color: #ccc;" value="{{ $project->note }}" required
                                        >
                                    </div>
                                    <button type="button" class="btn btn-sm waves-effect px-4 py-2" onclick="addNote('+')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                            <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-75 bg--light pt-3 border-top px-4" 
                                style="border: 1px solid #ccc; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;"
                            >
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="bg-white border-dark btn mb-3 mr-2 px-3 px-4 py-1 waves-effect" 
                                        onclick="showProgressIndicator(this, 'Atualizar nota')"
                                    >
                                        Atualizar nota
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mt-4 mb-3">
                                <button type="button" data-dismiss="modal"
                                    class="btn btn-primary waves-effect rounded-lg font-weight-normal px-3 py-2" 
                                >
                                    CANCELAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- PROJETO SELECIONADO E NAO HABILITADO --}}
    @if ($project->is_selected->value && ! $project->is_enabled->value && ! $project->is_substitute->value)
        <div class="d-flex rounded-lg p-3" style="background-color: #525a6a">
            <div class="d-flex align-items-center mr-4">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#f1b44c"/>
                </svg>
                <span class="text-white font-size-15 ml-2">
                    Projeto <span class="font-weight-bold">selecionado e não habilitado</span>,  deseja
                </span>
            </div>
            <div>
                <a href="{{ route('projects.tabs.note.enable.project', $project->id) }}" 
                    class="btn btn-sm btn-light font-weight-medium rounded-lg waves-effect px-3 ml-3"
                    onclick="showProgressIndicator(this, 'Habilitar')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#34c38f" viewBox="0 0 256 256">
                        <path d="M237.66,85.26l-128.4,128.4a8,8,0,0,1-11.32,0l-71.6-72a8,8,0,0,1,0-11.31l24-24a8,8,0,0,1,11.32,0L104,147.43l98.34-97.09a8,8,0,0,1,11.32,0l24,23.6A8,8,0,0,1,237.66,85.26Z" opacity="0.2"></path>
                        <path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path>
                    </svg>
                    <span class="ml-1 mb-0">Habilitar</span>
                </a>
            </div>
        </div
    @endif

    {{-- PROJETO SELECIONADO E HABILITADO --}}
    @if ($project->is_selected->value && $project->is_enabled->value && ! $project->is_substitute->value)
        <div class="d-flex justify-content-between rounded-lg p-3" style="background-color: #525a6a">
            <div class="d-flex align-items-center mr-4">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#15B79F"/>
                </svg>
                <span class="text-white font-size-15 ml-2">
                    Projeto avaliado com <span class="font-weight-bold">nota {{ $project->note }}</span>, <span class="font-weight-bold">selecionado e habilitado</span>
                </span>
            </div>
            <div>
                <a href="{{ route('projects.tabs.note.disable.project', $project->id) }}"
                    class="btn btn-sm btn-light font-weight-medium rounded-lg waves-effect px-3 ml-3"
                    onclick="showProgressIndicator(this, 'Inabilitar')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#f21d56" viewBox="0 0 256 256">
                        <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                        <path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                    </svg>
                    <span class="ml-1 mb-0">Inabilitar</span>
                </a>
            </div>
        </div
    @endif

    {{-- PROJETO NA SUPLENCIA --}}
    @if ($project->is_substitute->value)
        <div class="d-flex justify-content-between rounded-lg p-3" style="background-color: #525a6a">
            <div class="d-flex align-items-center">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#f1b44c"/>
                </svg>
                <span class="text-white font-size-15 ml-2">
                    Projeto enviado para suplência, o que deseja fazer ?
                </span>
            </div>
            <div>
                <a href="{{ route('projects.tabs.note.select.project', $project->id) }}"
                    class="btn btn-sm btn-light font-weight-medium rounded-lg waves-effect px-2 ml-3"
                    onclick="showProgressIndicator(this, 'Selecionar projeto')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#50a5f1" viewBox="0 0 256 256">
                        <path d="M232,128c0,12.51-17.82,21.95-22.68,33.69-4.68,11.32,1.42,30.65-7.78,39.85s-28.53,3.1-39.85,7.78C150,214.18,140.5,232,128,232s-22-17.82-33.69-22.68c-11.32-4.68-30.65,1.42-39.85-7.78s-3.1-28.53-7.78-39.85C41.82,150,24,140.5,24,128s17.82-22,22.68-33.69C51.36,83,45.26,63.66,54.46,54.46S83,51.36,94.31,46.68C106.05,41.82,115.5,24,128,24S150,41.82,161.69,46.68c11.32,4.68,30.65-1.42,39.85,7.78s3.1,28.53,7.78,39.85C214.18,106.05,232,115.5,232,128Z" opacity="0.2"></path><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34Z"></path>
                    </svg>
                    <span class="mr-2 mb-0">Selecionar projeto</span>
                </a>
            </div>
        </div>
    @endif

    {{-- CONTEUDO --}}
    <div class="row">
        <div class="col-lg-12">

            <div class="d-md-flex mt-3 border-top">

                {{-- BARRA LATERAL ESQUERDA --}}
                <div class="col-md-3 card px-3 py-2" style="border: 1px solid #CCC; border-radius: 10px;">
                    <div class="list-group" id="list-tab" role="tablist">

                        @if ($customer->agent_pf_id)
                            <div class="text-dark font-weight-bold mb-3">PESSOA FÍSICA</div>
                        @elseif ($customer->agent_pj_with_profit_id)
                            <div class="text-dark font-weight-bold mb-3">PESSOA JURÍDICA COM FINS LUCRATIVOS</div>
                        @elseif ($customer->agent_pj_without_profit_id)
                            <div class="text-dark font-weight-bold mb-3">PESSOA JURÍDICA SEM FINS LUCRATIVOS</div>
                        @elseif ($customer->agent_collective_without_cnpj_id)
                            <div class="text-dark font-weight-bold mb-3">COLETIVO</div>
                        @elseif ($customer->agent_mei_id)
                            <div class="text-dark font-weight-bold mb-3">MEI</div>
                        @else
                            <div class="text-dark font-weight-bold mb-3">PESSOA FÍSICA</div>
                        @endif
                        
                        <a class="d-flex align-items-center justify-content-between border-0 list-group-item list-group-item-action p-2 mb-2 rounded-lg active" 
                            id="list-1-list" data-toggle="list" href="#identification-proponent"
                            role="tab" aria-controls="1"
                        >
                            <div class="font-weight-medium">Identificação do proponente</div>
                            {!! $project->identification_proponent?->status?->getIcon() !!}
                        </a>

                        <a class="d-flex align-items-center justify-content-between border-0 list-group-item list-group-item-action mb-2 p-2 rounded-lg" 
                            id="list-1-list" data-toggle="list" href="#inscription-project"
                            role="tab" aria-controls="1"
                        >
                            <div class="font-weight-medium">Inscrição do projeto</div>
                            {!! $project->inscription_project?->status?->getIcon() !!}
                        </a>

                        <a class="d-flex align-items-center justify-content-between border-0 list-group-item list-group-item-action mb-2 p-2 rounded-lg" 
                            id="list-1-list" data-toggle="list" href="#identification-project"
                            role="tab" aria-controls="1"
                        >
                            <div class="font-weight-medium">Identificação do projeto</div>
                            {!! $project->identification_project?->status?->getIcon() !!}
                        </a>

                        <a class="d-flex align-items-center justify-content-between border-0 list-group-item list-group-item-action mb-2 p-2 rounded-lg" 
                            id="list-1-list" data-toggle="list" href="#files" role="tab" aria-controls="1"
                        >
                            <div class="font-weight-medium">Arquivos</div>
                            {!! $project->analyze_document?->status?->getIcon() !!}
                        </a>

                        <a class="d-flex align-items-center justify-content-between border-0 list-group-item list-group-item-action mb-2 p-2 rounded-lg" 
                            id="list-1-list" data-toggle="list" href="#complements" role="tab" aria-controls="1"
                        >
                            <div class="font-weight-medium">Complementos</div>
                            {!! $project->analyze_complement?->status?->getIcon() !!}
                        </a>
                    </div>
                </div>

                {{-- CONTEUDO --}}
                <div class="col-md-9">
                    <div class="tab-content card shadow p-3" id="nav-tabContent" style="border: 1px solid #e0e1e3; border-radius: 20px;">
                        <div class="tab-content" id="nav-tabContent">
                            @include('tenant.projects.tabs.identification-proponent')
                            @include('tenant.projects.tabs.inscription-project')
                            @include('tenant.projects.tabs.identification-project')
                            @include('tenant.projects.tabs.files')
                            @include('tenant.projects.tabs.complements')
                        </div>
                    </div>
                </div>
        
            </div>
        </div>

    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/tenant/projects/analyze/identification-project.js') }}"></script>
        <script src="{{ asset('js/tenant/projects/analyze/file.js') }}?version=1"></script>
        <script>
            function addNote(sign) {
                const input = document.querySelector('[name="note"]');

                if ((parseFloat(input.value) === 0.0 && sign === '-') || input.value === '') {
                    return input.value = 0;
                }

                newValue = (sign === '+') 
                    ? parseFloat(input.value) + 0.1
                    : parseFloat(input.value) - 0.1;

                input.value = newValue.toFixed(1);
            }

            function showProgressIndicator(button, content) {
                const buttonState = (isLoading, text) => {
                    button.disabled = isLoading;
                    button.innerHTML = text;
                }

                setTimeout(() => buttonState(true, '<spinner></spinner> Aguarde...'), 10);
                setTimeout(() => buttonState(false, content), 7000);
            }
        </script>
    </x-slot:scripts>

    <x-slot:styles>
        <style>

            .timeline {
                width: 85%;
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                flex-direction: column;
                padding: 32px 0 32px 32px;
                border-left: 1px solid #CCC;
            }

            .timeline-item {
                display: flex;
                gap: 15px;
                & + * { margin-top: 24px; }
                & + .extra-space { margin-top: 48px; }
            }

            .timeline-item-icon {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                margin-left: -52px;
                flex-shrink: 0;
                overflow: hidden;
                svg {
                    width: 20px;
                    height: 20px;
                }

                &.faded-icon {
                    background-color: #fff;
                    color: #CCC;
                }

                &.filled-icon {
                    background-color:#fff;
                    color: #fff;
                }
            }

        </style>
    </x-slot:styles>

</x-layout.panel>
