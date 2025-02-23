const baseUrl = $('[data-js="base-url"]').val();
const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchProfessional').keyup(function(event) {
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
                    $('#contentProfessional').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.professionals.length <= 0 
                        ? $('#contentProfessional').html(notFound())
                        : $('#contentProfessional').html(getContent(response.professionals))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentProfessional').removeAttr('style');
                    $('#paginate').css({display: 'block'});
                },
            });
        }

    }, milliseconds, event);
});

const notFound = () =>
    `<tr>
        <td colspan="8" class="bg-light">
            <div class="d-flex justify-content-center align-items-center" 
                style="height: 80px; font-size: 16px;"
            >
                Nenhum resultado encontrado.
            </div>
        </td>
    </tr>`

const getContent = (professionals) => {
    return professionals.reduce((acumulator, professisonal, index) => {
        return acumulator + 
            `<tr>
                <td class="font-weight-bold">${index + 1}</td>
                <td>${professisonal.name}</td>
                <td>${professisonal.cpf}</td>
                <td>${professisonal.role}</td>
                <td>${professisonal.email}</td>
                <td>${professisonal.created_at}</td>
                <td>
                    <span class="${professisonal.status.color}">
                        ${professisonal.status.name}
                    </span>
                </td>
                <td>
                    <a href="${baseUrl}/panel/professionals/${professisonal.id}/edit" title="Editar dados do profissional"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <a href="${baseUrl}/panel/professionals/${professisonal.id}/reset-password" title="Resetar senha do profissional"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-account-key"></i>
                    </a>
                </td>
            </tr>`
    }, '')
}
