
$(document).ready(function() {
    const cpf = [{ "mask": "###.###.###-##"}];
    $('[name="cpf"]').inputmask({ 
        mask: cpf, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });

    const cnpj = [{ "mask": "##.###.###/####-##"}];
    $('[name="cnpj"]').inputmask({ 
        mask: cnpj, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
});

document.querySelector('[name="phone"]').addEventListener('input', function(e) {
    const aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
});

function loader(event) {
    const name = document.querySelector('[name="name"]');
    const cnpj = document.querySelector('[name="cnpj"]');
    const responsible = document.querySelector('[name="responsible"]');
    const cpfMasked = document.querySelector('[name="cpf"]').value;

    const cpf = cpfMasked.replace(/\D/g, '');

    console.log(
        cpf.length
    );

    if (name.value == '') {
        event.preventDefault();
        name.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Nome da Empresa Obrigatório!</span>',
            html: `Informe o nome da empresa!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cnpj.value == '') {
        event.preventDefault();
        cnpj.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">CNPJ obrigatório!</span>',
            html: `Informe o <strong>CNPJ</strong> da empresa!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (responsible.value == '') {
        event.preventDefault();
        responsible.focus();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">Nome do resposável obrigatório!</span>',
            html: `Informe o nome do responsável!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cpf.length >= 0 && cpf.length <= 10) {
        event.preventDefault();

        return Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: '<span style="color: var(--blue)">CPF Incompleto!</span>',
            html: `Informe o CPF!`,
            showConfirmButton: false,
            timer: 2000,
            customClass: { htmlContainer: 'mt-1' }
        });
    }

    if (cpf.length === 11) {
        let v = [];

        // Calcula o primeiro dígito de verificação
        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
        v[0] = v[0] % 11;
        v[0] = v[0] % 10;

        // Calcula o segundo dígito de verificação
        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
        v[1] = v[1] % 11;
        v[1] = v[1] % 10;

        //Retorna Verdadeiro se os dígitos de verificação são os esperados.
        if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
            event.preventDefault();

            return Swal.fire({
                iconColor: 'var(--blue)',
                icon:  'info',
                title: '<span style="color: var(--blue)">CPF Inválido!</span>',
                html: `O <strong>número do CPF</strong> está incorreto!`,
                showConfirmButton: false,
                timer: 2000,
                customClass: { htmlContainer: 'mt-1' }
            });
        }
    }

    setTimeout(({ target }) => {
        target.disabled = true;
        target.innerHTML = 
            `<span class="spinner-border spinner-border-sm" 
                role="status" aria-hidden="true"></span>
            Aguarde...`;
    }, 10, event);

    setTimeout(({ target }) => {
        target.disabled = false;
        target.innerHTML = 'Salvar';
    }, 7000, event);
}
