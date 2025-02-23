@php 
    $userCurrent = auth()->user();
    $alerts = App\Models\Notification\NotificationProfessional::getAll(); 
@endphp

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <div class="navbar-brand-box">
                <a href="{{ route('panel') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo/mobile-dark.webp') }}" alt="dark" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo/desktop-dark.webp') }}" alt="dark" height="17">
                    </span>
                </a>
                <a href="{{ route('panel') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo/mobile-light.webp') }}" alt="light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo/desktop-light.webp') }}" alt="light" height="35">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content"
            >
                <i class="bx bx-menu font-size-24"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" aria-expanded="false"
                    id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                >
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge badge-danger badge-pill">{{ count($alerts) }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown"
                >
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0">Notificações</h6>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="notification-list-scroll overflow-auto" style="max-height: 230px;">
                        @forelse ($alerts as $alert)
                            <a href="{{ route('notifications.show', $alert->id) }}" class="text-reset notification-item bg-light ">
                                <div class="media p-3">
                                    <div class="media-body">
                                        <h6 class="text-dark font-weight-semibold mt-0 mb-1">Alerta do Artista</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">{!! Str::limit($alert->title, 60) !!}</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ date('d/m/Y H:i', strtotime($alert->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="{{ route('notifications.index') }}">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> Veja mais..
                        </a>
                    </div>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                >
                    <img src="{{ $userCurrent->avatar }}" class="rounded-circle header-profile-user" alt="Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user font-size-16 align-middle mr-1"></i> Alterar perfil
                    </a>
                    <a class="dropdown-item d-block" href="{{ route('profile.password') }}">
                        <i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Alterar senha
                    </a>
                    @if ($userCurrent->tenant_id)
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                            <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                            Sair
                        </a>
                    @endif
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect ">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
        </div>
    </div>
</header>
