<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/landing-page/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page/responsive.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}" type="image/x-icon">
    </head>
<body>

  <!-- Page-wrapper-Start -->
  <div class="page_wrapper">

    <!-- Preloader -->
    <div id="preloader">
      <div id="loader"></div>
    </div>

    <div class="full_bg">

      <section class="signup_section">
        <div class="container">

          <div class="top_part">
            <a href="{{ route('landing.page.home') }}" class="back_btn"><i class="icofont-arrow-left"></i> Back to home</a>
            <a class="navbar-brand" href="{{ route('landing.page.home') }}">
              <img src="{{ asset('images/landing-page/logo.png') }}" alt="image">
            </a>
          </div>

          @yield('content')

        </div>
      </section>

    </div>

  </div>
  <!-- Page-wrapper-End -->

  <script src="{{ asset('js/landing-page/jquery.js') }}"></script>
  <script src="{{ asset('js/landing-page/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/landing-page/aos.js') }}"></script>
  <script src="{{ asset('js/landing-page/main.js') }}"></script>
  @yield('scripts')

</body>

</html>
