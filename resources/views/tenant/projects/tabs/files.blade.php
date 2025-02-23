<div class="tab-pane fade p-3" id="files" role="tabpanel">
    <div class="d-md-flex justify-content-md-between align-items-md-center mb-4">
        <h5 class="mb-0">Arquivos</h5>
        <div class="d-flex">
            <a href="{{ route('projects.tabs.document.download', $project->id) }}"
                class="btn btn-primary font-weight-medium rounded-lg px-3 py-1" onclick="showProgressIndicator(this, 'Imprimir arquivos')"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40a8,8,0,0,0-11.32-11.32L136,124.69V32a8,8,0,0,0-16,0v92.69L93.66,98.34a8,8,0,0,0-11.32,11.32Z"></path>
                </svg>
                <span class="ml-1">Imprimir arquivos</span>
            </a>
        
            <div class="d-flex align-items-center ml-3">
                <button type="button" class="rounded-lg bg-white px-3 py-1"
                    data-toggle="modal" data-target="#filesStatusTimelineModal" style="border: 1px solid #CCC;"
                >
                    <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.2" d="M30 13.125C11.25 13.125 3.75 30 3.75 30C3.75 30 11.25 46.875 30 46.875C48.75 46.875 56.25 30 56.25 30C56.25 30 48.75 13.125 30 13.125ZM30 39.375C28.1458 39.375 26.3332 38.8252 24.7915 37.795C23.2498 36.7649 22.0482 35.3007 21.3386 33.5877C20.6291 31.8746 20.4434 29.9896 20.8051 28.171C21.1669 26.3525 22.0598 24.682 23.3709 23.3709C24.682 22.0598 26.3525 21.1669 28.171 20.8051C29.9896 20.4434 31.8746 20.6291 33.5877 21.3386C35.3007 22.0482 36.7649 23.2498 37.795 24.7915C38.8252 26.3332 39.375 28.1458 39.375 30C39.375 32.4864 38.3873 34.871 36.6291 36.6291C34.871 38.3873 32.4864 39.375 30 39.375Z" fill="#0062FF"></path>
                        <path d="M57.9633 29.2406C57.8812 29.0555 55.8961 24.6516 51.4828 20.2383C45.6023 14.3578 38.175 11.25 30 11.25C21.825 11.25 14.3976 14.3578 8.51717 20.2383C4.10388 24.6516 2.10935 29.0625 2.0367 29.2406C1.93009 29.4804 1.875 29.7399 1.875 30.0023C1.875 30.2648 1.93009 30.5243 2.0367 30.7641C2.11873 30.9492 4.10388 35.3508 8.51717 39.7641C14.3976 45.6422 21.825 48.75 30 48.75C38.175 48.75 45.6023 45.6422 51.4828 39.7641C55.8961 35.3508 57.8812 30.9492 57.9633 30.7641C58.0699 30.5243 58.125 30.2648 58.125 30.0023C58.125 29.7399 58.0699 29.4804 57.9633 29.2406ZM30 45C22.7859 45 16.4836 42.3773 11.2664 37.207C9.12571 35.0782 7.30448 32.6507 5.85935 30C7.30409 27.3491 9.12536 24.9215 11.2664 22.793C16.4836 17.6227 22.7859 15 30 15C37.214 15 43.5164 17.6227 48.7336 22.793C50.8784 24.921 52.7036 27.3486 54.1523 30C52.4625 33.1547 45.1008 45 30 45ZM30 18.75C27.7749 18.75 25.5999 19.4098 23.7498 20.646C21.8998 21.8821 20.4578 23.6391 19.6063 25.6948C18.7548 27.7505 18.5321 30.0125 18.9661 32.1948C19.4002 34.3771 20.4717 36.3816 22.045 37.955C23.6184 39.5283 25.6229 40.5998 27.8052 41.0338C29.9875 41.4679 32.2495 41.2451 34.3052 40.3936C36.3608 39.5422 38.1178 38.1002 39.354 36.2502C40.5902 34.4001 41.25 32.225 41.25 30C41.2469 27.0173 40.0606 24.1576 37.9515 22.0485C35.8424 19.9394 32.9827 18.7531 30 18.75ZM30 37.5C28.5166 37.5 27.0666 37.0601 25.8332 36.236C24.5998 35.4119 23.6385 34.2406 23.0709 32.8701C22.5032 31.4997 22.3547 29.9917 22.6441 28.5368C22.9335 27.082 23.6478 25.7456 24.6967 24.6967C25.7456 23.6478 27.0819 22.9335 28.5368 22.6441C29.9917 22.3547 31.4997 22.5032 32.8701 23.0709C34.2405 23.6386 35.4119 24.5999 36.236 25.8332C37.0601 27.0666 37.5 28.5166 37.5 30C37.5 31.9891 36.7098 33.8968 35.3033 35.3033C33.8968 36.7098 31.9891 37.5 30 37.5Z" fill="#556EE6"></path>
                    </svg>
                    Timeline
                </button>
                <div class="modal fade" id="filesStatusTimelineModal" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-body px-4 pb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <svg width="50" height="50" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_3021_15481)">
                                                <rect x="14" y="11" width="60" height="60" rx="30" fill="white"/>
                                                <path d="M44 28.9688C41.4041 28.9688 38.8665 29.7385 36.7081 31.1807C34.5498 32.6229 32.8675 34.6727 31.8741 37.071C30.8807 39.4693 30.6208 42.1083 31.1272 44.6543C31.6336 47.2003 32.8837 49.539 34.7192 51.3745C36.5548 53.2101 38.8934 54.4601 41.4394 54.9666C43.9854 55.473 46.6244 55.2131 49.0227 54.2197C51.421 53.2263 53.4708 51.544 54.913 49.3856C56.3552 47.2272 57.125 44.6896 57.125 42.0938C57.121 38.614 55.7369 35.2779 53.2764 32.8174C50.8158 30.3568 47.4798 28.9727 44 28.9688ZM44 53.0312C41.8368 53.0312 39.7221 52.3898 37.9235 51.1879C36.1248 49.9861 34.7229 48.2779 33.8951 46.2794C33.0672 44.2808 32.8506 42.0816 33.2727 39.9599C33.6947 37.8383 34.7364 35.8894 36.266 34.3598C37.7957 32.8301 39.7445 31.7884 41.8662 31.3664C43.9879 30.9444 46.187 31.161 48.1856 31.9888C50.1842 32.8167 51.8924 34.2185 53.0942 36.0172C54.296 37.8159 54.9375 39.9305 54.9375 42.0938C54.9342 44.9936 53.7809 47.7737 51.7304 49.8241C49.6799 51.8746 46.8998 53.028 44 53.0312ZM50.2426 35.8512C50.3443 35.9528 50.425 36.0734 50.48 36.2062C50.535 36.3389 50.5634 36.4813 50.5634 36.625C50.5634 36.7687 50.535 36.9111 50.48 37.0438C50.425 37.1766 50.3443 37.2972 50.2426 37.3988L44.7738 42.8676C44.6722 42.9692 44.5516 43.0498 44.4188 43.1048C44.286 43.1598 44.1437 43.1881 44 43.1881C43.8563 43.1881 43.714 43.1598 43.5812 43.1048C43.4484 43.0498 43.3278 42.9692 43.2262 42.8676C43.1246 42.766 43.0439 42.6453 42.989 42.5125C42.934 42.3798 42.9056 42.2375 42.9056 42.0938C42.9056 41.95 42.934 41.8077 42.989 41.675C43.0439 41.5422 43.1246 41.4215 43.2262 41.3199L48.6949 35.8512C48.7965 35.7495 48.9171 35.6688 49.0499 35.6138C49.1827 35.5587 49.325 35.5304 49.4688 35.5304C49.6125 35.5304 49.7548 35.5587 49.8876 35.6138C50.0204 35.6688 50.141 35.7495 50.2426 35.8512ZM39.625 25.6875C39.625 25.3974 39.7402 25.1192 39.9454 24.9141C40.1505 24.709 40.4287 24.5938 40.7188 24.5938H47.2813C47.5713 24.5938 47.8495 24.709 48.0547 24.9141C48.2598 25.1192 48.375 25.3974 48.375 25.6875C48.375 25.9776 48.2598 26.2558 48.0547 26.4609C47.8495 26.666 47.5713 26.7812 47.2813 26.7812H40.7188C40.4287 26.7812 40.1505 26.666 39.9454 26.4609C39.7402 26.2558 39.625 25.9776 39.625 25.6875Z" fill="#212636"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_d_3021_15481" x="0" y="0" width="88" height="88" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                <feOffset dy="3"/>
                                                <feGaussianBlur stdDeviation="7"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3021_15481"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3021_15481" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                        <span class="font-weight-medium font-size-16 text-dark">Timeline de arquivos</span> 
                                    </div>
                                    <button type="button" data-dismiss="modal" title="Fechar modal"
                                        class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                                        style="width: 20px !important; height: 20px !important; padding: 10px"
                                    >
                                        X
                                    </button>
                                </div>

                                {{-- LINHA DO DO TEMPO --}}
                                <div class="d-flex flex-column card p-3 mb-3" style="border-radius: 15px; border: 1px solid #d9d7d7;">
                                    <ol class="timeline">
                                        @foreach ($project->analyze_document?->timelines as $timeline)
                                            <li class="timeline-item">
                                                <span class="timeline-item-icon">
                                                    {!! $timeline->status->getIcon() !!}
                                                </span>
                                                <div class="timeline-item-description">
                                                    <div class="d-flex flex-column font-size-15 mb-2">
                                                        <span class="text-dark font-weight-medium">{{ $timeline->status->getName() }}</span>
                                                        <span class="text-secondary">
                                                            @if ($timeline->status->name == 'REVIEW')
                                                                Até: {{ $timeline->created_at?->format('d/m/Y \à\s H:i:s') }}
                                                            @else
                                                                {{ $timeline->created_at?->format('d/m/Y H:i:s') }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                    @if ($timeline->motive)
                                                        <div class="bg-light p-3 rounded-lg">
                                                            {{ $timeline->motive }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TITULO DOS ARQUIVOS --}}
    <div>
        @foreach ($files as $file)
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <div class="d-flex align-items-center text-dark">
                    <h1 class="font-weight-bold mb-0 mr-4">{{ $loop->iteration }}</h1>
                    <h5 class="mb-0">
                        {{ $file->document->name }} &nbsp;
                        <h6 class="mb-0">@if ($file->is_required->value) <span class="text-danger">(obrigatório)</span> @else <span>(opcional)</span> @endif</h6>
                    </h5>
                </div>

                <div class="d-flex">
                    <span class="d-flex align-items-center mr-2" data-file-{{ $file->id }}-status-label>
                        {!! $file->status->getIcon() !!}
                        <span class="text-dark ml-1">{{ $file->status->getName() }}</span>
                    </span>
                    <span type="button" class="d-flex align-items-center" data-toggle="modal" data-target="#openModalFile"
                        style="border: 1px solid #ccc; border-radius: 10px; padding: 3px {{ $file->status->value === 0 ? '21' : '20' }}px;"
                        onclick="toggleFileContainer('{{ $file->id }}')"
                    >
                        {!! $file->status->getIconAction() !!}
                        <span class="text-dark ml-2">{{ $file->status->getNameAction() }}</span>
                    </span>
                </div>
            </div>
            <hr class="my-2">
        @endforeach
    </div>
    
    {{-- MODAL DE SELECIONAR OS CAMPOS DE ARQUIVOS --}}
    <div class="modal fade" id="openModalFile">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color: #fdfdfd">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center p-3 mt-3">
                    <div class="d-flex align-items-center">
                        <svg width="60" height="60" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <h5 class="font-weight-bold mb-0 mr-md-5 mr-4">
                            <span data-file-title></span>
                            <span class="font-size-13" data-file-title-required-name></span> 
                        </h5>
                        <div class="d-flex">
                            <span type="button" class="mr-3" title="Voltar para o campo anterior"
                                data-previous-container="" data-previous-title="" data-previous-required=""
                                onclick="showPreviousFileContainer(this.dataset)" data-file-button-previous-container
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M216,88v80a8,8,0,0,1-8,8H120v48L24,128l96-96V80h88A8,8,0,0,1,216,88Z" opacity="0.2"></path>
                                    <path d="M208,72H128V32a8,8,0,0,0-13.66-5.66l-96,96a8,8,0,0,0,0,11.32l96,96A8,8,0,0,0,128,224V184h80a16,16,0,0,0,16-16V88A16,16,0,0,0,208,72Zm0,96H120a8,8,0,0,0-8,8v28.69L35.31,128,112,51.31V80a8,8,0,0,0,8,8h88Z"></path>
                                </svg>
                            </span>
                            <span type="button" title="Ir para o próximo campo"
                                data-next-container="" data-next-title="" data-next-required=""
                                onclick="showNextFileContainer(this.dataset)" data-file-button-next-container
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M136,224V176H48a8,8,0,0,1-8-8V88a8,8,0,0,1,8-8h88V32l96,96Z" opacity="0.2"></path>
                                    <path d="M237.66,122.34l-96-96A8,8,0,0,0,128,32V72H48A16,16,0,0,0,32,88v80a16,16,0,0,0,16,16h80v40a8,8,0,0,0,13.66,5.66l96-96A8,8,0,0,0,237.66,122.34ZM144,204.69V176a8,8,0,0,0-8-8H48V88h88a8,8,0,0,0,8-8V51.31L220.69,128Z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <span type="button" class="d-flex align-items-center ml-3 px-md-3 px-2 py-1" 
                        style="background-color: #b3b9c6; border-radius: 10px;" data-dismiss="modal"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#000000" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                        </svg>
                        <span class="ml-1 d-md-block d-none" style="color: #000">FECHAR</span>
                    </span>
                </div>
                
                @foreach ($files as $file)
                    <div data-container="{{ $file->id }}">
                        <div class="d-md-flex p-3">
                            <div class="col-md-8">
                                <div class="d-flex flex-column bg-white mb-3" style="border-radius: 15px; border: 1px solid #d9d7d7;">
                                    
                                    <div data-container-iframe="{{ $file->id }}" class="p-3">
                                        @if ($file->path)
                                            @php
                                                $diskLocal = Storage::disk('local');
                                                $fullFilePath = $diskLocal->path($file->path);
                                                $base64FilePath = base64_encode($diskLocal->get($file->path));
                                                $path = 'data:'.mime_content_type($fullFilePath).";base64,{$base64FilePath}";
                                            @endphp
                                            <iframe src="{{ $path }}" width="100%" height="600px" frameborder="0"></iframe>
                                        @else
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="#635bff" viewBox="0 0 256 256">
                                                    <path d="M208,72V184a8,8,0,0,1-8,8H176V104L136,64H80V40a8,8,0,0,1,8-8h80Z" opacity="0.2"></path>
                                                    <path d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z"></path>
                                                </svg>
                                                <span class="font-weight-medium font-size-18 mt-2">Nenhum arquivo foi selecionado</span>
                                            </div>
                                        @endif
                                    </div>

                                    <input type="hidden" value="{{ json_encode($files->map(fn ($file) => [
                                            'id' => $file->id, 
                                            'is_required' => $file->is_required->value, 
                                            'title' => $file->document->name
                                        ])->toArray()) }}" data-file-containers
                                    >
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">

                                {{-- LINHA DO DO TEMPO --}}
                                <div class="d-flex flex-column bg-white p-3 mb-3" style="border-radius: 15px; border: 1px solid #d9d7d7;">
                                    <div class="d-flex align-items-center">
                                        <svg width="50" height="50" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_3021_15481)">
                                                <rect x="14" y="11" width="60" height="60" rx="30" fill="white"/>
                                                <path d="M44 28.9688C41.4041 28.9688 38.8665 29.7385 36.7081 31.1807C34.5498 32.6229 32.8675 34.6727 31.8741 37.071C30.8807 39.4693 30.6208 42.1083 31.1272 44.6543C31.6336 47.2003 32.8837 49.539 34.7192 51.3745C36.5548 53.2101 38.8934 54.4601 41.4394 54.9666C43.9854 55.473 46.6244 55.2131 49.0227 54.2197C51.421 53.2263 53.4708 51.544 54.913 49.3856C56.3552 47.2272 57.125 44.6896 57.125 42.0938C57.121 38.614 55.7369 35.2779 53.2764 32.8174C50.8158 30.3568 47.4798 28.9727 44 28.9688ZM44 53.0312C41.8368 53.0312 39.7221 52.3898 37.9235 51.1879C36.1248 49.9861 34.7229 48.2779 33.8951 46.2794C33.0672 44.2808 32.8506 42.0816 33.2727 39.9599C33.6947 37.8383 34.7364 35.8894 36.266 34.3598C37.7957 32.8301 39.7445 31.7884 41.8662 31.3664C43.9879 30.9444 46.187 31.161 48.1856 31.9888C50.1842 32.8167 51.8924 34.2185 53.0942 36.0172C54.296 37.8159 54.9375 39.9305 54.9375 42.0938C54.9342 44.9936 53.7809 47.7737 51.7304 49.8241C49.6799 51.8746 46.8998 53.028 44 53.0312ZM50.2426 35.8512C50.3443 35.9528 50.425 36.0734 50.48 36.2062C50.535 36.3389 50.5634 36.4813 50.5634 36.625C50.5634 36.7687 50.535 36.9111 50.48 37.0438C50.425 37.1766 50.3443 37.2972 50.2426 37.3988L44.7738 42.8676C44.6722 42.9692 44.5516 43.0498 44.4188 43.1048C44.286 43.1598 44.1437 43.1881 44 43.1881C43.8563 43.1881 43.714 43.1598 43.5812 43.1048C43.4484 43.0498 43.3278 42.9692 43.2262 42.8676C43.1246 42.766 43.0439 42.6453 42.989 42.5125C42.934 42.3798 42.9056 42.2375 42.9056 42.0938C42.9056 41.95 42.934 41.8077 42.989 41.675C43.0439 41.5422 43.1246 41.4215 43.2262 41.3199L48.6949 35.8512C48.7965 35.7495 48.9171 35.6688 49.0499 35.6138C49.1827 35.5587 49.325 35.5304 49.4688 35.5304C49.6125 35.5304 49.7548 35.5587 49.8876 35.6138C50.0204 35.6688 50.141 35.7495 50.2426 35.8512ZM39.625 25.6875C39.625 25.3974 39.7402 25.1192 39.9454 24.9141C40.1505 24.709 40.4287 24.5938 40.7188 24.5938H47.2813C47.5713 24.5938 47.8495 24.709 48.0547 24.9141C48.2598 25.1192 48.375 25.3974 48.375 25.6875C48.375 25.9776 48.2598 26.2558 48.0547 26.4609C47.8495 26.666 47.5713 26.7812 47.2813 26.7812H40.7188C40.4287 26.7812 40.1505 26.666 39.9454 26.4609C39.7402 26.2558 39.625 25.9776 39.625 25.6875Z" fill="#212636"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_d_3021_15481" x="0" y="0" width="88" height="88" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                <feOffset dy="3"/>
                                                <feGaussianBlur stdDeviation="7"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3021_15481"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3021_15481" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                        <span class="font-weight-medium font-size-16 text-dark">Timeline</span> 
                                    </div>

                                    <ol class="timeline" data-file-{{ $file->id }}-timeline>
                                        @if ($file->timelines->isNotEmpty())
                                            @foreach ($file->timelines as $timeline)
                                                <li class="timeline-item">
                                                    <span class="timeline-item-icon">
                                                        {!! $timeline->status->getIcon() !!}
                                                    </span>
                                                    <div class="timeline-item-description">
                                                        <div class="d-flex flex-column font-size-15 mb-2">
                                                            <span class="text-dark font-weight-medium">{{ $timeline->status->getName() }}</span>
                                                            <span class="text-secondary">
                                                                @if ($timeline->status->name == 'REVIEW')
                                                                    Até: {{ $timeline->expired_at?->format('d/m/Y \à\s H:i:s') }}
                                                                @else
                                                                    {{ $timeline->created_at?->format('d/m/Y H:i:s') }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        @if ($timeline->motive)
                                                            <div class="bg-light p-3 rounded-lg">
                                                                {{ $timeline->motive }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ol>

                                    <div data-file-{{ $file->id }}-alert></div>

                                    <button type="button" class="w-100 btn font-weight-medium p-2 mb-3" 
                                        style="border: 1px solid #CCC; bord-radius: 20px; background-color: #f9fafb;" data-id="{{ $file->id }}"
                                        data-route="{{ route('projects.tabs.document.timeline.reanalyze', [$project->id, $file->id]) }}"
                                        data-timeline-selector="[data-file-{{ $file->id }}-timeline]" data-alert-selector="[data-file-{{ $file->id }}-alert]"
                                        data-status-selector="[data-file-{{ $file->id }}-status-label]" onclick="addFormFileReviewInTimeline(this.dataset)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#0263ff" viewBox="0 0 256 256">
                                            <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
                                        </svg>
                                        <span class="text-dark ml-1">Solicitar revisão de dados</span>
                                    </button>
                                        
                                    <button type="button" class="w-100 btn font-weight-medium p-2 mb-3" 
                                        style="border: 1px solid #CCC; bord-radius: 20px; background-color: #f9fafb;" data-id="{{ $file->id }}"
                                        data-route="{{ route('projects.tabs.document.timeline.repproved', [$project->id, $file->id]) }}"
                                        data-timeline-selector="[data-file-{{ $file->id }}-timeline]" data-alert-selector="[data-file-{{ $file->id }}-alert]"
                                        data-status-selector="[data-file-{{ $file->id }}-status-label]" onclick="addFormFileRepprovedInTimeline(this.dataset)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                                        </svg>
                                        <span class="text-dark ml-1">Reprovar</span>
                                    </button>
                                        
                                    <button type="button" class="w-100 btn waves-effect font-weight-medium p-2 mb-1" 
                                        style="border: 1px solid #CCC; bord-radius: 20px; background-color: #f9fafb;"
                                        data-route="{{ route('projects.tabs.document.timeline.approved', [$project->id, $file->id]) }}" 
                                        data-alert-selector="[data-file-{{ $file->id }}-alert]"
                                        data-status-selector="[data-file-{{ $file->id }}-status-label]" onclick="saveFileApproved(this)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                                        </svg>
                                        <span class="text-dark ml-1">Aprovar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- BOTOES DE REPROVAR, REANALISAR E APROVAR --}}
    <div class="d-flex justify-content-md-end flex-wrap mt-3">
        @if ($project->analyze_document?->status?->getName() !== 'Em Reanálise')
            <button type="button" class="btn font-weight-medium rounded-lg px-2 py-1 ml-md-3" 
                data-target="#fileStatusReanalyze" data-toggle="modal" style="border: 1px solid #CCC;"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#0263ff" viewBox="0 0 256 256">
                    <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
                </svg>
                <span class="text-dark ml-1">Solicitar revisão de dados</span>
            </button>
        @endif
        @if ($project->analyze_document?->status?->getName() !== 'Reprovado')
            <button type="button" class="btn font-weight-medium rounded-lg px-2 py-1 ml-md-3" 
                data-target="#fileStatusRepproved" data-toggle="modal" style="border: 1px solid #CCC;"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
                <span class="text-dark ml-1">Reprovar documentação</span>
            </button>
        @endif
        @if ($project->analyze_document?->status?->getName() !== 'Aprovado')
            <a href="{{ route('projects.tabs.document.approved', $project->id) }}" 
                class="btn font-weight-medium rounded-lg px-2 py-1 ml-md-3" style="border: 1px solid #CCC;"
                onclick="showProgressIndicator(this, 'Aprovar documentação')"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
                <span class="text-dark ml-1">Aprovar documentação</span> 
            </a>
        @endif
    </div>

    {{-- MODAL REPROVAR --}}
    <div class="modal fade" id="fileStatusRepproved" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('projects.tabs.document.repproved', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                    @csrf
                    @method('PUT')

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="font-weight-semibold text-dark mb-0">
                            Analisar documentação
                        </h5>
                        <button type="button" data-dismiss="modal" title="Fechar modal"
                            class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                            style="width: 20px !important; height: 20px !important; padding: 10px"
                        >
                            X
                        </button>
                    </div>

                    <div class="d-md-flex">
                        <div class="col-md-12 px-0 mb-3">
                            <label class="text-dark">Motivo <span class="text-danger">*</span></label>
                            <textarea class="form-control rounded-lg" name="motive" rows="15" placeholder="Digite o motivo aqui" required></textarea>
                        </div>
                    </div>
                
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger font-weight-medium rounded-lg px-5" 
                            onclick="showProgressIndicator(this, 'Reprovar')"
                        >
                            Reprovar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL REANALISAR --}}
    <div class="modal fade" id="fileStatusReanalyze" tabindex="-1" role="dialog" aria-labelledby="warningTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('projects.tabs.document.reanalyze', $project->id) }}" method="POST" class="modal-body px-4 pb-4">
                    @csrf
                    @method('PUT')

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="font-weight-semibold text-dark mb-0">
                            Analisar documentação
                        </h5>
                        <button type="button" data-dismiss="modal" title="Fechar modal"
                            class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" 
                            style="width: 20px !important; height: 20px !important; padding: 10px"
                        >
                            X
                        </button>
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
                            <input type="date" class="form-control" name="expired_at" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-dark">Hora limite <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="hour" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="invisible">.</label>
                            <button type="submit" class="form-control btn btn-primary waves-effect font-weight-medium rounded-lg px-5 py-1 ml-md-3" 
                                onclick="showProgressIndicator(this, 'Reanalisar')"
                            >
                                Reanalisar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
