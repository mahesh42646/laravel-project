const customerName = document.querySelector('[data-name]');
const edital = document.querySelector('[data-edital]');
const subscribe = document.querySelector('[data-subscribe]');
const situation = document.querySelector('[data-status]');
const nameDestroy = document.querySelector('[data-name-destroy]');
const routeDestroy = document.querySelector('[data-route-destroy]');
const formDestroy = document.querySelector('[data-form-destroy]');

let timerCustomerName;
const ENTER_KEY = 13;
const MILLISECONDS = 400;

$('[data-js="datatable"]').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    lengthChange: false,
    searching: false,
    searchDelay: 400,
    ordering: false,
    ajax: $('[data-js="datatable-url"]').val(),
    columns: [
        {data: 'name', name: 'name', className: 'pl-3'},
        {data: 'edital', name: 'edital'},
        {data: 'subscribe', name: 'subscribe'},
        {data: 'status', name: 'status'},
        {data: 'actions', name: 'actions', className: 'dt-center'},
    ],
    language: {
        url: $('[data-js="datatable-lang-pt-br"]').val(),
    },
});

function filterCustomerName(event) {
    clearTimeout(timerCustomerName);

    timerCustomerName = setTimeout(({ keyCode }) => {
        if (keyCode !== ENTER_KEY) {
            runFilter();
        }
    }, MILLISECONDS, event);
}

function filterCpf(element) {
    if (element.value.length == '14') {
        runFilter();
    }
}

function runFilter() {
    $('[data-js="datatable"]').on('preXhr.dt', function (event, settings, data) {
        if (customerName.value != '') { data.filter_customer_name = customerName.value; }
        if (edital.value != '') { data.filter_edital = edital.value; }
        if (subscribe.value != '') { data.filter_subscribe = subscribe.value; }
        if (situation.value != '') { data.filter_status = situation.value; }
    });

    $('[data-js="datatable"]').DataTable().ajax.reload();
}

function loadDataInModal(payload) {
    const editalName = document.querySelector('[data-edital-name-label]');
    const agentName = document.querySelector('[data-agent-name-label]');
    const agentDocumentCpfNumber = document.querySelector('[data-agent-document-number-cpf-label]');
    const agentDocumentCnpjNumber = document.querySelector('[data-agent-document-number-cnpj-label]');
    const agentPhone = document.querySelector('[data-agent-phone-label]');
    const agentRegistrationStatusLabel = document.querySelector('[data-agent-registration-status-label]');
    const agentRegistrastionUpdatedAtStatusLabel = document.querySelector('[data-agent-registration-updated-at-status-label]');
    const inscriptionProjectStatusLabel = document.querySelector('[data-inscription-project-status-label]');
    const inscriptionProjectUpdatedAtStatusLabel = document.querySelector('[data-inscription-project-updated-at-status-label]');
    const identificationProjectStatusLabel = document.querySelector('[data-identification-project-status-label]');
    const identificationProjectUpdatedAtStatusLabel = document.querySelector('[data-identification-project-updated-at-status-label]');
    const filesStatusLabel = document.querySelector('[data-files-status-lebel]');
    const filesUpdatedAtStatusLabel = document.querySelector('[data-files-updated-at-status-label]');
    const complementsStatusLabel = document.querySelector('[data-complements-status-label]');
    const complementsUpdatedAtStatusLabel = document.querySelector('[data-complements-updated-at-status-label]');

    if (payload.agentDocumentType == 'CPF') {
        agentDocumentCpfNumber.textContent = payload.agentDocumentNumber;
        agentDocumentCnpjNumber.textContent = 'NÃO';
    } else {
        agentDocumentCpfNumber.textContent = 'NÃO';
        agentDocumentCnpjNumber.textContent = payload.agentDocumentNumber;
    }

    editalName.textContent = payload.editalName;
    agentName.textContent = payload.agentName;
    agentPhone.textContent = payload.agentPhone;

    getStatus(payload.agentRegistrationStatus, agentRegistrationStatusLabel, agentRegistrastionUpdatedAtStatusLabel, payload.agentRegistrationStatusUpdatedAt);
    getStatus(payload.inscriptionProjectStatus, inscriptionProjectStatusLabel, inscriptionProjectUpdatedAtStatusLabel, payload.inscriptionProjectStatusUpdatedAt);
    getStatus(payload.identificationProjectStatus, identificationProjectStatusLabel, identificationProjectUpdatedAtStatusLabel, payload.identificationProjectStatusUpdatedAt);
    getStatus(payload.filesStatus, filesStatusLabel, filesUpdatedAtStatusLabel, payload.filesStatusUpdatedAt);
    getStatus(payload.complementsStatus, complementsStatusLabel, complementsUpdatedAtStatusLabel, payload.complementsStatusUpdatedAt);
}

function getStatus(statusName, statusLabelElment, statusUpdatedAtElment, statusUpdatedAt) {
    if (statusName === 'Pendente') {
        statusUpdatedAtElment.textContent = statusUpdatedAt;
        statusLabelElment.innerHTML = `
            <span class="px-2 py-1 rounded-lg" style="border: 1px solid #CCC;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f1bb44" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
                ${statusName}
            </span>
        `;
    }

    if (statusName === 'Aprovado') {
        statusUpdatedAtElment.textContent = statusUpdatedAt;
        statusLabelElment.innerHTML = `
            <span class="px-2 py-1 rounded-lg" style="border: 1px solid #CCC;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
                ${statusName}
            </span>
        `;
    }

    if (statusName === 'Reprovado') {
        statusUpdatedAtElment.textContent = statusUpdatedAt;
        statusLabelElment.innerHTML = `
            <span class="px-2 py-1 rounded-lg" style="border: 1px solid #CCC;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
                ${statusName}
            </span>
        `;
    }

    if (statusName === 'Em Reanálise') {
        statusUpdatedAtElment.textContent = statusUpdatedAt;
        statusLabelElment.innerHTML = `
            <span class="px-2 py-1 rounded-lg" style="border: 1px solid #CCC;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#0263ff" viewBox="0 0 256 256">
                    <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
                </svg>
                ${statusName}
            </span>
        `;
    }
}

function loader(button) {
    setTimeout(() => {
        button.disabled = true;
        button.innerHTML = (
            `<span class="spinner-border spinner-border-sm" 
                role="status" aria-hidden="true"></span>
            Aguarde...`
        );
    }, 10);

    setTimeout(() => {
        button.disabled = false;
        button.innerHTML = 'Excluir';
    }, 7000);
}
