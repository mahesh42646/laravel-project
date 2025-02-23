const type = document.querySelector('[name="type_id"]');
const editalName = document.querySelector('[name="name"]');
const price = document.querySelector('[name="price"]');
const vacancies = document.querySelector('[name="vacancies"]');
const openAt = document.querySelector('[name="open_at"]');
const horaryOpenAt = document.querySelector('[name="horary_open_at"]');
const closedAt = document.querySelector('[name="closed_at"]');
const horaryClosedAt = document.querySelector('[name="horary_closed_at"]');
const newPhotoEdital = document.querySelector('[name="new_photo"]');
const newBannerEdital = document.querySelector('[name="new_banner"]');
const documentationTypeId = document.querySelector('[name="documentation_type_id"]');
const containerDocumentationPf = document.querySelector('[data-container-documentation-pf]');
const containerDocumentationPj = document.querySelector('[data-container-documentation-pj]');
const containerAttachments = document.querySelector('[data-js="container-attachments"]');
const newPhoto = document.getElementById('newPhoto');
const photoUpdate = document.getElementById('photoUpdate');

(async () => {
    const fillUrl = document.querySelector('[data-js="fill-url"]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({currencyBrl: '[name="price"]'});
})();

ClassicEditor
    .create(document.querySelector('[name="observation"]'), {
        removePlugins: ['Title'],
        placeholder: '',
    })
    .then(editor => { window.editor = editor; })
    .catch(error => { console.error( error ); });

function triggerClick() {
    if (newPhoto) { newPhoto.click(); }
    if (photoUpdate) { photoUpdate.click(); }
}

function displayProfile(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {

            let size = event.total;
            let i = 0;
            const unit = ['B', 'KB', 'MB', 'GB'];

            while(size > 900){
                size /= 1024;
                i++;
            }

            const exactSize = Math.round(size*100)/100;
            const typeSize = unit[i];

            if (typeSize === 'MB' || typeSize === 'GB') {
                newPhotoEdital.value = '';

                return Swal.fire(message(
                    `Imagem muito grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            if (size > 100) {
                newPhotoEdital.value = '';

                return Swal.fire(message(
                    `Imagem grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            const photoDisplay = document.querySelector('#photoDisplay');
            photoDisplay.setAttribute('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}

function triggerClickBanner() {
    const newBanner = document.querySelector('#newBanner');
    const bannerUpdate = document.querySelector('#bannerUpdate');

    if (newBanner) { newBanner.click(); }
    if (bannerUpdate) { bannerUpdate.click(); }
}

function displayProfileBanner(event) {
    if (event.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {

            let size = event.total;
            let i = 0;
            const unit = ['B', 'KB', 'MB', 'GB'];

            while(size > 900){
                size /= 1024;
                i++;
            }

            const exactSize = Math.round(size*100)/100;
            const typeSize = unit[i];

            if (typeSize === 'MB' || typeSize === 'GB') {
                newBannerEdital.value = '';

                return Swal.fire(message(
                    `Imagem de cabeçalho muito grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            if (size > 100) {
                newBannerEdital.value = '';

                return Swal.fire(message(
                    `Imagem de cabeçalho grande: ${exactSize} ${typeSize}`, 
                    'A imagem a ser carregada não pode ser superior a 100 KB',
                    6000
                ));
            }

            const photoDisplayBanner = document.querySelector('#photoDisplayBanner');
            photoDisplayBanner.setAttribute('src', event.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
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

function selectTypeDocumentation(value) {
    if (value === '1') {
        containerDocumentationPf.classList.remove('d-none');
        containerDocumentationPj.classList.remove('d-none');
    }

    if (value === '2') {
        containerDocumentationPf.classList.remove('d-none');
        containerDocumentationPj.classList.add('d-none');
    }
    
    if (value === '3') {
        containerDocumentationPf.classList.add('d-none');
        containerDocumentationPj.classList.remove('d-none');
    }
}

function loader(event) {
    if (type.value == '') {
        event.preventDefault();
        type.focus();

        return Swal.fire(message(
            'Tipo de Edital Obrigatório!', 
            'Selecione o tipo de edital!'
        ));
    }

    if (editalName.value == '') {
        event.preventDefault();
        editalName.focus();

        return Swal.fire(message(
            'Nome do Edital Obrigatório!', 
            'Informe o nome do edital!'
        ));
    }

    if (price.value == '') {
        event.preventDefault();
        price.focus();

        return Swal.fire(message(
            'Valor do Projeto Obrigatório!', 
            'Informe o valor do projeto!'
        ));
    }

    if (vacancies.value == '') {
        event.preventDefault();
        vacancies.focus();

        return Swal.fire(message(
            'Número de Vagas Obrigatório!', 
            'Informe o número de vagas!'
        ));
    }

    if (openAt.value == '') {
        event.preventDefault();
        openAt.focus();

        return Swal.fire(message(
            'Data de Abertura do Edital Obrigatória!', 
            'Informe a data de abertura do edital!'
        ));
    }

    if (horaryOpenAt.value == '') {
        event.preventDefault();
        horaryOpenAt.focus();

        return Swal.fire(message(
            'Hora de Abertura do Edital Obrigatória!', 
            'Informe a hora de abertura do edital!'
        ));
    }

    if (closedAt.value == '') {
        event.preventDefault();
        closedAt.focus();

        return Swal.fire(message(
            'Data de Encerramento do Edital Obrigatória!', 
            'Informe a data de encerramento do edital!'
        ));
    }

    if (horaryClosedAt.value == '') {
        event.preventDefault();
        horaryClosedAt.focus();

        return Swal.fire(message(
            'Hora de Encerramento do Edital Obrigatória!', 
            'Informe a hora de encerramento do edital!'
        ));
    }

    if (newPhotoEdital && newPhotoEdital.value == '') {
        event.preventDefault();

        return Swal.fire(message(
            'Foto Obrigatória!',
            'Carregue a foto do edital!'
        ));
    }

    if (newBannerEdital && newBannerEdital.value == '') {
        event.preventDefault();

        return Swal.fire(message(
            'Imagem do cabeçalho Obrigatória!',
            'Carregue a imagem do cabeçalho do edital!'
        ));
    }

    if (documentationTypeId.value === '') {
        event.preventDefault();
        documentationTypeId.focus();

        return Swal.fire(message(
            'Tipo de Documentação Obrigatória!',
            'Selecione o tipo de documentação a ser informada pelo participante!'
        ));
    }

    // AMBOS - PESSOA FISICA E PESSOA JURIDICA
    if (documentationTypeId.value === '1') {
        if (getTotalDocumentsPfsChecked() !== getTotalDocumentsPfsRequireds()) {
            event.preventDefault();

            return Swal.fire(message(
                'Documentação pessoa física obrigatória!',
                'Marque o tipo de documento e selecione se o documento é obrigatório!'
            ));
        }

        if (getTotalDocumentsPjsChecked() !== getTotalDocumentsPjsRequireds()) {
            event.preventDefault();

            return Swal.fire(message(
                'Documentação pessoa jurídica obrigatória!',
                'Marque o tipo de documento e selecione se o documento é obrigatório!'
            ));
        }
    }

    // TIPO DE DOCUMENTACAO PESSOA FISICA
    if (documentationTypeId.value === '2') {
        if (getTotalDocumentsPfsChecked() !== getTotalDocumentsPfsRequireds()) {
            event.preventDefault();

            return Swal.fire(message(
                'Documentação pessoa física obrigatória!',
                'Marque o tipo de documento e selecione se o documento é obrigatório!'
            ));
        }
    }

    // TIPO DE DOCUMENTACAO PESSOA JURIDICA
    if (documentationTypeId.value === '3') {
        if (getTotalDocumentsPjsChecked() !== getTotalDocumentsPjsRequireds()) {
            event.preventDefault();

            return Swal.fire(message(
                'Documentação pessoa jurídica obrigatória!',
                'Marque o tipo de documento e selecione se o documento é obrigatório!'
            ));
        }
    }

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

            return Swal.fire(message(
                'Nome do anexo é obrigatório!',
                'Informe o nome do anexo do edital!'
            ));
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

            return Swal.fire(message(
                'Arquivo do anexo é obrigatório!',
                'Carregue os anexos do edital!'
            ));
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

const getTotalDocumentsPfsChecked = () => {
    let totalDocumentsPfsChecked = 0;
    const checkDocumentsPfs = document.querySelectorAll('[name="documents_pf[]"]');

    checkDocumentsPfs.forEach((checkDocumentPf) => {
        if (checkDocumentPf.checked) {
            totalDocumentsPfsChecked++;
        }
    });

    return totalDocumentsPfsChecked;
}

const getTotalDocumentsPfsRequireds = () => {
    let totalDocumentsPfsRequireds = 0;
    const requiredDocumentsPfs = document.querySelectorAll('[name="documents_requireds_pf[]"]');

    requiredDocumentsPfs.forEach((requiredDocumentPf) => {
        if (requiredDocumentPf.value != '') {
            totalDocumentsPfsRequireds++;
        }
    });

    return totalDocumentsPfsRequireds;
}

const getTotalDocumentsPjsChecked = () => {
    let totalDocumentsPjsChecked = 0;
    const checkDocumentsPjs = document.querySelectorAll('[name="documents_pj[]"]');

    checkDocumentsPjs.forEach((checkDocumentPj) => {
        if (checkDocumentPj.checked) {
            totalDocumentsPjsChecked++;
        }
    });

    return totalDocumentsPjsChecked;
}

const getTotalDocumentsPjsRequireds = () => {
    let totalDocumentsPjsRequireds = 0;
    const requiredDocumentsPjs = document.querySelectorAll('[name="documents_requireds_pj[]"]');

    requiredDocumentsPjs.forEach((requiredDocumentPj) => {
        if (requiredDocumentPj.value != '') {
            totalDocumentsPjsRequireds++;
        }
    });

    return totalDocumentsPjsRequireds;
}

function openModalDeleteAttachment(attachment) {
    const formAttachmentDestroy = document.querySelector('[data-form-attachment-destroy]');
    const title = document.querySelector('[data-name-attachment]');

    formAttachmentDestroy.action = attachment.routeDestroy;
    title.innerText = attachment.name;
}

function progressIndicator(button) {
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
        button.innerText = 'Excluir';
    }, 6000);
}

const message = (title, description, duration = 2500) => {
    return ({
        iconColor: 'var(--blue)',
        icon:  'info',
        title: `<span style="color: var(--blue)">${title}</span>`,
        html: description,
        showConfirmButton: false,
        timer: duration,
        customClass: {htmlContainer: 'mt-1'}
    });
}
