export default {
    entries: () => {
        return [
            { selector: '[name="name"]', message: 'Nome Obrigatório!' },
            { selector: '[name="date_of_birth"]', message: 'Data de nascimento obrigatória!' },
            { selector: '[name="rg"]', message: 'RG obrigatório!' },
            { selector: '[name="gender_id"]', message: 'Gênero obrigatório!' },
            { selector: '[name="breed_id"]', message: 'Raça obrigatória!' },
            { selector: '[name="is_lgbt"]', message: 'LGBT obrigatório' },
            { selector: '[name="schooling_id"]', message: 'Escolaridade obrigatória!' },
            { selector: '[name="income"]', message: 'Renda obrigatória!' },
            { selector: '[name="area_atuation_id"]', message: 'Área de atuação obrigatória!' },
            { selector: '[name="community_traditional_id"]', message: 'Comunidade tradicional obrigatória!' },
            { selector: '[name="city_id"]', message: 'Cidade obrigatória!' },
            { selector: '[name="responsible_name"]', message: 'Nome do responsável obrigatório!' },
            { selector: '[name="email"]', message: 'E-mail obrigatório!' },
            { selector: '[name="password"]', message: 'Senha obrigatória!' },
            { selector: '#term', message: 'Marcação dos termos de uso é obrigatória!' }
        ];
    },
    cpfInvalid: (cpfMasked) => {
        if (cpfMasked === '') {
            return true;
        }

        if (cpfMasked.length === 14) {
            const cpf = cpfMasked.replace(/\D/g, '');
            let v = [];

            // Calcula o primeiro digito de verificacao
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            // Calcula o segundo digito de verificacao
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            // Retorna Verdadeiro se os dígitos de verificacao sao os esperados.
            return (v[0] != cpf[9]) || (v[1] != cpf[10]); 
        }
    },
    agentIsEmpty: () => {
        const agentsElements = document.querySelectorAll('[data-agent-type]');
        const listAgents = Array.from(agentsElements).filter(agent => agent.checked);

        return (listAgents.length <= 0);
    }
}
