@php $userCurrent = auth()->user() @endphp
<div class="topnav border-bottom">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-dark nav-link pr-1" href="{{ route('panel') }}" title="Painel de Controle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M224,120v96a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V164a4,4,0,0,0-4-4H108a4,4,0,0,0-4,4v52a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a16,16,0,0,1,4.69-11.31l80-80a16,16,0,0,1,22.62,0l80,80A16,16,0,0,1,224,120Z"></path>
                            </svg>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    @if ($userCurrent->role_id->value == '1' || $userCurrent->role_id->value == '99')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('customers.index') }}">
                                <svg width="19" height="19" viewBox="0 0 60 60" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.3749 13.125C39.3749 12.6277 39.5724 12.1508 39.924 11.7992C40.2757 11.4476 40.7526 11.25 41.2499 11.25H44.9999V7.50003C44.9999 7.00275 45.1974 6.52583 45.549 6.1742C45.9007 5.82257 46.3776 5.62503 46.8749 5.62503C47.3722 5.62503 47.8491 5.82257 48.2007 6.1742C48.5523 6.52583 48.7499 7.00275 48.7499 7.50003V11.25H52.4999C52.9972 11.25 53.4741 11.4476 53.8257 11.7992C54.1773 12.1508 54.3749 12.6277 54.3749 13.125C54.3749 13.6223 54.1773 14.0992 53.8257 14.4509C53.4741 14.8025 52.9972 15 52.4999 15H48.7499V18.75C48.7499 19.2473 48.5523 19.7242 48.2007 20.0759C47.8491 20.4275 47.3722 20.625 46.8749 20.625C46.3776 20.625 45.9007 20.4275 45.549 20.0759C45.1974 19.7242 44.9999 19.2473 44.9999 18.75V15H41.2499C40.7526 15 40.2757 14.8025 39.924 14.4509C39.5724 14.0992 39.3749 13.6223 39.3749 13.125ZM54.0374 25.9407C54.894 31.0326 54.1102 36.265 51.7992 40.8824C49.4881 45.4999 45.7694 49.2634 41.18 51.6296C36.5906 53.9958 31.368 54.8422 26.2661 54.0467C21.1643 53.2512 16.4473 50.8549 12.7962 47.2037C9.14503 43.5526 6.7487 38.8356 5.95318 33.7338C5.15766 28.6319 6.00411 23.4093 8.37031 18.8199C10.7365 14.2305 14.5 10.5118 19.1175 8.20075C23.7349 5.88972 28.9673 5.10592 34.0593 5.96253C34.546 6.0486 34.979 6.32338 35.2642 6.72708C35.5494 7.13079 35.6636 7.63077 35.582 8.11827C35.5005 8.60576 35.2297 9.04133 34.8287 9.33024C34.4276 9.61914 33.9287 9.738 33.4405 9.66096C30.483 9.16345 27.4526 9.31637 24.5602 10.1091C21.6678 10.9018 18.9829 12.3153 16.6923 14.2512C14.4018 16.1871 12.5606 18.5988 11.2968 21.3186C10.0331 24.0385 9.37725 27.001 9.37488 30C9.37043 35.0489 11.2261 39.9225 14.5874 43.6899C16.6785 40.6596 19.619 38.3152 23.0389 36.9516C21.2019 35.5047 19.8614 33.5212 19.2038 31.2771C18.5462 29.033 18.6043 26.6398 19.37 24.4302C20.1357 22.2207 21.5709 20.3046 23.476 18.9485C25.3811 17.5924 27.6614 16.8637 29.9999 16.8637C32.3383 16.8637 34.6187 17.5924 36.5238 18.9485C38.4289 20.3046 39.8641 22.2207 40.6297 24.4302C41.3954 26.6398 41.4535 29.033 40.796 31.2771C40.1384 33.5212 38.7979 35.5047 36.9608 36.9516C40.3808 38.3152 43.3212 40.6596 45.4124 43.6899C48.7737 39.9225 50.6293 35.0489 50.6249 30C50.625 28.8472 50.5293 27.6964 50.3389 26.5594C50.2958 26.3155 50.3014 26.0655 50.3555 25.8237C50.4095 25.582 50.5109 25.3534 50.6538 25.1511C50.7967 24.9488 50.9783 24.7768 51.1881 24.6451C51.3978 24.5133 51.6316 24.4245 51.8759 24.3836C52.1202 24.3427 52.3702 24.3507 52.6114 24.4069C52.8526 24.4632 53.0803 24.5667 53.2812 24.7115C53.4822 24.8563 53.6525 25.0395 53.7823 25.2504C53.9121 25.4614 53.9988 25.696 54.0374 25.9407ZM29.9999 35.625C31.4832 35.625 32.9333 35.1852 34.1667 34.361C35.4 33.5369 36.3613 32.3656 36.929 30.9951C37.4966 29.6247 37.6452 28.1167 37.3558 26.6618C37.0664 25.207 36.3521 23.8706 35.3032 22.8217C34.2543 21.7728 32.9179 21.0585 31.4631 20.7691C30.0082 20.4797 28.5002 20.6283 27.1298 21.1959C25.7593 21.7636 24.588 22.7249 23.7639 23.9582C22.9397 25.1916 22.4999 26.6417 22.4999 28.125C22.4999 30.1141 23.2901 32.0218 24.6966 33.4283C26.1031 34.8348 28.0108 35.625 29.9999 35.625ZM29.9999 50.625C34.5781 50.6296 39.0264 49.1034 42.6374 46.2891C41.281 44.1677 39.4124 42.4219 37.2038 41.2127C34.9953 40.0034 32.5178 39.3695 29.9999 39.3695C27.4819 39.3695 25.0045 40.0034 22.7959 41.2127C20.5874 42.4219 18.7188 44.1677 17.3624 46.2891C20.9734 49.1034 25.4217 50.6296 29.9999 50.625Z" fill="currentColor"/>
                                </svg>
                                <span class="ml-2">Agentes culturais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('editals.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M208,72V184a8,8,0,0,1-8,8H176V104L136,64H80V40a8,8,0,0,1,8-8h80Z" opacity="0.2"></path>
                                    <path d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z"></path>
                                </svg>
                                <span class="ml-2">Editais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('projects.search.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-38.34-85.66a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35A8,8,0,0,1,169.66,122.34Z"></path>
                                </svg>
                                <span class="ml-2">Projetos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('professionals.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"></path>
                                </svg>
                                <span class="ml-2">Profissionais</span>
                            </a>
                        </li>
                        
                    @elseif ($userCurrent->role_id->value == '2')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('customers.index') }}">
                                <svg width="19" height="19" viewBox="0 0 60 60" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.3749 13.125C39.3749 12.6277 39.5724 12.1508 39.924 11.7992C40.2757 11.4476 40.7526 11.25 41.2499 11.25H44.9999V7.50003C44.9999 7.00275 45.1974 6.52583 45.549 6.1742C45.9007 5.82257 46.3776 5.62503 46.8749 5.62503C47.3722 5.62503 47.8491 5.82257 48.2007 6.1742C48.5523 6.52583 48.7499 7.00275 48.7499 7.50003V11.25H52.4999C52.9972 11.25 53.4741 11.4476 53.8257 11.7992C54.1773 12.1508 54.3749 12.6277 54.3749 13.125C54.3749 13.6223 54.1773 14.0992 53.8257 14.4509C53.4741 14.8025 52.9972 15 52.4999 15H48.7499V18.75C48.7499 19.2473 48.5523 19.7242 48.2007 20.0759C47.8491 20.4275 47.3722 20.625 46.8749 20.625C46.3776 20.625 45.9007 20.4275 45.549 20.0759C45.1974 19.7242 44.9999 19.2473 44.9999 18.75V15H41.2499C40.7526 15 40.2757 14.8025 39.924 14.4509C39.5724 14.0992 39.3749 13.6223 39.3749 13.125ZM54.0374 25.9407C54.894 31.0326 54.1102 36.265 51.7992 40.8824C49.4881 45.4999 45.7694 49.2634 41.18 51.6296C36.5906 53.9958 31.368 54.8422 26.2661 54.0467C21.1643 53.2512 16.4473 50.8549 12.7962 47.2037C9.14503 43.5526 6.7487 38.8356 5.95318 33.7338C5.15766 28.6319 6.00411 23.4093 8.37031 18.8199C10.7365 14.2305 14.5 10.5118 19.1175 8.20075C23.7349 5.88972 28.9673 5.10592 34.0593 5.96253C34.546 6.0486 34.979 6.32338 35.2642 6.72708C35.5494 7.13079 35.6636 7.63077 35.582 8.11827C35.5005 8.60576 35.2297 9.04133 34.8287 9.33024C34.4276 9.61914 33.9287 9.738 33.4405 9.66096C30.483 9.16345 27.4526 9.31637 24.5602 10.1091C21.6678 10.9018 18.9829 12.3153 16.6923 14.2512C14.4018 16.1871 12.5606 18.5988 11.2968 21.3186C10.0331 24.0385 9.37725 27.001 9.37488 30C9.37043 35.0489 11.2261 39.9225 14.5874 43.6899C16.6785 40.6596 19.619 38.3152 23.0389 36.9516C21.2019 35.5047 19.8614 33.5212 19.2038 31.2771C18.5462 29.033 18.6043 26.6398 19.37 24.4302C20.1357 22.2207 21.5709 20.3046 23.476 18.9485C25.3811 17.5924 27.6614 16.8637 29.9999 16.8637C32.3383 16.8637 34.6187 17.5924 36.5238 18.9485C38.4289 20.3046 39.8641 22.2207 40.6297 24.4302C41.3954 26.6398 41.4535 29.033 40.796 31.2771C40.1384 33.5212 38.7979 35.5047 36.9608 36.9516C40.3808 38.3152 43.3212 40.6596 45.4124 43.6899C48.7737 39.9225 50.6293 35.0489 50.6249 30C50.625 28.8472 50.5293 27.6964 50.3389 26.5594C50.2958 26.3155 50.3014 26.0655 50.3555 25.8237C50.4095 25.582 50.5109 25.3534 50.6538 25.1511C50.7967 24.9488 50.9783 24.7768 51.1881 24.6451C51.3978 24.5133 51.6316 24.4245 51.8759 24.3836C52.1202 24.3427 52.3702 24.3507 52.6114 24.4069C52.8526 24.4632 53.0803 24.5667 53.2812 24.7115C53.4822 24.8563 53.6525 25.0395 53.7823 25.2504C53.9121 25.4614 53.9988 25.696 54.0374 25.9407ZM29.9999 35.625C31.4832 35.625 32.9333 35.1852 34.1667 34.361C35.4 33.5369 36.3613 32.3656 36.929 30.9951C37.4966 29.6247 37.6452 28.1167 37.3558 26.6618C37.0664 25.207 36.3521 23.8706 35.3032 22.8217C34.2543 21.7728 32.9179 21.0585 31.4631 20.7691C30.0082 20.4797 28.5002 20.6283 27.1298 21.1959C25.7593 21.7636 24.588 22.7249 23.7639 23.9582C22.9397 25.1916 22.4999 26.6417 22.4999 28.125C22.4999 30.1141 23.2901 32.0218 24.6966 33.4283C26.1031 34.8348 28.0108 35.625 29.9999 35.625ZM29.9999 50.625C34.5781 50.6296 39.0264 49.1034 42.6374 46.2891C41.281 44.1677 39.4124 42.4219 37.2038 41.2127C34.9953 40.0034 32.5178 39.3695 29.9999 39.3695C27.4819 39.3695 25.0045 40.0034 22.7959 41.2127C20.5874 42.4219 18.7188 44.1677 17.3624 46.2891C20.9734 49.1034 25.4217 50.6296 29.9999 50.625Z" fill="currentColor"/>
                                </svg>
                                <span class="ml-2">Agentes culturais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('editals.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M208,72V184a8,8,0,0,1-8,8H176V104L136,64H80V40a8,8,0,0,1,8-8h80Z" opacity="0.2"></path>
                                    <path d="M213.66,66.34l-40-40A8,8,0,0,0,168,24H88A16,16,0,0,0,72,40V56H56A16,16,0,0,0,40,72V216a16,16,0,0,0,16,16H168a16,16,0,0,0,16-16V200h16a16,16,0,0,0,16-16V72A8,8,0,0,0,213.66,66.34ZM168,216H56V72h76.69L168,107.31v84.53c0,.06,0,.11,0,.16s0,.1,0,.16V216Zm32-32H184V104a8,8,0,0,0-2.34-5.66l-40-40A8,8,0,0,0,136,56H88V40h76.69L200,75.31Zm-56-32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,152Zm0,32a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h48A8,8,0,0,1,144,184Z"></path>
                                </svg>
                                <span class="ml-2">Editais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('projects.search.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-38.34-85.66a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35A8,8,0,0,1,169.66,122.34Z"></path>
                                </svg>
                                <span class="ml-2">Projetos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('professionals.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"></path>
                                </svg>
                                <span class="ml-2">Profissionais</span>
                            </a>
                        </li>
                    @elseif ($userCurrent->role_id->value == '3')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('customers.index') }}">
                                <svg width="19" height="19" viewBox="0 0 60 60" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.3749 13.125C39.3749 12.6277 39.5724 12.1508 39.924 11.7992C40.2757 11.4476 40.7526 11.25 41.2499 11.25H44.9999V7.50003C44.9999 7.00275 45.1974 6.52583 45.549 6.1742C45.9007 5.82257 46.3776 5.62503 46.8749 5.62503C47.3722 5.62503 47.8491 5.82257 48.2007 6.1742C48.5523 6.52583 48.7499 7.00275 48.7499 7.50003V11.25H52.4999C52.9972 11.25 53.4741 11.4476 53.8257 11.7992C54.1773 12.1508 54.3749 12.6277 54.3749 13.125C54.3749 13.6223 54.1773 14.0992 53.8257 14.4509C53.4741 14.8025 52.9972 15 52.4999 15H48.7499V18.75C48.7499 19.2473 48.5523 19.7242 48.2007 20.0759C47.8491 20.4275 47.3722 20.625 46.8749 20.625C46.3776 20.625 45.9007 20.4275 45.549 20.0759C45.1974 19.7242 44.9999 19.2473 44.9999 18.75V15H41.2499C40.7526 15 40.2757 14.8025 39.924 14.4509C39.5724 14.0992 39.3749 13.6223 39.3749 13.125ZM54.0374 25.9407C54.894 31.0326 54.1102 36.265 51.7992 40.8824C49.4881 45.4999 45.7694 49.2634 41.18 51.6296C36.5906 53.9958 31.368 54.8422 26.2661 54.0467C21.1643 53.2512 16.4473 50.8549 12.7962 47.2037C9.14503 43.5526 6.7487 38.8356 5.95318 33.7338C5.15766 28.6319 6.00411 23.4093 8.37031 18.8199C10.7365 14.2305 14.5 10.5118 19.1175 8.20075C23.7349 5.88972 28.9673 5.10592 34.0593 5.96253C34.546 6.0486 34.979 6.32338 35.2642 6.72708C35.5494 7.13079 35.6636 7.63077 35.582 8.11827C35.5005 8.60576 35.2297 9.04133 34.8287 9.33024C34.4276 9.61914 33.9287 9.738 33.4405 9.66096C30.483 9.16345 27.4526 9.31637 24.5602 10.1091C21.6678 10.9018 18.9829 12.3153 16.6923 14.2512C14.4018 16.1871 12.5606 18.5988 11.2968 21.3186C10.0331 24.0385 9.37725 27.001 9.37488 30C9.37043 35.0489 11.2261 39.9225 14.5874 43.6899C16.6785 40.6596 19.619 38.3152 23.0389 36.9516C21.2019 35.5047 19.8614 33.5212 19.2038 31.2771C18.5462 29.033 18.6043 26.6398 19.37 24.4302C20.1357 22.2207 21.5709 20.3046 23.476 18.9485C25.3811 17.5924 27.6614 16.8637 29.9999 16.8637C32.3383 16.8637 34.6187 17.5924 36.5238 18.9485C38.4289 20.3046 39.8641 22.2207 40.6297 24.4302C41.3954 26.6398 41.4535 29.033 40.796 31.2771C40.1384 33.5212 38.7979 35.5047 36.9608 36.9516C40.3808 38.3152 43.3212 40.6596 45.4124 43.6899C48.7737 39.9225 50.6293 35.0489 50.6249 30C50.625 28.8472 50.5293 27.6964 50.3389 26.5594C50.2958 26.3155 50.3014 26.0655 50.3555 25.8237C50.4095 25.582 50.5109 25.3534 50.6538 25.1511C50.7967 24.9488 50.9783 24.7768 51.1881 24.6451C51.3978 24.5133 51.6316 24.4245 51.8759 24.3836C52.1202 24.3427 52.3702 24.3507 52.6114 24.4069C52.8526 24.4632 53.0803 24.5667 53.2812 24.7115C53.4822 24.8563 53.6525 25.0395 53.7823 25.2504C53.9121 25.4614 53.9988 25.696 54.0374 25.9407ZM29.9999 35.625C31.4832 35.625 32.9333 35.1852 34.1667 34.361C35.4 33.5369 36.3613 32.3656 36.929 30.9951C37.4966 29.6247 37.6452 28.1167 37.3558 26.6618C37.0664 25.207 36.3521 23.8706 35.3032 22.8217C34.2543 21.7728 32.9179 21.0585 31.4631 20.7691C30.0082 20.4797 28.5002 20.6283 27.1298 21.1959C25.7593 21.7636 24.588 22.7249 23.7639 23.9582C22.9397 25.1916 22.4999 26.6417 22.4999 28.125C22.4999 30.1141 23.2901 32.0218 24.6966 33.4283C26.1031 34.8348 28.0108 35.625 29.9999 35.625ZM29.9999 50.625C34.5781 50.6296 39.0264 49.1034 42.6374 46.2891C41.281 44.1677 39.4124 42.4219 37.2038 41.2127C34.9953 40.0034 32.5178 39.3695 29.9999 39.3695C27.4819 39.3695 25.0045 40.0034 22.7959 41.2127C20.5874 42.4219 18.7188 44.1677 17.3624 46.2891C20.9734 49.1034 25.4217 50.6296 29.9999 50.625Z" fill="currentColor"/>
                                </svg>
                                <span class="ml-2">Agentes culturais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center text-dark" href="{{ route('projects.search.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-38.34-85.66a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35A8,8,0,0,1,169.66,122.34Z"></path>
                                </svg>
                                <span class="ml-2">Projetos</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
