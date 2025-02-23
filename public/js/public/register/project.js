const projectName = document.querySelector('[name="name"]');
const projectPrice = document.querySelector('[name="price"]');

(async () => {
    const fillUrl = document.querySelector('[data-js="fill-url"]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({currencyBrl: '[name="price"]'});
})();

function loader(event) {
    if (projectName.value == '') {
        projectName.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Nome do Projeto é obrigatório!</span>',
            html: `Informe o nome do projeto!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (projectPrice.value == '') {
        projectPrice.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Valor do Projeto é obrigatório!</span>',
            html: `Informe o valor do projeto!`,
            showConfirmButton: false,
            timer: 2000,
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
