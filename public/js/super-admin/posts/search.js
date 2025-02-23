const searchUrl = $('[data-js="search-url"]').val();
let timer;

$('#searchPost').keyup(function(event) {
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
                    $('#contentPost').css({display: 'none'});
                    $('#paginate').css({display: 'none'});
                    $('#loader').removeAttr('style');
                },
                success: function (response) {
                    response.posts.length <= 0 
                        ? $('#contentPost').html(notFound())
                        : $('#contentPost').html(getContent(response.posts))
                },
                error: function (response) {
                    toastr.error(response.responseJSON.message);
                },
                complete: function () {
                    $('#loader').css({display: 'none'});
                    $('#contentPost').removeAttr('style');
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

const getContent = (posts) => {
    return posts.reduce((acumulator, post, index) => {
        return acumulator + 
            `<tr>
                <td>${index + 1}</td>
                <td>${post.title}</td>
                <td>${post.registered_at}</td>
                <td>${post.status}</td>
                <td>
                    <a href="${post.route.edit}" title="Editar dados da postagem"
                        class="btn bg-white text-primary border-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-lead-pencil"></i>
                    </a>
                    <a href="${post.route.show}" title="Ver dados da postagem"
                        class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                    >
                        <i class="mdi mdi-eye"></i>
                    </a>
                </td>
            </tr>`
    }, '')
}
