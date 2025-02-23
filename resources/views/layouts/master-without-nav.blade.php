<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }} - Sistema para gestão da cultura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema para gestão da cultura" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Devcactus" />
    <link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
    @include('layouts.head')
</head>

@yield('body')

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

@yield('content')

@include('layouts.footer-script')

</body>

</html>
