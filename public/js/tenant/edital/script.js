import InitMask from './modules/mask.js';
import InitEditor from './modules/editor.js';
import ImageManager from './modules/image.js';
import AttachmentManager from './modules/attachment.js';
import Validator from './modules/validator.js';

// INICIAR UTILITARIOS

InitMask.money();
InitEditor.ckeditor();

// UPLOAD DE IMAGENS

ImageManager.selectLogo('[data-image-logo]');
ImageManager.showLogo('[data-file-logo]');
ImageManager.selectBanner('[data-image-banner]');
ImageManager.showBanner('[data-file-banner]');

// SELETOR DOS TIPOS DE PARTICIPANTES - PF, PJ OU COLETIVO

window.changeTypePeople = (target, peopleType) => {
    const selectorPeople = `[data-people-type-name="${peopleType}"]`;
    const container = document.querySelector(selectorPeople);

    (target.checked) 
        ? container.classList.remove('d-none')
        : container.classList.add('d-none');
}

// ALTERNAR DOCUMENTACAO REQUIRIDA E OPCIONAL

window.toggleDocumentationRequired = (currentElement, optionalElementId) => {
    if (currentElement.checked) {
        document.getElementById(optionalElementId).checked = false;
    }
}

window.toggleDocumentationOptional = (elementCurrent, requiredElementId) => {
    if (elementCurrent.checked) {
        document.getElementById(requiredElementId).checked = false;
    }
}

// ALTERNAR CAMPOS DE IDENTIFICACAO DO PROJETO REQUIRIDOS E OPCIONAIS

window.toggleFieldIdentificationRequired = (currentElement, optionalElementId) => {
    if (currentElement.checked) {
        document.getElementById(optionalElementId).checked = false;
    }
}

window.toggleFieldIdentificationOptional = (currentElement, optionalElementId) => {
    if (currentElement.checked) {
        document.getElementById(optionalElementId).checked = false;
    }
}

// GERENCIAMENTO DE ANEXOS

AttachmentManager.prepareUpload();

// BOTAO DE SALVAR EDITAL

window.save = (event) => {
    const defaultFields = Validator.getDefaultFields();
    const checkboxFields = Validator.getCheckboxFields();

    for (let index = 0; index < defaultFields.length; index++) {
        const field = defaultFields[index];

        if (field.element.value === '') {
            event.preventDefault();
            field.element.focus();
            return Validator.showAlert(field.message);
        }
    }

    for (let index = 0; index < checkboxFields.length; index++) {
        const field = checkboxFields[index];

        if (Validator.elementsCheckeds(field) <= 0) {
            event.preventDefault();
            return Validator.showAlert(field.message);
        }
    }

    if (Validator.totalIdentificationFields() <= 12) {
        event.preventDefault();
        return Validator.showAlert('Selecione todos os campos de identificação do projeto!');
    }

    if (Validator.totalDocumentationRequired() <= 0) {
        event.preventDefault();
        return Validator.showAlert('Selecione a documentação obrigatória! (PF, PJ ou Colletivo)');
    }

    Validator.showProgressIndicator(event.target);
}

window.openModalDeleteAttachment = (attachment) => {
    const formAttachmentDestroy = document.querySelector('[data-form-attachment-destroy]');
    const title = document.querySelector('[data-name-attachment]');

    formAttachmentDestroy.action = attachment.routeDestroy;
    title.innerText = attachment.name;
}
