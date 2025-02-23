export default {
    money: async () => {
        const fillUrl = document.querySelector('[data-js="fill-url"]');
        const { Fill } = await import(fillUrl.value);
        Fill.mask({ currencyBrl: '[name="price"]' });
    }
}
