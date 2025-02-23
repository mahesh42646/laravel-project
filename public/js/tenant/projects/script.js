const typePf = document.getElementById('pf');
const typePj = document.getElementById('pj');
const searchCustomerCpfUrl = document.querySelector('[data-js="search-customer-cpf-url"]');
const searchCustomerCnpjUrl = document.querySelector('[data-js="search-customer-cnpj-url"]');
const searchFileUrl = document.querySelector('[data-js="search-file-edital-url"]');
const containerFile = document.querySelector('[data-js="container-files"]');
const editalId = document.querySelector('[name="edital_id"]');
const typePeople = document.querySelector('[data-js="type-people"]');
const customerId = document.querySelector('[name="customer_id"]');
const containerCompany = document.querySelector('[data-js="container-company"]');
const companyCnpj = document.querySelector('[data-js="company-cnpj"]');
const companyName = document.querySelector('[data-js="company-name"]');
const cpf = document.querySelector('[data-js="cpf"]');
const rg = document.querySelector('[data-js="rg"]');
const customerName = document.querySelector('[data-js="name"]');
const gender = document.querySelector('[data-js="gender"]');
const nameSocial = document.querySelector('[data-js="name_social"]');
const breed = document.querySelector('[data-js="breed"]');
const isLgbt = document.querySelector('[data-js="is_lgbt"]');
const schooling = document.querySelector('[data-js="schooling"]');
const income = document.querySelector('[data-js="income"]');
const areaAtuation = document.querySelector('[data-js="area_atuation"]');
const areaAtuationOther = document.querySelector('[data-js="area_atuation_other"]');
const communityTraditional = document.querySelector('[data-js="community_traditional"]');
const city = document.querySelector('[data-js="city"]');
const address = document.querySelector('[data-js="address"]');
const phone = document.querySelector('[data-js="phone"]');
const email = document.querySelector('[data-js="email"]');
const projectName = document.querySelector('[name="name"]');
const projectPrice = document.querySelector('[name="price"]');
const customerCompanyNameHidden = document.querySelector('[name="customer_company_name"]');
const customerCnpjHidden = document.querySelector('[name="customer_cnpj"]');
const milliseconds = 400;
let timer;

cpf.addEventListener('keyup', function(event) {
    cpfNumbers = event.target.value.replace(/\D/g, '');

    if (cpfNumbers.length === 11) {
        clearTimeout(timer);

        timer = setTimeout((event) => {

            // SE NAO TIVER SIDO PRESSIONADA A TECLA BACKSPACE OU ENTER
            if (event.keyCode !== 8 && event.keyCode !== 13) {
                fetch(`${searchCustomerCpfUrl.value}?cpf=${cpfNumbers}`)
                    .then((response) => response.json())
                    .then((request) => {
                        if (request.customer.length <= 0) {
                            clearFields();

                            return Swal.fire({
                                iconColor: 'var(--blue)',
                                icon:  'info',
                                title: '<span style="color: var(--blue)">Não encontrado!</span>',
                                html: `O CPF informado não foi encontrado!`,
                                showConfirmButton: false,
                                timer: 2000,
                                customClass: { htmlContainer: 'mt-1' }
                            });
                        }

                        editalId.value = '';
                        containerFile.innerHTML = '';
                        customerId.value = request.customer.id;
                        rg.value = request.customer.rg;
                        customerName.value = request.customer.name;
                        gender.value = request.customer.gender;
                        nameSocial.value = request.customer.name_social;
                        breed.value = request.customer.breed;
                        isLgbt.value = request.customer.is_lgbt;
                        schooling.value = request.customer.schooling;
                        income.value = request.customer.income;
                        areaAtuation.value = request.customer.area_atuation;
                        areaAtuationOther.value = request.customer.area_atuation_other;
                        communityTraditional.value = request.customer.community_traditional;
                        city.value = request.customer.city;
                        address.value = request.customer.address;
                        phone.value = request.customer.phone;
                        email.value = request.customer.email;
                    })
            }
        }, milliseconds, event)
    }
});

companyCnpj.addEventListener('keyup', function(event) {
    cnpjNumbers = event.target.value.replace(/\D/g, '');

    if (cnpjNumbers.length === 14) {
        clearTimeout(timer);

        timer = setTimeout((event) => {

            // SE NAO TIVER SIDO PRESSIONADA A TECLA BACKSPACE OU ENTER
            if (event.keyCode !== 8 && event.keyCode !== 13) {
                fetch(`${searchCustomerCnpjUrl.value}?cnpj=${cnpjNumbers}`)
                    .then((response) => response.json())
                    .then((request) => {
                        if (request.customer.length <= 0) {
                            clearFields();

                            return Swal.fire({
                                iconColor: 'var(--blue)',
                                icon:  'info',
                                title: '<span style="color: var(--blue)">Não encontrado!</span>',
                                html: `O CNPJ informado não foi encontrado!`,
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: { htmlContainer: 'mt-1' }
                            });
                        }

                        customerCompanyNameHidden.value = request.customer.company_name;
                        customerCnpjHidden.value = companyCnpj.value;
                        companyName.value = request.customer.company_name;
                        cpf.value = request.customer.cpf;
                        editalId.value = '';
                        containerFile.innerHTML = '';
                        customerId.value = request.customer.id;
                        rg.value = request.customer.rg;
                        customerName.value = request.customer.name;
                        gender.value = request.customer.gender;
                        nameSocial.value = request.customer.name_social;
                        breed.value = request.customer.breed;
                        isLgbt.value = request.customer.is_lgbt;
                        schooling.value = request.customer.schooling;
                        income.value = request.customer.income;
                        areaAtuation.value = request.customer.area_atuation;
                        areaAtuationOther.value = request.customer.area_atuation_other;
                        communityTraditional.value = request.customer.community_traditional;
                        city.value = request.customer.city;
                        address.value = request.customer.address;
                        phone.value = request.customer.phone;
                        email.value = request.customer.email;
                    })
            }
        }, milliseconds, event)
    }
});

function changeEdital(element) {
    const containerEditalPremiation = document.querySelector('[data-js="container-edital-premiation"]');
    const containerEditalDefault = document.querySelector('[data-js="container-edital-default"]');
    const resumePremiation = document.querySelector('[data-js="resume-premiation"]');
    const resumeDefault = document.querySelector('[data-js="resume-default"]');
    const option = element.options[element.selectedIndex].dataset;

    if (option.editalTypeId == '1') {
        containerEditalDefault.classList.remove('d-none');
        containerEditalPremiation.classList.add('d-none');
        resumeDefault.disabled = false;
        resumePremiation.disabled = true;
    } else {
        containerEditalPremiation.classList.remove('d-none');
        containerEditalDefault.classList.add('d-none');
        resumePremiation.disabled = false;
        resumeDefault.disabled = true;
    }

    if (typePeople.value == '') {
        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Proponente não encontrado!</span>',
            html: `Informe o CPF do proponente para carregar os documentos obrigatórios!`,
            showConfirmButton: false,
            timer: 3000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    fetch(`${searchFileUrl.value}?edital=${element.value}&type=${typePeople.value}`)
        .then((response) => response.json())
        .then((request) => {
            containerFile.innerHTML = getContentFiles(request.files);
        });
}

function getContentFiles(files) {
    return (
        `<div class="card p-4 rounded-lg shadow mb-4">
        <h5 class="text-primary font-weight-bold mb-3">ARQUIVOS</h5>
        <div class="alert alert-warning rounded-lg mb-3">
            <div class="d-flex align-items-center justify-content-between text-dark mb-0">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="m40-120 440-760 440 760H40Zm440-120q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Z"/>
                    </svg>
                    <h6 class="ml-2 mb-0"><strong class="mr-1">Atenção!</strong> Os arquivos a serem enviados devem ser no formato PDF!</h6>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <table class="table table-borderless table-centered table-hover">
            <tbody>
                ${files.reduce((accumulator, file, index) => 
                    accumulator + `<tr>
                        <td class="font-size-22 font-weight-bold">${index + 1}</td>
                        <td>
                            <div>
                                <div class="text-dark">${file.name} <span class="text-danger">*</span></div>
                                <div class="text-secondary" data-js="label-${index}">Nenhum documento foi selecionado</div>
                                <input type="file" class="d-none" accept=".pdf" target="target-${index}" name="documents[]" onchange="displayFile(this, 'label-${index}')">
                                <input type="hidden" name="documents_types[]" value="${file.id}">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center bg-light px-4 py-2" title="Carregar arquivo"
                                style="border: 1px dashed #8a8a8a; border-radius: 10px; cursor: pointer;" onclick="triggerClick('target-${index}')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28" fill="var(--dark)">
                                    <path d="M440-160H260q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H520v-286l64 62 56-56-160-160-160 160 56 56 64-62v286Z"/>
                                </svg>
                            </div>
                        </td>
                    </tr>`
                , '')}
            <tbody>
        </table>
        </div>`
    );
}

$(document).ready(function() {
    const cpf = [{ "mask": "###.###.###-##"}, { "mask": "###.###.###-##"}];
    $('[data-js="cpf"]').inputmask({ 
        mask: cpf, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });

    const cnpj = [{ "mask": "##.###.###/####-##" }];
    $('[data-js="company-cnpj"]').inputmask({ 
        mask: cnpj, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
});

(async () => {
    const fillUrl = document.querySelector('[data-js="fill-url"]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({currencyBrl: '[name="price"]'});
})();

function triggerClick(name) {
    const fileName = document.querySelector(`[target="${name}"]`);

    if (fileName) {
        fileName.click();
    }
}

function displayFile(element, label) {
    if (element.files[0]) {
        const labelCurrent = document.querySelector(`[data-js="${label}"]`);
        labelCurrent.classList.remove('text-secondary');
        labelCurrent.classList.add('text-danger');
        labelCurrent.innerHTML = (
            `<div class="d-flex align-items-center">
                <div style="cursor: pointer" title="Remover arquivo" onclick="deleteFile('${element.name}', '${label}')">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor">
                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                    </svg> 
                </div>
                <div class="ml-2" style="font-size: 13px">${element.files[0].name}</div>
            </div>`
        );
    }
}

function deleteFile(fileCurrentName, label) {
    const labelName = document.querySelector(`[data-js="${label}"]`);
    const fileName = document.querySelector(`[name="${fileCurrentName}"]`);

    fileName.value = '';
    labelName.classList.add('text-secondary');
    labelName.classList.remove('text-danger');
    labelName.innerHTML = 'Nenhum arquivo selecionado';
}

function changeType(type) {
    if (type == 'PJ') {
        typePeople.value = 'PJ';
        containerCompany.classList.remove('d-none');
        customerCompanyNameHidden.disabled = false;
        customerCnpjHidden.disabled = false;

        cpf.value = '';
        cpf.readOnly = true;
        cpf.classList.add('bg-light');

        companyCnpj.readOnly = false;
        companyCnpj.classList.remove('bg-light');
        companyCnpj.focus();
    } else {
        typePeople.value = 'PF';
        containerCompany.classList.add('d-none');
        customerCompanyNameHidden.disabled = true;
        customerCnpjHidden.disabled = true;

        cpf.readOnly = false;
        cpf.classList.remove('bg-light');
        cpf.focus();

        companyCnpj.readOnly = true;
        companyCnpj.classList.add('bg-light');
    }

    clearFields();
}

function clearFields() {
    customerId.value = '';
    rg.value = '';
    customerName.value = '';
    gender.value = '';
    nameSocial.value = '';
    breed.value = '';
    isLgbt.value = '';
    schooling.value = '';
    income.value = '';
    areaAtuation.value = '';
    areaAtuationOther.value = '';
    communityTraditional.value = '';
    city.value = '';
    address.value = '';
    phone.value = '';
    email.value = '';
}

function loader(event) {
    if (!typePf.checked && !typePj.checked) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Tipo obrigatório!</span>',
            html: `Selecione se a pessoa é do tipo física ou jurídica!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (customerId.value == '') {
        cpf.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Proponente obrigatório!</span>',
            html: `Informe o CPF do proponente!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (projectName.value == '') {
        projectName.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Nome do Projeto é obrigatório!</span>',
            html: `Informe o nome do projeto!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (projectPrice.value == '') {
        projectPrice.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Valor do Projeto é obrigatório!</span>',
            html: `Informe o valor do projeto!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (editalId.value == '') {
        editalId.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Edital obrigatório!</span>',
            html: `Selecione o edital!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    const documents = document.querySelectorAll('[name="documents[]"]');
    documents.forEach((document) => {
        if (document.value == '') {
            event.preventDefault();
            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">Documentação obrigatória!</span>',
                html: `Carregue todos os documentos listados!`,
                showConfirmButton: false,
                timer: 2500,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
    });

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
