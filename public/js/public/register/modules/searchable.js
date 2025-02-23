export default {
    load: () => {
        $('[data-city]').select2({
            ajax: {
                url: document.querySelector('[data-url-search-city]').value,
                type: 'POST',
                dataType: 'json',
                data: function () {
                    return {
                        filter: $('.select2-search__field').val(),
                        _token: document.querySelector('[name="_token"]').value
                    }
                },
                delay: 400,
                processResults: function (response) {
                    return { results: response.cities }
                },
                cache: true
            },
    
            templateResult: function (cities) {
                if (cities.loading) {
                    return $(
                        `<span class="spinner-border spinner-border-sm text-primary mr-2" role="status" aria-hidden="true">
                        </span><span class="text-primary fw-600">Buscando cidades...</span>`
                    );
                }
    
                return $(
                    `<div><strong>CIDADE:</strong> ${cities.name}</div>
                    <div><strong>ESTADO:</strong> ${cities.state}</div>
                    <div style="border-bottom: 1px solid #CCC;"></div>`
                );
            },
    
            templateSelection: function (city) {
                if (city.id) {
                    if (typeof city.name !== 'undefined') {
                        return $(`<option value="${city.id}">${city.name} (${city.state})</option>`);
                    }
    
                    return $(`<option value="${city.id}">${city.text}</option>`);
                }
                    
                return city.text;
            },
    
            placeholder: 'Buscar cidade por nome',
            minimumInputLength: 2,
            language: {
                'noResults': () => 'Nenhum resultado encontrado',
                'searching': () => 'Buscando...',
                'errorLoading': () => 'Os resultados não puderam ser carregados.',
                'inputTooShort': () => 'Digite 2 ou mais caracteres',
            },
        });
    }
}
