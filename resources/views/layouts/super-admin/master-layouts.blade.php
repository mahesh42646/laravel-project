<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }} - Sistema para cultura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mapa Cultural" />
    <meta name="author" content="Devcactus" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    @include('layouts.head')
</head>

@yield('body')
    <div id="layout-wrapper">
        @php $userCurrent = auth()->user() @endphp
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="{{ route('dash.home') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/logo/desktop-light.webp') }}" alt="logo" height="30">
                            </span>
                        </a>
                        <a href="{{ route('dash.home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-light.webp') }}" alt="logomarca" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/logo/desktop-light.webp') }}" alt="logo" height="30">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block ml-1">
                        <button type="button" data-js="switch-theme" data-theme="sun" onclick="changeThemeMode(this)" class="btn pr-1 header-item noti-icon waves-effect"></button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >
                            <img class="rounded-circle header-profile-user" src="{{ $userCurrent->avatar }}" alt="Avatar">
                            <span class="d-none d-xl-inline-block ml-1">{{ explode(' ', $userCurrent->name)[0] }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('dash.profile.edit') }}">
                                <i class="bx bx-user font-size-16 align-middle mr-1"></i> Alterar perfil
                            </a>
                            <a class="dropdown-item d-block" href="{{ route('dash.profile.password') }}">
                                <i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Alterar senha
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('auth.super.admin.logout') }}">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                Sair
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link pr-0" href="{{ route('dash.home') }}" title="Painel de Controle">
                                    <i class="bx bxs-grid-alt mr-2"></i> Dashboard
                                </a>
                            </li>
                            @if ($userCurrent->role_id?->value === 99)
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="{{ route('dash.users.index') }}">
                                        <i class="bx bx-user-circle mr-2"></i> Usuários
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('dash.tenants.index') }}">
                                    <i class="bx bxs-bank mr-2"></i> Prefeituras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('dash.artists.index') }}">
                                    <i class="bx bx-user-circle mr-2"></i> Artistas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('dash.posts.index') }}">
                                    <i class="bx bx-list-ul mr-2"></i> Notícias
                                </a>
                            </li>
                            @if ($userCurrent->role_id?->value === 99)
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="{{ route('dash.companies.index') }}">
                                        <i class="bx bx-buildings mr-2"></i> Empresas
                                    </a>
                                </li>

                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a class="nav-link dropdown-toggle arrow-none d-flex align-items-center" 
                                        href="#" id="topnav-layout" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    >
                                        <i class="bx bx-cog mr-2"></i> Configurações <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                        <a class="dropdown-item" href="{{ route('dash.cities.index') }}">
                                            Cidades
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    @include('layouts.right-sidebar')
    @include('layouts.footer-script')
</body>

</html>
