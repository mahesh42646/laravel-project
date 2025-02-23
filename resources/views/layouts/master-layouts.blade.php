<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }} - Sistema para cultura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema para cultura" />
    <meta name="author" content="Devcactus" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
    @include('layouts.head')
</head>

@yield('body')
    <div id="layout-wrapper">
        @include('layouts.top-hor')
        @include('layouts.hor-menu')

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
