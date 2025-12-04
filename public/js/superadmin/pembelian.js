// =======================================
// SUPERADMIN - PEMBELIAN
// Script untuk catat pembelian / tambah produk ke tabel
// =======================================

let daftarProduk = [];

function formatRupiah(angka) {
    if (isNaN(angka)) return 'Rp 0,-';
    return 'Rp ' + angka.toLocaleString('id-ID') + ',-';
}

function updateTabel() {
    const tbody = document.querySelector("#tabelTransaksi tbody");
    tbody.innerHTML = "";
    let total = 0;
    daftarProduk.forEach((item, index) => {
        const subtotal = item.jumlah * item.harga;
        total += subtotal;
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${item.kode}</td>
            <td>${item.nama}</td>
            <td>${item.jumlah}</td>
            <td>${formatRupiah(item.harga)}</td>
            <td>${formatRupiah(subtotal)}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(${index})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
    document.getElementById("totalBayar").textContent = formatRupiah(total);
}

function hapusItem(index) {
    daftarProduk.splice(index, 1);
    updateTabel();
}

document.getElementById("formTambahProduk").addEventListener("submit", function(e) {
    e.preventDefault();

    const kode = document.getElementById("kode_produk").value.trim();
    const jumlahStr = document.getElementById("jumlah").value.trim();
    const hargaRaw = document.getElementById("harga_beli").value.trim();

    // Bersihkan format ribuan dari input harga jika ada
    const hargaClean = hargaRaw.replace(/[.,]/g, '');
    const jumlah = parseInt(jumlahStr, 10);
    const harga = parseFloat(hargaClean);

    if (!kode || isNaN(jumlah) || jumlah < 1 || isNaN(harga) || harga < 0) {
        alert('Data produk tidak valid!');
        return;
    }

    // Cek apakah produk sudah ada di daftar
    const index = daftarProduk.findIndex(item => item.kode === kode);
    if(index !== -1){
        // Update jumlah dan harga
        daftarProduk[index].jumlah += jumlah;
        daftarProduk[index].harga = harga;
    } else {
        // Tambah produk baru
        daftarProduk.push({
            kode,
            nama: kode, // Bisa diganti nanti dengan fetch nama produk dari server
            jumlah,
            harga
        });
    }

    updateTabel();

    // Reset form tambah produk dan fokus input kode_produk
    this.reset();
    document.getElementById("kode_produk").focus();
});

document.getElementById("btnReset").addEventListener("click", function() {
    daftarProduk = [];
    updateTabel();
    document.getElementById("headerForm").reset();
    document.getElementById("formTambahProduk").reset();
});

document.getElementById("btnSimpan").addEventListener("click", function() {
    if (daftarProduk.length === 0) {
        alert("Tambahkan produk terlebih dahulu!");
        return;
    }

    // Ambil data header transaksi
    const kode_transaksi = document.getElementById("kode_transaksi").value.trim();
    const tgl_transaksi = document.getElementById("tgl_transaksi").value.trim();
    const supplier = document.getElementById("supplier").value.trim();
    const catatan_transaksi = document.getElementById("catatan_transaksi").value.trim();

    if (!tgl_transaksi || !supplier) {
        alert("Tanggal dan Supplier harus diisi!");
        return;
    }

    // Buat payload data untuk dikirim ke backend
    const payload = {
        kode_transaksi,
        tgl_transaksi,
        supplier,
        catatan_transaksi,
        produk: daftarProduk.map(item => ({
            kode: item.kode,
            jumlah: item.jumlah,
            harga_beli: item.harga
        }))
    };

    fetch(STORE_URL, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(payload)
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Network response was not ok");
        }
        return res.json();
    })
    .then(data => {
        if(data.status === 'success'){
            alert(data.message);
            daftarProduk = [];
            updateTabel();
            document.getElementById("headerForm").reset();
            document.getElementById("formTambahProduk").reset();
        } else {
            alert("Error: " + (data.message || 'Gagal menyimpan transaksi.'));
        }
    })
    .catch(err => {
        console.error(err);
        alert("Gagal menyimpan transaksi. Silakan coba lagi.");
    });
});
