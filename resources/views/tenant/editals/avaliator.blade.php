<x-layout.panel>

    {{-- ALERTAS --}}
    <x-alert.warnings :$errors />
    <x-alert.success :message="session('success')" />
   
    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('editals.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h5 class="mb-0">VINCULAR AVALIADOR AO EDITAL:</h5>
        <h3 class="font-weight-bold mb-0">{{ $edital->name }}</h3>
        @php $city = $edital->tenant->city; @endphp
        <h6 class="text-secondary text-uppercase">{{ $city->name }}-{{ $city->uf_id->getName() }}</h4>
    </div>

    {{-- LISTA DE EDITAIS --}}
    @if ($edital->avaliators->isNotEmpty())
        <div class="card col-12 px-0">
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table table-hover table-centered table-nowrap">
                        <thead class="text-secondary bg--light">
                            <tr>
                                <th class="pl-4 py-2">NOME</th>
                                <th>CPF</th>
                                <th>AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @foreach ($edital->avaliators as $avaliator)
                                <tr class="text-dark border-bottom">
                                    <td class="pl-4 py-2 d-flex flex-column align-items-start font-weight-medium">
                                        {{ $avaliator->name }}
                                    </td>
                                    <td class="text-dark">{{ $avaliator->cpf }}</td>
                                    <td class="text-dark">
                                        <span type="button" data-toggle="modal" data-target="#deleteAvaliator"
                                            onclick="showModalDeleteAvaliator('{{ $avaliator->name }}', '{{ route('editals.assign.avaliator.destroy', [$edital->id, $avaliator->id]) }}')"
                                        >
                                            <svg width="25" height="25" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                                <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                            </svg>
                                        </span>
                                       
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- ADICIONAR AVALIADOR --}}
    <div class="card border col-12 px-0">
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table table-hover table-centered table-sm table-nowrap">
                    <thead class="text-dark bg--light">
                        <tr>
                            <th class="pl-4 py-2" style="width: 20%;">ADICIONAR AVALIADOR</th>
                            <th>Nome do Profissional</th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        <tr>
                            <td></td>
                            <td>
                                <form action="{{ route('editals.assign.avaliator.store', $edital->id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <select class="form-control" name="avaliator_id" required>
                                        <option value="">Selecione</option>
                                        @foreach ($avaliators as $id => $avaliator)
                                            <option value="{{ $id }}">{{ $avaliator }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="d-flex align-items-center btn bg-light border ml-4" onclick="showProgressIndicator(this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#343a40" viewBox="0 0 256 256">
                                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
                                        </svg>
                                        <span class="text-dark ml-2">Adicionar</span>
                                    </button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL DE DESVINCULAR AVALIADOR --}}    
    <div class="modal fade" id="deleteAvaliator">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-form-destroy method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-body p-4">
                        <h5 class="text-center text-dark">Tem certeza que deseja excluir o edital?</h5>
                        <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;" data-name-destroy></h5>
    
                        <div class="d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg width="130px" height="130px" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M46.875 13.125V48.75C46.875 49.2473 46.6775 49.7242 46.3258 50.0758C45.9742 50.4275 45.4973 50.625 45 50.625H15C14.5027 50.625 14.0258 50.4275 13.6742 50.0758C13.3225 49.7242 13.125 49.2473 13.125 48.75V13.125H46.875Z" fill="#F21D56"/>
                                    <path d="M50.625 11.25H41.25V9.375C41.25 7.88316 40.6574 6.45242 39.6025 5.39752C38.5476 4.34263 37.1168 3.75 35.625 3.75H24.375C22.8832 3.75 21.4524 4.34263 20.3975 5.39752C19.3426 6.45242 18.75 7.88316 18.75 9.375V11.25H9.375C8.87772 11.25 8.40081 11.4475 8.04918 11.7992C7.69754 12.1508 7.5 12.6277 7.5 13.125C7.5 13.6223 7.69754 14.0992 8.04918 14.4508C8.40081 14.8025 8.87772 15 9.375 15H11.25V48.75C11.25 49.7446 11.6451 50.6984 12.3483 51.4016C13.0516 52.1049 14.0054 52.5 15 52.5H45C45.9946 52.5 46.9484 52.1049 47.6516 51.4016C48.3549 50.6984 48.75 49.7446 48.75 48.75V15H50.625C51.1223 15 51.5992 14.8025 51.9508 14.4508C52.3025 14.0992 52.5 13.6223 52.5 13.125C52.5 12.6277 52.3025 12.1508 51.9508 11.7992C51.5992 11.4475 51.1223 11.25 50.625 11.25ZM22.5 9.375C22.5 8.87772 22.6975 8.40081 23.0492 8.04918C23.4008 7.69754 23.8777 7.5 24.375 7.5H35.625C36.1223 7.5 36.5992 7.69754 36.9508 8.04918C37.3025 8.40081 37.5 8.87772 37.5 9.375V11.25H22.5V9.375ZM45 48.75H15V15H45V48.75ZM26.25 24.375V39.375C26.25 39.8723 26.0525 40.3492 25.7008 40.7008C25.3492 41.0525 24.8723 41.25 24.375 41.25C23.8777 41.25 23.4008 41.0525 23.0492 40.7008C22.6975 40.3492 22.5 39.8723 22.5 39.375V24.375C22.5 23.8777 22.6975 23.4008 23.0492 23.0492C23.4008 22.6975 23.8777 22.5 24.375 22.5C24.8723 22.5 25.3492 22.6975 25.7008 23.0492C26.0525 23.4008 26.25 23.8777 26.25 24.375ZM37.5 24.375V39.375C37.5 39.8723 37.3025 40.3492 36.9508 40.7008C36.5992 41.0525 36.1223 41.25 35.625 41.25C35.1277 41.25 34.6508 41.0525 34.2992 40.7008C33.9475 40.3492 33.75 39.8723 33.75 39.375V24.375C33.75 23.8777 33.9475 23.4008 34.2992 23.0492C34.6508 22.6975 35.1277 22.5 35.625 22.5C36.1223 22.5 36.5992 22.6975 36.9508 23.0492C37.3025 23.4008 37.5 23.8777 37.5 24.375Z" fill="#F21D56"/>
                                </svg>
                            </div>
                        </div>
    
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-lg border fw-semibold mx-2 px-5 py-2" 
                                style="color: #ED406A; background-color: var(--bs-light)" data-dismiss="modal"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-lg fw-semibold mx-2 px-5 py-2 rounded-3 text-white" 
                                style="background-color: #ED406A" onclick="showProgressIndicator(this)"
                            >
                                Excluir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            function showModalDeleteAvaliator(name, url) { 
                const formModal = document.querySelector('[data-form-destroy]');
                const nameModal = document.querySelector('[data-name-destroy]');

                formModal.action = url;
                nameModal.innerHTML = name;
            }

            function showProgressIndicator(button, duration = 7000) {
                const updateButtonState = (isLoading, text) => {
                    button.disabled = isLoading;
                    button.innerHTML = text;
                }

                setTimeout(() => updateButtonState(true, '<spinner></spinner> Aguarde'), 10);
                setTimeout(() => updateButtonState(false, textWithIcon()), duration);
            }

            const textWithIcon = () => {
                return (
                    `<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#343a40" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
                    </svg>
                    <span class="text-dark ml-2">Adicionar</span>`
                );
            }
        </script>
    </x-slot:scripts>

</x-layout.panel>
