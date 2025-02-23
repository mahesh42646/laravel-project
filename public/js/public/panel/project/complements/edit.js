const typeLinkElement = document.querySelector('[data-type-link]');
const nameLinkElement = document.querySelector('[data-link-name]');
const descriptionElement = document.querySelector('[data-link-description]');
const saveUrl = document.querySelector('[data-save-url]');
const token = document.querySelector('[data-token]');
const indexElement = document.querySelectorAll('[data-item-index]');
let counter = indexElement.length;

async function saveSocialMedia(button) {
    const typeLinkOption = typeLinkElement.options[typeLinkElement.selectedIndex];

    if (!typeLinkElement.value)  return showAlert('Tipo de Link obrigatório!');
    if (!nameLinkElement.value.trim()) return showAlert('Link obrigatório!');
    if (!descriptionElement.value.trim()) return showAlert('Descrição do Link obrigatória!');

    showProgressIndicator(button, true);

    const response = await fetch(saveUrl.value, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token.value
        },
        body: JSON.stringify({
            media_id: typeLinkOption.dataset.id,
            link: nameLinkElement.value.trim(),
            description: descriptionElement.value.trim()
        })
    });

    showProgressIndicator(button, false);

    const socialMedia = await response.json();
    
    insertSocialMediaInContainer({
        typeLink: typeLinkOption.dataset,
        socialMedia
    });

    Swal.fire({
        iconColor: 'var(--success)',
        icon:  'success',
        title: '<span style="color: var(--success)">Sucesso!</span>',
        html: socialMedia.message,
        showConfirmButton: false,
        timer: 3000,
        customClass: { htmlContainer: 'mt-1' }
    });
}

const insertSocialMediaInContainer = ({ typeLink, socialMedia }) => {
    const socialMediaList = document.querySelector('[data-social-medias-container]');
    const socialMediaItem = getSocialMediaELement(typeLink, socialMedia);

    socialMediaList.appendChild(socialMediaItem);
    resetInputs();
}

const getSocialMediaELement = (typeLink, { link, description, routeDestroy }) => {
    const div = document.createElement('div');
    const hr = document.createElement('hr');
    const socialMediaElement = document.createElement('div');
    
    hr.classList.add('my-2');
    socialMediaElement.classList.add('d-md-flex', 'justify-content-md-between', 'text-dark');
    socialMediaElement.setAttribute('data-item', 'social-media');
    socialMediaElement.innerHTML = (
        `<div class="d-flex align-items-center text-dark">
            <h1 class="font-weight-bold mb-0 mr-4" style="font-family: cursive;" data-item-index>${++counter}</h1>
            <a href="${link}" class="d-flex align-items-center" target="_blank">
                <h5 class="mb-0"><img src="${typeLink.icon}" width="35" height="35">&nbsp;</h5>
                <h5 class="mb-0">${description} &nbsp;</h5>
            </a>
        </div>
        <div class="d-flex">
            <span type="button" style="padding: 3px 2px;" title="Remover rede social"
                data-route="${routeDestroy}" data-name="${description}" data-icon="${typeLink.icon}"
                onclick="destroySocialMedia(this.dataset)" data-target="#deleteSocialMedia" data-toggle="modal"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#999" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
            </span>
        </div>`
    );

    div.appendChild(socialMediaElement);
    div.appendChild(hr);

    return div;
}

function removeSocialMedia(targetElement) {
    targetElement.remove();

    const socialMediaNumbers = document.querySelectorAll('[data-item-index]');
    socialMediaNumbers.forEach((item, index) => {
        item.innerText = index + 1;
    });

    --counter;
}

const resetInputs = () => {
    typeLinkElement.value = '';
    nameLinkElement.value = '';
    descriptionElement.value = '';
}

function showProgressIndicator(button, isLoading) {
    if (isLoading) {
        button.disabled = true;
        button.innerHTML = '<spinner></spinner> Aguarde...';
    } else {
        button.disabled = false;
        button.innerHTML = (
            `<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256">
                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
            </svg>
            <span class="ml-1">Adicionar</span>`
        );
    }
}

const showAlert = (title, subtitle = 'Preencha todos os campos obrigatórios.') => {
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

function destroySocialMedia(payload) {
    const formDestroy = document.querySelector('[data-form-destroy]');
    const nameDestroy = document.querySelector('[data-name-destroy]');

    formDestroy.action = payload.route;
    nameDestroy.innerHTML = (
        `<div class="d-flex align-items-center justify-content-center">
            <img src="${payload.icon}" width="30" height="30">
            <h4 class="ml-2 mb-0">${payload.name}</h4>
        </div>`
    );
}

function loaderDestroy(button) {
    setTimeout(() => {
        button.disabled = true;
        button.innerHTML = '<spinner></spinner> Aguarde...';
    }, 10);

    setTimeout(() => {
        button.disabled = false;
        button.innerHTML = 'Excluir';
    }, 7000);
}
