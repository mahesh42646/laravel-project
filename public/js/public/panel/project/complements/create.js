const typeLinkElement = document.querySelector('[data-type-link]');
const nameLinkElement = document.querySelector('[data-link-name]');
const descriptionElement = document.querySelector('[data-link-description]');
let counter = 0;

function addSocialMedia() {
    const typeLinkOption = typeLinkElement.options[typeLinkElement.selectedIndex];

    if (!typeLinkElement.value)  return showAlert('Tipo de Link obrigatório!')
    if (!nameLinkElement.value.trim()) return showAlert('Link obrigatório!')
    if (!descriptionElement.value.trim()) return showAlert('Descrição do Link obrigatória!')
    
    insertSocialMediaInContainer({
        typeLink: typeLinkOption.dataset,
        link: nameLinkElement.dataset,
        description: descriptionElement.value.trim()
    });
}

const insertSocialMediaInContainer = ({ typeLink, link, description }) => {
    const socialMediaList = document.querySelector('[data-social-medias-container]');
    const socialMediaItem = getSocialMediaELement(typeLink, link, description);

    socialMediaList.appendChild(socialMediaItem);
    resetInputs();
}

const getSocialMediaELement = (typeLink, link, description) => {
    const div = document.createElement('div');
    const hr = document.createElement('hr');
    const socialMediaElement = document.createElement('div');

    hr.classList.add('my-2');
    socialMediaElement.classList.add('d-md-flex', 'justify-content-md-between', 'text-dark');
    socialMediaElement.setAttribute('data-item', 'social-media');
    socialMediaElement.innerHTML = (
        `<div class="d-flex align-items-center text-dark">
            <h1 class="font-weight-bold mb-0 mr-4" data-item-index>${++counter}</h1>
            <h5 class="mb-0"><img src="${typeLink.icon}" width="35" height="35">&nbsp;</h5>
            <h5 class="mb-0">${description} &nbsp;</h5>
        </div>
        <div class="d-flex">
            <span type="button" style="padding: 3px 2px;" title="Remover rede social"
                onclick="removeSocialMedia(this.parentElement.parentElement.parentElement)"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#999" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
            </span>
        </div>
        <input type="hidden" name="ids[]" value="${typeLink.id}">
        <input type="hidden" name="links[]" value="${link}">
        <input type="hidden" name="descriptions[]" value="${description}">`
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

function save(event) {
    const termOfUse = document.querySelector('#term');

    if (!termOfUse.checked) {
        event.preventDefault()
        return showAlert(
            'Termo de uso obrigatório!', 
            'Marque a opção de aceitar os termos de uso e política de privacidade para prosseguir.'
        );
    }

    showProgressIndicator(event.target);
}

const showProgressIndicator = (button) => {
    const updateStateButton = (isLoading, text) => {
        button.disabled = isLoading;
        button.innerHTML = text;
    }

    setTimeout(() => updateStateButton(true, '<spinner></spinner> Aguarde...'), 10);
    setTimeout(() => updateStateButton(false, 'ENVIAR PROJETO'), 7000);
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
