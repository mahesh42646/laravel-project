import InputMask from './modules/mask.js';
import Searchable from './modules/searchable.js';
import Formbuilder from './modules/formbuilder.js';
import Alert from './modules/alert.js';
import ProgressIndicator from './modules/progressindicator.js';
import Validator from './modules/validator.js';

window.changeAgentType = (peopleType) => {
    Formbuilder.render(peopleType);
    InputMask.load();
    Searchable.load();
}

window.save = (event) => {
    const agentTypes = document.querySelectorAll('[data-agent-type]');
    let agentType = 0;

    agentTypes.forEach(agent => {
        if (agent.checked) {
            agentType = agent.value;
        }
    });

    if (Validator.agentIsEmpty()) {
        event.preventDefault();
        return Alert.show('Tipo de agente obrigatório');
    }

    if (agentType == '1') {
        const cpfMasked = document.querySelector('[name="cpf"]').value;

        if (Validator.cpfInvalid(cpfMasked)) {
            event.preventDefault();
            return Alert.show('CPF Inválido!');
        }

        for (let index = 0; index < Validator.entries().length; index++) {
            const input = Validator.entries()[index];
            const element = document.querySelector(input.selector);

            if ((element.type !== 'checkbox' && element.value === '') ||
                (element.type === 'checkbox' && !element.checked)) {
                element.focus();
                event.preventDefault();
                return Alert.show(input.message);
            }
        }
    }

    ProgressIndicator.show(event);
}
