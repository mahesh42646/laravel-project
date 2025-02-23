const chart = document.getElementById('chartAttendance');

new Chart(chart, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
      datasets: [
        {
            label: 'Enviados',
            data: [12, 19, 20, 67, 123, 234, 234, 123, 123, 123, 145, 156],
            backgroundColor: '#4e36f5' 
        },
        {
            label: 'Inscrições',
            data: [5, 7, 8, 12, 17, 4, 34, 12, 25, 12, 23, 65],
            borderRadius: {
                topLeft: 5,
                topRight: 5
            },
            borderSkipped: false,
            backgroundColor: '#635bff'
        },
      ]
    },
    options: {
        plugins: {
            legend: {
                position: 'bottom'
            },
            title: {
                display: false,
                text: ''
            },
        },
        responsive: true,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true
          }
        }
    }
  });

