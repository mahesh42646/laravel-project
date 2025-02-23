<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Gestor Cultural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mapa Cultural" />
    <meta name="author" content="Devcactus" />
    <meta name="robots" content="noindex, nofollow">
	<link rel="shortcut icon" href="{{ asset('images/landing-page/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap-dark.min.css') }}" id="bootstrap-dark" />
	<link rel="stylesheet" href="{{ asset('css/libs/bootstrap/bootstrap.min.css') }}" id="bootstrap-light" />
	<link rel="stylesheet" href="{{ asset('css/libs/icons/icons.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app/app-rtl.min.css') }}" id="app-rtl" disabled />
	<link rel="stylesheet" href="{{ asset('css/app/app-dark.min.css') }}" id="app-dark" />
	{{ $styles ?? '' }}
	<link rel="stylesheet" href="{{ asset('css/app/app.min.css') }}" id="app-light" />
</head>

<body data-topbar="dark" data-layout="horizontal">

    <div id="layout-wrapper">
		@include('layouts.top-hor')
        @include('layouts.hor-menu')
		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					{{ $slot }}
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							{{ date('Y') }} © Mapa Cultural
						</div>
						<div class="col-sm-6">
							<div class="text-sm-right d-none d-sm-block">
								Design & Develop by DevCactus Tecnologia
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	@include('layouts.right-sidebar')
    <script src="{{ asset('js/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/libs/metismenu/metismenu.min.js') }}"></script>
	<script src="{{ asset('js/libs/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('js/libs/node-waves/node-waves.min.js') }}"></script>
	<script src="{{ asset('js/libs/panel/panel.js') }}"></script>
    {{ $scripts ?? '' }}
</body>
</html>
