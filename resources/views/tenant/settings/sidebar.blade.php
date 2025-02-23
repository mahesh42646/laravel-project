<div class="col-md-3">
    <div class="row">
        <div class="card border col-12 px-3 py-4">
            <div class="text-secondary font-weight-medium mb-2">Administrador</div>
            <div class="rounded-lg py-2 px-1 mb-2" style="background-color: {{ $active === 'admin' ?  '#f3f2ff' : 'transparent' }}">
                <a href="{{ route('profile.edit') }}">
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#{{ $active === 'admin' ? '635BFF' : '667085' }}">
                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                    </svg>
                    <span class="ml-2 font-weight-medium text-{{ $active === 'admin' ?  'primary' : 'secondary' }}">Admin</span>
                </a>
            </div>
            <div class="rounded-lg py-2 px-1 mb-2" style="background-color: {{ $active === 'password' ?  '#f3f2ff' : 'transparent' }}">
                <a href="{{ route('profile.password') }}">
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" fill="#{{ $active === 'password' ? '635BFF' : '667085' }}" viewBox="0 0 256 256">
                        <path d="M128,112a28,28,0,0,0-8,54.83V184a8,8,0,0,0,16,0V166.83A28,28,0,0,0,128,112Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,128,152Zm80-72H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    <span class="ml-2 font-weight-medium text-{{ $active === 'password' ?  'primary' : 'secondary' }}">Senha</span>
                </a>
            </div>
            <div class="text-secondary font-weight-medium mb-2 mt-4">Editais</div>

            <div class="rounded-lg py-2 px-1 mb-2" style="background-color: {{ $active === 'pdf' ?  '#f3f2ff' : 'transparent' }}">
                <a href="{{ route('editals.documents.types.index') }}">
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" fill="#{{ $active === 'pdf' ? '635BFF' : '667085' }}" viewBox="0 0 256 256">
                        <path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path>
                    </svg>
                    <span class="ml-3 font-weight-medium text-{{ $active === 'pdf' ?  'primary' : 'secondary' }}">Tipos de arquivos</span>
                </a>
            </div>
            
        </div>
    </div>
</div>
