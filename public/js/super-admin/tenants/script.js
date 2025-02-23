$(document).ready(function() {
    const cnpj = [{ "mask": "##.###.###/####-##"}];
    $('[name="cnpj"]').inputmask({ 
        mask: cnpj, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
});

document.querySelector('[name="phone"]').addEventListener('input', function(e) {
    const aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
});

function triggerClick() {
    const newLogo = document.querySelector('#newLogo');
    if (newLogo) {
        newLogo.click();
    }

    const logoUpdate = document.querySelector('#logoUpdate');
    if (logoUpdate) {
        logoUpdate.click();
    }
}

function displayLogo(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {
            $('[data-js="logo-image"]').attr('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}

function loader(event) {
    const cityId = document.querySelector('[name="city_id"]');
    const name = document.querySelector('[name="name"]');
    const cnpj = document.querySelector('[name="cnpj"]');
    const phone = document.querySelector('[name="phone"]');
    const companyId = document.querySelector('[name="company_id"]');
    const newLogo = document.querySelector('[name="new_logo"]');
    const logoUpdate = document.querySelector('[name="logo_update"]');

    if (cityId.value == '') {
        event.preventDefault();
        cityId.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Seleção obrigatória!</span>',
            html: `Selecione a cidade!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (name.value == '') {
        event.preventDefault();
        name.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Razão social obrigatória!</span>',
            html: `Informe a razão social!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cnpj.value == '') {
        event.preventDefault();
        cnpj.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">CNPJ obrigatório!</span>',
            html: `Selecione o <strong>cnpj</strong> da empresa!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (phone.value == '') {
        event.preventDefault();
        phone.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Telefone obrigatório!</span>',
            html: `Informe o telefone!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (companyId.value == '') {
        event.preventDefault();
        companyId.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Seleção obrigatória!</span>',
            html: `Selecione a empresa vinculada!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (newLogo && newLogo.value == '') {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Brasão obrigatório!</span>',
            html: `Carregue a imagem do brasão da prefeitura!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (logoUpdate && logoUpdate.value == '') {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Brasão obrigatório!</span>',
            html: `Carregue a imagem do brasão da prefeitura!`,
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
        target.innerHTML = 'Salvar';
    }, 7000, event);
}
