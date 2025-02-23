export default {
    show: ({ target }) => {
        const updateButtonState = (isLoading, text) => {
            target.disabled = isLoading;
            target.innerHTML = text;
        }
    
        setTimeout(() => updateButtonState(true, '<spinner></spinner> Aguarde...'), 10);
        setTimeout(() => updateButtonState(false, 'Criar agente cultural'), 7000);
    }
}
