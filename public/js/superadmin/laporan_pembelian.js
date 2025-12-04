// =============================
// Line Chart Pembelian 2025
// =============================
new Chart(document.getElementById('chartPembelian'), {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [{
            label: 'Pembelian 2025',
            data: [5, 8, 6, 10, 12, 9, 14, 15, 16, 11, 13, 17], // juta rupiah
            fill: false,
            borderColor: '#609966',
            pointBackgroundColor: '#609966',
            pointBorderColor: '#609966',
            pointRadius: 4,
            pointHoverRadius: 6,
            tension: 0.3
        }]
    },
    options: {
        plugins: {
            legend: { labels: { color: '#609966' }},
            title: {
                display: true,
                text: 'Grafik Pembelian 2025',
                color: '#609966',
                font: { size: 16, weight: 'bold' }
            }
        },
        scales: {
            x: {
                ticks: { color: '#609966' },
                grid: { color: '#e0e0e0' }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#609966',
                    callback: function(value) {
                        return 'Rp ' + value + ' Jt'; // tampilkan juta rupiah
                    }
                },
                grid: { color: '#e0e0e0' }
            }
        }
    }
});



