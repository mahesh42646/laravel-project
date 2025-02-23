const titleElement = document.querySelector('[data-title]');
const titleRequired = document.querySelector('[data-title-required-name]');
const buttonPreviousContainer = document.querySelector('[data-button-previous-container]');
const buttonNextContainer = document.querySelector('[data-button-next-container]');
const url = document.querySelector('[data-save-url]').value;
const complementUrl = document.querySelector('[data-complement-url]');
const csrf = document.querySelector('[data-token]').value;
const containerIdsElements = document.querySelector('[data-containers]');
const containers = JSON.parse(containerIdsElements.value);
const containerIdsRequireds = containers.filter(container => container.is_required)
    .map(item => item.id)
    .join(',');

function toggleContainer(id) {
    const targetContainer = document.querySelector(`[data-container="${id}"]`);

    containers.forEach((item, index) => { 
        const container = document.querySelector(`[data-container="${item.id}"]`);
        if (targetContainer === container) {

            if (index === 0) {
                buttonPreviousContainer.classList.add('d-none');
            } else {
                buttonPreviousContainer.classList.remove('d-none');
                buttonPreviousContainer.setAttribute('data-previous-container', `[data-container="${containers[index - 1].id}"]`);
            }

            if (index === containers.length - 1) {
                buttonNextContainer.classList.add('d-none');
            } else {
                buttonNextContainer.classList.remove('d-none');
                buttonNextContainer.setAttribute('data-next-container', `[data-container="${containers[index + 1].id}"]`);
            }

            titleElement.innerHTML = item.title;

            if (item.is_required) {
                titleRequired.classList.add('text-danger');
                titleRequired.textContent = '(obrigatório)';
            } else {
                titleRequired.classList.remove('text-danger');
                titleRequired.textContent = '(opcional)';
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
            const container = document.querySelector(`[data-container="${item.id}"]`);

            if (element === container) {
                
                if (index === 0) {
                    buttonPreviousContainer.classList.add('d-none');
                } else {
                    buttonPreviousContainer.classList.remove('d-none');
                    buttonPreviousContainer.setAttribute('data-previous-container', `[data-container="${containers[index - 1].id}"]`);
                    buttonPreviousContainer.setAttribute('data-previous-title', containers[index - 1].title);
                }

                buttonNextContainer.setAttribute('data-next-container', `[data-container="${containers[index + 1].id}"]`);
                buttonNextContainer.setAttribute('data-next-title', containers[index + 1].title);

                titleElement.innerHTML = item.title;

                if (item.is_required) {
                    titleRequired.classList.add('text-danger');
                    titleRequired.textContent = '(obrigatório)';
                } else {
                    titleRequired.classList.remove('text-danger');
                    titleRequired.textContent = '(opcional)';
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
            const container = document.querySelector(`[data-container="${item.id}"]`);

            if (element === container) {

                if (index === containers.length - 1) {
                    buttonNextContainer.classList.add('d-none');
                } else {
                    buttonNextContainer.classList.remove('d-none');
                    buttonNextContainer.setAttribute('data-next-container', `[data-container="${containers[index + 1].id}"]`);
                    buttonNextContainer.setAttribute('data-next-title', containers[index + 1].title);
                }

                buttonPreviousContainer.setAttribute('data-previous-container', `[data-container="${containers[index - 1].id}"]`);
                buttonPreviousContainer.setAttribute('data-previous-title', containers[index - 1].title);

                titleElement.innerHTML = item.title;

                if (item.is_required) {
                    titleRequired.classList.add('text-danger');
                    titleRequired.textContent = '(obrigatório)';
                } else {
                    titleRequired.classList.remove('text-danger');
                    titleRequired.textContent = '(opcional)';
                }

                container.classList.remove('d-none');

            } else {
                container.classList.add('d-none');
            }
        })
    }
    
}

function selectFile(id) {
    const inputFile = document.querySelector(`[data-file="${id}"]`);
    inputFile.click();
}

function showFile(target, id) {
    if (target.files[0]) {
        const file = target.files[0];
        const filenameLabel = document.querySelector(`[data-filename-selected-label="${id}"]`);
        const containerIframe = document.querySelector(`[data-container-iframe="${id}"]`);

        filenameLabel.classList.remove('d-none');
        filenameLabel.innerHTML = `Arquivo: <span class="text-danger">${file.name}</span> selecionado.`;
        
        const reader = new FileReader();
        reader.onload = function (event) {
            containerIframe.innerHTML = `<iframe data-iframe="${id}" height="450px" width="100%" frameborder="0"></iframe>`;
            const iframe = document.querySelector(`[data-iframe="${id}"]`);
            iframe.src = event.target.result;
        };

        reader.readAsDataURL(file);
    }
}

async function saveFile(button, id) {
    const fileTarget = document.querySelector(`[data-file="${id}"]`);
    const formData = new FormData();

    formData.append('id', id);
    formData.append('file', fileTarget.files[0]);
    showProgressIndicator(button, true);

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-Token': csrf,
            'Accept': 'application/json'
        },
        body: formData
    });

    const payload = await response.json();
    
    if (!response.ok) {
        showProgressIndicator(button, false);
        return showAlert(
            payload.message, 
            'Por favor, tente novamente.'
        );
    }

    const alertContainer = document.querySelector(`[data-alert="${id}"]`);
    const statusContainer = document.querySelector(`[data-status="${id}"]`);
    alertContainer.innerHTML = showAlertSuccess(payload.message);
    statusContainer.innerHTML = getNewStatus(id);

    showProgressIndicator(button, false);
}

async function nextPage(button) {
    const urlCheck = document.querySelector('[data-check-url]');
    const projectCode = document.querySelector('[data-project-code]').value;
    
    showProgressIndicator(button, true);

    const response = await fetch(`${urlCheck.value}?ids_requireds=${containerIdsRequireds}&project_code=${projectCode}`);
    const payload = await response.json();

    if (payload.empty) {
        showProgressIndicator(button, false, 'CONTINUAR');
        return showAlert(
            'Documentos obrigatórios não foram carregados!', 
            'Por favor, carregue todos os documentos que são obrigatórios.'
        );
    }

    showProgressIndicator(button, false, 'CONTINUAR');
    window.location.href = complementUrl.value;
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

const getNewStatus = (id) => {
    return (
        `<span class="d-flex align-items-center mr-2" style="border: 1px solid #ccc; border-radius: 10px; padding: 3px 9px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#68737d" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
            <span class="text-dark ml-1">Enviado</span>
        </span>
        <span type="button" class="d-flex align-items-center" data-toggle="modal" data-target="#openModal"
            style="border: 1px solid #ccc; border-radius: 10px; padding: 3px 20px;"
            onclick="toggleContainer('${id}')"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#495057" viewBox="0 0 256 256">
                <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path>
                <path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM48,163.31l88-88L180.69,120l-88,88H48Zm144-54.62L147.32,64l24-24L216,84.69Z"></path>
            </svg>
            <span class="text-dark ml-1">Editar</span>
        </span>`
    );
}

const showProgressIndicator = (button, isLoading, text = 'ENVIAR ARQUIVO') => {
    if (isLoading) {
        button.disabled = isLoading;
        button.innerHTML = '<spinner></spinner> Aguarde...';
    } else {
        button.disabled = isLoading;
        button.innerHTML = text;
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
