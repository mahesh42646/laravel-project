@extends('layouts.landing-page.master')
@section('title') Notícias - {{ config('app.name') }} @endsection

@section('content')

  <!-- Page-wrapper-Start -->
  <div>

    <!-- Our Resource Section Start -->
    <section class="our_resource" style="margin-bottom: 0px !important; padding-bottom: 0px !important">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
              <h2 class="mb-0">Últimas <span>notícias</span></h2>
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
        
        @forelse ($posts as $post)

          <a href="{{ route('landing.page.posts.show', $post->slug) }}" class="img">
            
            <div class="img d-flex align-items-center bg-white px-4 py-3 mb-3" data-aos="fade-up" data-aos-duration="1500" style="border-radius: 20px;">


              <div class="pr-3">
                <img src="{{ $post->image_path }}" class="img-fluid" style="border-radius: 20px;  width: 100px;" alt="image">
              </div>
              <div>
                <div class="text-left">
                  <span class="bg-white px-3 py-1 rounded-pill mb-4" style="color: var(--primery); border: 1px solid #3f67f3;">{{ $post->title }}</span>
                  <div class="img">
                    <h6 class="mt-3">Publicado em: <strong>{{ $post->registered_at?->format('d/m/Y H:i') }}</strong></h6>
                  </div>
                </div>
              </div>

            </div>
            
            
            
          </a>
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
                {{ $posts->links() }}
            </div>
        </div>
      </div>
    </section>

  </div>

@endsection
