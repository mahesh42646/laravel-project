const containerCompany = document.querySelector('[data-js="container-company"]');
const cnpj = document.querySelector('[name="cnpj"]');
const companyName = document.querySelector('[name="company_name"]');

function changeType(type) {
    if (type === 'PJ') {
        containerCompany.classList.remove('d-none');
        cnpj.disabled = false;
        companyName.disabled = false;
    } else {
        containerCompany.classList.add('d-none');
        cnpj.disabled = true;
        companyName.disabled = true;
    }
}

$(document).ready(function() {
    $('[name="cpf"]').inputmask({ 
        mask: [{ 'mask': '###.###.###-##' }], 
        greedy: false, 
        definitions: { '#': { validator: '[0-9]', cardinality: 1}} 
    });

    $('[name="cnpj"]').inputmask({ 
        mask: [{ 'mask': '##.###.###/####-##' }], 
        greedy: false, 
        definitions: { '#': { validator: '[0-9]', cardinality: 1}} 
    });
});

(async () => {
    const fillUrl = document.querySelector('[data-js="fill-url"]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({ currencyBrl: '[name="income"]' });
})();

document.querySelector('[name="phone"]').addEventListener('input', function(e) {
    var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
});

function triggerClick() {
    const profilePhotoUpdate = document.querySelector('#profilePhotoUpdate');
    if (profilePhotoUpdate) {
        profilePhotoUpdate.click();
    }
}

function displayProfile(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {

            let size = event.total;
            let counter = 0;
            const unit = ['B', 'KB', 'MB', 'GB'];

            while (size > 900) {
                size /= 1024;
                counter++;
            }

            const exactSize = Math.round(size*100)/100;
            const typeSize = unit[counter];

            if (typeSize === 'MB' || typeSize === 'GB') {
                document.getElementById('profilePhotoUpdate').value = '';

                return Swal.fire(message(
                    `Imagem de perfil muito grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            if (size > 100) {
                document.getElementById('profilePhotoUpdate').value = '';

                return Swal.fire(message(
                    `Imagem de perfil grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            const profileDisplay = document.querySelector('#profile_display');
            profileDisplay.setAttribute('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}

function triggerClickCover() {
    const coverPhotoUpdate = document.querySelector('#profileCoverUpdate');
    if (coverPhotoUpdate) {
        coverPhotoUpdate.click();
    }
}

function displayCover(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {

            let size = event.total;
            let counter = 0;
            const unit = ['B', 'KB', 'MB', 'GB'];

            while (size > 900) {
                size /= 1024;
                counter++;
            }

            const exactSize = Math.round(size*100)/100;
            const typeSize = unit[counter];

            if (typeSize === 'MB' || typeSize === 'GB') {
                document.getElementById('profileCoverUpdate').value = '';

                return Swal.fire(message(
                    `Imagem de fundo muito grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            if (size > 100) {
                document.getElementById('profileCoverUpdate').value = '';
                
                return Swal.fire(message(
                    `Imagem de fundo grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            const converDisplay = document.querySelector('#coverDisplay');
            converDisplay.setAttribute('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}

function loaderProfile(event) {
    const pf = document.getElementById('pf');
    const pj = document.getElementById('pj');
    const cpfMasked = document.querySelector('[name="cpf"]').value;
    const rg = document.querySelector('[name="rg"]');
    const name = document.querySelector('[name="name"]');
    const genderId = document.querySelector('[name="gender_id"]');
    const breedId = document.querySelector('[name="breed_id"]');
    const isLgbt = document.querySelector('[name="is_lgbt"]');
    const schoolingId = document.querySelector('[name="schooling_id"]');
    const income = document.querySelector('[name="income"]');
    const areaAtuationId = document.querySelector('[name="area_atuation_id"]');
    const communityTraditionalId = document.querySelector('[name="community_traditional_id"]');
    const city = document.querySelector('[name="city"]');
    const phone = document.querySelector('[name="phone"]');
    const email = document.querySelector('[name="email"]');

    if (!pf.checked && !pj.checked) {
        event.preventDefault();

        return Swal.fire(message(
            'Marcação obrigatória!', 
            'Selecione o <strong>tipo de pessoa</strong> Física/Jurídica!',
        ));
    }

    if (cpfMasked == '') {
        event.preventDefault();

        return Swal.fire(message(
            'CPF Obrigatório!', 
            'Informe o CPF!',
        ));
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

            return Swal.fire(message(
                'CPF Inválido!', 
                'O <strong>número do CPF</strong> está incorreto!',
            ));
        }
    }

    if (rg.value == '') {
        event.preventDefault();
        rg.focus();

        return Swal.fire(message(
            'RG Obrigatório!', 
            'Informe o RG!',
        ));
    }

    if (name.value == '') {
        event.preventDefault();
        name.focus();

        return Swal.fire(message(
            'Nome Completo Obrigatório!', 
            'Informe o Nome Completo!',
        ));
    }

    if (genderId.value == '') {
        event.preventDefault();
        genderId.focus();

        return Swal.fire(message(
            'Gênero Obrigatório!', 
            'Selecione o Gênero!',
        ));
    }

    if (breedId.value == '') {
        event.preventDefault();
        breedId.focus();

        return Swal.fire(message(
            'Raça Obrigatória!', 
            'Selecione a Raça!',
        ));
    }

    if (isLgbt.value == '') {
        event.preventDefault();
        isLgbt.focus();

        return Swal.fire(message(
            'Seleção obrigatória!', 
            'Selecione se o usuário é LGBTQIAPN+!',
        ));
    }

    if (schoolingId.value == '') {
        event.preventDefault();
        schoolingId.focus();

        return Swal.fire(message(
            'Escolaridade obrigatória!', 
            'Selecione a Escolaridade!',
        ));
    }

    if (income.value == '') {
        event.preventDefault();
        income.focus();

        return Swal.fire(message(
            'Renda Individual Obrigatória!', 
            'Informe o Renda Individual!',
        ));
    }

    if (areaAtuationId.value == '') {
        event.preventDefault();
        areaAtuationId.focus();

        return Swal.fire(message(
            'Principal área de atuação obrigatória!', 
            'Informe a principal área de atuação!',
        ));
    }

    if (communityTraditionalId.value == '') {
        event.preventDefault();
        communityTraditionalId.focus();

        return Swal.fire(message(
            'Comunidade tradicional obrigatória!', 
            'Informe a comunidade tradicional!',
        ));
    }

    if (city.value == '') {
        event.preventDefault();
        city.focus();

        return Swal.fire(message(
            'Cidade obrigatória!', 
            'Informe a cidade!',
        ));
    }

    if (phone.value == '') {
        event.preventDefault();
        phone.focus();

        return Swal.fire(message(
            'Telefone obrigatório!', 
            'Informe o telefone!',
        ));
    }

    if (email.value == '') {
        event.preventDefault();
        email.focus();

        return Swal.fire(message(
            'E-mail obrigatório!', 
            'Informe o e-mail!',
        ));
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
        target.innerHTML = 'Salvar';
    }, 7000, event);
}

const message = (title, description, duration = 2500) => {
    return ({
        iconColor: 'var(--blue)',
        icon:  'info',
        title: `<span style="color: var(--blue)">${title}</span>`,
        html: description,
        showConfirmButton: false,
        timer: duration,
        customClass: {htmlContainer: 'mt-1'}
    });
}
