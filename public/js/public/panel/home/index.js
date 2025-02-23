const getEditalsUrl = document.querySelector('[data-get-editals-url]');
const previousPageEditalButton = document.querySelector('[data-previous-page-edital-button]');
const nextPageEditalButton = document.querySelector('[data-next-page-edital-button]');
const editalListContainer = document.querySelector('[data-edital-list-container]');
const initialUrl = `${getEditalsUrl.value}?page=1`;
const idsFromEditalsMyprojectsElement = document.querySelector('[data-ids-editals-my-projects]');
const idsFromEditalsMyprojects = JSON.parse(idsFromEditalsMyprojectsElement.value);

const loadPagesFromEdital = (url) => {
    showProgressIndicator();
    fetch(url)
        .then(response => response.json())
        .then(payload => {
            const edital = payload.edital;

            if (edital.is_first_page) {
                previousPageEditalButton.classList.add('d-none');
            } else {
                previousPageEditalButton.classList.remove('d-none');
                previousPageEditalButton.setAttribute('data-previous-page-url', edital.previous_page_url);
            }

            if (edital.is_last_page || !edital.has_more_pages) {
                nextPageEditalButton.classList.add('d-none');
            } else {
                nextPageEditalButton.classList.remove('d-none');
                nextPageEditalButton.setAttribute('data-next-page-url', edital.next_page_url);
            }
            
            renderPageEdital(edital);
        })
        .catch(error => {
            console.log(error);
        });
}

function getPreviousItems(payload) {
    if (payload.previousPageUrl !== undefined) {
        loadPagesFromEdital(payload.previousPageUrl);
    }
}

function getNextItems(payload) {
    if (payload.nextPageUrl !== undefined) {
        loadPagesFromEdital(payload.nextPageUrl);
    }
}

const renderPageEdital = (edital) => {
    editalListContainer.innerHTML = edital.items.reduce((accumulator, edital) => {
        return accumulator + (
            `<a href="${idsFromEditalsMyprojects.includes(edital.id) ? '#' : edital.url}" class="col-md-4 p-2 mb-3">
                <div class="d-flex flex-column bg-white p-2 h-100" style="border-radius: 20px; border: 1px solid #CCC">
                    <img src="${edital.banner_path}" class="w-100 mb-2" alt="imagem" style="border-radius: 10px; height: 100px;">
                    <div class="mb-2">
                        <span class="rounded-pill font-size-11 px-3 font-weight-medium  ${idsFromEditalsMyprojects.includes(edital.id) ? 'text-white bg-primary' : 'text-primary bg-light'}">
                            ${idsFromEditalsMyprojects.includes(edital.id) ? 'JÁ INSCRITO' : 'DISPONÍVEL'}
                        </span>
                    </div>
                    <h4>${edital.name}</h4>
                    <div class="progress mb-2" style="height: 7px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="${edital.tenant_path}" width="30px" height="30px" alt="logo">
                        </div>
                        <div class="ml-2">
                            <div class="text-dark font-weight-medium">${edital.tenant}</div>
                            <div class="text-secondary">${edital.city}</div>
                        </div>
                    </div>
                </div>
            </a>`
        );
    }, '');
}

const showProgressIndicator = () => {
    editalListContainer.innerHTML = (
        `<div class="w-100 bg-white shadow rounded-lg d-flex flex-column justify-content-center align-items-center" style="height: 250px;">
            <h2 class="text-dark font-weight-medium">Carregando...</h2>
            <spinner></spinner>
        </div>`
    );
}

loadPagesFromEdital(initialUrl);
