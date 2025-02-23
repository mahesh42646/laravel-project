const elementsAgentTypes = document.querySelectorAll('[data-agent-type]');
const routeSearchCity = document.querySelector('[data-url-search-city]');
const token = document.querySelector('[name="_token"]');
const form = document.querySelector('[data-form]');

function changeAgentType(element) {
    if (element.checked) {
        elementsAgentTypes.forEach((agentType) => {
            if (element.value !== agentType.value) {
                agentType.checked = false;
            }
        });
    } else {
        form.innerHTML = '';
    }

    if (element.value == '1' && element.checked) {
        form.innerHTML = formPF();
        loadMaskMoney();
        loadSearchableFromCities();
        loadInputMask();
    }

    if (element.value == '2' && element.checked) {
        form.innerHTML = formCollective();
        loadSearchableFromCities();
        loadInputMask();
    }

    if (
        (element.value == '3' || 
        element.value == '4' || 
        element.value == '5') && 
        element.checked
    ) {
        form.innerHTML = formEntity();
        loadSearchableFromCities();
        loadInputMask();
    }
}

const loadMaskMoney = () => {
    (async () => {
        const fillUrl = document.querySelector('[data-url-mask-money]');
        const { Fill } = await import(fillUrl.value);
        Fill.mask({ currencyBrl: '[name="income"]' });
    })();
}

const loadSearchableFromCities = () => { 
    $('[data-city]').select2({
        ajax: {
            url: routeSearchCity.value,
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
                return { results: response.cities }
            },
            cache: true
        },

        templateResult: function (cities) {
            if (cities.loading) {
                return $(
                    `<span class="spinner-border spinner-border-sm text-primary mr-2" role="status" aria-hidden="true">
                    </span><span class="text-primary fw-600">Buscando cidades...</span>`
                );
            }

            return $(
                `<div><strong>CIDADE:</strong> ${cities.name}</div>
                <div><strong>ESTADO:</strong> ${cities.state}</div>
                <div style="border-bottom: 1px solid #CCC;"></div>`
            );
        },

        templateSelection: function (city) {
            if (city.id) {
                if (typeof city.name !== 'undefined') {
                    return $(`<option value="${city.id}">${city.name} (${city.state})</option>`);
                }

                return $(`<option value="${city.id}">${city.text}</option>`);
            }
                
            return city.text;
        },

        placeholder: 'Buscar cidade por nome',
        minimumInputLength: 2,
        language: {
            'noResults': () => 'Nenhum resultado encontrado',
            'searching': () => 'Buscando...',
            'errorLoading': () => 'Os resultados não puderam ser carregados.',
            'inputTooShort': () => 'Digite 2 ou mais caracteres',
        },
    });
}

const formPF = () => {
    const elementGenders = document.querySelector('[data-genders]');
    const genders = JSON.parse(elementGenders.value);
    const elementBreeds = document.querySelector('[data-breeds]');
    const breeds = JSON.parse(elementBreeds.value);
    const elementSchoolings = document.querySelector('[data-schoolings]');
    const schoolings = JSON.parse(elementSchoolings.value);
    const elementMainAreaAtuations = document.querySelector('[data-main-area-atuations]');
    const mainAreaAtuations = JSON.parse(elementMainAreaAtuations.value);
    const elementCommunities = document.querySelector('[data-communities]');
    const communities = JSON.parse(elementCommunities.value);

    return (
        `<h5 class="font-weight-medium mb-4">Informações da conta</h5>
        <div class="d-md-flex">
            <div class="col-md-4 pl-md-0 mb-3">
                <label class="text-dark">CPF *</label>
                <input type="text" class="form-control rounded-lg" placeholder="000.000.000-00" name="cpf" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="text-dark">Nome Completo *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="name" placeholder="Digite o nome aqui" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="text-dark">Data de nascimento *</label>
                <input type="date" class="form-control rounded-lg" name="date_of_birth" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">RG *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" placeholder="12345 + ORGÃO EXPEDITOR" name="rg" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Nome Social</label>
                <input type="text" class="form-control rounded-lg" name="nickname">
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Gênero *</label>
                <select class="form-control rounded-lg" name="gender_id" required>
                    <option value="">Selecione</option>
                    ${genders.reduce((accumulator, gender) => 
                        accumulator += `<option value="${gender.id}">${gender.name}</option>`
                    , '')}
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Raça *</label>
                <select class="form-control rounded-lg" name="breed_id" required>
                    <option value="">Selecione</option>
                    ${breeds.reduce((accumulator, breed) => 
                        accumulator += `<option value="${breed.id}">${breed.name}</option>`
                    , '')}
                </select>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Você é LGBTQIAPN+? *</label>
                <select class="form-control rounded-lg" name="is_lgbt" required>
                    <option value="">Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Escolaridade *</label>
                <select class="form-control rounded-lg" name="schooling_id" required>
                    <option value="">Selecione</option>
                    ${schoolings.reduce((accumulator, schooling) => 
                        accumulator += `<option value="${schooling.id}">${schooling.name}</option>`
                    , '')}
                </select>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Renda Individual *</label>
                <input type="text" class="form-control rounded-lg" name="income" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Principal área de atuação *</label>
                <select class="form-control rounded-lg" name="area_atuation_id" required>
                    <option value="">Selecione</option>
                    ${mainAreaAtuations.reduce((accumulator, mainArea) => 
                        accumulator += `<option value="${mainArea.id}">${mainArea.name}</option>`
                    , '')}
                </select>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Outras áreas de atuação</label>
                <input type="text" class="form-control bg-light rounded-lg" name="area_atuation_other">
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Comunidades tradicionais *</label>
                <select class="form-control rounded-lg" name="community_traditional_id" required>
                    <option value="">Selecione</option>
                    ${communities.reduce((accumulator, community) => 
                        accumulator += `<option value="${community.id}">${community.name}</option>`
                    , '')}
                </select>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Você tem deficiência PCD ?</label>
                <select class="form-control rounded-lg" name="is_pcd">
                    <option value="">Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option> 
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Em caso sem para PCD qual ?</label>
                <input type="text" class="form-control bg-light rounded-lg" name="deiciency_name">
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-12 pl-md-0 mb-3">
                <label class="text-dark">Beneficiário de algum programa social ?</label>
                <select class="form-control rounded-lg" name="is_beneficiary_program_social">
                    <option value="">Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option> 
                </select>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Cidade *</label>
                <select class="w-100 form-control select2" name="city_id" data-city></select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Endereço completo</label>
                <input type="text" class="form-control rounded-lg" name="address">
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Telefone *</label>
                <input type="text" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Nome do responsável pelo cadastro *</label>
                <input type="text" class="form-control text-uppercase rounded-lg" name="responsible_name" required>
            </div>
        </div>
        <hr>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">E-mail para login *</label>
                <input type="email" class="form-control text-lowercase rounded-lg" name="email" required>
            </div>
            <div class="col-md-6 mb-3"> 
                <label class="text-dark">Senha *</label>
                <input type="password" class="form-control rounded-lg" name="password" required>
            </div>
        </div>`
    );
}

const formEntity = () => {
    return (
        `<h5 class="font-weight-medium mb-4">Informações da conta</h5>
        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">CNPJ da organização *</label>
                <input type="text" class="form-control rounded-lg" placeholder="00.000.000/0000-00" name="entity_cnpj" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Nome da organização *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="entity_organization_name" placeholder="Digite o nome aqui" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Razão social *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="entity_company_name" placeholder="Nome da razão social" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Data da criação *</label>
                <input type="date" class="form-control rounded-lg" name="entity_registered_at" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Nome do representante legal *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="entity_representant_name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">CPF do representante legal *</label>
                <input type="text" class="form-control rounded-lg" name="entity_representant_cpf" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Cidade *</label>
                <select class="w-100 form-control select2" name="city_id" data-city></select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Endereço completo *</label>
                <input type="text" class="form-control rounded-lg" name="entity_address" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Telefone *</label>
                <input type="text" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Responsável pelo cadastro *</label>
                <input type="text" class="form-control text-uppercase rounded-lg" name="entity_responsable_name" required>
            </div>
        </div>
        <hr>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">E-mail para login *</label>
                <input type="email" class="form-control text-lowercase rounded-lg" name="email" required>
            </div>
            <div class="col-md-6 mb-3"> 
                <label class="text-dark">Senha *</label>
                <input type="password" class="form-control rounded-lg" name="password" required>
            </div>
        </div>`
    );
}

const formCollective = () => {
    return (
        `<div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">CPF do representante *</label>
                <input type="text" class="form-control rounded-lg" placeholder="000.000.000-00" name="collective_representant_cpf" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Nome do representante *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="collective_representant_name" placeholder="Digite o nome aqui" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Nome do Coletivo *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="collective_name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Ano de criação do coletivo *</label>
                <input type="date" class="form-control rounded-lg" name="collective_registered_at" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-12 pl-md-0 mb-3">
                <label class="text-dark">Quantas pessoas participam do coletivo *</label>
                <input type="number" min="1" class="form-control rounded-lg text-uppercase" name="collective_participants_total" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Responsável pelo cadastro *</label>
                <input type="text" class="form-control rounded-lg text-uppercase" name="collective_responsable_name" required>
            </div>
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Telefone *</label>
                <input type="text" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000" required>
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">Cidade *</label>
                <select class="w-100 form-control select2" name="city_id" data-city></select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-dark">Endereço completo *</label>
                <input type="text" class="form-control rounded-lg" name="collective_address" required>
            </div>
        </div>
        <hr>

        <div class="d-md-flex">
            <div class="col-md-6 pl-md-0 mb-3">
                <label class="text-dark">E-mail para login *</label>
                <input type="email" class="form-control text-lowercase rounded-lg" name="email" required>
            </div>
            <div class="col-md-6 mb-3"> 
                <label class="text-dark">Senha *</label>
                <input type="password" class="form-control rounded-lg" name="password" required>
            </div>
        </div>`
    );
}

const loadInputMask = () => {
    const validate = (rule) => ({ 
        mask: [{ 'mask': rule }], 
        greedy: false, 
        definitions: { '#': { validator: '[0-9]', cardinality: 1 }} 
    });

    $('[name="cpf"]').inputmask(validate('###.###.###-##'));
    $('[name="cnpj"]').inputmask(validate('##.###.###/####-##'));
    $('[name="phone"]').inputmask(validate('(##) #####-####'));
    $('[name="entity_cnpj"]').inputmask(validate('##.###.###/####-##'));
    $('[name="entity_representant_cpf"]').inputmask(validate('###.###.###-##'));
    $('[name="collective_representant_cpf"]').inputmask(validate('###.###.###-##'));
}

function loader(button) {
    setTimeout(() => {
        button.disabled = true;
        button.innerHTML = (
            `<span class="spinner-border spinner-border-sm mr-2" 
                role="status" aria-hidden="true">
            </span> Aguarde...`
        );
    }, 10);

    setTimeout(() => {
        button.disabled = false;
        button.innerHTML = 'Criar agente cultural';
    }, 7000);
}
