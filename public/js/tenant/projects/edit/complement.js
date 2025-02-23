const term = document.getElementById('term');
const containerMedias = document.querySelector('[data-js="container-medias"]');
const socialMedias = document.querySelector('[data-js="social-medias"]');
const medias = JSON.parse(socialMedias.value);

function addMedia() {
    const div = document.createElement('div');
    div.innerHTML = (
        `<div class="d-flex align-items-center mb-3">
            <div class="col-4 pl-0">
                <select class="form-control" name="media_ids[]" required>
                    <option value="">Selecione</option>
                    ${medias.reduce((accumulator, media) => accumulator + `<option value="${media.id}">${media.name}</option>`, '')}
                </select>
            </div>
            <div class="col-5">
                <input type="text" class="form-control" name="media_links[]" required>
            </div>
            <div class="col-3">
                <label class="text-dark mb-0" style="cursor: pointer;" title="Remover mídia" onclick="this.parentElement.parentElement.parentElement.remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" fill="#f61c0d">
                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/>
                    </svg>
                </label>
            </div>
        </div>`
    );

    containerMedias.appendChild(div);
}

function loader(event) {
    const mediaIds = document.querySelectorAll('[name="media_ids[]"]');
    const mediaLinks = document.querySelectorAll('[name="media_links[]"]');

    if (mediaIds.length <= 0 && mediaLinks.length <= 0) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Adição de Nova Mídia Obrigatória</span>',
            html: `Adicione uma nova rede social!`,
            showConfirmButton: false,
            timer: 2500,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (mediaIds.length > 0) {
        let isEmptyMediaId = false;

        mediaIds.forEach((media) => {
            if (media.value == '') {
                isEmptyMediaId = true;
            }
        });

        if (isEmptyMediaId) {
            event.preventDefault();
    
            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">Seleção obrigatória!</span>',
                html: `Selecione o tipo de rede social!`,
                showConfirmButton: false,
                timer: 2500,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
    }

    if (mediaLinks.length > 0) {
        let isEmptyMediaLink = false;

        mediaLinks.forEach((media) => {
            if (media.value == '') {
                isEmptyMediaLink = true;
            }
        });

        if (isEmptyMediaLink) {
            event.preventDefault();
    
            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">Link obrigatório!</span>',
                html: `Informe o link da rede social!`,
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
