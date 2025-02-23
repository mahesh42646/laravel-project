<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    <div class="d-md-flex">

        {{-- BARRA LATERAL ESQUERDA --}}
        @include('tenant.settings.sidebar', [
            $active = 'admin'
        ])

        {{-- PERFIL DE ACESSO DO USUARIO --}}
        <div class="col-md-9 pl-md-5">
            <div class="row">
                <form action="{{ route('profile.update') }}" method="POST" 
                    enctype="multipart/form-data" class="card border col-12 px-3 py-4"
                >
                    @csrf
                    @method('PUT')

                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000000" viewBox="0 0 256 256">
                                <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                            </svg>
                        </div>
                        <h5 class="text-dark font-weight-bold ml-2 mb-0">Informações</h5>
                    </div>
                    
                    {{-- AVATAR --}}
                    <div class="d-md-flex mb-4">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <img src="{{ $user->avatar }}" width="80px" height="80px" class="rounded-circle" data-image-avatar>
                                    <input type="file" class="d-none" name="avatar" accept=".png,.jpeg,.jpg" data-file-avatar onchange="showAvatar(this)">
                                </div>
                                <div>
                                    <h5 class="text-dark font-weight-semibold mb-1">Carregar Imagem</h5>
                                    <div class="text-secondary mb-2">400x400px, PNG ou JPEG</div>
                                    <div>
                                        <span type="button" class="border px-3 py-1 rounded-lg"
                                            style="border: 1px solid #CCC !important;" onclick="selectAvatar()"
                                        >
                                            Selecionar
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NOME, TELEFONE E EMAIL --}}
                    <div class="d-md-flex mb-3">
                        <div class="col-md-12">
                            <label>Nome *</label>
                            <input type="text" class="form-control text-uppercase" name="name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="d-md-flex mb-3">
                        <div class="col-md-12">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="d-md-flex mb-3">
                        <div class="col-md-12">
                            <label>Email *</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    {{-- BOTAO DE SALVAR DADOS DO PERFIL DE ACESSO --}}
                    <div class="d-flex justify-content-end align-items-center mt-3 pr-2">
                        <button type="submit" class="btn btn-primary px-3" onclick="loader(this)">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            function selectAvatar() {
                const avatarFile = document.querySelector('[data-file-avatar]');
                if (avatarFile) {
                    avatarFile.click();
                }
            }

            function showAvatar(event) {
                if (event.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function({ target }) {
                        const imageAvatar = document.querySelector('[data-image-avatar]');
                        imageAvatar.setAttribute('src', target.result);
                    }

                    reader.readAsDataURL(event.files[0]);
                }
            }

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
                    button.innerHTML = 'Salvar';
                }, 7000);
            }
        </script>
    </x-slot:scripts>

</x-layout.panel>
