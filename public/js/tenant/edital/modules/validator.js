export default {
    getDefaultFields: () => {
        return [
            { element: document.querySelector('[name="type_id"]'), message: 'Tipo de edital obrigatório!' },
            { element: document.querySelector('[name="name"]'), message: 'Nome do edital obrigatório!' },
            { element: document.querySelector('[name="price"]'), message: 'Valor do projeto obrigatório!' },
            { element: document.querySelector('[name="vacancies"]'), message: 'Número de vagas obrigatório!' },
            { element: document.querySelector('[name="open_at"]'), message: 'Data de abertura obrigatório!' },
            { element: document.querySelector('[name="horary_open_at"]'), message: 'Hora de abertura obrigatório!' },
            { element: document.querySelector('[name="closed_at"]'), message: 'Data de encerramento obrigatório!' },
            { element: document.querySelector('[name="horary_closed_at"]'), message: 'Hora de encerrarmento obrigatório!' },
            { element: document.querySelector('[name="register_type_id"]'), message: 'Permissão de inscrição obrigatória' }
        ];
    },
    getCheckboxFields: () => {
        return [
            { elements: document.querySelectorAll('[name="people_types[]"]'), message: 'Tipo de participação obrigatória!' },
            { elements: document.querySelectorAll('[name="quotas[]"]'), message: 'Seleção de cotas obrigatória!' },
        ];
    },
    elementsCheckeds: (field) => {
        return Array.from(field.elements)
            .filter((element) => element.checked)
            .length;
    },
    totalIdentificationFields: () => {
        const identificationRequireds = document.querySelectorAll('[name="identification_requireds[]"]');
        const identificationOptionals = document.querySelectorAll('[name="identification_optionals[]"]');

        const elementsIdentificationRequiredsCheckeds = Array
            .from(identificationRequireds)
            .filter((element) => element.checked)
            .length;

        const elementsIdentificationOptionalsCheckeds = Array
            .from(identificationOptionals)
            .filter((element) => element.checked)
            .length;

        return (
            elementsIdentificationRequiredsCheckeds + 
            elementsIdentificationOptionalsCheckeds
        );
    },
    totalDocumentationRequired: () => {
        const elementsDocumentationTypeRequireds = document.querySelectorAll('[name="documentation_type_requireds[]"]');

        return Array.from(elementsDocumentationTypeRequireds)
            .filter(element => element.checked)
            .length;
    },
    showAlert: (message) => {
        Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: `<span style="color: var(--blue)">${message}</span>`,
            html: 'Por favor, preencha este campo.',
            showConfirmButton: false,
            timer: 6000,
            customClass: { htmlContainer: 'mt-1' }
        });
    },
    showProgressIndicator: (button, duration = 6000) => {
        const updateStateButton = (isLoading, text) => {
            button.disabled = isLoading;
            button.innerHTML = text;
        }
    
        setTimeout(() => updateStateButton(true, '<spinner></spinner>Aguarde'), 10);
        setTimeout(() => updateStateButton(false, 'Criar edital'), duration);
    }
}
