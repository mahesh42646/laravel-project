const urlSearchOccupation = document.querySelector('[data-url-search-occupation]');
const token = document.querySelector('[name="_token"]');

$('[name="cpf"]').inputmask({ 
    mask: [{ 'mask': '###.###.###-##' }], 
    greedy: false, 
    definitions: { '#': { validator: '[0-9]', cardinality: 1 }} 
});

$('[name="phone"]').inputmask({ 
    mask: [{ 'mask': '(##) #####-####' }], 
    greedy: false, 
    definitions: { '#': { validator: '[0-9]', cardinality: 1 }} 
});

function triggerAvatar() {
    const fileAvatar = document.querySelector('[data-file-avatar]');
    if (fileAvatar) {
        fileAvatar.click();
    }
}

function showAvatar(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function ({ target }) {
            const imageAvatar = document.querySelector('[data-image-avatar]');
            imageAvatar.src = target.result;
        }

        reader.readAsDataURL(event.files[0]);
    }
}

$('[data-occupation]').select2({
    ajax: {
        url: urlSearchOccupation.value,
        type: 'POST',
        dataType: 'json',
        data: function () {
            return {
                filter: $('.select2-search__field').val(),
                _token: token.value
            }
        },
        delay: 400,
        processResults: function (response) {
            return { results: response.occupations }
        },
        cache: true
    },

    templateResult: function (occupations) {
        if (occupations.loading) {
            return $(
                `<span class="spinner-border spinner-border-sm text-primary mr-2" role="status" aria-hidden="true">
                </span><span class="text-primary fw-600">Buscando cargos...</span>`
            );
        }

        return $(
            `<div><strong>NOME:</strong> ${occupations.name}</div>
            <div><strong>CBO:</strong> ${occupations.cbo}</div>
            <div style="border-bottom: 1px solid #CCC;"></div>`
        );
    },

    templateSelection: function (occupation) {
        if (occupation.id) {
            if (typeof occupation.name !== 'undefined') {
                return $(`<option value="${occupation.id}">${occupation.name} CBO (${occupation.cbo})</option>`);
            }

            return $(`<option value="${occupation.id}">${occupation.text}</option>`);
        }
            
        return occupation.text;
    },

    placeholder: 'Buscar cargo por nome',
    minimumInputLength: 2,
    language: {
        'noResults': () => 'Nenhum resultado encontrado',
        'searching': () => 'Buscando...',
        'errorLoading': () => 'Os resultados não puderam ser carregados.',
        'inputTooShort': () => 'Digite 2 ou mais caracteres',
    },
});

function save(event, textButton) {
    const name = document.querySelector('[name="name"]');
    const cpfMasked = document.querySelector('[name="cpf"]');
    const cpfNumbers = cpfMasked.value.replace(/\D/g, '');
    const nickname = document.querySelector('[name="nickname"]');
    const genderId = document.querySelector('[name="gender_id"]');
    const phone = document.querySelector('[name="phone"]');
    const roleId = document.querySelector('[name="role_id"]');
    const email = document.querySelector('[name="email"]');
    const password = document.querySelector('[name="password"]');

    if (name.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: name,
            title: '<span style="color: var(--blue)">Nome completo obrigatório!</span>',
            subtitle: 'Informe o nome completo do profissional!'
        }));
    }

    if (cpfMasked.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: cpfMasked,
            title: '<span style="color: var(--blue)">CPF obrigatório!</span>',
            subtitle: 'Informe o CPF do profissional!'
        }));
    }

    if (cpfNumbers.length >= 1 && cpfNumbers.length <= 10) {
        event.preventDefault();

        return Swal.fire(message({
            element: cpfMasked,
            title: '<span style="color: var(--blue)">CPF Incompleto!</span>',
            subtitle: 'Informe o CPF!'
        }));
    }

    if (cpfNumbers.length === 11) {
        const cpf = cpfNumbers;
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

            return Swal.fire(message({
                element: cpfMasked,
                title: '<span style="color: var(--blue)">CPF Inválido!</span>',
                subtitle: 'O <strong>número do CPF</strong> está incorreto!'
            }));
        }
    }

    if (nickname.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: nickname,
            title: '<span style="color: var(--blue)">Nome social obrigatório!</span>',
            subtitle: 'Informe o nome social do profissional!'
        }));
    }

    if (genderId.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: genderId,
            title: '<span style="color: var(--blue)">Gênero obrigatório!</span>',
            subtitle: 'Selecione o gênero do profissional!'
        }));
    }

    if (phone.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: phone,
            title: '<span style="color: var(--blue)">Telefone obrigatório!</span>',
            subtitle: 'Informe o telefone do profissional!'
        }));
    }

    if (roleId.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: roleId,
            title: '<span style="color: var(--blue)">Perfil de acesso obrigatório!</span>',
            subtitle: 'Selecione o perfil de acesso do profissional!'
        }));
    }

    if (email.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: email,
            title: '<span style="color: var(--blue)">Email obrigatório!</span>',
            subtitle: 'Informe o email do profissional!'
        }));
    }

    if (password && password.value == '') {
        event.preventDefault();

        return Swal.fire(message({
            element: password,
            title: '<span style="color: var(--blue)">Senha obrigatória!</span>',
            subtitle: 'Informe a senha do profissional!'
        }));
    }

    setTimeout(({ target }) => {
        target.disabled = true;
        target.innerHTML = (
            `<span class="spinner-border spinner-border-sm mr-2" 
                role="status" aria-hidden="true">
            </span> Aguarde...`
        );
    }, 10, event);

    setTimeout(({ target }) => {
        target.disabled = false;
        target.innerHTML = textButton;
    }, 7000, event);
}

const message = (alert) => {
    if (alert.element) {
        alert.element.focus()
    }

    return ({
        iconColor: 'var(--blue)',
        icon:  'info',
        title: alert.title,
        html: alert.subtitle,
        showConfirmButton: false,
        timer: 2000,
        customClass: { htmlContainer: 'mt-1' }
    });
}
