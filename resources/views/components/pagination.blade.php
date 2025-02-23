@if ($paginator->hasPages())
    <nav class="d-flex justify-content-end">
        <ul class="pagination">

            <li class="align-items-center text-dark d-flex mr-4">
                <span class="text-secondary mr-2">Linhas por página:</span> 
                <span>{{ $paginator->perPage() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 -960 960 960" fill="#5f6368">
                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/>
                </svg>
            </li>
            <li class="align-items-center d-flex mr-4">
                {{ $paginator->perPage() * ($paginator->currentPage() - 1) }}-{{ ($paginator->perPage() * ($paginator->currentPage() - 1)) + $paginator->count() }} de {{ $paginator->total() }}
            </li>

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="align-items-center d-flex mr-2" title="Primeira Página">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 -960 960 960" fill="#CCC">
                        <path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z"/>
                    </svg>
                </li>
            @else
                <li class="align-items-center d-flex mr-2" title="Página Anterior">
                    <a class="waves-effect rounded-lg px-2" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 -960 960 960" fill="#5f6368">
                            <path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z"/>
                        </svg>
                    </a>
                </li>
            @endif
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="align-items-center d-flex mr-3" title="Próxima Página">
                    <a class="waves-effect rounded-lg px-2" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 -960 960 960" fill="#5f6368">
                            <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"/>
                        </svg>
                    </a>
                </li>
            @else
                <li class="align-items-center d-flex mr-3" title="Última Página">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 -960 960 960" fill="#CCC">
                        <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"/>
                    </svg>
                </li>
            @endif
        </ul>
    </nav>
@endif
