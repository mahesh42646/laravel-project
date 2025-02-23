<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Login do Agente Cultural | Gestor Cultural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mapa Cultural">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Devcactus">
    <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app/app.min.css') }}">
</head>
<body class="bg-white">
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    
    <div class="container p-3">
        <div class="d-md-flex align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-semibold text-dark mb-3 mt-5">Bem vindo de volta 👋</h2>
                <h5 class="font-weight-normal text-dark mb-0">Hoje é um novo dia. É o teu dia.</h5>
                <h5 class="font-weight-normal text-dark mb-4">Faça login para começar a visualizar os seus trabalhos.</h5>

                <form method="POST" action="{{ route('public.auth.authenticate') }}" class="form-horizontal">
                    @csrf
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <span>{!! session('error') !!}</span>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="text-dark font-size-15 mb-1">E-mail</label>
                        <input type="email" name="email" class="form-control font-size-16 rounded-lg" id="email" 
                            value="{{ old('email') }}" required autofocus style="background-color: #F7FAFF;"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-dark font-size-15 mb-1">Senha</label>
                        <input type="password" name="password" class="form-control font-size-16 rounded-lg" 
                            style="background-color: #F7FAFF;" id="password" required
                        >
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn text-white btn-block waves-effect waves-light border-0 font-size-16"
                            style="background-color: #004D40; border-radius: 10px;"
                        >
                            Entrar
                        </button>
                    </div>
                </form>

                <div class="mt-5 text-center">
                    <p>© {{ date('Y') }} Gestor Cultural Todos os direitos reservados</p>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block pl-5">
                <img src="{{ asset('assets/images/login.webp') }}" alt="login" class="img-fluid" style="border-radius: 20px;">
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/libs/metismenu/metismenu.min.js') }}"></script>
	<script src="{{ asset('js/libs/node-waves/node-waves.min.js') }}"></script>
	<script src="{{ asset('js/libs/panel/panel.js') }}"></script>
</body>
</html>
