const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchTenant').keyup(function(event) {
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
                    $('#contentTenant').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.tenants.length <= 0 
                        ? $('#contentTenant').html(notFound())
                        : $('#contentTenant').html(getContent(response.tenants))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentTenant').removeAttr('style');
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

const getContent = (tenants) => {
    return tenants.reduce((acumulator, tenant) => {
        return acumulator + 
            `<div class="col-xl-3 rounded-lg p-3 h-auto">
                <div class="row d-flex flex-column align-items-center justify-content-center border rounded-lg shadow p-3 h-100">
                    <a href="${tenant.route.edit}">
                        <img src="${tenant.logo}" class="mb-3" width="100px" alt="${tenant.name}">
                    </a>
                    <div class="text-center text-dark font-weight-medium mb-2">${tenant.name}</div>
                    <div>${tenant.action}</div>
                </div>
            </div>`
    }, '')
}
