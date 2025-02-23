export default {
    render: async function(element) {
        const elementsAgentTypes = document.querySelectorAll('[data-agent-type]');
        const form = document.querySelector('[data-form]');

        if (element.checked) {
            elementsAgentTypes.forEach((agentType) => {
                if (element.value !== agentType.value) {
                    agentType.checked = false;
                }
            });
        } else {
            return form.innerHTML = '';
        }
        
        if (element.value == '1' && element.checked) {
            form.innerHTML = this.PF();

            // VERIFICA SE O ARTISTA JA POSSUI UMA CONTA PF

            const module = await import('./artist/PF.js');
            module.AgentPF.exist();
        }
    
        if (element.value == '2' && element.checked) {
            form.innerHTML = this.collective();
        }
    
        if (
            (element.value == '3' || 
            element.value == '4' || 
            element.value == '5') && 
            element.checked
        ) {
            form.innerHTML = this.PJ();
        }
    },
    PF: () => {
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
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" placeholder="000.000.000-00" name="cpf" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Nome Completo *</label>
                    <input type="text" class="form-control rounded-lg text-uppercase" name="name" placeholder="Digite o nome aqui" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="text-dark">Data de nascimento *</label>
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="date_of_birth" required>
                </div>
            </div>

            <div class="d-md-flex">
                <div class="col-md-6 pl-md-0 mb-3">
                    <label class="text-dark">RG *</label>
                    <input type="text" class="form-control rounded-lg text-uppercase" name="rg" placeholder="12345 + ORGÃO EXPEDITOR" required>
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
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="income" required>
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
                    <label class="text-dark">Telefone</label>
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000">
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
            </div>
            <hr>
            
            <div class="custom-control custom-checkbox mr-4 mb-4">
                <input type="checkbox" class="custom-control-input" id="term" value="1" required>
                <label class="custom-control-label text-dark" for="term">
                    Aceito os termos de uso e
                    <button type="button" class="btn btn-link text-dark font-weight-bold p-0" data-toggle="modal" data-target="#termOfUse">
                        política de privacidade: 
                    </button>
                </label>
                                    
                <div class="modal fade" id="termOfUse">
                    <div class="modal-dialog">
                        <div class="modal-content border-0">

                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Termos de uso</h5>
                                <button type="button" class="bg-transparent border-0" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#FFF">
                                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                    </svg>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <p class="text-dark font-weight-medium">
                                    O usuário, descrito e especificado nesse cadastro, na condição de titular dos dados, declara para os devidos fins e a quem for de direito que AUTORIZA a abertura de cadastro em seu nome com inclusão de seus dados pessoais, excetuando os dados pessoais sensíveis, nos termos do Art. 502 Inc. I e II da Lei Federal 13.709/18, o que faz nos moldes do Art. 8°3 da Lei Federal 11709/18.
                                </p>
                                <p class="text-dark font-weight-medium">
                                    Fica declarado, também, que os dados pessoais serão utilizados para os fins específicos de análise, quando da necessidade de realizar ações em benefício do usuário ou da categoria cultural que integra, podendo ainda fornecer tais dados ao Poder Judiciário e/ou Ministério Público quando for necessário.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        );
    },
    PJ: () => {
        return (
            `<h5 class="font-weight-medium mb-4">Informações da conta</h5>
            <div class="d-md-flex">
                <div class="col-md-6 pl-md-0 mb-3">
                    <label class="text-dark">CNPJ da organização *</label>
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" placeholder="00.000.000/0000-00" name="entity_cnpj" required>
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
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="entity_representant_cpf" required>
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
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000" required>
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
            </div>
            <hr>
            
            <div class="custom-control custom-checkbox mr-4 mb-4">
                <input type="checkbox" class="custom-control-input" id="term" value="1" required>
                <label class="custom-control-label text-dark" for="term">
                    Aceito os
                    <button type="button" class="btn btn-link text-dark font-weight-medium p-0" data-toggle="modal" data-target="#termOfUse">
                        termos de uso e política de privacidade: 
                    </button>
                </label>
                                    
                <div class="modal fade" id="termOfUse">
                    <div class="modal-dialog">
                        <div class="modal-content border-0">

                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Termos de uso</h5>
                                <button type="button" class="bg-transparent border-0" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#FFF">
                                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                    </svg>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <p class="text-dark font-weight-medium">
                                    O usuário, descrito e especificado nesse cadastro, na condição de titular dos dados, declara para os devidos fins e a quem for de direito que AUTORIZA a abertura de cadastro em seu nome com inclusão de seus dados pessoais, excetuando os dados pessoais sensíveis, nos termos do Art. 502 Inc. I e II da Lei Federal 13.709/18, o que faz nos moldes do Art. 8°3 da Lei Federal 11709/18.
                                </p>
                                <p class="text-dark font-weight-medium">
                                    Fica declarado, também, que os dados pessoais serão utilizados para os fins específicos de análise, quando da necessidade de realizar ações em benefício do usuário ou da categoria cultural que integra, podendo ainda fornecer tais dados ao Poder Judiciário e/ou Ministério Público quando for necessário.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        );
    },
    collective: () => {
        return (
            `<div class="d-md-flex">
                <div class="col-md-6 pl-md-0 mb-3">
                    <label class="text-dark">CPF do representante *</label>
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" placeholder="000.000.000-00" name="collective_representant_cpf" required>
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
                    <input type="text" inputmode="numeric" class="form-control rounded-lg" name="phone" placeholder="(00) 00000-0000" required>
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
    },
}
