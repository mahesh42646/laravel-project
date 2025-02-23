<form action="{{ route('projects.tabs.project.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($edital->type_id->value === 2)
        <div class="alert alert-warning rounded-lg mb-3">
            <div class="d-flex align-items-center justify-content-between text-dark mb-0">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="m40-120 440-760 440 760H40Zm440-120q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Z"/>
                    </svg>
                    <h6 class="ml-2 mb-0"><strong class="mr-1">Atenção!</strong> Este edital é do tipo premiado!</h6>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    {{-- EDITAL --}}
    <div class="d-flex p-3 bg-light mb-3" style="border-radius: 10px;">
        <div class="col-md-12">
            <label class="font-weight-bold text-dark">Edital <span class="text-danger">*</span></label>
            <input type="text" class="form-control rounded-lg" value="{{ $edital->name ? $edital->name . ' - ' : '' }} {{ $edital->vacancies }} vagas" readonly>
        </div>
    </div>

    {{-- NOME DO PROJETO E VALOR --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="text-dark">Nome do Projeto <span class="text-danger">*</span></label>
            <input type="text" class="form-control rounded-lg" name="name" value="{{ old('name', $project->name) }}" required>
        </div>
        <div class="col-md-2 mb-3">
            <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
            <label class="text-dark">Valor do Projeto <span class="text-danger">*</span></label>
            <input type="text" class="form-control rounded-lg" name="price" value="{{ old('price', $project->price) }}" required>
        </div>
        <div class="col-md-2 mb-3">
            <label class="text-dark">Status</label>
            <div class="d-flex align-items-center form-control rounded-lg" style="{{ $project->identification_project_status?->getBackgroundColor() }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>{{ $project->identification_project_status?->getName() }}</div>
                    <div class="ml-2">
                        <button type="button" class="mdi mdi-eye-circle bg-transparent border-0 font-size-22 mdi mdi-eye-circle"
                            data-toggle="modal" data-target="#proponentProjectMotive"
                        ></button>
                        
                        <div class="modal fade" id="proponentProjectMotive" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body px-4 pb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="font-weight-semibold text-dark mb-0">Projeto</h4>
                                            <button type="button" data-dismiss="modal" title="Fechar modal"
                                                class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                                                style="width: 20px !important; height: 20px !important; padding: 10px"
                                            >
                                                X
                                            </button>
                                        </div>
                        
                                        <div class="mb-3">
                                            <label class="text-dark mb-1">Situação</label>
                                            <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->identification_project_status?->getName() }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-dark mb-1">Motivo <span class="text-danger">*</span></label>
                                            <textarea class="form-control rounded-lg bg-light" rows="15" readonly>{{ $project->identification_project_status_motive ?: 'OK' }}</textarea>
                                        </div>
                                        <div class="d-md-flex">
                                            <div class="col-md-8 mb-3">
                                                <label class="text-dark mb-1">Analisado por:</label>
                                                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->project_analyzed_by?->name }}" readonly>
                                            </div>
                                            <div class="col-md-4 ps-md-4 mb-3">
                                                <label class="text-dark mb-1">Analisado em:</label>
                                                <input type="text" class="form-control bg-light rounded-lg" value="{{ $project->identification_project_status_updated_at?->format('d/m/Y H:i:s') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label class="text-dark">Download</label>
            <a href="{{ route('projects.tabs.project.download', $project->id) }}" class="d-flex align-items-center form-control rounded-lg btn-light" 
                style="cursor: pointer" title="Fazer download da identificação do projeto em PDF"
            >
                <span class="font-weight-medium mr-2">Baixar arquivo</span> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/>
                </svg>
            </a>
        </div>
    </div>

    @if ($edital->type_id->value === 1)
    
        {{-- RESUMO E DESCRICAO DA PROPOSTA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Resumo da proposta</label>
                <textarea class="form-control rounded-lg" name="resume" rows="4">{{ old('resume', $project->resume) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Descrição da proposta</label>
                <textarea class="form-control rounded-lg" name="description" rows="4">{{ old('description', $project->description) }}</textarea>
            </div>
        </div>

        {{-- OBJETIVOS E JUSTIFICATIVA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Objetivos e metas</label>
                <textarea class="form-control rounded-lg" name="objectives" rows="4">{{ old('objectives', $project->objectives) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Justificativa</label>
                <textarea class="form-control rounded-lg" name="justification" rows="4">{{ old('justification', $project->justification) }}</textarea>
            </div>
        </div>

        {{-- PUBLICO ALVO E CRONOGRAMA --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Público-alvo</label>
                <textarea class="form-control rounded-lg" name="target" rows="4">{{ old('target', $project->target) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Cronograma de execução</label>
                <textarea class="form-control rounded-lg" name="cronogram" rows="4">{{ old('cronogram', $project->cronogram) }}</textarea>
            </div>
        </div>

        {{-- MEDIDAS DE ACESSIBLIDADE E PLANO DE DIVULGACAO --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Medidas de acessiblidade</label>
                <textarea class="form-control rounded-lg" name="accessibility" rows="4">{{ old('accessibility', $project->accessibility) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Plano de divulgação</label>
                <textarea class="form-control rounded-lg" name="plan" rows="4">{{ old('plan', $project->plan) }}</textarea>
            </div>
        </div>

        {{-- CONTRA APRTIDA SOCIAL E LOCAIS PREVISTOS PARA REALIZACAO DA ACAO CULTURAL --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-dark">Contrapartida social</label>
                <textarea class="form-control rounded-lg" name="contra_partid_social" rows="4">{{ old('contra_partid_social', $project->contra_partid_social) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Locais previstos para realização da ação cultural</label>
                <textarea class="form-control rounded-lg" name="locals" rows="4">{{ old('locals', $project->locals) }}</textarea>
            </div>
        </div>
    @endif
    
    {{-- BOTOES DE SALVAR, REPROVAR, REANALISAR E APROVAR --}}
    <div class="d-flex justify-content-md-center flex-wrap mt-3">
        <button type="submit" class="btn btn-primary font-weight-medium rounded-lg px-5">Atualizar</button>
        @if ($project->identification_project_status?->getName() !== 'Reprovado')
            <button type="button" class="btn font-weight-medium rounded-lg px-5 ml-md-3" data-target="#customerProjectRepproved"
                style="background-color: #FAB9B9; color: #EE0358;" data-toggle="modal"
            >
                Reprovar
            </button>
        @endif
            @if ($project->identification_project_status?->getName() !== 'Em Reanálise')
            <button type="button" class="btn font-weight-medium rounded-lg px-5 ml-md-3" data-target="#customerProjectReanalyze"
                style="background-color: #93e4fd; color: #117695;" data-toggle="modal"
            >
                Reanalisar
            </button>
        @endif
        @if ($project->identification_project_status?->getName() !== 'Aprovado')
            <a href="{{ route('projects.tabs.project.approved', $project->id) }}" 
                class="btn font-weight-medium rounded-lg px-5 ml-md-3" style="background-color: #B7EBDE; color: #1B654A;"
            >
                Aprovar
            </a>
        @endif
    </div>
</form>

<div class="modal fade" id="customerProjectRepproved" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('projects.tabs.project.repproved', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-weight-semibold text-primary mb-0">
                        Analisar identificação do Projeto
                    </h5>
                    <button type="button" data-dismiss="modal" title="Fechar modal"
                        class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                        style="width: 20px !important; height: 20px !important; padding: 10px"
                    >
                        X
                    </button>
                </div>

                <div class="d-flex justify-content-center text-dark font-weight-medium mb-3">
                    Você deseja <span class="text-danger mx-1">Reprovar</span> este projeto?
                </div>

                <div class="mb-4">
                    <label class="text-dark">Motivo <span class="text-danger">*</span></label>
                    <textarea class="form-control rounded-lg" name="motive" rows="15" placeholder="Digite o motivo aqui" required></textarea>
                </div>
            
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn font-weight-medium rounded-lg mx-3 px-5" 
                        style="background-color: #FAB9B9; color: #EE0358;"
                    >
                        Reprovar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="customerProjectReanalyze" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('projects.tabs.project.reanalyze', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-weight-semibold text-primary mb-0">
                        Analisar identificação do projeto
                    </h5>
                    <button type="button" data-dismiss="modal" title="Fechar modal"
                        class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                        style="width: 20px !important; height: 20px !important; padding: 10px"
                    >
                        X
                    </button>
                </div>

                <div class="d-flex justify-content-center text-dark font-weight-medium mb-3">
                    Você deseja <span class="text-primary mx-1">Reanalisar</span> este projeto?
                </div>
                <div class="d-md-flex">
                    <div class="col-md-12 px-0 mb-3">
                        <label class="text-dark">Motivo <span class="text-danger">*</span></label>
                        <textarea class="form-control rounded-lg" name="motive" rows="15" placeholder="Digite o motivo aqui" required></textarea>
                    </div>
                </div>
                <div class="d-md-flex px-0">
                    <div class="col-md-4 pl-0 mb-3">
                        <label class="text-dark">Data limite <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="registered_at" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Hora limite <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="hour" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="invisible">.</label>
                        <button type="submit" class="form-control btn btn-primary font-weight-medium rounded-lg px-5">Reanalisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
