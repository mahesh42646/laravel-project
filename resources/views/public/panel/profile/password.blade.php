<x-layout.painel>

    {{-- ALERTA DE SUCESSO --}}
    <x-alert.success :message="session('success')" />

    <form action="{{ route('public.panel.profile.password.update', $token) }}" method="POST" class="card d-flex p-4 mb-3">
        @csrf
        @method('PUT')

        <h3 class="text-dark font-weight-bold mb-4">Editar senha</h3>

        {{-- NOME DO USUARIO, SENHA ATUAL E NOVA SENHA --}}
        <div class="d-md-flex flex-wrap">
            <div class="mb-3 mr-md-2">
                <label class="text-dark mb-1">E-mail</label>
                <input type="text" class="form-control rounded-lg bg-light" value="{{ $customer->email }}" readonly>
            </div>
            <div class="mb-3 mr-md-2">
                <label class="text-dark mb-1">Senha atual</label>
                <input type="text" class="form-control rounded-lg bg-light" value="{{ $customer->password }}" readonly>
            </div>
            <div class="mb-3 mr-md-2">
                <label class="text-dark mb-1">Nova senha <span class="text-danger">*</span></label>
                <input type="password" class="form-control rounded-lg" name="new_password" required>
            </div>
            <div class="mb-3 mr-md-2">
                <label class="text-dark mb-1">Confirmar nova senha <span class="text-danger">*</span></label>
                <input type="password" class="form-control rounded-lg" name="password_confirmation" id="" required>
            </div>
            <div class="mb-3 mr-md-2">
                <label class="invisible mb-1">*</label>
                <button type="submit" onclick="save(event)"
                    class="btn btn-dark form-control rounded-lg font-weight-medium px-5"
                >
                    Salvar
                </button>
            </div>
        </div>
    </form>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script>
            const newPassword = document.querySelector('[name="new_password"]');
            const passwordConfirmation = document.querySelector('[name="password_confirmation"]');

            function save(event) {
                if (newPassword.value === '') {
                    event.preventDefault();
                    newPassword.focus();

                    return showAlert(
                        'Campo nova senha é obrigatório!', 
                        'Informe a nova senha!'
                    );
                }

                if (passwordConfirmation.value === '') {
                    event.preventDefault();
                    passwordConfirmation.focus();

                    return showAlert(
                        'Campo confirmar senha é obrigatório!', 
                        'Informe a senha de confirmação!'
                    );
                }

                if (newPassword.value !== passwordConfirmation.value) {
                    event.preventDefault();

                    return showAlert(
                        'Senhas diferentes!', 
                        'A nova senha não coincide com a senha de confirmação!'
                    );
                }

                showProgressIndicator(event.target);
            }

            const showAlert = (title, subtitle) => {
                Swal.fire({
                    iconColor: 'var(--blue)',
                    icon:  'info',
                    title: `<span style="color: var(--blue)">${title}</span>`,
                    html: subtitle,
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: { htmlContainer: 'mt-1' }
                });
            }

            const showProgressIndicator = (button) => {
                const buttonState = (isLoading, text) => {
                    button.disabled = isLoading;
                    button.innerHTML = text;
                }

                setTimeout(() => buttonState(true, '<spinner></spinner> Aguarde...'), 10);
                setTimeout(() => buttonState(false, 'Salvar'), 7000);
            }

        </script>
    </x-slot:scripts>

</x-layout.painel>
