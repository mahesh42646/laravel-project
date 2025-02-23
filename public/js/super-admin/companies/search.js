const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchCompany').keyup(function(event) {
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
                    $('#contentCompany').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.companies.length <= 0 
                        ? $('#contentCompany').html(notFound())
                        : $('#contentCompany').html(getContent(response.companies))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentCompany').removeAttr('style');
                    $('#paginate').css({display: 'block'});
                },
            });
        }

    }, milliseconds, event);
});

const notFound = () =>
    `<tr>
        <td colspan="6" class="bg-light">
            <div class="d-flex justify-content-center align-items-center" 
                style="height: 80px; font-size: 16px;"
            >
                Nenhum resultado encontrado.
            </div>
        </td>
    </tr>`

const getContent = (companies) => {
    return companies.reduce((acumulator, company, index) => {
        return acumulator + 
            `<tr>
                <td class="font-weight-bold">${index + 1}</td>
                <td>${company.name}</td>
                <td>${company.cnpj}</td>
                <td>${company.phone}</td>
                <td>${company.created_at}</td>
                <td class="d-flex">
                    <a href="${company.route.edit}" title="Editar dados da empresa"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-pencil"></i>
                    </a>
                </td>
            </tr>`
    }, '')
}
