const containerAttachments = document.querySelector('[data-js="container-attachments"]');


function openModal(attachment) {
    const formAttachmentDestroy = document.querySelector('[data-js="form-attachment-destroy"]');
    const title = document.querySelector('[data-js="name-attachment"]');

    formAttachmentDestroy.action = attachment.routeDestroy;
    title.innerText = attachment.name;

    $('#deleteAttachment').modal('show')
}

function addAttachment() {
    const div = document.createElement('div');
    div.innerHTML = (
        `<div class="d-flex">
            <div class="col-5 pl-0 mb-2">
                <input type="text" name="attachment_names[]" class="form-control text-uppercase rounded-lg" required>
            </div>
            <div class="col-6 mb-2">
                <input type="file" name="attachment_files[]" accept=".pdf" class="form-control border-0 pl-0 rounded-lg" required>
            </div>
            <div class="col-1 mb-2">
                <div class="text-danger">
                    <span class="mdi mdi-trash-can font-size-24" title="Remover anexo" style="cursor: pointer;"
                        onclick="this.parentElement.parentElement.parentElement.remove()" 
                    >
                </span>
                </div>
            </div>
        </div>`
     );

    containerAttachments.appendChild(div);
}

function loader(event) {
    
    let isEmptyAttachmentName = false;
    const attachmentsNames = document.querySelectorAll('[name="attachment_names[]"]');

    if (attachmentsNames.length > 0) {
        attachmentsNames.forEach((attachmentName) => {
            if (attachmentName.value == '') {
                isEmptyAttachmentName = true;
            }
        });
    
        if (isEmptyAttachmentName) {
            event.preventDefault();
    
            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">Nome do anexo é obrigatório!</span>',
                html: `Informe o nome do anexo do edital!`,
                showConfirmButton: false,
                timer: 2500,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
    }

    let isEmptyAttachmentFile = false;
    const attachmentsFiles = document.querySelectorAll('[name="attachment_files[]"]');

    if (attachmentsFiles.length > 0) {
        attachmentsFiles.forEach((attachmentFile) => {
            if (attachmentFile.value == '') {
                isEmptyAttachmentFile = true;
            }
        });
    
        if (isEmptyAttachmentFile) {
            event.preventDefault();
    
            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">Arquivo do anexo é obrigatório!</span>',
                html: `Carregue os anexos do edital!`,
                showConfirmButton: false,
                timer: 2500,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
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
