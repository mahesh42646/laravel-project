const route = document.querySelector('[data-url-search]');
const token = document.querySelector('[data-csrf]');
const contentProfessional = document.querySelector('#contentProfessional');
const milliseconds = 350;
let timer;

function search(element) {
    clearTimeout(timer);

    timer = setTimeout((name) => {
        loading(true);

        fetch(route.value, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
                'X-CSRF-Token': token.value,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name }),
        })
        .then(response => response.json())
        .then((payload) => {
            payload.professionals.length <= 0
                ? contentProfessional.innerHTML = notFound()
                : contentProfessional.innerHTML = getContent(payload.professionals);
            loading(false);
        })
        .catch((error) => { console.error(error) });
    }, milliseconds, element.value);
}

const notFound = () => {
    return (
        `<tr>
            <td colspan="7" class="bg-light">
            <div class="d-flex flex-column justify-content-center align-items-center font-size-16 p-3" style="height: 150px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#74788d">
                    <path d="M480-100q-78.77 0-148.11-29.96-69.35-29.96-120.66-81.27-51.31-51.31-81.27-120.66Q100-401.23 100-480q0-78.77 29.96-148.11 29.96-69.35 81.27-120.66 51.31-51.31 120.66-81.27Q401.23-860 480-860q142.92 0 248.38 91.89 105.47 91.88 126.31 228.73h-61.23q-14.77-79.93-65.61-143.2Q677-745.85 600-776.77V-760q0 33-23.5 56.5T520-680h-80v80q0 17-11.5 28.5T400-560h-80v80h76.92v120H360L168-552q-3 18-5.5 36t-2.5 36q0 131 92 225t228 95v60Zm362.46-15.39-133-132.23q-19.46 12.39-41.92 20Q645.08-220 620-220q-66.92 0-113.46-46.54Q460-313.08 460-380q0-66.92 46.54-113.46Q553.08-540 620-540q66.92 0 113.46 46.54Q780-446.92 780-380q0 25.46-7.81 48.12-7.81 22.65-20.58 42.11l133 132.23-42.15 42.15ZM620-280q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Z"/>
                </svg>
                <span class="mt-2">Nenhum resultado encontrado</span>
            </div>
        </tr>`
    );
}

function loadModalResetPassword(payload) {
    const formResetPassword = document.querySelector('[data-form-reset-password]');
    const name = document.querySelector('[data-reset-password-name]');
    const email = document.querySelector('[data-reset-password-email]');
    const newPassword = document.querySelector('[data-reset-new-password]');

    formResetPassword.action = payload.routeResetPassword;
    name.value = payload.name;
    email.value = payload.email;
    newPassword.value = payload.newPassword;
}

const loading = (isTrue) => {
    if (isTrue) {
        contentProfessional.classList.add('d-none');
        paginate.classList.add('d-none');
        loader.classList.remove('d-none');
    } else {
        loader.classList.add('d-none');
        contentProfessional.classList.remove('d-none');
        paginate.classList.remove('d-none');
    }
}

const getContent = (professionals) => {
    return professionals.reduce((accumulator, professisonal) =>
        accumulator + 
            `<tr class="text-dark">
            <td class="pl-4 py-2">
                <div class="d-flex align-items-center">
                    <span class="mr-3">
                        <img src="${professisonal.avatar}" class="rounded-circle" width="30px" height="30px" alt="foto de perfil">
                    </span>
                    <div class="d-flex flex-column">
                        <span class="font-weight-semibold">${professisonal.name}</span>
                        ${professisonal.nickname &&
                            `<span class="text-secondary">${professisonal.nickname}</span>`
                        }
                    </div>
                </div>
            </td>
            <td class="text-secondary">${professisonal.role}</td>
            <td class="text-secondary">
                <a href="${professisonal.route.binding}" class="font-weight-medium px-2 waves-effect rounded-lg text-dark" style="background-color: #b3b9c6; padding: 3px;">
                    Visualizar
                </a>
            </td>
            <td>${professisonal.phone}</td>
            <td>${professisonal.created_at}</td>
            <td>${professisonal.is_active}</td>
            <td>
                <a href="${professisonal.route.edit}" title="Editar" class="btn btn-sm btn-rounded waves-effect mb-2 mb-md-0">
                    <svg width="22" height="22" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M88.793 28.6592L71.3399 11.2022C70.7595 10.6217 70.0704 10.1612 69.312 9.84698C68.5537 9.5328 67.7408 9.37109 66.9199 9.37109C66.0991 9.37109 65.2862 9.5328 64.5278 9.84698C63.7695 10.1612 63.0804 10.6217 62.5 11.2022L14.3321 59.3741C13.7492 59.9523 13.287 60.6407 12.9725 61.3991C12.658 62.1576 12.4974 62.971 12.5 63.792V81.2491C12.5 82.9067 13.1585 84.4964 14.3306 85.6685C15.5027 86.8406 17.0924 87.4991 18.75 87.4991H36.2071C37.0281 87.5017 37.8415 87.3411 38.6 87.0266C39.3584 86.7121 40.0468 86.2499 40.625 85.667L88.793 37.4991C89.3735 36.9187 89.834 36.2296 90.1482 35.4712C90.4624 34.7129 90.6241 33.9 90.6241 33.0791C90.6241 32.2583 90.4624 31.4454 90.1482 30.687C89.834 29.9287 89.3735 29.2396 88.793 28.6592ZM36.2071 81.2491H18.75V63.792L53.125 29.417L70.5821 46.8741L36.2071 81.2491ZM75 42.4522L57.543 24.9991L66.918 15.6241L84.375 33.0772L75 42.4522Z" fill="#667085"/>
                    </svg>
                </a>
            
                <div class="btn-group dropleft px-1">
                    <button type="button" class="btn btn-sm p-0 waves-effect dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" title="Mais opções"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="35" viewBox="0 0 24 24">
                            <path fill="#667085" d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"/>
                            <path fill="#667085" d="M13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8Z"/>
                            <path fill="#667085" d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <li class="dropdown-item">
                            <button type="button" class="btn btn-sm rounded-lg waves-effect mb-2 px-0 mb-md-0"
                                data-name="${professisonal.name}" data-email="${professisonal.email}"
                                data-route-reset-password="${professisonal.route.update}"
                                data-new-password="${professisonal.generate_passwrod}"
                                data-toggle="modal" data-target="#resetPassword" onclick="loadModalResetPassword(this.dataset)"
                            >
                                <svg width="19" height="19" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 26.25C28.4241 26.2505 26.9009 26.8182 25.709 27.8491C24.5171 28.8801 23.736 30.3056 23.5085 31.865C23.2809 33.4245 23.6222 35.0137 24.4698 36.3423C25.3175 37.6708 26.6149 38.65 28.125 39.1008V43.125C28.125 43.6223 28.3225 44.0992 28.6742 44.4508C29.0258 44.8025 29.5027 45 30 45C30.4973 45 30.9742 44.8025 31.3258 44.4508C31.6775 44.0992 31.875 43.6223 31.875 43.125V39.1008C33.3851 38.65 34.6825 37.6708 35.5302 36.3423C36.3778 35.0137 36.7191 33.4245 36.4915 31.865C36.264 30.3056 35.4829 28.8801 34.291 27.8491C33.0991 26.8182 31.5759 26.2505 30 26.25ZM30 35.625C29.4437 35.625 28.9 35.46 28.4375 35.151C27.9749 34.842 27.6145 34.4027 27.4016 33.8888C27.1887 33.3749 27.133 32.8094 27.2415 32.2638C27.3501 31.7182 27.6179 31.2171 28.0113 30.8238C28.4046 30.4304 28.9057 30.1626 29.4513 30.054C29.9969 29.9455 30.5624 30.0012 31.0763 30.2141C31.5902 30.427 32.0295 30.7874 32.3385 31.25C32.6475 31.7125 32.8125 32.2562 32.8125 32.8125C32.8125 33.5584 32.5162 34.2738 31.9887 34.8012C31.4613 35.3287 30.7459 35.625 30 35.625ZM48.75 18.75H41.25V13.125C41.25 10.1413 40.0647 7.27983 37.955 5.17005C35.8452 3.06026 32.9837 1.875 30 1.875C27.0163 1.875 24.1548 3.06026 22.045 5.17005C19.9353 7.27983 18.75 10.1413 18.75 13.125V18.75H11.25C10.2554 18.75 9.30161 19.1451 8.59835 19.8484C7.89509 20.5516 7.5 21.5054 7.5 22.5V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V22.5C52.5 21.5054 52.1049 20.5516 51.4016 19.8484C50.6984 19.1451 49.7446 18.75 48.75 18.75ZM22.5 13.125C22.5 11.1359 23.2902 9.22822 24.6967 7.8217C26.1032 6.41518 28.0109 5.625 30 5.625C31.9891 5.625 33.8968 6.41518 35.3033 7.8217C36.7098 9.22822 37.5 11.1359 37.5 13.125V18.75H22.5V13.125ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                                </svg>
                                <span class="ml-2 font-size-13">Redefinir senha</span>
                            </button>
                        </li>
                    </div>
                </div>
                
            </td>
        </tr>`
    , '')
}
