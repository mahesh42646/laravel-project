<x-layout.painel>

    <input type="hidden" data-get-editals-url value="{{ route('public.panel.home.editals.index', $token) }}">
    @php $idsFromEditalsMyprojects = []; @endphp

    {{-- EDITAIS --}}
    <div class="card border col-12 p-md-4 p-1 mt-md-4 mt-3">
        <div class="d-md-flex flex-wrap h-auto mb-3">
            @foreach ($editals as $edital)
                <a href="{{ $edital->url }}" class="col-md-4 p-2 mb-3">
                    <div class="d-flex flex-column bg-white p-2 h-100" style="border-radius: 20px; border: 1px solid #CCC">
                        <img src="{{ asset('images/banner.webp') }}" class="w-100 mb-2" 
                            alt="imagem" style="border-radius: 10px; height: 100px;"
                        >
                        {!! $edital->status !!}  
                        <h4>{{ $edital->name }}</h4>
                        <div class="progress mb-2" style="height: 7px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ $edital->tenant_path }}" width="30px" height="30px" alt="logo">
                            </div>
                            <div class="ml-2">
                                <div class="text-dark font-weight-medium">{{ $edital->tenant }}</div>
                                <div class="text-secondary">{{ $edital->city }}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="d-flex justify-content-end">
            {{ $editals->links('components.pagination') }}
        </div>
    </div>

</x-layout.painel>
