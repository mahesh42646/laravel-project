ClassicEditor
    .create(document.querySelector('[name="content"]'), {
        removePlugins: ['Title'],
        placeholder: '',
    })
    .then(editor => { window.editor = editor; })
    .catch(error => { console.error( error ); });

const containerDiligence = document.querySelector('[data-js="container-diligences"]');

function addDiligenceAttachment() {
    const div = document.createElement('div');
    div.innerHTML = (
        `<div class="d-flex align-items-center mb-2">
            <div class="col-5 pl-0">
                <input type="text" class="form-control rounded-lg" name="files_names[]" placeholder="Nome do arquivo" required>
            </div>
            <div class="col-5 px-0">
                <input type="file" class="form-control rounded-lg" accept=".pdf" name="attachments[]" required>
            </div>
            <div class="col-2 text-center px-0">
                <svg xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;" onclick="this.parentElement.parentElement.parentElement.remove()" height="24" viewBox="0 -960 960 960" width="24" fill="var(--danger)">
                    <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/>
                </svg>
            </div>
        </div>`
    );

    containerDiligence.appendChild(div);
}

function changeStatusDiligence(select) {
    const containerDiligenceMotive = document.querySelector('[data-js="container-diligence-motive"]');
    const motive = document.querySelector('[data-js="diligence-motive"]');

    if (select.value == '2' || select.value == '3') {
        containerDiligenceMotive.classList.remove('d-none');
        containerDiligenceMotive.classList.add('d-block');
        motive.required = true;
        motive.disabled = false;
    } else {
        containerDiligenceMotive.classList.remove('d-block');
        containerDiligenceMotive.classList.add('d-none');
        motive.required = false;
        motive.disabled = true;
    }
}

function loaderSaveDiligence(event) {
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
        target.innerText = 'Enviar Mensagem';
    }, 6000, event);
}
