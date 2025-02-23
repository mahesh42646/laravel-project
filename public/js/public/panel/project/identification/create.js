const containerElement = document.querySelector('[data-containers]');
const containers = JSON.parse(containerElement.value);
const titleElement = document.querySelector('[data-title]');
const titleSymbol = document.querySelector('[data-title-required-symbol]');
const titleRequired = document.querySelector('[data-title-required-name]');
const buttonPreviousContainer = document.querySelector('[data-button-previous-container]');
const buttonNextContainer = document.querySelector('[data-button-next-container]');
const url = document.querySelector('[data-save-url]').value;
const documentUrl = document.querySelector('[data-register-files-url]');

function toggleIdentificationContainer(selector) {
    const targetContainer = document.querySelector(selector);

    containers.forEach((item, index) => { 
        const container = document.querySelector(item.selector);
        if (targetContainer === container) {

            if (index === 0) {
                buttonPreviousContainer.classList.add('d-none');
            } else {
                buttonPreviousContainer.classList.remove('d-none');
                buttonPreviousContainer.setAttribute('data-previous-container', containers[index - 1].selector);
            }

            if (index === 12) {
                buttonNextContainer.classList.add('d-none');
            } else {
                buttonNextContainer.classList.remove('d-none');
                buttonNextContainer.setAttribute('data-next-container', containers[index + 1].selector);
            }

            titleElement.innerHTML = item.title;

            if (item.is_required) {
                titleSymbol.classList.remove('d-none');
                titleRequired.classList.remove('d-none');
            } else {
                titleSymbol.classList.add('d-none');
                titleRequired.classList.add('d-none');
            }

            container.classList.remove('d-none');

        } else {
            container.classList.add('d-none');
        }
    });
}

function showPreviousContainer(payload) {
    const element = document.querySelector(payload.previousContainer);
    buttonNextContainer.classList.remove('d-none');

    if (element) {

        containers.forEach((item, index) => { 
            const container = document.querySelector(item.selector);

            if (element === container) {
                
                if (index === 0) {
                    buttonPreviousContainer.classList.add('d-none');
                } else {
                    buttonPreviousContainer.classList.remove('d-none');
                    buttonPreviousContainer.setAttribute('data-previous-container', containers[index - 1].selector);
                    buttonPreviousContainer.setAttribute('data-previous-title', containers[index - 1].title);
                }

                buttonNextContainer.setAttribute('data-next-container', containers[index + 1].selector);
                buttonNextContainer.setAttribute('data-next-title', containers[index + 1].title);

                titleElement.innerHTML = item.title;

                if (item.is_required) {
                    titleSymbol.classList.remove('d-none');
                    titleRequired.classList.remove('d-none');
                } else {
                    titleSymbol.classList.add('d-none');
                    titleRequired.classList.add('d-none');
                }

                container.classList.remove('d-none');

            } else {
                container.classList.add('d-none');
            }
        })
    }
        
}

function showNextContainer(payload) {
    const element = document.querySelector(payload.nextContainer);
    buttonPreviousContainer.classList.remove('d-none');

    if (element) {

        containers.forEach((item, index) => { 
            const container = document.querySelector(item.selector);

            if (element === container) {

                if (index === 12) {
                    buttonNextContainer.classList.add('d-none');
                } else {
                    buttonNextContainer.classList.remove('d-none');
                    buttonNextContainer.setAttribute('data-next-container', containers[index + 1].selector);
                    buttonNextContainer.setAttribute('data-next-title', containers[index + 1].title);
                }

                buttonPreviousContainer.setAttribute('data-previous-container', containers[index - 1].selector);
                buttonPreviousContainer.setAttribute('data-previous-title', containers[index - 1].title);

                titleElement.innerHTML = item.title;

                if (item.is_required) {
                    titleSymbol.classList.remove('d-none');
                    titleRequired.classList.remove('d-none');
                } else {
                    titleSymbol.classList.add('d-none');
                    titleRequired.classList.add('d-none');
                }

                container.classList.remove('d-none');

            } else {
                container.classList.add('d-none');
            }
        })
    }
    
}

async function saveCategory(button) {
    const category = document.querySelector('[name="identification_category_id"]');
    
    if (category.value === '' && category.hasAttribute('required')) {
        return showAlert(
            'Categoria obrigatória!', 
            'Por favor, selecione a categoria do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_category_id': category.value, 
        'identification_category_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertCategoryContainer = document.querySelector('[data-category-alert]');
    const statusCategoryContainer = document.querySelector('[data-category-status]');
    alertCategoryContainer.innerHTML = showAlertSuccess(payload.message);
    statusCategoryContainer.innerHTML = getNewStatus('[data-category-container]');
    
    showProgressIndicator(button, false);
}

async function saveName(button) {
    const name = document.querySelector('[name="identification_name"]');
    
    if (name.value === '' && name.hasAttribute('required')) {
        return showAlert(
            'Nome do projeto obrigatório!', 
            'Por favor, informe o nome do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_name': name.value, 
        'identification_name_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertNameContainer = document.querySelector('[data-name-alert]');
    const statusNameContainer = document.querySelector('[data-name-status]');
    alertNameContainer.innerHTML = showAlertSuccess(payload.message);
    statusNameContainer.innerHTML = getNewStatus('[data-name-container]');
    
    showProgressIndicator(button, false);
}

async function savePrice(button) {
    const price = document.querySelector('[name="identification_price"]');
    
    if (price.value === '' && price.hasAttribute('required')) {
        return showAlert(
            'Valor do projeto obrigatório!', 
            'Por favor, informe o valor do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_price': convertCurrencyToUSD(price.value), 
        'identification_price_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertPriceContainer = document.querySelector('[data-price-alert]');
    const statusPriceContainer = document.querySelector('[data-price-status]');
    alertPriceContainer.innerHTML = showAlertSuccess(payload.message);
    statusPriceContainer.innerHTML = getNewStatus('[data-price-container]');
    
    showProgressIndicator(button, false);
}

async function saveResume(button) {
    const resume = document.querySelector('[name="identification_resume"]');
    
    if (window.resumeEditor.getData().trim() === '' && resume.hasAttribute('required')) {
        return showAlert(
            'Resumo do projeto obrigatório!', 
            'Por favor, informe o resumo do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_resume': window.resumeEditor.getData(), 
        'identification_resume_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertResumeContainer = document.querySelector('[data-resume-alert]');
    const statusResumeContainer = document.querySelector('[data-resume-status]');
    alertResumeContainer.innerHTML = showAlertSuccess(payload.message);
    statusResumeContainer.innerHTML = getNewStatus('[data-resume-container]');
    
    showProgressIndicator(button, false);
}

async function saveDescription(button) {
    const description = document.querySelector('[name="identification_description"]');
    
    if (window.descriptionEditor.getData().trim() === '' && description.hasAttribute('required')) {
        return showAlert(
            'Descrição do projeto obrigatória!', 
            'Por favor, informe a descrição do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_description': window.descriptionEditor.getData(), 
        'identification_description_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertDescriptionContainer = document.querySelector('[data-description-alert]');
    const statusDescriptionContainer = document.querySelector('[data-description-status]');
    alertDescriptionContainer.innerHTML = showAlertSuccess(payload.message);
    statusDescriptionContainer.innerHTML = getNewStatus('[data-description-container]');
    
    showProgressIndicator(button, false);
}

async function saveObjective(button) {
    const objective = document.querySelector('[name="identification_objective"]');
    
    if (window.objectiveEditor.getData().trim() === '' && objective.hasAttribute('required')) {
        return showAlert(
            'Objetivos e metas do projeto são de preenchimento obrigatório!', 
            'Por favor, informe os objetivos e as metas do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_objective': window.objectiveEditor.getData(), 
        'identification_objective_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertObjectiveContainer = document.querySelector('[data-objective-alert]');
    const statusObjectiveContainer = document.querySelector('[data-objective-status]');
    alertObjectiveContainer.innerHTML = showAlertSuccess(payload.message);
    statusObjectiveContainer.innerHTML = getNewStatus('[data-objective-container]');
    
    showProgressIndicator(button, false);
}

async function saveJustification(button) {
    const justification = document.querySelector('[name="identification_justification"]');
    
    if (window.justificationEditor.getData().trim() === '' && justification.hasAttribute('required')) {
        return showAlert(
            'Objetivos e metas do projeto são de preenchimento obrigatório!', 
            'Por favor, informe os objetivos e as metas do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_justification': window.justificationEditor.getData(), 
        'identification_justification_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertJustificationContainer = document.querySelector('[data-justification-alert]');
    const statusJustificationContainer = document.querySelector('[data-justification-status]');
    alertJustificationContainer.innerHTML = showAlertSuccess(payload.message);
    statusJustificationContainer.innerHTML = getNewStatus('[data-justification-container]');
    
    showProgressIndicator(button, false);
}

async function saveTarget(button) {
    const target = document.querySelector('[name="identification_target"]');
    
    if (window.targetEditor.getData().trim() === '' && target.hasAttribute('required')) {
        return showAlert(
            'O campo público alvo é de preenchimento obrigatório!', 
            'Por favor, informe o público alvo do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_target': window.targetEditor.getData(), 
        'identification_target_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertTargetContainer = document.querySelector('[data-target-alert]');
    const statusTargetContainer = document.querySelector('[data-target-status]');
    alertTargetContainer.innerHTML = showAlertSuccess(payload.message);
    statusTargetContainer.innerHTML = getNewStatus('[data-target-container]');
    
    showProgressIndicator(button, false);
}

async function saveCronogram(button) {
    const cronogram = document.querySelector('[name="identification_cronogram"]');
    
    if (window.cronogramEditor.getData().trim() === '' && cronogram.hasAttribute('required')) {
        return showAlert(
            'O campo cronograma de execução é de preenchimento obrigatório!', 
            'Por favor, informe o cronograma de execução do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_cronogram': window.cronogramEditor.getData(), 
        'identification_cronogram_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertCronogramContainer = document.querySelector('[data-cronogram-alert]');
    const statusCronogramContainer = document.querySelector('[data-cronogram-status]');
    alertCronogramContainer.innerHTML = showAlertSuccess(payload.message);
    statusCronogramContainer.innerHTML = getNewStatus('[data-cronogram-container]');
    
    showProgressIndicator(button, false);
}

async function saveAccessibility(button) {
    const accessibility = document.querySelector('[name="identification_accessibility"]');
    
    if (window.accessibilityEditor.getData().trim() === '' && accessibility.hasAttribute('required')) {
        return showAlert(
            'O campo medidas de acessibilidade é de preenchimento obrigatório!', 
            'Por favor, informe as medidas de acessibilidade do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_accessibility': window.accessibilityEditor.getData(), 
        'identification_accessibility_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertAccessibilityContainer = document.querySelector('[data-accessibility-alert]');
    const statusAccessibilityContainer = document.querySelector('[data-accessibility-status]');
    alertAccessibilityContainer.innerHTML = showAlertSuccess(payload.message);
    statusAccessibilityContainer.innerHTML = getNewStatus('[data-accessibility-container]');
    
    showProgressIndicator(button, false);
}

async function savePlan(button) {
    const plan = document.querySelector('[name="identification_plan"]');
    
    if (window.planEditor.getData().trim() === '' && plan.hasAttribute('required')) {
        return showAlert(
            'O campo medidas de acessibilidade é de preenchimento obrigatório!', 
            'Por favor, informe as medidas de acessibilidade do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_plan': window.planEditor.getData(), 
        'identification_plan_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertPlanContainer = document.querySelector('[data-plan-alert]');
    const statusPlanContainer = document.querySelector('[data-plan-status]');
    alertPlanContainer.innerHTML = showAlertSuccess(payload.message);
    statusPlanContainer.innerHTML = getNewStatus('[data-plan-container]');
    
    showProgressIndicator(button, false);
}

async function saveContrapartidSocial(button) {
    const contrapartidSocial = document.querySelector('[name="identification_contrapartid_social"]');
    
    if (window.contrapartidSocialEditor.getData().trim() === '' && contrapartidSocial.hasAttribute('required')) {
        return showAlert(
            'O campo contrapartida social é de preenchimento obrigatório!', 
            'Por favor, informe a contrapartida social do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_contrapartid_social': window.contrapartidSocialEditor.getData(), 
        'identification_contrapartid_social_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertContrapartidSocialContainer = document.querySelector('[data-contrapartid-social-alert]');
    const statusContrapartidSocialContainer = document.querySelector('[data-contrapartid-social-status]');
    alertContrapartidSocialContainer.innerHTML = showAlertSuccess(payload.message);
    statusContrapartidSocialContainer.innerHTML = getNewStatus('[data-contrapartid-social-container]');
    
    showProgressIndicator(button, false);
}

async function saveLocal(button) {
    const local = document.querySelector('[name="identification_local"]');
    
    if (window.localEditor.getData().trim() === '' && local.hasAttribute('required')) {
        return showAlert(
            'O campo local previsto para realização da ação cultural é de preenchimento obrigatório!', 
            'Por favor, informe o local previsto para realização da ação cultural do projeto.'
        );
    }

    const params = new URLSearchParams({
        'identification_local': window.localEditor.getData(), 
        'identification_local_status_id': 3
    });

    showProgressIndicator(button, true);

    const response = await fetch(`${url}?${params.toString()}`);
    const payload = await response.json();

    const alertLocalContainer = document.querySelector('[data-local-alert]');
    const statusLocalContainer = document.querySelector('[data-local-status]');
    alertLocalContainer.innerHTML = showAlertSuccess(payload.message);
    statusLocalContainer.innerHTML = getNewStatus('[data-local-container]');
    
    showProgressIndicator(button, false);
}

async function nextPage(button) {
    const category = document.querySelector('[name="identification_category_id"]');
    const name = document.querySelector('[name="identification_name"]');
    const price = document.querySelector('[name="identification_price"]');
    const resume = document.querySelector('[name="identification_resume"]');
    const description = document.querySelector('[name="identification_description"]');
    const objective = document.querySelector('[name="identification_objective"]');
    const justification = document.querySelector('[name="identification_justification"]');
    const target = document.querySelector('[name="identification_target"]');
    const cronogram = document.querySelector('[name="identification_cronogram"]');
    const accessibility = document.querySelector('[name="identification_accessibility"]');
    const plan = document.querySelector('[name="identification_plan"]');
    const contrapartidSocial = document.querySelector('[name="identification_contrapartid_social"]');
    const local = document.querySelector('[name="identification_local"]');
    let queryParam = {};

    if (category.value === '' && category.hasAttribute('required')) {
        return showAlert(
            'Categoria obrigatória!', 
            'Por favor, selecione a categoria do projeto.'
        );
    }

    if (category.value !== '') {
        queryParam = {...queryParam, ... {
            'identification_category_id': category.value, 
            'identification_category_status_id': 3
        }};
    }
    
    if (name.value.trim() === '' && name.hasAttribute('required')) {
        return showAlert(
            'Nome do projeto obrigatório!', 
            'Por favor, informe o nome do projeto.'
        );
    }

    if (name.value.trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_name': name.value,
            'identification_name_status_id': 3
        }};
    }
    
    if (price.value.trim() === '' && price.hasAttribute('required')) {
        return showAlert(
            'Valor do projeto obrigatório!', 
            'Por favor, informe o valor do projeto.'
        );
    }

    if (price.value.trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_price': convertCurrencyToUSD(price.value), 
            'identification_price_status_id': 3
        }};
    }
    
    if (window.resumeEditor.getData().trim() === '' && resume.hasAttribute('required')) {
        return showAlert(
            'Resumo do projeto obrigatório!', 
            'Por favor, informe o resumo do projeto.'
        );
    }

    if (window.resumeEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_resume': window.resumeEditor.getData(), 
            'identification_resume_status_id': 3
        }};
    }
    
    if (window.descriptionEditor.getData().trim() === '' && description.hasAttribute('required')) {
        return showAlert(
            'Descrição do projeto obrigatória!', 
            'Por favor, informe a descrição do projeto.'
        );
    }

    if (window.descriptionEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_description': window.descriptionEditor.getData(), 
            'identification_description_status_id': 3
        }};
    }
    
    if (window.objectiveEditor.getData().trim() === '' && objective.hasAttribute('required')) {
        return showAlert(
            'Objetivos e metas do projeto são de preenchimento obrigatório!', 
            'Por favor, informe os objetivos e as metas do projeto.'
        );
    }

    if (window.objectiveEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_objective': window.objectiveEditor.getData(), 
            'identification_objective_status_id': 3
        }};
    }
    
    if (window.justificationEditor.getData().trim() === '' && justification.hasAttribute('required')) {
        return showAlert(
            'Objetivos e metas do projeto são de preenchimento obrigatório!', 
            'Por favor, informe os objetivos e as metas do projeto.'
        );
    }

    if (window.justificationEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_justification': window.justificationEditor.getData(), 
            'identification_justification_status_id': 3
        }};
    }

    if (window.targetEditor.getData().trim() === '' && target.hasAttribute('required')) {
        return showAlert(
            'O campo público alvo é de preenchimento obrigatório!', 
            'Por favor, informe o público alvo do projeto.'
        );
    }

    if (window.targetEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_target': window.targetEditor.getData(), 
            'identification_target_status_id': 3
        }};
    }
    
    if (window.cronogramEditor.getData().trim() === '' && cronogram.hasAttribute('required')) {
        return showAlert(
            'O campo cronograma de execução é de preenchimento obrigatório!', 
            'Por favor, informe o cronograma de execução do projeto.'
        );
    }

    if (window.cronogramEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_cronogram': window.cronogramEditor.getData(),
            'identification_cronogram_status_id': 3
        }};
    }
    
    if (window.accessibilityEditor.getData().trim() === '' && accessibility.hasAttribute('required')) {
        return showAlert(
            'O campo medidas de acessibilidade é de preenchimento obrigatório!', 
            'Por favor, informe as medidas de acessibilidade do projeto.'
        );
    }

    if (window.accessibilityEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_accessibility': window.accessibilityEditor.getData(), 
            'identification_accessibility_status_id': 3
        }};
    }
    
    if (window.planEditor.getData().trim() === '' && plan.hasAttribute('required')) {
        return showAlert(
            'O campo medidas de acessibilidade é de preenchimento obrigatório!', 
            'Por favor, informe as medidas de acessibilidade do projeto.'
        );
    }

    if (window.planEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_plan': window.planEditor.getData(), 
            'identification_plan_status_id': 3
        }};
    }
    
    if (window.contrapartidSocialEditor.getData().trim() === '' && contrapartidSocial.hasAttribute('required')) {
        return showAlert(
            'O campo contrapartida social é de preenchimento obrigatório!', 
            'Por favor, informe a contrapartida social do projeto.'
        );
    }

    if (window.contrapartidSocialEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_contrapartid_social': window.contrapartidSocialEditor.getData(), 
            'identification_contrapartid_social_status_id': 3
        }};
    }
    
    if (window.localEditor.getData().trim() === '' && local.hasAttribute('required')) {
        return showAlert(
            'O campo local previsto para realização da ação cultural é de preenchimento obrigatório!', 
            'Por favor, informe o local previsto para realização da ação cultural do projeto.'
        );
    }

    if (window.localEditor.getData().trim() !== '') {
        queryParam = {...queryParam, ... {
            'identification_local': window.localEditor.getData(), 
            'identification_local_status_id': 3
        }};
    }

    const params = new URLSearchParams(queryParam);

    try {
        showProgressIndicator(button, true);
        await fetch(`${url}?${params.toString()}`);
        window.location.href = documentUrl.value;
    } catch (error) {
        showProgressIndicator(button, false);
        showAlert(`Erro! ${error.message}`, 'Erro ao enviar os dados!');
    }
}

const showAlertSuccess = (message) => {
    return (
        `<div class="mb-3 alert alert-success alert-dismissible fade show" role="alert" style="color: #121b22;">
            <svg width="22" height="22" viewBox="0 0 60 60" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                <path d="M41.475 18.95L25 35.425L16.025 26.475L12.5 30L25 42.5L45 22.5L41.475 18.95ZM30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#15B79F"/>
            </svg>
            ${message}
            <button type="button" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 0; z-index: 2; font-weight: 600; box-sizing: content-box; width: 1em; height: 1em; margin-right: 5px; border: 0; border-radius: .25rem; opacity: .5; background-color: transparent; outline: none; padding: 0px 20px;">X</button>
        </div>`
    );
}

const getNewStatus = (selector) => {
    return (
        `<span class="d-flex align-items-center mr-2" style="border: 1px solid #ccc; border-radius: 10px; padding: 3px 9px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#68737d" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
            <span class="text-dark ml-1">Enviado</span>
        </span>
        <span type="button" class="d-flex align-items-center" data-toggle="modal" data-target="#openModal"
            style="border: 1px solid #ccc; border-radius: 10px; padding: 3px 20px;"
            onclick="toggleIdentificationContainer('${selector}')"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#495057" viewBox="0 0 256 256">
                <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path>
                <path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM48,163.31l88-88L180.69,120l-88,88H48Zm144-54.62L147.32,64l24-24L216,84.69Z"></path>
            </svg>
            <span class="text-dark ml-1">Editar</span>
        </span>`
    );
}

const showProgressIndicator = (button, isLoading) => {
    if (isLoading) {
        button.disabled = isLoading;
        button.innerHTML = '<spinner></spinner> Aguarde...';
    } else {
        button.disabled = isLoading;
        button.innerHTML = getTextDefaultWithIcon();
    }
}

const getTextDefaultWithIcon = () => {
    return (
        `<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#ff9d0a" viewBox="0 0 256 256">
            <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
        </svg>
        <span class="ml-1 font-weight-bold">SALVAR RASCUNHO</span>`
    );
}

const showAlert = (title, subtitle) => {
    Swal.fire({
        iconColor: 'var(--blue)',
        icon:  'info',
        title: `<span style="color: var(--blue)">${title}</span>`,
        html: subtitle,
        showConfirmButton: false,
        timer: 5000,
        customClass: { htmlContainer: 'mt-1' }
    });
}

const convertCurrencyToUSD = (value) => {
    let valueConverted = value.replace('.', '');
    valueConverted = valueConverted.replace(',', '.');
    return valueConverted;
}

(async () => {
    const fillUrl = document.querySelector('[data-mask-nomey-url]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({ currencyBrl: '[name="identification_price"]' })
})()

const resumeElement = document.querySelector('[name="identification_resume"]');
const descriptionElement = document.querySelector('[name="identification_description"]');
const objectiveElement = document.querySelector('[name="identification_objective"]');
const justificationElement = document.querySelector('[name="identification_justification"]');
const targetElement = document.querySelector('[name="identification_target"]');
const cronogramElement = document.querySelector('[name="identification_cronogram"]');
const accessibilityElement = document.querySelector('[name="identification_accessibility"]');
const planElement = document.querySelector('[name="identification_plan"]');
const contrapartidSocialElement = document.querySelector('[name="identification_contrapartid_social"]');
const localElement = document.querySelector('[name="identification_local"]');

ClassicEditor
    .create(resumeElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.resumeEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(descriptionElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.descriptionEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(objectiveElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.objectiveEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(justificationElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.justificationEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(targetElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.targetEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(cronogramElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.cronogramEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(accessibilityElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.accessibilityEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(planElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.planEditor = editor)
    .catch(error => console.error(error));
    
ClassicEditor
    .create(contrapartidSocialElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.contrapartidSocialEditor = editor)
    .catch(error => console.error(error));

ClassicEditor
    .create(localElement, { removePlugins: ['Title'], placeholder: '' })
    .then(editor => window.localEditor = editor)
    .catch(error => console.error(error));


