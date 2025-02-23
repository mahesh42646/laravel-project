export const AgentPF = {
    exist: () => {
        const cpfMasked = document.querySelector('[name="cpf"]');

        cpfMasked.oninput = () => {
            const cpf = cpfMasked.value.replace(/\D/g, '');
            const searchCpfUrl = document.querySelector('[data-exist-agent-pf-url]');

            if (cpf.length === 11) {
                fetch(`${searchCpfUrl.value}?cpf=${cpfMasked.value}`)
                    .then(response => response.json())
                    .then(request => {
                        const saveButton = document.querySelector('[data-save-button]');

                        if (request.agent_pf_exist) {
                            const modal = document.createElement('div');
                            const body = document.querySelector('body');

                            modal.innerHTML = `
                                <div class="modal fade" id="modalAgentPf">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content d-flex flex-column justify-content-center align-items-center text-dark p-4">
                                            <div class="w-100 d-flex justify-content-end mb-3">
                                                <span type="button" data-dismiss="modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#212121" viewBox="0 0 256 256">
                                                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                                                    </svg>
                                                </span>
                                            </div>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="95" height="95" fill="#212121" viewBox="0 0 256 256">
                                                <path d="M224,128a95.76,95.76,0,0,1-31.8,71.37A72,72,0,0,0,128,160a40,40,0,1,0-40-40,40,40,0,0,0,40,40,72,72,0,0,0-64.2,39.37h0A96,96,0,1,1,224,128Z" opacity="0.2"></path>
                                                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path>
                                            </svg>
                                            <h5 class="text-center mb-0">${request.agent_pf_name}</h5>
                                            <div class="text-center mb-3">Você já possui um cadastro de Pessoa Física!</div>
                                            <div style="border-top: 1px solid #CCC; height:20px; width: 100%;"></div>
                                            <p class="text-center">Caso deseje se cadastrar em um novo edital como pessoa física, entre no seu painel de controle, clicando no botão abaixo.</p>
                                            
                                            <a href="${request.agent_pf_route}" class="btn btn-dark px-4">
                                                ENTRAR NO MEU PAINEL
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;

                            body.appendChild(modal);
                            saveButton.disabled = true;
                            $('#modalAgentPf').modal('show');
                        } else {
                            saveButton.disabled = false;
                        }
                    })
                    .catch((error) => { console.error(error) });
            }
        }
    },
    getModal: function () {
        return 
    }
}
