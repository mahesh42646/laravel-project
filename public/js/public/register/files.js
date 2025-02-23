const baseUrl = document.querySelector('[data-js="search-customer-url"]');
const editalId = document.querySelector('[name="edital_id"]');
const customerId = document.querySelector('[name="customer_id"]');

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
        labelCurrent.innerHTML = `<div class="style="font-size: 13px">${element.files[0].name}</div>`;
    }
}

function loader(event) {
    const documents = document.querySelectorAll('[name="documents[]"]');
    let isEmpty = false;

    documents.forEach((document) => {
        if (document.value == '' && document.hasAttribute('required')) {
            isEmpty = true;
        }
    });

    if (isEmpty) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Documentação obrigatória!</span>',
            html: 'Carregue todos os documentos que são obrigatórios!',
            showConfirmButton: false,
            timer: 2500,
            customClass: { htmlContainer: 'mt-1' }
        });
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
        target.innerText = 'Salvar';
    }, 6000, event);
}
