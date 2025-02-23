const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchCity').keyup(function(event) {
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
                    $('#contentCity').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.cities.length <= 0 
                        ? $('#contentCity').html(notFound())
                        : $('#contentCity').html(getContent(response.cities))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentCity').removeAttr('style');
                    $('#paginate').css({display: 'block'});
                },
            });
        }

    }, milliseconds, event);
});

const notFound = () =>
    `<tr>
        <td colspan="5" class="bg-light">
            <div class="d-flex justify-content-center align-items-center" 
                style="height: 80px; font-size: 16px;"
            >
                Nenhum resultado encontrado.
            </div>
        </td>
    </tr>`

const getContent = (cities) => {
    return cities.reduce((acumulator, city, index) => {
        return acumulator + 
            `<tr>
                <td class="font-weight-bold">${index + 1}</td>
                <td>${city.name}</td>
                <td>${city.uf}</td>
                <td>
                    <span class="${city.status.color}">
                        ${city.status.name}
                    </span>
                </td>
                <td>
                    <a href="${city.route.edit}" title="Editar dados da cidade"
                        class="btn bg-white text-primary border-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-lead-pencil"></i>
                    </a>
                    <a href="${city.route.show}" title="Ver dados da cidade"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-eye"></i>
                    </a>
                </td>
            </tr>`
    }, '')
}
