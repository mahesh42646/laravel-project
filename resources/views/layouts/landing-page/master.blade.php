<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/landing-page/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/responsive.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}" type="image/x-icon">
    </head>
<body>

  <div id="preloader">
    <div id="loader"></div>
  </div>

  <header>
    <!-- container start -->
    <div class="container">
      <!-- navigation bar -->
      <nav class="navbar navbar-expand-lg">
        <a href="{{ route('landing.page.home') }}">
            <img src="{{ asset('images/landing-page/logo.webp') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
            <span class="toggle-wrap">
              <span class="toggle-bar"></span>
            </span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('landing.page.home') }}">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('landing.page.edital') }}">Editais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('landing.page.posts.index') }}">Notícias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://api.whatsapp.com/send?phone=5583999338953" target="_blank">Contato</a>
            </li>
            <li class="nav-item">
              <div class="btn_block">
                <a href="#" class="nav-link dark_btn" data-toggle="modal" data-target="#login">Entrar</a>
                <div class="btn_bottom"></div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- navigation end -->
    </div>
    <!-- container end -->
  </header>

  @yield('content')

  <!-- FOOTER -->
  <div class="page_wrapper">

    <!-- Footer-Section start -->
    <footer class="white_text" data-aos="fade-in" data-aos-duration="1500">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="logo_side">
              <div class="logo">
                <a href="{{ route('landing.page.home') }}">
                  <img src="{{ asset('images/landing-page/ft_logo.webp') }}" loading="lazy" alt="Logo">
                </a>
              </div>
              <div class="news_letter">
                <h3>Se inscreva na nossa newsletter</h3>
                <p>Seja o primeiro a receber todas as novidades</p>
                <form>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Digite seu e-mail">
                    <button class="btn"><i class="icofont-paper-plane"></i></button>
                  </div>
                  <p class="note">Ao clicar em enviar link você concorda em receber mensagem.</p>
                </form>
              </div>
              <ul class="contact_info">
                <li><a href="mailto:">suporte@mapadacultura.com</a></li>
                <li><a href="tel: ">(83) 9 9933-8953</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="download_side">
              <h3>Acesso restrito</h3>
              <ul class="app_btn">
                <li>
                  <a href="{{ route('public.auth.login') }}" class="text-white">
                    Artista
                  </a>
                </li>
                <li>
                  <a href="{{ route('login') }}" class="text-white px-5">
                    Prefeitura
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="container">
          <div class="ft_inner">
            <div class="copy_text">
              <p>© {{ config('app.name') }} {{ date('Y') }}. Todos os direitos reservados.</p>
            </div>
            <ul class="links">
              <li><a href="{{ route('landing.page.home') }}">Início</a></li>
              <li><a href="{{ route('landing.page.edital') }}">Editais</a></li>
              <li><a href="https://api.whatsapp.com/send?phone=5583999338953" target="_blank">Contato</a></li>
            </ul>
            <div class="design_by">
              <p>Design & Develop by DevCactus</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer-Section end -->

    <!-- go top button -->
    <div class="go_top" id="Gotop">
      <span><i class="icofont-arrow-up"></i></span>
    </div>
  </div>

  {{-- MODAL DE LOGIN --}}
  <div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content border-0">

            <div class="modal-header" style="background-color: var(--primery)">
                <h5 class="modal-title text-white">Fazer Login</h5>
                <button type="button" class="bg-transparent border-0" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#FFF">
                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-dark font-weight-medium mb-4" style="line-height: 1;">
                  Para entrar na plataforma {{ config('app.name') }}, é necessário selecionar o seu perfil de acesso.
                </p>
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('login') }}" class="btn btn-dark py-2 rounded-lg w-75 font-weight-medium">PREFEITURA</a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                  <a href="{{ route('auth.super.admin.login') }}" class="btn btn-dark py-2 rounded-lg w-75 font-weight-medium">AGÊNCIA</a>
                </div>
                <hr>
                <div class="d-flex justify-content-center mb-3">
                  <a href="{{ route('public.auth.login') }}" class="btn text-white py-2 rounded-lg w-75 font-weight-medium" style="background-color: var(--primery)">ARTISTA</a>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="{{ asset('js/landing-page/jquery.js') }}"></script>
  <script src="{{ asset('js/landing-page/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/landing-page/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/landing-page/aos.js') }}"></script>
  <script src="{{ asset('js/landing-page/main.js') }}"></script>
  @yield('scripts')

</body>

</html>
