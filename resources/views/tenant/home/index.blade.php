<x-layout.panel>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    
    {{-- BLCOO DE BOAS VINDAS --}}
    <div class="d-md-flex h-100">
        <div class="col-md-8 pl-md-0 mb-4">
            <div class="h-100 p-4" style="background-color: #d5f4ea; border-radius: 10px;">
                <div class="d-md-flex">
                    <div class="col-md-8 h-100">
                        <h3 class="font-weight-bold mb-1" style="color: #003e44;">Bem vindo de volta 👋</h3>
                        <h3 class="font-weight-bold mb-1" style="color: #003e44;">{{ $user->name }}</h3>
                        <p>Deseja verificar os últimos projetos realizados na sua rede cultural?</p>
                        <a href="{{ route('projects.search.index') }}" class="btn text-white px-3" style="background-color: #00a76f">Ver projetos</a>
                    </div>
                    <div class="col-md-4 pr-0">
                        <img src="{{ asset('images/welcome.svg') }}" class="img-fluid" alt="bem vindo">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pr-md-0 mb-4">
            <img src="{{ asset('images/features.jpg') }}" class="img-fluid h-100" style="border-radius: 15px" alt="banner">
        </div>
    </div>
    
    {{-- BLOCO HORIZONTAL DE DADOS QUANTITATIVOS --}}
    <div class="d-md-flex">
        <div class="col-md-4 pl-0 mb-3">
            <div class="card shadow" style="border-radius: 15px !important;">
                <div class="d-flex align-items-center px-3 pt-3">
                    <div class="mr-2">
                        <img src="{{ asset('images/icons/agent.svg') }}" alt="atendimentos hoje">
                    </div>
                    <div>
                        <div class="font-size-14 text-dark">Agentes Culturais</div>
                        <div class="font-size-24 font-weight-medium text-dark">35</div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="d-flex align-items-center">
                    <div class="col-6 px-0">
                        <div class="d-flex align-items-center p-3">
                            <span class="mr-2">
                                <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M56.2501 13.125V28.125C56.2501 28.6223 56.0525 29.0992 55.7009 29.4508C55.3493 29.8025 54.8723 30 54.3751 30C53.8778 30 53.4009 29.8025 53.0492 29.4508C52.6976 29.0992 52.5001 28.6223 52.5001 28.125V17.6508L33.2016 36.9516C33.0275 37.1259 32.8207 37.2642 32.5931 37.3586C32.3655 37.4529 32.1215 37.5015 31.8751 37.5015C31.6287 37.5015 31.3847 37.4529 31.1571 37.3586C30.9294 37.2642 30.7226 37.1259 30.5485 36.9516L22.5001 28.9008L6.95163 44.4516C6.5998 44.8034 6.12262 45.001 5.62507 45.001C5.12751 45.001 4.65033 44.8034 4.2985 44.4516C3.94668 44.0997 3.74902 43.6226 3.74902 43.125C3.74902 42.6274 3.94668 42.1503 4.2985 41.7984L21.1735 24.9234C21.3476 24.7491 21.5544 24.6108 21.7821 24.5165C22.0097 24.4221 22.2537 24.3735 22.5001 24.3735C22.7465 24.3735 22.9905 24.4221 23.2181 24.5165C23.4457 24.6108 23.6525 24.7491 23.8266 24.9234L31.8751 32.9742L49.8493 15H39.3751C38.8778 15 38.4009 14.8025 38.0492 14.4508C37.6976 14.0992 37.5001 13.6223 37.5001 13.125C37.5001 12.6277 37.6976 12.1508 38.0492 11.7992C38.4009 11.4475 38.8778 11.25 39.3751 11.25H54.3751C54.8723 11.25 55.3493 11.4475 55.7009 11.7992C56.0525 12.1508 56.2501 12.6277 56.2501 13.125Z" fill="#15B79F"/>
                                </svg>
                            </span>
                            <span class="mr-2" style="color: #15B79F">421</span>
                            <span class="text-secondary">Ativos</span>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="d-flex align-items-center p-3">
                            <span class="mr-2">
                                <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M54 29.4649V42.3218C54 42.748 53.8307 43.1568 53.5293 43.4582C53.2279 43.7596 52.8191 43.9289 52.3929 43.9289H39.536C39.1098 43.9289 38.701 43.7596 38.3996 43.4582C38.0982 43.1568 37.9289 42.748 37.9289 42.3218C37.9289 41.8955 38.0982 41.4868 38.3996 41.1854C38.701 40.884 39.1098 40.7147 39.536 40.7147H48.5137L33.1076 25.3085L26.209 32.209C26.0598 32.3585 25.8825 32.477 25.6874 32.5579C25.4923 32.6388 25.2832 32.6804 25.072 32.6804C24.8608 32.6804 24.6517 32.6388 24.4566 32.5579C24.2615 32.477 24.0842 32.3585 23.935 32.209L9.47097 17.745C9.16941 17.4435 9 17.0345 9 16.608C9 16.1815 9.16941 15.7725 9.47097 15.471C9.77253 15.1694 10.1815 15 10.608 15C11.0345 15 11.4435 15.1694 11.745 15.471L25.072 28.7999L31.9705 21.8994C32.1198 21.75 32.297 21.6315 32.4921 21.5506C32.6872 21.4697 32.8964 21.4281 33.1076 21.4281C33.3188 21.4281 33.5279 21.4697 33.723 21.5506C33.9181 21.6315 34.0953 21.75 34.2446 21.8994L50.7858 38.4426V29.4649C50.7858 29.0387 50.9551 28.6299 51.2565 28.3285C51.5579 28.0271 51.9667 27.8578 52.3929 27.8578C52.8191 27.8578 53.2279 28.0271 53.5293 28.3285C53.8307 28.6299 54 29.0387 54 29.4649Z" fill="#F04438"/>
                                </svg>
                            </span>
                            <span class="mr-2" style="color: #F04438">04</span>
                            <span class="text-secondary">Inativos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow" style="border-radius: 15px !important;">
                <div class="d-flex align-items-center px-3 pt-3">
                    <div class="mr-2">
                        <img src="{{ asset('images/icons/project.svg') }}" alt="exames hoje">
                    </div>
                    <div>
                        <div class="font-size-14 text-dark">Projetos</div>
                        <div class="font-size-24 font-weight-medium text-dark">126</div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="d-flex align-items-center p-3">
                    <span class="mr-2">
                        <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M54 29.4649V42.3218C54 42.748 53.8307 43.1568 53.5293 43.4582C53.2279 43.7596 52.8191 43.9289 52.3929 43.9289H39.536C39.1098 43.9289 38.701 43.7596 38.3996 43.4582C38.0982 43.1568 37.9289 42.748 37.9289 42.3218C37.9289 41.8955 38.0982 41.4868 38.3996 41.1854C38.701 40.884 39.1098 40.7147 39.536 40.7147H48.5137L33.1076 25.3085L26.209 32.209C26.0598 32.3585 25.8825 32.477 25.6874 32.5579C25.4923 32.6388 25.2832 32.6804 25.072 32.6804C24.8608 32.6804 24.6517 32.6388 24.4566 32.5579C24.2615 32.477 24.0842 32.3585 23.935 32.209L9.47097 17.745C9.16941 17.4435 9 17.0345 9 16.608C9 16.1815 9.16941 15.7725 9.47097 15.471C9.77253 15.1694 10.1815 15 10.608 15C11.0345 15 11.4435 15.1694 11.745 15.471L25.072 28.7999L31.9705 21.8994C32.1198 21.75 32.297 21.6315 32.4921 21.5506C32.6872 21.4697 32.8964 21.4281 33.1076 21.4281C33.3188 21.4281 33.5279 21.4697 33.723 21.5506C33.9181 21.6315 34.0953 21.75 34.2446 21.8994L50.7858 38.4426V29.4649C50.7858 29.0387 50.9551 28.6299 51.2565 28.3285C51.5579 28.0271 51.9667 27.8578 52.3929 27.8578C52.8191 27.8578 53.2279 28.0271 53.5293 28.3285C53.8307 28.6299 54 29.0387 54 29.4649Z" fill="#FFF"/>
                        </svg>
                    </span>
                    <span class="mr-2"></span>
                    <span class="text-secondary"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 pr-md-0 mb-3">
            <div class="card shadow" style="border-radius: 15px !important;">
                <div class="d-flex align-items-center px-3 pt-3">
                    <div class="mr-2">
                        <img src="{{ asset('images/icons/check.svg') }}" alt="agendados">
                    </div>
                    <div>
                        <div class="font-size-14 text-dark">Editais</div>
                        <div class="font-size-24 font-weight-medium text-dark">09</div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="d-flex align-items-center">
                    <div class="col-6 px-0">
                        <div class="d-flex align-items-center p-3">
                            <span class="mr-2">
                                <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M56.2501 13.125V28.125C56.2501 28.6223 56.0525 29.0992 55.7009 29.4508C55.3493 29.8025 54.8723 30 54.3751 30C53.8778 30 53.4009 29.8025 53.0492 29.4508C52.6976 29.0992 52.5001 28.6223 52.5001 28.125V17.6508L33.2016 36.9516C33.0275 37.1259 32.8207 37.2642 32.5931 37.3586C32.3655 37.4529 32.1215 37.5015 31.8751 37.5015C31.6287 37.5015 31.3847 37.4529 31.1571 37.3586C30.9294 37.2642 30.7226 37.1259 30.5485 36.9516L22.5001 28.9008L6.95163 44.4516C6.5998 44.8034 6.12262 45.001 5.62507 45.001C5.12751 45.001 4.65033 44.8034 4.2985 44.4516C3.94668 44.0997 3.74902 43.6226 3.74902 43.125C3.74902 42.6274 3.94668 42.1503 4.2985 41.7984L21.1735 24.9234C21.3476 24.7491 21.5544 24.6108 21.7821 24.5165C22.0097 24.4221 22.2537 24.3735 22.5001 24.3735C22.7465 24.3735 22.9905 24.4221 23.2181 24.5165C23.4457 24.6108 23.6525 24.7491 23.8266 24.9234L31.8751 32.9742L49.8493 15H39.3751C38.8778 15 38.4009 14.8025 38.0492 14.4508C37.6976 14.0992 37.5001 13.6223 37.5001 13.125C37.5001 12.6277 37.6976 12.1508 38.0492 11.7992C38.4009 11.4475 38.8778 11.25 39.3751 11.25H54.3751C54.8723 11.25 55.3493 11.4475 55.7009 11.7992C56.0525 12.1508 56.2501 12.6277 56.2501 13.125Z" fill="#15B79F"/>
                                </svg>
                            </span>
                            <span class="mr-2" style="color: #15B79F">04</span>
                            <span class="text-secondary">Ativos</span>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="d-flex align-items-center p-3">
                            <span class="mr-2">
                                <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M54 29.4649V42.3218C54 42.748 53.8307 43.1568 53.5293 43.4582C53.2279 43.7596 52.8191 43.9289 52.3929 43.9289H39.536C39.1098 43.9289 38.701 43.7596 38.3996 43.4582C38.0982 43.1568 37.9289 42.748 37.9289 42.3218C37.9289 41.8955 38.0982 41.4868 38.3996 41.1854C38.701 40.884 39.1098 40.7147 39.536 40.7147H48.5137L33.1076 25.3085L26.209 32.209C26.0598 32.3585 25.8825 32.477 25.6874 32.5579C25.4923 32.6388 25.2832 32.6804 25.072 32.6804C24.8608 32.6804 24.6517 32.6388 24.4566 32.5579C24.2615 32.477 24.0842 32.3585 23.935 32.209L9.47097 17.745C9.16941 17.4435 9 17.0345 9 16.608C9 16.1815 9.16941 15.7725 9.47097 15.471C9.77253 15.1694 10.1815 15 10.608 15C11.0345 15 11.4435 15.1694 11.745 15.471L25.072 28.7999L31.9705 21.8994C32.1198 21.75 32.297 21.6315 32.4921 21.5506C32.6872 21.4697 32.8964 21.4281 33.1076 21.4281C33.3188 21.4281 33.5279 21.4697 33.723 21.5506C33.9181 21.6315 34.0953 21.75 34.2446 21.8994L50.7858 38.4426V29.4649C50.7858 29.0387 50.9551 28.6299 51.2565 28.3285C51.5579 28.0271 51.9667 27.8578 52.3929 27.8578C52.8191 27.8578 53.2279 28.0271 53.5293 28.3285C53.8307 28.6299 54 29.0387 54 29.4649Z" fill="#F04438"/>
                                </svg>
                            </span>
                            <span class="mr-2" style="color: #F04438">00</span>
                            <span class="text-secondary">Inativos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- BLOCO DE GRAFICOS DE ATENDIMENTOS E RESUMO GERAL --}}
    <div class="d-md-flex">
        <div class="col-md-8 pl-md-0 mb-3">
            <div class="card shadow mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <img src="{{ asset('images/icons/up.svg') }}" width="60px" alt="grafico atendimentos">
                        <span class="text-dark font-size-15 font-weight-medium">Gráfico</span>
                    </div>
                    <div class="font-size-18">...</div>
                </div>
                <div class="d-md-flex">
                    <div class="col-md-3 d-flex flex-column align-items-center justify-content-center px-md-0 mb-3">
                        <div style="color: #15B79F; font-size: 40px;">+28%</div>
                        <div class="text-secondary text-center">Gerando texto...</div>
                    </div>
                    <div class="col-md-9 mb-3">
                        <canvas id="chartAttendance"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pr-md-0">
            <div class="card shadow mb-3 p-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/icons/follow.svg') }}" width="60px" alt="geral">
                    <span class="font-size-16 font-weight-medium ml-1 text-dark">Geral</span>
                </div>
    
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="px-3">
                            <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M48.75 7.5H43.125V5.625C43.125 5.12772 42.9275 4.65081 42.5758 4.29917C42.2242 3.94754 41.7473 3.75 41.25 3.75C40.7527 3.75 40.2758 3.94754 39.9242 4.29917C39.5725 4.65081 39.375 5.12772 39.375 5.625V7.5H20.625V5.625C20.625 5.12772 20.4275 4.65081 20.0758 4.29917C19.7242 3.94754 19.2473 3.75 18.75 3.75C18.2527 3.75 17.7758 3.94754 17.4242 4.29917C17.0725 4.65081 16.875 5.12772 16.875 5.625V7.5H11.25C10.2554 7.5 9.30161 7.89509 8.59835 8.59835C7.89509 9.30161 7.5 10.2554 7.5 11.25V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V11.25C52.5 10.2554 52.1049 9.30161 51.4016 8.59835C50.6984 7.89509 49.7446 7.5 48.75 7.5ZM16.875 11.25V13.125C16.875 13.6223 17.0725 14.0992 17.4242 14.4508C17.7758 14.8025 18.2527 15 18.75 15C19.2473 15 19.7242 14.8025 20.0758 14.4508C20.4275 14.0992 20.625 13.6223 20.625 13.125V11.25H39.375V13.125C39.375 13.6223 39.5725 14.0992 39.9242 14.4508C40.2758 14.8025 40.7527 15 41.25 15C41.7473 15 42.2242 14.8025 42.5758 14.4508C42.9275 14.0992 43.125 13.6223 43.125 13.125V11.25H48.75V18.75H11.25V11.25H16.875ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-secondary">Projetos pendentes</div>
                            <div class="text-dark font-weight-medium font-size-16">19896</div>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#989eac" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                    </div>
                </div>
    
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="px-3">
                            <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M48.75 7.5H43.125V5.625C43.125 5.12772 42.9275 4.65081 42.5758 4.29917C42.2242 3.94754 41.7473 3.75 41.25 3.75C40.7527 3.75 40.2758 3.94754 39.9242 4.29917C39.5725 4.65081 39.375 5.12772 39.375 5.625V7.5H20.625V5.625C20.625 5.12772 20.4275 4.65081 20.0758 4.29917C19.7242 3.94754 19.2473 3.75 18.75 3.75C18.2527 3.75 17.7758 3.94754 17.4242 4.29917C17.0725 4.65081 16.875 5.12772 16.875 5.625V7.5H11.25C10.2554 7.5 9.30161 7.89509 8.59835 8.59835C7.89509 9.30161 7.5 10.2554 7.5 11.25V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V11.25C52.5 10.2554 52.1049 9.30161 51.4016 8.59835C50.6984 7.89509 49.7446 7.5 48.75 7.5ZM16.875 11.25V13.125C16.875 13.6223 17.0725 14.0992 17.4242 14.4508C17.7758 14.8025 18.2527 15 18.75 15C19.2473 15 19.7242 14.8025 20.0758 14.4508C20.4275 14.0992 20.625 13.6223 20.625 13.125V11.25H39.375V13.125C39.375 13.6223 39.5725 14.0992 39.9242 14.4508C40.2758 14.8025 40.7527 15 41.25 15C41.7473 15 42.2242 14.8025 42.5758 14.4508C42.9275 14.0992 43.125 13.6223 43.125 13.125V11.25H48.75V18.75H11.25V11.25H16.875ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-secondary">Projetos aprovados</div>
                            <div class="text-dark font-weight-medium font-size-16">82732</div>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#989eac" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                    </div>
                </div>
    
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="px-3">
                            <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M48.75 7.5H43.125V5.625C43.125 5.12772 42.9275 4.65081 42.5758 4.29917C42.2242 3.94754 41.7473 3.75 41.25 3.75C40.7527 3.75 40.2758 3.94754 39.9242 4.29917C39.5725 4.65081 39.375 5.12772 39.375 5.625V7.5H20.625V5.625C20.625 5.12772 20.4275 4.65081 20.0758 4.29917C19.7242 3.94754 19.2473 3.75 18.75 3.75C18.2527 3.75 17.7758 3.94754 17.4242 4.29917C17.0725 4.65081 16.875 5.12772 16.875 5.625V7.5H11.25C10.2554 7.5 9.30161 7.89509 8.59835 8.59835C7.89509 9.30161 7.5 10.2554 7.5 11.25V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V11.25C52.5 10.2554 52.1049 9.30161 51.4016 8.59835C50.6984 7.89509 49.7446 7.5 48.75 7.5ZM16.875 11.25V13.125C16.875 13.6223 17.0725 14.0992 17.4242 14.4508C17.7758 14.8025 18.2527 15 18.75 15C19.2473 15 19.7242 14.8025 20.0758 14.4508C20.4275 14.0992 20.625 13.6223 20.625 13.125V11.25H39.375V13.125C39.375 13.6223 39.5725 14.0992 39.9242 14.4508C40.2758 14.8025 40.7527 15 41.25 15C41.7473 15 42.2242 14.8025 42.5758 14.4508C42.9275 14.0992 43.125 13.6223 43.125 13.125V11.25H48.75V18.75H11.25V11.25H16.875ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-secondary">Projetos classificados</div>
                            <div class="text-dark font-weight-medium font-size-16">87</div>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#989eac" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="px-3">
                            <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M48.75 7.5H43.125V5.625C43.125 5.12772 42.9275 4.65081 42.5758 4.29917C42.2242 3.94754 41.7473 3.75 41.25 3.75C40.7527 3.75 40.2758 3.94754 39.9242 4.29917C39.5725 4.65081 39.375 5.12772 39.375 5.625V7.5H20.625V5.625C20.625 5.12772 20.4275 4.65081 20.0758 4.29917C19.7242 3.94754 19.2473 3.75 18.75 3.75C18.2527 3.75 17.7758 3.94754 17.4242 4.29917C17.0725 4.65081 16.875 5.12772 16.875 5.625V7.5H11.25C10.2554 7.5 9.30161 7.89509 8.59835 8.59835C7.89509 9.30161 7.5 10.2554 7.5 11.25V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V11.25C52.5 10.2554 52.1049 9.30161 51.4016 8.59835C50.6984 7.89509 49.7446 7.5 48.75 7.5ZM16.875 11.25V13.125C16.875 13.6223 17.0725 14.0992 17.4242 14.4508C17.7758 14.8025 18.2527 15 18.75 15C19.2473 15 19.7242 14.8025 20.0758 14.4508C20.4275 14.0992 20.625 13.6223 20.625 13.125V11.25H39.375V13.125C39.375 13.6223 39.5725 14.0992 39.9242 14.4508C40.2758 14.8025 40.7527 15 41.25 15C41.7473 15 42.2242 14.8025 42.5758 14.4508C42.9275 14.0992 43.125 13.6223 43.125 13.125V11.25H48.75V18.75H11.25V11.25H16.875ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-secondary">Projetos reprovados</div>
                            <div class="text-dark font-weight-medium font-size-16">87</div>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#989eac" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                    </div>
                </div>
                <hr>
                <a href="{{ route('projects.search.index') }}" class="text-primary">
                    <span class="mr-1">Ver mais detalhes</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="m547.69-267.69-28.31-28.77L682.92-460H200v-40h482.92L519.38-663.54l28.31-28.77L760-480 547.69-267.69Z"/>
                    </svg>
                </a>

            </div>
        </div>
    </div>
    
    <x-slot:scripts>
        <script src="{{ asset('js/libs/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('js/tenant/home/script.js') }}"></script>
    </x-slot:scripts>

    {{-- <style>
        #scrollbar::-webkit-scrollbar {
            width: 5px;
        }
    
        #scrollbar::-webkit-scrollbar-track {
            background: #FFF;
        }
    
        #scrollbar::-webkit-scrollbar-thumb {
            background-color: #929EAC;
            border-radius: 25px;    
        }
    </style>
    
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="text-dark font-size-18 mb-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-weight-medium text-dark active">Bem-vindo ao <span class="font-weight-bold text-primary">{{ config('app.name') }}</span> Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    {!! $notifications !!}   
    
    <div class="row mb-3">
        <div class="col-xl-4 h-auto">
            <div class="card shadow overflow-hidden h-100">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Bem vindo de volta !</h5>
                                <p style="line-height: 1;">{{ session('tenant_name') }}</p>
                            </div>
                        </div>
                        <div class="col-4 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.webp') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate text-dark font-weight-semibold mb-0">{{ $user->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $user->role_id?->getName() }}</p>
                            <p class="text-muted mb-0 text-truncate">Último acesso em: {{ $user->last_login_at?->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-xl-8 h-auto">
            <div class="row h-100">
                <div class="card w-100 rounded-lg mb-0">
                    <div class="card-body pt-2 shadow">
                        <h3 class="font-weight-semibold text-dark mb-3" style="font-size: 15px;">Visão Geral</h3>
    
                        <div class="d-md-flex">
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3" >
                                <div class="rounded-lg p-3" style="background-color: #E9ECEE">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/user.svg') }}" alt="usuario">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Usuários</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Pessoas Físicas: {{ $customers->pf }}</div>
                                    <div class="font-weight-medium mb-4" style="font-size: 11px; color: #101010;">Pessoas Jurídicas: {{ $customers->pj }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3" >
                                <div class="rounded-lg p-3" style="background-color: #FEF5E5">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/ticket.svg') }}" alt="ticket">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Editais</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Ativos: {{ $editals->active }}</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Inativos: {{ $editals->inactive }}</div>
                                    <div class="font-weight-medium mb-2" style="font-size: 11px; color: #101010;">Finalizados: {{ $editals->finished }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3" >
                                <div class="rounded-lg p-3" style="background-color: #CBC5F2">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/trophy.svg') }}" alt="trofeu">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Projetos</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Finalizados: {{ $projects->finished }}</div>
                                    <div class="font-weight-medium mb-0" style="font-size: 11px; color: #101010;">Classificados: {{ $projects->classified }}</div>
                                    <div class="font-weight-medium mb-2" style="font-size: 11px; color: #101010;">Reprovados: {{ $projects->repproved }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-0 pr-md-2 mb-3">
                                <div class="rounded-lg p-3 h-100" style="background-color: #DCFCE7">
                                    <div class="text-white d-flex justify-content-center align-items-center rounded-circle mb-4 mt-1" 
                                        style="width: 30px; height: 30px;"
                                    >
                                        <img src="{{ asset('assets/images/money.svg') }}" alt="trofeu">
                                    </div>
                                    <div class="font-weight-bold mb-1" style="font-size: 15px; color: #101010;">Financeiro</div>
                                    <div class="font-weight-medium" style="font-size: 11px; color: #101010;">Aprovados: {{ 100 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">

        <div class="col-xl-4">
            <div>
                <img src="{{ asset('assets/images/banner.webp') }}" class="rounded-lg" width="100%" height="140px" alt="banner">
            </div>
        </div>

        <div class="col-xl-8">
            @if (count($lastProjects) > 0)
                <div class="card rounded-lg">
                    <div class="card-body shadow p-3">
                        <h4 class="card-title text-dark mb-3">Últimos 5 projetos cadastrados</h4>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-centered table-nowrap table-bordered text-dark nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th></th>
                                        <th>Usuário</th>
                                        <th>Projeto</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastProjects as $project)
                                        <tr>
                                            <td class="font-weight-bold">{{ $loop->iteration }}</td>
                                            <td>{{ $project->customer_name }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                <span style="{{ $project->status->background_color }}">
                                                    {{ $project->status->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('projects.edit', $project->id) }}" title="Ver dados do projeto"
                                                    class="btn btn-primary btn-sm rounded-lg waves-effect mb-2 mb-md-0"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div> --}}
    
</x-layout.panel>
