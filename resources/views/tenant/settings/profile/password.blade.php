<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        @include('tenant.settings.sidebar', [
            $active = 'password'
        ])

        {{-- PERFIL DE ACESSO DO USUARIO --}}
        <div class="col-md-9 pl-md-5">
            <div class="row">
                <form action="{{ route('profile.change.password') }}" method="POST" class="card border col-12 p-4">
                    @csrf
                    @method('PUT')

                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256">
                                <path d="M48,56V200a8,8,0,0,1-16,0V56a8,8,0,0,1,16,0Zm92,54.5L120,117V96a8,8,0,0,0-16,0v21L84,110.5a8,8,0,0,0-5,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,140,110.5ZM246,115.64A8,8,0,0,0,236,110.5L216,117V96a8,8,0,0,0-16,0v21l-20-6.49a8,8,0,0,0-4.95,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,246,115.64Z"></path>
                            </svg>
                        </div>
                        <h5 class="text-dark font-weight-bold ml-2 mb-0">Alterar senha</h5>
                    </div>

                    {{-- SENAH ATUAL, NOVA SENHA E CONFIRMAR NOVA SENHA --}}
                    <div class="mb-3">
                        <label class="text-dark mb-1">Senha atual</label>
                        <input type="password" name="password_current" class="form-control rounded-lg" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark mb-1">Nova senha</label>
                        <input type="password" name="new_password" class="form-control rounded-lg" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark mb-1">Confirmar a nova senha</label>
                        <input type="password" name="new_password_confirmation" class="form-control rounded-lg" required>
                    </div>

                    {{-- BOTAO DE ATUALIZAR SENHA --}}
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <button type="submit" class="btn btn-primary px-3" onclick="loader(this)">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            function loader(button) {
                setTimeout(() => {
                    button.disabled = true;
                    button.innerHTML = (
                        `<span class="spinner-border spinner-border-sm mr-2" 
                            role="status" aria-hidden="true">
                        </span> Aguarde...`
                    );
                }, 20);

                setTimeout(() => {
                    button.disabled = false;
                    button.innerHTML = 'Atualizar';
                }, 7000);
            }
        </script>
    </x-slot:scripts>

</x-layout.panel>

