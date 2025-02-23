const baseUrl = $('[data-js="base-url"]').val();
const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchCustomer').keyup(function(event) {
    clearTimeout(timer);

    const milliseconds = 500;
    timer = setTimeout((event) => {

        // SE NAO TIVER SIDO PRESSIONADA A TECLA BACKSPACE OU ENTER
        if (event.keyCode !== 8 && event.keyCode !== 13) {
            $.ajax({
                type: 'POST',
                url: searchUrl,
                data: {
                    'name': $(this).val(), 
                    '_token': $("input[name='_token']").val(),   
                },
                beforeSend: () => {
                    $('#contentCustomer').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.customers.length <= 0 
                        ? $('#contentCustomer').html(notFound())
                        : $('#contentCustomer').html(getContent(response.customers))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentCustomer').removeAttr('style');
                    $('#paginate').css({display: 'block'});
                },
            });
        }

    }, milliseconds, event);
});

const notFound = () =>
    `<tr>
        <td colspan="7" class="bg-light">
            <div class="d-flex justify-content-center align-items-center" 
                style="height: 80px; font-size: 16px;"
            >
                Nenhum resultado encontrado.
            </div>
        </td>
    </tr>`

const getContent = (customers) => {
    return customers.reduce((acumulator, customers, index) => {
        return acumulator + 
            `<tr>
                <td class="font-weight-bold">${index + 1}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <span class="mr-3">
                            <img src="${customers.avatar}" class="rounded-circle" width="30px" height="30px" alt="foto de perfil">
                        </span>
                        <span>${customers.name}</span>
                    </div>
                </td>
                <td>${customers.document}</td>
                <td>${customers.phone}</td>
                <td>${customers.city}</td>
                <td>
                    <span class="${customers.status.color}">
                        ${customers.status.name}
                    </span>
                </td>
                <td>
                    <a href="${baseUrl}/panel/customers/${customers.id}/edit" title="Editar dados do usuário"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <a href="${baseUrl}/panel/customers/${customers.id}/edit-password" title="Redefinir senha do usuário"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-key"></i>
                    </a>
                    <button type="button" title="Excluir usuário" data-toggle="modal" 
                        data-route="${customers.route.destroy}" onclick="destroyUser(this)"
                        data-name="${customers.name}" data-target="#deleteCustomer"
                        class="btn btn-sm rounded-lg text-white waves-effect bg-danger mb-2 p-0 mb-md-0"
                    >
                        <i class="mdi mdi-trash-can-outline font-size-17 p-1"></i>
                    </button>
                </td>
            </tr>`
    }, '')
}

const formDestroy = document.querySelector('[data-form-destroy]');
const nameDestroy = document.querySelector('[data-name-destroy]');

function destroyUser(element) {
    const payload = element.dataset;

    formDestroy.action = payload.route;
    nameDestroy.innerText = payload.name;
}

function loader(button) {
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
        button.innerHTML = 'Excluir';
    }, 7000);
}
