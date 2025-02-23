<x-layout.panel>

    {{-- ALERT --}}
    <x-alert.success :message="session('success')" />
    <input type="hidden" data-csrf value="{{ csrf_token() }}">
    <input type="hidden" data-search-customer-url value="{{ route('customers.search') }}">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Agentes culturais</h3>
    </div>

    {{-- LISTA DE AGENTES CULTURAIS --}}
    <div class="card col-12 px-0">

        {{-- FILTROS --}}
        <div class="d-md-flex justify-content-between align-items-center px-2 pt-3">
            <div class="col-md-6 d-flex mb-4">
                <div class="mr-4">
                    <a href="{{ route('customers.index') }}">
                        <div>
                            <span class="font-weight-semibold text-{{ ! request()->has('status') ? 'primary' : 'secondary' }} mr-1">
                                Todos
                            </span>
                            <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                {{ number_format($total->active + $total->inactive, 0, ',', '.') }}
                            </span>
                        </div>
                        @if (! request()->has('status'))
                            <div><hr class="text-primary mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                        @endif
                    </a>
                </div>
                <div class="mr-4">
                    <a href="{{ route('customers.index') }}?status=1">
                        <div>
                            <span class="font-weight-semibold text-{{ request('status') == '1' ? 'primary' : 'secondary' }} mr-1">
                                Ativos
                            </span>
                            <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                {{ number_format($total->active, 0, ',', '.') }}
                            </span>
                        </div>
                        @if (request('status') == '1')
                            <div><hr class="text-primary mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                        @endif
                    </a>
                </div>
                <div class="mr-4">
                    <a href="{{ route('customers.index') }}?status=0">
                        <div>
                            <span class="font-weight-semibold text-{{ request('status') == '0' ? 'primary' : 'secondary' }} mr-1">
                                Inativos
                            </span>
                            <span class="btn-light font-weight-medium rounded-lg px-3 py-1">
                                {{ number_format($total->inactive, 0, ',', '.') }}
                            </span>
                        </div>
                        @if (request('status') == '0')
                            <div><hr class="text-primary mb-0" style="border: 2px solid; margin-top: 11px;"></div>
                        @endif
                    </a>
                </div>
            </div>

            <div class="col-md-6 input-group mb-4">
                <input type="search" class="form-control mr-3" onkeyup="search(this)"
                    placeholder="Pesquisar agente por nome, cpf ou cnpj"
                />
                <a href="{{ route('customers.index') }}" class="btn btn-light waves-effect">Limpar filtros</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table table-hover table-centered table-sm table-nowrap">
                    <thead class="text-secondary bg--light">
                        <tr>
                            <th class="pl-4 py-2" style="width: 30%;">Nome</th>
                            <th style="width: 25%;">Tipo de agente</th>
                            <th style="width: 15%;">Telefone</th>
                            <th style="width: 14%;">Criado em</th>
                            <th style="width: 8%;">Status</th>
                            <th style="width: 8%;">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark" id="contentCustomer">
                        @foreach ($customers as $customer)
                            <tr class="text-dark">
                                <td class="pl-4 py-2">
                                    <div class="d-flex align-items-center">
                                        <span class="mr-3">
                                            <img src="{{ $customer->avatar }}" class="rounded-circle" width="30px" height="30px" alt="foto de perfil">
                                        </span>
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-semibold">{{ $customer->name }}</span>
                                            @if ($customer->nickname)
                                                <span class="text-secondary">{{ $customer->nickname }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-secondary">{{ $customer->agent }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{!! $customer->is_active !!}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" title="Editar"
                                        class="btn btn-sm btn-rounded waves-effect mb-2 mb-md-0"
                                    >
                                        <svg width="22" height="22" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M88.793 28.6592L71.3399 11.2022C70.7595 10.6217 70.0704 10.1612 69.312 9.84698C68.5537 9.5328 67.7408 9.37109 66.9199 9.37109C66.0991 9.37109 65.2862 9.5328 64.5278 9.84698C63.7695 10.1612 63.0804 10.6217 62.5 11.2022L14.3321 59.3741C13.7492 59.9523 13.287 60.6407 12.9725 61.3991C12.658 62.1576 12.4974 62.971 12.5 63.792V81.2491C12.5 82.9067 13.1585 84.4964 14.3306 85.6685C15.5027 86.8406 17.0924 87.4991 18.75 87.4991H36.2071C37.0281 87.5017 37.8415 87.3411 38.6 87.0266C39.3584 86.7121 40.0468 86.2499 40.625 85.667L88.793 37.4991C89.3735 36.9187 89.834 36.2296 90.1482 35.4712C90.4624 34.7129 90.6241 33.9 90.6241 33.0791C90.6241 32.2583 90.4624 31.4454 90.1482 30.687C89.834 29.9287 89.3735 29.2396 88.793 28.6592ZM36.2071 81.2491H18.75V63.792L53.125 29.417L70.5821 46.8741L36.2071 81.2491ZM75 42.4522L57.543 24.9991L66.918 15.6241L84.375 33.0772L75 42.4522Z" fill="#667085"/>
                                        </svg>
                                    </a>

                                    {{-- OPCOES --}}
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
                                                <a href="{{ route('customers.password.edit', $customer->id) }}"
                                                    class="btn btn-sm rounded-lg waves-effect mb-2 px-0 mb-md-0"
                                                >
                                                    <svg width="19" height="19" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M30 26.25C28.4241 26.2505 26.9009 26.8182 25.709 27.8491C24.5171 28.8801 23.736 30.3056 23.5085 31.865C23.2809 33.4245 23.6222 35.0137 24.4698 36.3423C25.3175 37.6708 26.6149 38.65 28.125 39.1008V43.125C28.125 43.6223 28.3225 44.0992 28.6742 44.4508C29.0258 44.8025 29.5027 45 30 45C30.4973 45 30.9742 44.8025 31.3258 44.4508C31.6775 44.0992 31.875 43.6223 31.875 43.125V39.1008C33.3851 38.65 34.6825 37.6708 35.5302 36.3423C36.3778 35.0137 36.7191 33.4245 36.4915 31.865C36.264 30.3056 35.4829 28.8801 34.291 27.8491C33.0991 26.8182 31.5759 26.2505 30 26.25ZM30 35.625C29.4437 35.625 28.9 35.46 28.4375 35.151C27.9749 34.842 27.6145 34.4027 27.4016 33.8888C27.1887 33.3749 27.133 32.8094 27.2415 32.2638C27.3501 31.7182 27.6179 31.2171 28.0113 30.8238C28.4046 30.4304 28.9057 30.1626 29.4513 30.054C29.9969 29.9455 30.5624 30.0012 31.0763 30.2141C31.5902 30.427 32.0295 30.7874 32.3385 31.25C32.6475 31.7125 32.8125 32.2562 32.8125 32.8125C32.8125 33.5584 32.5162 34.2738 31.9887 34.8012C31.4613 35.3287 30.7459 35.625 30 35.625ZM48.75 18.75H41.25V13.125C41.25 10.1413 40.0647 7.27983 37.955 5.17005C35.8452 3.06026 32.9837 1.875 30 1.875C27.0163 1.875 24.1548 3.06026 22.045 5.17005C19.9353 7.27983 18.75 10.1413 18.75 13.125V18.75H11.25C10.2554 18.75 9.30161 19.1451 8.59835 19.8484C7.89509 20.5516 7.5 21.5054 7.5 22.5V48.75C7.5 49.7446 7.89509 50.6984 8.59835 51.4016C9.30161 52.1049 10.2554 52.5 11.25 52.5H48.75C49.7446 52.5 50.6984 52.1049 51.4016 51.4016C52.1049 50.6984 52.5 49.7446 52.5 48.75V22.5C52.5 21.5054 52.1049 20.5516 51.4016 19.8484C50.6984 19.1451 49.7446 18.75 48.75 18.75ZM22.5 13.125C22.5 11.1359 23.2902 9.22822 24.6967 7.8217C26.1032 6.41518 28.0109 5.625 30 5.625C31.9891 5.625 33.8968 6.41518 35.3033 7.8217C36.7098 9.22822 37.5 11.1359 37.5 13.125V18.75H22.5V13.125ZM48.75 48.75H11.25V22.5H48.75V48.75Z" fill="#667085"/>
                                                    </svg>
                                                    <span class="ml-2 font-size-13">Redefinir senha</span>
                                                </a>
                                            </li>
                                                
                                            <li class="dropdown-item">
                                                <button type="button" data-toggle="modal" onclick="destroyCustomer(this.dataset)"
                                                    data-route="{{ route('customers.destroy', $customer->id) }}"
                                                    data-name="{{ $customer->name }}" data-target="#deleteCustomer"
                                                    class="d-flex align-items-center btn btn-sm rounded-lg waves-effect mb-2 px-0 mb-md-0"
                                                >
                                                    <svg width="20" height="20" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                                        <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                                    </svg>
                                                    <span class="ml-2 font-size-13">Excluir</span>
                                                </button>
                                            </li>

                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody class="d-none" id="loader">
                        <tr>
                            <td colspan="5" >
                                <div class="d-flex justify-content-center align-items-center text-primary" 
                                    style="font-size: 20px; height: 200px;"
                                >
                                    <span class="spinner-border spinner-border-sm mr-2" 
                                        role="status" aria-hidden="true">
                                    </span> Carregando...
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center mt-3" id="paginate">
                <div class="d-flex justify-content-end">
                    {{ $customers->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DE DELETAR AGENTE CULTURAL --}}
    <div class="modal fade" id="deleteCustomer">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-form-destroy method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-body p-4">
                        <h5 class="text-center text-dark">Tem certeza que deseja excluir o agente cultural?</h5>
                        <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;" data-name-destroy></h5>
    
                        <div class="d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg width="130px" height="130px" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                    <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                </svg>
                            </div>
                        </div>
    
                        @if (! auth()->user()->tenant_id)
                            <div class="d-flex justify-content-center mt-4">
                                <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                    style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                                >
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                    style="background-color: #ED406A" onclick="loaderDestroy(this)"
                                >
                                    Excluir
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script src="{{ asset('js/tenant/customer/search.js') }}?version=1"></script>
    </x-slot:scripts>

</x-layout.panel>
