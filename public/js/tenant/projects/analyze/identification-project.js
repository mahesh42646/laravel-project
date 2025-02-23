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

async function saveIdentificationProjectApproved(button) {
    button.disabled = true;
    const attributes = button.dataset;

    const response = await fetch(attributes.route);
    const payload = await response.json();

    const timelineElement = document.querySelector(attributes.timelineSelector);
    const alertElement = document.querySelector(attributes.alertSelector);
    const statusLabelElement = document.querySelector(attributes.statusSelector);

    timelineElement.innerHTML = payload.content_timeline;
    alertElement.innerHTML = showAlertSuccess(payload.message);
    statusLabelElement.innerHTML = showStatusApproved();
    
    button.disabled = false;
}

function addFormIdentificationProjectReviewInTimeline(payload) {
    const timelineElement = document.querySelector(payload.timelineSelector);
    const {route, timelineSelector, alertSelector, statusSelector} = payload;
    
    timelineElement.innerHTML += `
        <li class="timeline-item">
            <span class="timeline-item-icon">
                <div style="padding: 8px; border-radius: 50%; background-color: #d9e7ff;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0263ff" viewBox="0 0 256 256">
                        <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
                    </svg>
                </div>
            </span>
            <div class="timeline-item-description w-100">
                <div class="d-flex flex-column font-size-15 mb-2">
                    <textarea class="form-control bg-light mb-3" rows="6" placeholder="Motivo" data-identification-project-motive></textarea>
                    <label>Limite da resposta</label>
                    <div class="d-flex mb-3">
                        <input type="date" class="form-control bg-light" data-identification-project-expired-at>
                        <input type="time" class="form-control bg-light" data-identification-project-hour>
                    </div>
                    <button type="button" class="btn btn-primary rounded-lg" data-route="${route}"
                        data-motive-selector="[data-identification-project-motive]"
                        data-expired-at-selector="[data-identification-project-expired-at]"
                        data-hour-selector="[data-identification-project-hour]"
                        data-timeline-selector="${timelineSelector}"
                        data-alert-selector="${alertSelector}"
                        data-status-selector="${statusSelector}"
                        onclick="saveIdentificationProjectReanalyze(this)"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fafafa" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                        <span class="ml-2">ENVIAR</span>
                    </button>
                </div>
            </div>
        </li>
    `
}

async function saveIdentificationProjectReanalyze(button) {
    const attributes = button.dataset;
    const motive = document.querySelector(attributes.motiveSelector);
    const expiredAt = document.querySelector(attributes.expiredAtSelector);
    const hour = document.querySelector(attributes.hourSelector);

    if (motive.value === '') {
        return showAlert(
            'Motivo obrigatório!', 
            'Informe o <strong>motivo</strong> da solicitação de revisão dos dados.'
        );
    }

    if (expiredAt.value === '') {
        return showAlert(
            'Data de limite de resposta obritagória', 
            'Informe a <strong>date limite</strong> da solicitação para a revisão dos dados.'
        );
    }

    if (hour.value === '') {
        return showAlert(
            'Hora de limite de resposta obritagória', 
            'Informe a <strong>hora limite</strong> da solicitação para a revisão dos dados.'
        );
    }

    button.disabled = true;

    const response = await fetch(`${attributes.route}?motive=${motive.value}&expired_at=${expiredAt.value}&hour=${hour.value}`);
    const payload = await response.json();

    const timelineElement = document.querySelector(attributes.timelineSelector);
    const alertElement = document.querySelector(attributes.alertSelector);
    const statusLabelElement = document.querySelector(attributes.statusSelector);

    timelineElement.innerHTML = payload.content_timeline;
    alertElement.innerHTML = showAlertSuccess(payload.message);
    statusLabelElement.innerHTML = showStatusReanalyze();
    
    button.disabled = false;
}

function addFormIdentificationProjectRepprovedInTimeline(payload) {
    const timelineElement = document.querySelector(payload.timelineSelector);
    const {route, timelineSelector, alertSelector, statusSelector} = payload;
    
    timelineElement.innerHTML += `
        <li class="timeline-item">
            <span class="timeline-item-icon">
                <div style="padding: 8px; border-radius: 50%; background-color: #fde0e0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f21d56" viewBox="0 0 256 256">
                        <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
                    </svg>
                </div>
            </span>
            <div class="timeline-item-description w-100">
                <div class="d-flex flex-column font-size-15 mb-2">
                    <textarea class="form-control bg-light mb-3" rows="6" placeholder="Motivo" data-identification-project-motive></textarea>
                    <button type="button" class="btn btn-primary rounded-lg" data-route="${route}"
                        data-motive-selector="[data-identification-project-motive]"
                        data-timeline-selector="${timelineSelector}"
                        data-alert-selector="${alertSelector}"
                        data-status-selector="${statusSelector}"
                        onclick="saveIdentificationProjectRepproved(this)"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fafafa" viewBox="0 0 256 256">
                            <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                        </svg>
                        <span class="ml-2">ENVIAR</span>
                    </button>
                </div>
            </div>
        </li>
    `
}

async function saveIdentificationProjectRepproved(button) {
    const attributes = button.dataset;
    const motive = document.querySelector(attributes.motiveSelector);

    if (motive.value === '') {
        return showAlert(
            'Motivo obrigatório!', 
            'Informe o <strong>motivo</strong> da solicitação de revisão dos dados.'
        );
    }

    button.disabled = true;

    const response = await fetch(`${attributes.route}?motive=${motive.value}`);
    const payload = await response.json();

    const timelineElement = document.querySelector(attributes.timelineSelector);
    const alertElement = document.querySelector(attributes.alertSelector);
    const statusLabelElement = document.querySelector(attributes.statusSelector);

    timelineElement.innerHTML = payload.content_timeline;
    alertElement.innerHTML = showAlertSuccess(payload.message);
    statusLabelElement.innerHTML = showStatusRepproved();
    
    button.disabled = false;
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

const showStatusApproved = () => {
    return (
        `<span class="d-flex align-items-center mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
            <span class="text-dark ml-1">Aprovado</span>
        </span>`
    );
}

const showStatusReanalyze = () => {
    return (
        `<span class="d-flex align-items-center mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0263ff" viewBox="0 0 256 256">
                <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
            </svg>
            <span class="text-dark ml-1">Revisar</span>
        </span>`
    );
}

const showStatusRepproved = () => {
    return (
        `<span class="d-flex align-items-center mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
            </svg>
            <span class="text-dark ml-1">Reprovado</span>
        </span>`
    );
}

const showSpinner = (button, isLoading) => {
    if (isLoading) {
        button.disabled = isLoading;
        button.innerHTML = '<spinner></spinner> Aguarde...';
    } else {
        button.disabled = isLoading;
        button.innerHTML = getTextDefaultWithIcon();
    }
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
