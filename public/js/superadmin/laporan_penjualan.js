// ================================
//  LINE CHART – Tren Penjualan Bulanan (WARNA DISESUAIKAN #609966)
// ================================
document.addEventListener("DOMContentLoaded", function () {

    const lineCanvas = document.getElementById('chartPenjualan');
    if (lineCanvas) {
        const ctxLine = lineCanvas.getContext('2d');

        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: [
                        12000000, 14000000, 18000000, 17500000, 21000000, 25000000,
                        23000000, 26000000, 22000000, 28000000, 30000000, 32000000
                    ],
                    tension: 0.35,
                    borderWidth: 3,
                    borderColor: '#609966',         // warna hijau utama
                    pointRadius: 4,
                    pointBackgroundColor: '#609966',
                    pointBorderColor: '#609966',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#609966' }
                    },
                    title: {
                        display: true,
                        text: 'Grafik Penjualan 2025',
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
                            callback: value => 'Rp ' + value.toLocaleString()
                        },
                        grid: { color: '#e0e0e0' }
                    }
                }
            }
        });
    }

    // ================================
    //  DOUGHNUT CHART – Kategori Produk Pertanian
    // ================================

    const pieCanvas = document.getElementById('chartKategori');
    if (pieCanvas) {
        const ctxPie = pieCanvas.getContext('2d');

        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: [
                    'Pupuk Kimia',
                    'Pupuk Organik',
                    'Pestisida',
                    'Benih Tanaman',
                    'Peralatan Pertanian'
                ],
                datasets: [{
                    data: [40, 25, 15, 12, 8],
                    backgroundColor: [
                        '#609966',   // utama hijau
                        '#88B788',   // varian hijau soft
                        '#A3C9A8',   // hijau muda
                        '#C1E1C1',   // pastel hijau
                        '#D9EED9'    // sangat soft
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                cutout: '58%',   // lubang tengah (donat)
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#609966' }
                    },
                    title: {
                        display: true,
                        text: 'Kategori Penjualan Toko Pupuk Pertanian',
                        color: '#609966',
                        font: { size: 16, weight: 'bold' }
                    }
                }
            }
        });
    }

});
