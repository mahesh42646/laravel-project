<x-layout.painel>

    {{-- ALERTA DE SUCESSO --}}
    <x-alert.success :message="session('success')" />

    <div class="row mb-1">
        <div class="col-xl-12">
            <form action="{{ route('public.panel.profile.update', $token) }}" method="POST" class="card d-flex p-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h3 class="text-dark font-weight-bold mb-4">Editar dados do perfil</h3>

                {{-- TIPO --}}
                <div class="row btn-light p-3 ml-1 rounded-lg mb-3">
                    <div class="col-12 d-flex align-items-center">
                        <div class="custom-control custom-radio mr-4">
                            <input type="radio" class="custom-control-input" name="type" id="pf" value="PF" 
                                onchange="changeType(this.value)" @checked($customer->type == 'PF') required
                            >
                            <label for="pf" class="custom-control-label mb-0 text-dark">Pessoa Física</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" class="ml-4" name="type" id="pj" value="PJ" 
                                onchange="changeType(this.value)" @checked($customer->type == 'PJ') required
                            >
                            <label for="pj" class="custom-control-label mb-0 text-dark">Pessoa Jurídica</label>
                        </div>
                    </div>
                </div>

                {{-- FOTO DE IMAGEM E CAPA --}}
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <label class="text-dark">Imagem Perfil</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ $customer->avatar }}" id="profile_display" style="width: 70px; height: 70px;" onclick="triggerClick()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clique para enviar a foto do perfil">
                            <input type="file" class="form-control" name="profile_photo_update" id="profilePhotoUpdate" accept="image/png,image/jpeg" style="display:none;" onchange="displayProfile(this)">
                        </div>
                    </div>
                    <div class="col-md-9 text-center mb-3">
                        <label class="text-dark">Imagem da Capa</label>
                        <img src="{{ $customer->cover ? $customer->cover_path : asset('assets/images/no-photo-larger.jpg') }}" id="coverDisplay"
                            style="cursor: pointer; width: 100%; height: 80px; border: 1px dashed #CCC; border-radius: 10px;" 
                            onclick="triggerClickCover()" data-toggle="tooltip" data-placement="top" 
                            data-original-title="Clique para enviar a foto da capa"
                        >
                        <input type="file" class="form-control" name="profile_cover_update" id="profileCoverUpdate" accept="image/png,image/jpeg" style="display:none;" onchange="displayCover(this)">
                    </div>
                </div>

                {{-- CNPJ E NOME EMPRESARIAL --}}
                <div class="row {{ $customer->type == 'PF' ? 'd-none' : '' }}" data-js="container-company">
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">CNPJ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" placeholder="00.000.000/0000-00"
                            name="cnpj" value="{{ $customer->cnpj }}" {{ $customer->type == 'PJ' ? 'required' : '' }}
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome Empresarial <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="company_name"
                            value="{{ $customer->company_name }}" {{ $customer->type == 'PJ' ? 'required' : '' }}
                        >
                    </div>
                </div>

                {{-- CPF, RG, NOME COMPLETO E GENERO --}}
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" placeholder="000.000.000-00" name="cpf" value="{{ $customer->cpf }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">RG <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" placeholder="0000000000 / Órgão Emissor" name="rg" value="{{ $customer->rg }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-dark">Nome Completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg text-uppercase" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Gênero <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="gender_id" required>
                            <option value="">Selecione</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->value }}"
                                    @selected($customer->gender_id?->value == $gender->value)
                                >
                                    {{ $gender->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- NOME SOCIAL, RACA, LGBTQA, ESCOLARIDADE E RENDA INDIVIDUAL --}}
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Nome Social</label>
                        <input type="text" class="form-control rounded-lg" name="name_social" value="{{ $customer->name_social }}">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Raça <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="breed_id" required>
                            <option value="">Selecione</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->value }}" @selected($customer->breed_id?->value == $breed->value)>
                                    {{ $breed->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Você é LGBTQIAPN+? <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="is_lgbt" required>
                            <option value="">Selecione</option>
                            @foreach ($situations as $situation)
                                <option value="{{ $situation->value }}" 
                                    @selected($customer->is_lgbt?->value == $situation->value)
                                >
                                    {{ $situation->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Escolaridade <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="schooling_id" required>
                            <option value="">Selecione</option>
                            @foreach ($schoolings as $schooling)
                                <option value="{{ $schooling->value }}"
                                    @selected($customer->schooling_id?->value == $schooling->value)
                                >
                                    {{ $schooling->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <input type="hidden" data-js="fill-url" value="{{ asset('assets/js/pages/Fill.js') }}">
                        <label class="text-dark">Renda Individual <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" name="income" value="{{ $customer->income }}" required>
                    </div>
                </div>

                {{-- PRINCIPAL AREA DE ATUACAO, OUTRAS AREAS DE ATUACAO E COMUNIDADES TRADICIONAIS --}}
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Principal área de atuação <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="area_atuation_id" required>
                            <option value="">Selecione</option>
                            @foreach ($mainAreaAtuations as $areaAtuation)
                                <option value="{{ $areaAtuation->value }}"
                                    @selected(old('area_atuation_id', $customer->area_atuation_id?->value) == $areaAtuation->value)
                                >
                                    {{ $areaAtuation->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Outras áreas de atuação</label>
                        <input type="text" class="form-control rounded-lg" name="area_atuation_other" value="{{ $customer->area_atuation_other }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Comunidades tradicionais <span class="text-danger">*</span></label>
                        <select class="form-control rounded-lg" name="community_traditional_id" required>
                            <option value="">Selecione</option>
                            @foreach ($communities as $community)
                                <option value="{{ $community->value }}"
                                    @selected(old('community_traditional_id', $customer->community_traditional_id?->value) == $community->value)
                                >
                                    {{ $community->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- CIDADE, ENDERECO, TELEFONE, EMAIL E SITUACAO --}}
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="text-dark">Endereço completo</label>
                        <input type="text" class="form-control rounded-lg" name="address" value="{{ $customer->address }}">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Cidade <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-uppercase rounded-lg" name="city" value="{{ $customer->city }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Telefone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-lg" name="phone" value="{{ $customer->phone }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control text-lowercase rounded-lg" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="text-dark">Situação <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $customer->is_active?->getColor() }}" style="background-color: #f1f1f1" value="{{ $customer->is_active?->getName() }}" readonly>
                    </div>
                </div>

                {{-- BOTOES DE VOLTAR E SALVAR --}}
                <div class="d-md-flex justify-content-md-end align-items-md-center mt-3">
                    <button type="submit" class="btn btn-primary rounded-lg font-weight-medium px-5" onclick="loaderProfile(event)">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xl-12">
            <form action="{{ route('public.panel.profile.social.midia.store', $token) }}" method="POST" class="card d-flex p-4">
                @csrf

                {{-- MIDIAS SOCIAIS E LINKS --}}
                <h4 class="text-dark font-weight-bold mt-2 mb-3">Links e Mídias Sociais</h4>
                @foreach ($customer->social_medias as $socialMedia)
                    <div>
                        <div class="d-flex justify-content-md-between text-dark">
                            <div class="d-flex align-items-center text-dark">
                                <h1 class="font-weight-bold mb-0 mr-4" data-item-index>{{ $loop->iteration }}</h1>
                                <h5 class="mb-0"><img src="{{ $socialMedia->media_id->getIcon() }}" width="35" height="35">&nbsp;</h5>
                                <h5 class="mb-0">{{ $socialMedia->description }} &nbsp;</h5>
                            </div>
                            <div class="d-flex">
                                <span type="button" style="padding: 3px 2px;" title="Remover rede social"
                                    onclick="removeSocialMedia(this.parentElement.parentElement.parentElement)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#999" viewBox="0 0 256 256">
                                        <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <input type="hidden" name="ids[]" value="${typeLink.id}">
                            <input type="hidden" name="links[]" value="${typeLink.link}">
                            <input type="hidden" name="descriptions[]" value="${description}">
                        </div>
                        <hr class="my-2">
                    </div>
                @endforeach

                <div class="mb-2 mt-4" data-js="container-medias"></div>
                <input type="hidden" data-js="social-medias" value="{{ $socialMedias }}">

                <div class="d-flex justify-content-between mb-3">
                    <button type="submit" class="btn btn-primary font-weight-medium px-4 rounded-lg" onclick="loader(event)">Salvar</button>
                    <button type="button" class="align-items-center btn d-flex font-weight-semibold px-3 py-1 rounded-lg text-dark"
                        onclick="addMedia()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                        </svg>
                        <span class="ml-1">Adicionar Mídia</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAIS --}}
    @foreach ($customer->social_medias as $socialMedia)
        <div class="modal fade" id="destroySocialMedia-{{ $socialMedia->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('public.panel.profile.social.midia.destroy', [$token, $socialMedia->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="modal-body p-4">
                            <h5 class="text-center text-dark">Tem certeza que deseja excluir a mídia social?</h5>
                            <h5 class="text-center fw-bold lh-1 mb-4" style="color: #ED406A; margin-top: -5px;">{{ $socialMedia->media_id?->getName() }}</h5>

                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="130px" height="130px" viewBox="0 0 24 24" fill="#ED406A">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
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
                                    style="background-color: #ED406A"
                                >
                                    Excluir
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <x-slot:scripts>
        <script src="{{ asset('js/libs/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/libs/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('js/public/profile/edit.js') }}?version=201120241903"></script>
        <script src="{{ asset('js/public/profile/social-media.js') }}"></script>
    </x-slot:scripts>

</x-layout.painel>
