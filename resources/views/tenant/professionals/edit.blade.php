<x-layout.panel>
    
    {{-- ALERTAS --}}
    <x-alert.success :message="session('success')" />
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('professionals.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Editar dados do profissional</h3>
    </div>

    <form action="{{ route('professionals.update', $professional->id) }}" method="POST" enctype="multipart/form-data" class="d-flex">
        @csrf
        @method('PUT')

        <div class="col-md-3 pl-0 mb-3">
            <div class="card p-3">
                <div class="font-weight-medium mb-2 text-secondary">Foto de perfil</div>
                <div class="rounded-lg w-100 p-1 mb-4" style="border: 1px dashed #ccc;">
                    <img src="{{ $professional->avatar }}" type="button" class="rounded-lg w-100" alt="foto de perfil" onclick="triggerAvatar()" data-image-avatar>
                    <input type="file" class="d-none" accept=".png,.jpg,.jpeg" name="avatar" onchange="showAvatar(this)" data-file-avatar>
                </div>

                <a href="{{ route('professionals.bindings.index', $professional->id) }}" class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#667085" viewBox="0 0 256 256">
                        <path d="M88,112a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H96A8,8,0,0,1,88,112Zm8,40h80a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16ZM232,64V184a24,24,0,0,1-24,24H32A24,24,0,0,1,8,184.11V88a8,8,0,0,1,16,0v96a8,8,0,0,0,16,0V64A16,16,0,0,1,56,48H216A16,16,0,0,1,232,64Zm-16,0H56V184a23.84,23.84,0,0,1-1.37,8H208a8,8,0,0,0,8-8Z"></path>
                    </svg>
                    <span class="ml-2" style="color: #667085">Vínculos</span>
                </a>
            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="card p-4">
                <h5 class="mr-2 font-weight-medium mb-3">Informações da conta</h5>
            
                {{-- NOME COMPLETO E CPF --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome completo *</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="name" value="{{ $professional->name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">CPF *</label>
                        <input type="text" class="form-control rounded-lg" name="cpf" value="{{ $professional->cpf }}" required>
                    </div>
                </div>

                {{-- NOME SOCIAL E GENERO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome social *</label>
                        <input type="text" class="form-control rounded-lg" name="nickname" value="{{ $professional->nickname }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Gênero *</label>
                        <select class="form-control" name="gender_id" required>
                            <option value="">Selecione</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->value }}" 
                                    @selected($professional->gender_id === $gender->value)
                                >
                                    {{ $gender->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- ESCOLARIDADE E CARGO/FUNCAO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Escolaridade</label>
                        <select class="form-control" name="schooling_id">
                            <option value="">Selecione</option>
                            @foreach ($schoolings as $schooling)
                                <option value="{{ $schooling->value }}"
                                    @selected($professional->schooling_id->value === $schooling->value)
                                >
                                    {{ $schooling->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Cargo/Função</label>
                        <select class="form-control" name="occupation_id" data-occupation>
                            <option value="{{ $professional->occupation_id }}">{{ $professional->occupation?->name }}</option>
                        </select>
                        <input type="hidden" data-url-search-occupation value="{{ route('professionals.search.occupation') }}">
                    </div>
                </div>

                {{-- TELEFONE E PERFIL DE ACESSO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Telefone *</label>
                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ $professional->phone }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Perfil de acesso *</label>
                        <select class="form-control" name="role_id" required>
                            <option value="">Selecione</option>
                            @foreach ($roles as $role)
                                @if ($role->value === 2 || $role->value === 3)
                                    <option value="{{ $role->value }}" 
                                        @selected($professional->role_id->value == $role->value)
                                    >
                                        {{ $role->getName() }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- EMAIL E STATUS --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">E-mail para login *</label>
                        <input type="email" class="form-control rounded-lg" name="email" value="{{ $professional->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Status *</label>
                        <select class="form-control" name="is_active" required>
                            <option value="">Selecione</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}" 
                                    @selected($professional->is_active->value === $status->value)
                                >
                                    {{ $status->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                {{-- BOTAO DE SALVAR --}}
                <div class="d-md-flex justify-content-md-end align-items-md-center mt-3 pl-2">
                    <button type="submit" onclick="save(event, 'Atualizar')"
                        class="btn btn-primary rounded-lg font-weight-medium px-4 py-2"
                    >
                        Atualizar
                    </button>
                </div>
                
            </div>
        </div>
    </form>

    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('css/libs/select2/select2.min.css') }}">
    </x-slot:styles>

    <x-slot:scripts>
        <script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('js/tenant/professional/script.js') }}"></script>
    </x-slot:scripts>
   
</x-layout.panel>
