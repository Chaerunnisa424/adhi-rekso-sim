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

/* =======================================
   AUTO ISI HARGA SAAT PRODUK DIPILIH
======================================= */
document.getElementById("kode_produk").addEventListener("change", function () {
    const selected = this.options[this.selectedIndex];
    const hargaDefault = selected.getAttribute("data-harga");

    document.getElementById("harga_beli").value = hargaDefault || 0;
});

/* =======================================
   TAMBAH ITEM PRODUK
======================================= */
document.getElementById("formTambahProduk").addEventListener("submit", function(e) {
    e.preventDefault();

    const kodeSelect = document.getElementById("kode_produk");
    const kode = kodeSelect.value;

    if (!kode) {
        alert("Pilih produk terlebih dahulu!");
        return;
    }

    const nama = kodeSelect.options[kodeSelect.selectedIndex].text.split(" - ")[1];
    const jumlah = parseInt(document.getElementById("jumlah").value.trim());
    const harga = parseFloat(document.getElementById("harga_beli").value.trim());

    if (!jumlah || jumlah < 1 || isNaN(harga) || harga < 0) {
        alert("Data produk tidak valid!");
        return;
    }

    // Jika produk sudah ada → update
    const index = daftarProduk.findIndex(item => item.kode === kode);
    if (index !== -1) {
        daftarProduk[index].jumlah += jumlah;
        daftarProduk[index].harga = harga;
    } else {
        daftarProduk.push({
            kode,
            nama,
            jumlah,
            harga
        });
    }

    updateTabel();

    this.reset();
    document.getElementById("kode_produk").focus();
});

/* =======================================
   RESET FORM
======================================= */
document.getElementById("btnReset").addEventListener("click", function() {
    daftarProduk = [];
    updateTabel();
    document.getElementById("headerForm").reset();
    document.getElementById("formTambahProduk").reset();
});

/* =======================================
   SIMPAN TRANSAKSI KE BACKEND
======================================= */
document.getElementById("btnSimpan").addEventListener("click", function() {
    if (daftarProduk.length === 0) {
        alert("Tambahkan produk terlebih dahulu!");
        return;
    }

    const kode_transaksi = document.getElementById("kode_transaksi").value.trim();
    const tgl_transaksi = document.getElementById("tgl_transaksi").value.trim();
    const supplier = document.getElementById("supplier").value.trim();
    const catatan_transaksi = document.getElementById("catatan_transaksi").value.trim();

    if (!tgl_transaksi || !supplier) {
        alert("Tanggal dan Supplier harus diisi!");
        return;
    }

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
    .then(res => res.json())
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
