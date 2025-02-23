<x-layout.panel>
    
    {{-- ALERTA DE ERRO --}}
    <x-alert.warnings :$errors />

    {{-- HEADER --}}
    <div class="d-flex flex-column mb-3"> 
        <span>
            <a href="{{ route('professionals.index') }}" class="btn-link waves-effect rounded-lg text-dark px-0 py-1 mb-0">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-1"></i> Voltar
            </a>
        </span>
        <h3>Criar profissional</h3>
    </div>

    <form action="{{ route('professionals.store') }}" method="POST" enctype="multipart/form-data" class="d-flex">
        @csrf
        <div class="col-md-3 pl-0 mb-3">
            <div class="card p-3">
                <div class="font-weight-medium mb-2 text-secondary">Foto de perfil</div>
                <div class="rounded-lg w-100 p-1 mb-4" style="border: 1px dashed #ccc;">
                    <img src="{{ asset('images/avatar-empty.webp') }}" type="button" class="rounded-lg w-100" alt="foto de perfil" onclick="triggerAvatar()" data-image-avatar>
                    <input type="file" class="d-none" accept=".png,.jpg,.jpeg" name="avatar" onchange="showAvatar(this)" data-file-avatar>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="card p-4">
                <h5 class="mr-2 font-weight-medium mb-3">Informações da conta</h5>
            
                {{-- NOME COMPLETO E CPF --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome completo *</label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">CPF *</label>
                        <input type="text" class="form-control rounded-lg" name="cpf" value="{{ old('cpf') }}" required>
                    </div>
                </div>

                {{-- NOME SOCIAL E GENERO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome social *</label>
                        <input type="text" class="form-control rounded-lg" name="nickname" value="{{ old('nickname') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Gênero *</label>
                        <select class="form-control" name="gender_id" required>
                            <option value="">Selecione</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->value }}">{{ $gender->getName() }}</option>
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
                                <option value="{{ $schooling->value }}">{{ $schooling->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Cargo/Função</label>
                        <select class="form-control" name="occupation_id" data-occupation></select>
                        <input type="hidden" data-url-search-occupation value="{{ route('professionals.search.occupation') }}">
                    </div>
                </div>

                {{-- TELEFONE E PERFIL DE ACESSO --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Telefone *</label>
                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Perfil de acesso *</label>
                        <select class="form-control" name="role_id" required>
                            <option value="">Selecione</option>
                            @foreach ($roles as $role)
                                @if ($role->value === 2 || $role->value === 3)
                                    <option value="{{ $role->value }}" @selected(old('role_id') == $role->value)>
                                        {{ $role->getName() }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- EMAIL E SENHA --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">E-mail para login *</label>
                        <input type="email" class="form-control text-lowercase rounded-lg" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Senha *</label>
                        <input type="password" class="form-control rounded-lg" name="password" required>
                    </div>
                </div>
            
                {{-- BOTAO DE SALVAR --}}
                <div class="d-md-flex justify-content-md-end align-items-md-center mt-3 pl-2">
                    <button type="submit" onclick="save(event, 'Criar profissional')"
                        class="btn btn-primary rounded-lg font-weight-medium px-4 py-2" 
                    >
                        Criar profissional
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
