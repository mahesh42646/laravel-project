@yield('css')

<link href="{{ asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" disabled />
<link href="{{ asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">

@yield('css-bottom')
