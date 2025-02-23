const baseUrl = $('[data-js="base-url"]').val();
const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchEdital').keyup(function(event) {
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
                    $('#contentEdital').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.editals.length <= 0 
                        ? $('#contentEdital').html(notFound())
                        : $('#contentEdital').html(getContent(response.editals))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentEdital').removeAttr('style');
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

const getContent = (editals) => {
    return editals.reduce((acumulator, edital, index) => {
        return acumulator + 
            `<tr>
                <td class="font-weight-bold">${index + 1}</td>
                <td>${edital.name}</td>
                <td>${edital.price_masked}</td>
                <td>${edital.open_at}</td>
                <td>${edital.closed_at}</td>
                <td>
                    <span style="${edital.status.color}">
                        ${edital.status.name}
                    </span>
                </td>
                <td>
                    ${edital.route_register}
                    <a href="${baseUrl}/panel/editals/${edital.id}/edit" title="Editar dados do edital"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <button type="button" title="Remover edital"
                        data-toggle="modal" data-target="#deleteEdital-${edital.id}"
                        class="btn btn-sm rounded-lg text-white waves-effect bg-danger mb-2 p-0 mb-md-0"
                    >
                        <i class="mdi mdi-trash-can-outline font-size-17 p-1"></i>
                    </button>
                </td>
            </tr>
            <div class="modal fade" id="deleteEdital-${edital.id}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="${baseUrl}/panel/editals/${edital.id}" method="POST">
                            ${edital.csrf}
                            <input type="hidden" name="_method" value="DELETE">

                            <div class="modal-body p-4">
                                <h5 class="text-center text-dark">Tem certeza que deseja excluir o edital?</h5>
                                <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;">${edital.name}</h5>
            
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="130px" height="130px" viewBox="0 0 24 24" fill="#ED406A">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
            
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                        style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                                    >
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                        style="background-color: #ED406A"
                                    >
                                        Excluir
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>`
    }, '')
}
