
$(document).ready(function() {
    const cpf = [{ "mask": "###.###.###-##"}, { "mask": "###.###.###-##"}];
    $('[name="cpf"]').inputmask({ 
        mask: cpf, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
});

document.querySelector('[name="phone"]').addEventListener('input', function(e) {
    var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
});

function triggerClick() {
    const newProfilePhoto = document.querySelector('#new_profile_photo');
    if (newProfilePhoto) {
        newProfilePhoto.click();
    }

    const profilePhotoUpdate = document.querySelector('#profile_photo_update');
    if (profilePhotoUpdate) {
        profilePhotoUpdate.click();
    }
}

function displayProfile(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {
            $('#profile_display').attr('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}

function loader(event) {
    const name = document.querySelector('[name="name"]');
    const genderMale = document.getElementById('genderMale');
    const genderFemale = document.getElementById('genderFemale');
    const cpfMasked = document.querySelector('[name="cpf"]').value;
    const roleId = document.querySelector('[name="role_id"]');
    const email = document.querySelector('[name="email"]');
    const password = document.querySelector('[name="password"]');

    if (name.value == '') {
        event.preventDefault();
        name.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Nome Completo Obrigatório!</span>',
            html: `Informe o Nome Completo!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (!genderMale.checked && !genderFemale.checked) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Marcação obrigatória!</span>',
            html: `Selecione o <strong>sexo</strong> do profissional!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cpfMasked.length >= 2 && cpfMasked.length <= 13) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">CPF Incompleto!</span>',
            html: `Informe o CPF!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cpfMasked.length === 14) {
        const cpf = cpfMasked.replace(/\D/g, '');
        let v = [];

        // Calcula o primeiro dígito de verificação
        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
        v[0] = v[0] % 11;
        v[0] = v[0] % 10;

        // Calcula o segundo dígito de verificação
        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
        v[1] = v[1] % 11;
        v[1] = v[1] % 10;

        //Retorna Verdadeiro se os dígitos de verificação são os esperados.
        if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
            event.preventDefault();

            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">CPF Inválido!</span>',
                html: `O <strong>número do CPF</strong> está incorreto!`,
                showConfirmButton: false,
                timer: 2000,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
    }
    
    if (roleId.value == '') {
        event.preventDefault();
        roleId.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Seleção obrigatória!</span>',
            html: `Selecione o Perfil de Acesso!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (email.value == '') {
        event.preventDefault();
        email.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">E-mail Obrigatório!</span>',
            html: `Informe o E-mail!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (password && password.value == '') {
        event.preventDefault();
        password.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Senha obrigatória!</span>',
            html: `Informe a Senha de Acesso!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    setTimeout(({ target }) => {
        target.disabled = true;
        target.innerHTML = 
            `<span class="spinner-border spinner-border-sm" 
                role="status" aria-hidden="true"></span>
            Aguarde...`;
    }, 10, event);

    setTimeout(({ target }) => {
        target.disabled = false;
        target.innerHTML = 'Salvar e continuar';
    }, 7000, event);
}
