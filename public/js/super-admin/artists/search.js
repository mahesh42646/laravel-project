const baseUrl = document.querySelector('[data-base-url]').value;
const searchUrl = document.querySelector('[data-search-url]');
const token = document.querySelector('[name="_token"]');
const contentArtist = document.querySelector('#contentArtist');
const paginate = document.querySelector('#paginate');
const spinner = document.querySelector('#loader');
const milliseconds = 400;
let timer;

function searchArtist(element) {
    clearTimeout(timer);

    timer = setTimeout((name) => {
        loading(true);

        fetch(searchUrl.value, {
            'method': 'POST',
            'headers': {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token.value,
                'Accept': 'application/json'
            },
            'body': JSON.stringify({ name })
        })
        .then(response => response.json())
        .then((request) => {
            request.artists.length <= 0 
                ? contentArtist.innerHTML = notFound()
                : contentArtist.innerHTML = getContent(request.artists)

            loading(false);
        })
        .catch((error) => { console.log(error) });
    }, milliseconds, element.value);
}

const loading = (isTrue) => {
    if (isTrue) {
        contentArtist.classList.add('d-none');
        paginate.classList.add('d-none');
        spinner.classList.remove('d-none');
    } else {
        contentArtist.classList.remove('d-none');
        paginate.classList.remove('d-none');
        spinner.classList.add('d-none');
    }
}

const notFound = () => {
    return (
        `<tr>
            <td colspan="4" class="bg-light">
                <div class="d-flex justify-content-center align-items-center" 
                    style="height: 80px; font-size: 16px;"
                >
                    Nenhum resultado encontrado.
                </div>
            </td>
        </tr>`
    );
}

const getContent = (artists) => {
    return artists.reduce((accumulator, artist) =>
        accumulator + 
            `<tr>    
                <td>${artist.name}</td>
                <td>${artist.cpf}</td>
                <td>${artist.city}</td>
                <td>
                    <button type="button" title="Excluir artista" data-toggle="modal" 
                        data-route="${artist.route}" onclick="destroyArtist(this)"
                        data-name="${artist.name}" data-target="#deleteArtist" data-city="${artist.city}"
                        class="btn btn-sm rounded-lg text-white waves-effect bg-danger mb-2 p-0 mb-md-0"
                    >
                        <i class="mdi mdi-trash-can-outline font-size-17 p-1"></i>
                    </button>
                </td>
            </tr>`
    , '')
}

const formDestroy = document.querySelector('[data-form-destroy]');
const nameDestroy = document.querySelector('[data-name-destroy]');
const cityDestroy = document.querySelector('[data-city-destroy]');

function destroyArtist(element) {
    const payload = element.dataset;

    formDestroy.action = payload.route;
    nameDestroy.innerText = payload.name;
    cityDestroy.innerText = `CIDADE: ${payload.city}`;
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
