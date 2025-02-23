function checkQuota(hasQuota) {
    const quotaId = document.querySelector('[name="inscription_quota_id"]');
    quotaId.value = '';

    if (hasQuota === '1') {
        quotaId.classList.remove('bg-light');
        quotaId.disabled = false;
    } else {
        quotaId.classList.add('bg-light');
        quotaId.disabled = true;
    }
}

function changeProfilePriority(value) {
    const profilePriorityOther = document.querySelector('[name="inscription_profile_priority_other"]');

    if (value !== '14') {
        profilePriorityOther.value = '';
        profilePriorityOther.classList.add('bg-light');
        profilePriorityOther.disabled = true;
    } else {
        profilePriorityOther.classList.remove('bg-light');
        profilePriorityOther.disabled = false;
    }
}

function changeAccessibility(element) {
    const accessibilityOther = document.querySelector('[name="inscription_accessibility_other"]');

    if (element.checked && element.value === '99') {
        accessibilityOther.value = '';
        accessibilityOther.classList.remove('bg-light');            
        accessibilityOther.disabled = false;
    } else {
        accessibilityOther.value = '';
        accessibilityOther.classList.add('bg-light');
        accessibilityOther.disabled = true;
    }
}

const accessibilityTypes = [
    { selector: '[data-accessibility-arquitetonic]' },
    { selector: '[data-accessibility-commnunicational]' },
    { selector: '[data-accessibility-atitudinal]' }
]

accessibilityTypes.forEach(accessibility => {
    $(accessibility.selector).select2({
        placeholder: 'Selecione',
        language: {'noResults': () => 'Nenhum resultado encontrado'},
    });
});

function showProgressIndicator(button, duration = 7000) {
    const buttonState = (isLoading, text) => {
        button.disabled = isLoading;
        button.innerHTML = text;
    }

    setTimeout(() => buttonState(true, '<spinner></spinner> Aguarde...'), 10);
    setTimeout(() => buttonState(false, 
        `<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#ff9d0a" viewBox="0 0 256 256">
                <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
            </svg>
        <span class="ml-1 font-weight-bold">SALVAR RASCUNHO</span>`
    ), duration)
}
   