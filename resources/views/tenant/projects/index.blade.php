<x-layout.panel>

    {{-- ALERT --}}
    <x-alert.success :message="session('success')" />
    <input type="hidden" data-csrf value="{{ csrf_token() }}">
    <input type="hidden" data-search-customer-url value="{{ route('customers.search') }}">

    {{-- HEADER --}}
    <h3 class="mb-4">Lista de projetos culturais</h3>

    {{-- LISTA DE PROJETOS CULTURAIS --}}
    <div class="card border col-12 px-0">

        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table data-js="datatable" class="table table-sm table-hover table-centered table-bordered table-nowrap text-dark nowrap">
                    <thead class="bg-light">
                        <tr>
                            <th class="pl-3 pe-2 py-3 border-0">
                                <input type="search" class="form-control" data-name 
                                    onkeyup="filterCustomerName(event)" placeholder="Pesquisar pesssoa física/jurídica"
                                >
                            </th>
                            <th class="px-2 py-3 border-0">
                                <select class="form-control" onchange="runFilter()" data-edital>
                                    <option selected disabled value="">Edital</option>
                                    <option value="">Todos</option>
                                    @foreach ($editals as $edital)
                                        <option value="{{ $edital->id }}">
                                            {{ Str::limit($edital->name, 50) }}
                                        </option>
                                    @endforeach
                                </select>
                            </th>
                            <th class="px-2 py-3 border-0">
                                <select class="form-control px-1" onchange="runFilter()" data-subscribe>
                                    <option selected disabled value="">Status de inscrição</option>
                                    <option value="">Todas</option>
                                    @foreach ($subscribeStatuses as $subscribe)
                                        <option value="{{ $subscribe->value }}">{{ $subscribe->getName() }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th class="px-2 py-3 border-0">
                                <select class="form-control" onchange="runFilter()" data-status>
                                    <option selected disabled value="">Status do projeto</option>
                                    <option value="">Todos</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->value }}">{{ $status->getName() }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th class="px-2 py-3 border-0">Ação</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-md-12 text-center mt-3" id="paginate">
                {{-- <div class="d-flex justify-content-end">
                    {{ $customers->links('components.pagination') }}
                </div> --}}
            </div>
        </div>
    </div>

    <input type="hidden" data-js="base-url" value="{{ url('/') }}">
    <input type="hidden" data-js="datatable-lang-pt-br" value="{{ asset('js/libs/datatables/lang/pt-BR.json') }}">
    <input type="hidden" data-js="datatable-url" value="{{ route('projects.search.execute') }}">

    {{-- MODAL DE VER STATUS DO PROJETO --}}
    <div class="modal fade" id="showModalViewProject">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-3">
                    <div class="d-flex align-items-center">
                        <svg width="70" height="70" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_5736_13868)">
                            <rect x="14" y="11" width="60" height="60" rx="30" fill="white"/>
                            <path d="M36.3438 37.7188C36.3438 37.4287 36.459 37.1505 36.6641 36.9454C36.8692 36.7402 37.1474 36.625 37.4375 36.625H50.5625C50.8526 36.625 51.1308 36.7402 51.3359 36.9454C51.541 37.1505 51.6562 37.4287 51.6562 37.7188C51.6562 38.0088 51.541 38.287 51.3359 38.4921C51.1308 38.6973 50.8526 38.8125 50.5625 38.8125H37.4375C37.1474 38.8125 36.8692 38.6973 36.6641 38.4921C36.459 38.287 36.3438 38.0088 36.3438 37.7188ZM37.4375 43.1875H50.5625C50.8526 43.1875 51.1308 43.0723 51.3359 42.8671C51.541 42.662 51.6562 42.3838 51.6562 42.0938C51.6562 41.8037 51.541 41.5255 51.3359 41.3204C51.1308 41.1152 50.8526 41 50.5625 41H37.4375C37.1474 41 36.8692 41.1152 36.6641 41.3204C36.459 41.5255 36.3438 41.8037 36.3438 42.0938C36.3438 42.3838 36.459 42.662 36.6641 42.8671C36.8692 43.0723 37.1474 43.1875 37.4375 43.1875ZM58.2188 31.1562V51.9375C58.2187 52.1239 58.1709 52.3072 58.08 52.47C57.9892 52.6328 57.8582 52.7696 57.6996 52.8676C57.541 52.9655 57.36 53.0213 57.1738 53.0296C56.9875 53.0379 56.8023 52.9985 56.6355 52.915L52.75 50.9723L48.8645 52.915C48.7125 52.9911 48.5449 53.0307 48.375 53.0307C48.2051 53.0307 48.0375 52.9911 47.8855 52.915L44 50.9723L40.1145 52.915C39.9625 52.9911 39.7949 53.0307 39.625 53.0307C39.4551 53.0307 39.2875 52.9911 39.1355 52.915L35.25 50.9723L31.3645 52.915C31.1977 52.9985 31.0125 53.0379 30.8262 53.0296C30.64 53.0213 30.459 52.9655 30.3004 52.8676C30.1418 52.7696 30.0108 52.6328 29.92 52.47C29.8291 52.3072 29.7813 52.1239 29.7812 51.9375V31.1562C29.7812 30.5761 30.0117 30.0197 30.422 29.6095C30.8322 29.1992 31.3886 28.9688 31.9688 28.9688H56.0312C56.6114 28.9688 57.1678 29.1992 57.578 29.6095C57.9883 30.0197 58.2188 30.5761 58.2188 31.1562ZM56.0312 31.1562H31.9688V50.1684L34.7605 48.7711C34.9125 48.6951 35.0801 48.6555 35.25 48.6555C35.4199 48.6555 35.5875 48.6951 35.7395 48.7711L39.625 50.7152L43.5105 48.7711C43.6625 48.6951 43.8301 48.6555 44 48.6555C44.1699 48.6555 44.3375 48.6951 44.4895 48.7711L48.375 50.7152L52.2605 48.7711C52.4125 48.6951 52.5801 48.6555 52.75 48.6555C52.9199 48.6555 53.0875 48.6951 53.2395 48.7711L56.0312 50.1684V31.1562Z" fill="#212636"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_5736_13868" x="0" y="0" width="88" height="88" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="3"/>
                            <feGaussianBlur stdDeviation="7"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_5736_13868"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_5736_13868" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                        <h5 class="text-primary mb-0">
                            Detalhes da proposta | <span data-edital-name-label>EDITAL DE TESTE</span>
                        </h5>
                    </div>

                    <div class="rounded-lg p-3 mt-2 mb-3" style="border: 1px solid #CCC">
                        <div class="d-flex">
                            <div class="col-md-6">
                                <div><strong class="text-dark">AGENTE:</strong> <span data-agent-name-label>MARCO</span></div>
                                <div><strong class="text-dark">CPF:</strong> <span data-agent-document-number-cpf-label>065.456.654-88</span></div>
                            </div>
                            <div class="col-md-6" style="border-left: 1px solid #ccc">
                                <div><strong class="text-dark">CNPJ:</strong> <span data-agent-document-number-cnpj-label>MARCO</span></div>
                                <div><strong class="text-dark">CONTATO:</strong> <span data-agent-phone-label>065.456.654-88</span></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4" style="border-radius: 7px; border: 1px solid #dfdfdf !important;">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table class="table table-hover table-centered table-sm table-nowrap mb-0">
                                    <thead class="text-secondary bg--light">
                                        <tr>
                                            <th class="pl-3 py-2">Nº</th>
                                            <th>Categoria</th>
                                            <th>Ação</th>
                                            <th>Data e hora</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark font-weight-medium">
                                        <tr>
                                            <td class="pl-3 py-2">01</td>
                                            <td class="py-2">CADASTRO DO AGENTE</td>
                                            <td data-agent-registration-status-label></td>
                                            <td data-agent-registration-updated-at-status-label></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-3 py-2">02</td>
                                            <td class="py-2">INSCRIÇÃO</td>
                                            <td data-inscription-project-status-label></td>
                                            <td data-inscription-project-updated-at-status-label></td>
                                        </tr> 
                                        <tr>
                                            <td class="pl-3 py-2">03</td>
                                            <td class="py-2">IDENTIFICAÇÃO DO PROJETO</td>
                                            <td data-identification-project-status-label></td>
                                            <td data-identification-project-updated-at-status-label></td>
                                        </tr> 
                                        <tr>
                                            <td class="pl-3 py-2">04</td>
                                            <td class="py-2">ARQUIVOS</td>
                                            <td data-files-status-lebel></td>
                                            <td data-files-updated-at-status-label></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-3 py-2">05</td>
                                            <td class="py-2">COMPLEMENTOS</td>
                                            <td data-complements-status-label></td>
                                            <td data-complements-updated-at-status-label></td>
                                        </tr>          
                                    </tbody>                     
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-primary rounded-lg px-4 py-1" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('css/libs/datatables/datatables.min.css') }}">
    </x-slot:styles>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/tenant/projects/search.js') }}?version=221120241644"></script>
    </x-slot:scripts>

</x-layout.panel>
