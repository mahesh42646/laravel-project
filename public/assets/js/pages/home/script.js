const baseUrl = document.querySelector('[data-js="base-url"]')

fetch(baseUrl.value)
    .then((response) => response.json())
    .then(request => {
        draw(request.payloads);
    })
    .catch((error) => {
        console.log(error);
    })

function draw(payloads) {
    const options = {
        series: [
            {
                name: 'Rendimento',
                data: payloads.revenues
            }, 
            {
                name: 'Despesas',
                data: payloads.expenses
            }
        ],
        colors: ['#00e097', '#523ed5'],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return value.toLocaleString('pt-br', {
                        style: 'currency', 
                        currency: 'BRL'
                    });
                }
            }
        }
    };

    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}
