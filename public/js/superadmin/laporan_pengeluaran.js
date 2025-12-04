document.addEventListener("DOMContentLoaded", function () {

    // ================================
    // LINE CHART – Tren Pengeluaran Bulanan
    // ================================
    const chartPengeluaran = document.getElementById('chartPengeluaran');
    if (chartPengeluaran) {
        const ctxLine = chartPengeluaran.getContext('2d');

        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                datasets: [{
                    label: 'Pengeluaran 2025',
                    data: [12, 15, 14, 18, 20, 22, 19, 21, 23, 25, 28, 30], // Juta Rupiah
                    borderColor: '#609966',
                    pointBackgroundColor: '#609966',
                    pointBorderColor: '#fff',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.35,
                    fill: false,
                    borderWidth: 3
                }]
            },
            options: {
                plugins: {
                    legend: { labels: { color: '#609966' }},
                    title: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#609966' },
                        grid: { color: '#e7e7e7' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#609966',
                            callback: value => 'Rp ' + value + ' Jt'
                        },
                        grid: { color: '#e7e7e7' }
                    }
                }
            }
        });
    }

    // ================================
    // BAR CHART – Pengeluaran Berdasarkan Kategori
    // ================================
    const chartKategori = document.getElementById('chartPengeluaranKategori');
    if (chartKategori) {
        const ctxBar = chartKategori.getContext('2d');

        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: [
                    'Pupuk Kimia',
                    'Pupuk Organik',
                    'Pestisida',
                    'Benih',
                    'Alat Pertanian'
                ],
                datasets: [{
                    label: 'Pengeluaran (Rp)',
                    data: [55000000, 32000000, 21000000, 15000000, 18000000],
                    backgroundColor: '#609966',
                    borderColor: '#4d7a52',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        ticks: { color: '#609966' },
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#609966',
                            callback: value => 'Rp ' + value.toLocaleString()
                        },
                        grid: { color: '#e7e7e7' }
                    }
                }
            }
        });
    }

});
