@php
    $user = auth()->user();
@endphp

<div class="right-bar p-3">
    <div data-simplebar class="h-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="mb-0">Definições</h6>
            <a href="javascript:void(0);" class="right-bar-toggle text-dark bg-transparent float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="currentColor">
                    <path d="m336-293.85 144-144 144 144L666.15-336l-144-144 144-144L624-666.15l-144 144-144-144L293.85-624l144 144-144 144L336-293.85ZM480.07-100q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Z"/>
                </svg>
            </a>
        </div>

        <div class="rounded-lg p-1 mb-4" style="background-color: #f3f2ff">
            <a href="{{ route('profile.edit') }}">
                <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#635BFF">
                    <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
                <span class="font-weight-medium text-primary">Administrador</span>
            </a>
        </div>

        <h6 class="text-dark mb-3">Editais</h6>
        <div class="rounded-lg p-1 mb-5" style="color: #545a6d;">
            <a href="{{ route('editals.documents.types.index') }}">
                <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" fill="#667085" viewBox="0 0 256 256">
                    <path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path>
                </svg>
                <span class="font-weight-medium text-secondary">Tipos de arquivos</span>
            </a>
        </div>
        
        <h6 class="text-center">Aparência</h6>
        <div class="px-4">
            <div class="mb-2">
                <img src="{{ asset('images/layouts/light-mode.webp') }}" class="img-fluid img-thumbnail" alt="light-mode">
            </div>
            <div class="custom-control custom-switch text-center mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                <label class="custom-control-label" for="light-mode-switch"></label>
            </div>
            <div class="mb-2">
                <img src="{{ asset('images/layouts/dark-mode.webp') }}" class="img-fluid img-thumbnail" alt="dark-mode">
            </div>
            <div class="custom-control custom-switch text-center mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                    data-bsStyle="{{ asset('css/libs/bootstrap/bootstrap-dark.min.css') }}"
                    data-appStyle="{{ asset('css/app/app-dark.min.css') }}" 
                />
                <label class="custom-control-label" for="dark-mode-switch"></label>
            </div>
            <div class="custom-control d-none custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                    data-appStyle="{{ asset('css/app/app-rtl.min.css') }}" 
                />
                <label class="custom-control-label" for="rtl-mode-switch">Modo RTL</label>
            </div>
        </div>
    </div>
</div>
