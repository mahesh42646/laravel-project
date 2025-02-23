const csrf = document.querySelector('[name="_token"]').value;
const projectId = document.querySelector('[data-js="project-id"]').value;

(async () => {
    const fillUrl = document.querySelector('[data-js="fill-url"]');
    const { Fill } = await import(fillUrl.value);
    Fill.mask({currencyBrl: '[name="price"]'});
})();

function loader(event) {
    if (editalId.value == '') {
        editalId.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Edital obrigatório!</span>',
            html: `Selecione o edital!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cpf.value == '') {
        cpf.focus();
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">CPF obrigatório!</span>',
            html: `Informe o CPF!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    setTimeout(() => {
        event.target.disabled = true;
        event.target.innerHTML = (
            `<span class="spinner-border spinner-border-sm" 
                role="status" aria-hidden="true"></span>
            Aguarde...`
        );
    }, 10);

    setTimeout(() => {
        event.target.disabled = false;
        event.target.innerText = 'Salvar';
    }, 6000);
}

function triggerClick(name) {
    const fileName = document.querySelector(`[target="${name}"]`);

    if (fileName) {
        fileName.click();
    }
}

function displayFile(element, route) {
    if (element.files[0]) {
        const formData = new FormData();
        formData.append('_token', csrf);
        formData.append('project_id', projectId);
        formData.append('document', element.files[0]);

        fetch(route, {
            method: 'POST',
            headers: {'X-CSRF-Token': csrf},
            body: formData
        })
        .then(response => response.json().then(data => ({status: response.status, payload: data})))
        .then((request) => {
            if (request.status === 200) {
                toastr.success(request.payload.message);

                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        })
        .catch(() => {
            toastr.error('Erro ao carregar o arquivo!');
        });
    }
}
