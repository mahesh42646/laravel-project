export default {
    load: function() {
        $('[name="cpf"]').inputmask(this.validate('###.###.###-##'));
        $('[name="date_of_birth"]').inputmask(this.validate('##/##/####'));
        $('[name="cnpj"]').inputmask(this.validate('##.###.###/####-##'));
        $('[name="phone"]').inputmask(this.validate('(##) #####-####'));
        $('[name="entity_cnpj"]').inputmask(this.validate('##.###.###/####-##'));
        $('[name="entity_representant_cpf"]').inputmask(this.validate('###.###.###-##'));
        $('[name="collective_representant_cpf"]').inputmask(this.validate('###.###.###-##'));
        this.applyMaskMoney();
    },
    applyMaskMoney: () => {
        (async () => {
            const fillUrl = document.querySelector('[data-url-mask-money]');
            const { Fill } = await import(fillUrl.value);
            Fill.mask({ currencyBrl: '[name="income"]' });
        })()
    },
    validate: (rule) => ({ 
        mask: [{ 'mask': rule }], 
        greedy: false, 
        definitions: { '#': { validator: '[0-9]', cardinality: 1 }} 
    })
}
