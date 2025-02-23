<x-layout.panel>

    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('customers.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Editar senha do agente cultural</h3>
    </div>

    {{-- FORMULARIO --}}
    <div class="row card p-4 rounded-lg shadow">
        <div class="col-lg-12 px-0">
            <form action="{{ route('customers.password.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NOME DO USUARIO, SENHA ATUAL E NOVA SENHA --}}
                <div class="d-md-flex">
                    <div class="col-md-3 d-flex align-items-center jsutify-content-center">
                        <img src="{{ $customer->avatar }}" class="rounded-circle" style="width: 200px; height: 200px;">
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="text-dark">Nome do usuário</label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $agent->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Senha atual</label>
                            <input type="text" class="form-control rounded-lg bg-light" value="{{ $customer->password }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Nova senha <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-lg" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-dark">Confirmar nova senha <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-lg" name="password_confirmation" id="" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" onclick="loader(event)"
                                class="btn btn-primary rounded-lg font-weight-medium px-5"
                            >
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script>
            const newPassword = document.querySelector('[name="new_password"]');
            const passwordConfirmation = document.querySelector('[name="password_confirmation"]');

            function loader(event) {
                if (newPassword.value == '') {
                    event.preventDefault();
                    newPassword.focus();

                    return Swal.fire({
                        iconColor: 'var(--blue)',
                        icon:  'info',
                        title: '<span style="color: var(--blue)">Campo nova senha é obrigatório!</span>',
                        html: `Informa a nova senha!`,
                        showConfirmButton: false,
                        timer: 2500,
                        customClass: { htmlContainer: 'mt-1' }
                    });
                }

                if (passwordConfirmation.value == '') {
                    event.preventDefault();
                    passwordConfirmation.focus();

                    return Swal.fire({
                        iconColor: 'var(--blue)',
                        icon:  'info',
                        title: '<span style="color: var(--blue)">Campo confirmar senha é obrigatório!</span>',
                        html: `Informa a senha de confirmação!`,
                        showConfirmButton: false,
                        timer: 2500,
                        customClass: { htmlContainer: 'mt-1' }
                    });
                }

                if (newPassword.value != passwordConfirmation.value) {
                    event.preventDefault();

                    return Swal.fire({
                        iconColor: 'var(--blue)',
                        icon:  'info',
                        title: '<span style="color: var(--blue)">Senhas diferentes!</span>',
                        html: `A nova senha não coincide com a senha de confirmação!`,
                        showConfirmButton: false,
                        timer: 2500,
                        customClass: { htmlContainer: 'mt-1' }
                    });
                }

                setTimeout(({ target }) => {
                    target.disabled = true;
                    target.innerHTML = (
                        `<span class="spinner-border spinner-border-sm" 
                            role="status" aria-hidden="true"></span>
                        Aguarde...`
                    );
                }, 10, event);

                setTimeout(({ target }) => {
                    target.disabled = false;
                    target.innerText = 'Salvar';
                }, 6000, event);
            }

        </script>
    </x-slot:scripts>

</x-layout.panel>