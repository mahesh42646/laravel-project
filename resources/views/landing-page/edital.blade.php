@extends('layouts.landing-page.master')
@section('title') Gestor Cultural @endsection

@section('content')

  <div class="page_wrapper">

    <!-- Our Resource Section Start -->
    <section class="our_resource" style="margin-bottom: 0px !important; padding-bottom: 0px !important">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
              <h2>Últimos <span>editais</span></h2>
              <h6 class="mb-0">
                Atenção! Antes de se inscrever em qualquer edital, certifique de verificar sua cidade primeiro!
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Articles Section Start -->
    <section class="articles_section row_am">
      <div class="container">
        <div class="d-flex align-items-center justify-content-end" data-aos="fade-up" data-aos-duration="1500">
          <div class="col-md-6"></div>
          <form action="{{ route('landing.page.edital') }}" class="d-flex col-md-6 col-12" method="GET">
            <input type="text" class="form-control rounded-lg border-0" name="buscar" placeholder="Digite sua busca aqui">
            <button type="submit" class="d-flex btn text-white font-weight-light rounded-lg px-4 ml-2" style="background-color: var(--primery)">
              <svg xmlns="http://www.w3.org/2000/svg" height="23" viewBox="0 -960 960 960" width="23" fill="#FFF">
                <path d="M796-121 533-384q-30 26-69.959 40.5T378-329q-108.162 0-183.081-75Q120-479 120-585t75-181q75-75 181.5-75t181 75Q632-691 632-584.85 632-542 618-502q-14 40-42 75l264 262-44 44ZM377-389q81.25 0 138.125-57.5T572-585q0-81-56.875-138.5T377-781q-82.083 0-139.542 57.5Q180-666 180-585t57.458 138.5Q294.917-389 377-389Z"/>
              </svg>
              <span class="ml-2">Pesquisar</span>
            </button>
          </form>
        </div>
        <hr>
        
        @forelse ($editals as $edital)
          <div class="d-flex align-items-center bg-white px-4 py-3 mb-3" data-aos="fade-up" data-aos-duration="1500" style="border-radius: 20px;">
            <div class="col-md-2 col-3 px-0">
              <a href="{{ route('public.register.customers.show', base64_encode($edital->id)) }}" class="img">
                <img src="{{ asset('images/banner.webp') }}" class="img-fluid" alt="image"
                  style="border-radius: 20px; {{ $edital->status->value != '1' ? 'filter: grayscale(1)' : '' }}"
                >
              </a>
            </div>
            <div class="col-md-7 col-9 pr-0">
              <div class="text-left">

                @if ($edital->status->value == '1')
                  <span class="bg-white px-3 py-1 rounded-pill mb-4" style="color: var(--primery); border: 1px solid #3f67f3;">
                    {{ $edital->tenant->city->name }}
                  </span>
                  <a href="{{ route('public.register.customers.show', base64_encode($edital->id)) }}" class="img">
                    <h6 class="font-weight-bold mt-3">{{ $edital->name }}</h6>
                  </a>
                  <div class="d-block d-md-none">Inscrições até {{ $edital->closed_at?->format('d/m/Y') }} {{ $edital->horary_closed_at }}</div>
                
                @else 

                  <span class="bg-white text-secondary border px-3 py-1 rounded-pill mb-4">
                    {{ $edital->tenant->city->name }}
                  </span>
                  <a href="{{ route('public.register.customers.show', base64_encode($edital->id)) }}" class="img">
                    <h6 class="text-secondary font-weight-bold mt-3">{{ $edital->name }}</h6>
                  </a>
                  <span class="bg-secondary text-white rounded-pill px-3 py-2 font-weight-medium">
                    <span class="mr-1">Encerrado</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" fill="#FFF">
                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"></path>
                    </svg>
                  </span>
                  
                @endif

              </div>
            </div>
            <div class="col-md-3 pr-0 d-md-block d-none">
              <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="font-weight-bold mb-0" style="line-height: 1;">Inscrições abertas até</div>
                <div class="font-weight-bold mb-3" style="color: var(--primery);">{{ $edital->closed_at?->format('d/m/Y') }} {{ $edital->horary_closed_at }}</div>
                <div>
                  @if ($edital->status->value == '1')
                    <a href="{{ route('public.register.customers.show', base64_encode($edital->id)) }}" class="d-flex btn px-4 py-3 text-white rounded-lg" style="background-color: var(--primery); border-radius: 15px !important;">
                      <span class="mr-2">Inscreva-se</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#FFF">
                          <path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h405l-60 60H180v600h600v-348l60-60v408q0 24-18 42t-42 18H180Zm300-360ZM360-360v-170l382-382q9-9 20-13t22-4q11 0 22.317 4.5T827-911l83 84q8.609 8.958 13.304 19.782Q928-796.394 928-785.197q0 11.197-4.5 22.697T910-742L530-360H360Zm508-425-84-84 84 84ZM420-420h85l253-253-43-42-43-42-252 251v86Zm295-295-43-42 43 42 43 42-43-42Z"/>
                        </svg>
                    </a>
                  @else
                    <button type="button" class="w-100 btn btn-secondary font-weight-medium" style="border-radius: 10px; padding: 11px 20px;">
                        <span class="mr-1">Encerrado</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="23" viewBox="0 -960 960 960" width="23" fill="#FFF">
                            <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"></path>
                        </svg>
                    </button>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @empty 
          <div class="d-flex flex-column align-items-center justify-content-center rounded-lg p-3" style="color: #555;">
              <svg xmlns="http://www.w3.org/2000/svg" height="150" viewBox="0 -960 960 960" width="150" fill="#888">
                <path d="M660-190q46 0 78-31.5t32-78.5q0-46-32-78t-78-32q-47 0-78.5 32T550-300q0 47 31.5 78.5T660-190ZM864-54 757-160q-21 14-45.5 22t-51.5 8q-71 0-120.5-49.5T490-300q0-70 49.5-120T660-470q70 0 120 50t50 120q0 28-8.5 52.5T799-202L905-96l-41 42ZM180-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v154q-24-11-49-17t-51-6q-42 0-78.5 13T516-480H279v60h185q-15 24-23.5 52T430-310H279v60h156q14 60 55.5 106T592-80H180Zm331-554h189L511-820l189 186-189-186v186Z"/>
              </svg>
            <div class="mt-3" style="line-height: 1;">Nenhum edital foi encontrado!</div>
            <div>Termo buscado: <strong>{{ request()->buscar }}</strong></div>
          </div>
        @endforelse

        <div id="paginate">
            <div class="d-flex justify-content-center mt-3">
                {{ $editals->links() }}
            </div>
        </div>
      </div>
    </section>

  </div>

@endsection
