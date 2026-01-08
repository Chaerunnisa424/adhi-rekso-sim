let daftarProduk = [];

// ================================
// FORMAT RUPIAH TANPA DESIMAL
// ================================
function formatRupiah(angka) {
    let number = Number(angka) || 0;
    return "Rp " + number.toLocaleString("id-ID") + ",-";
}

// ================================
// UPDATE TABEL
// ================================
function updateTabel() {
    let tbody = $("#tabelTransaksi tbody");
    tbody.empty();

    let total = 0;

    daftarProduk.forEach((item, index) => {
        let subtotal = item.harga * item.qty;
        total += subtotal;

        tbody.append(`
            <tr>
                <td>${item.kode_produk}</td>
                <td>${item.nama_produk}</td>
                <td>${item.qty}</td>
                <td>${formatRupiah(item.harga)}</td>
                <td>${formatRupiah(subtotal)}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(${index})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `);
    });

    $("#totalBayar").text(formatRupiah(total));
}

// ================================
// HAPUS PRODUK
// ================================
function hapusItem(index) {
    daftarProduk.splice(index, 1);
    updateTabel();
}

// ================================
// TAMBAH PRODUK KE KERANJANG
// ================================
$("#btnTambah").click(function () {

    let kode = $("#kode_produk").val();
    let nama = $("#kode_produk option:selected").text();
    let harga = Number($("#kode_produk option:selected").data('harga'));
    let qty = parseInt($("#jumlah").val());

    if (!kode || qty <= 0) {
        alert("Pilih produk dan isi jumlah!");
        return;
    }

    daftarProduk.push({
        kode_produk: kode,
        nama_produk: nama,
        harga: harga,
        qty: qty
    });

    updateTabel();
});

// ================================
// SIMPAN TRANSAKSI
// ================================
$("#btnSimpan").click(function () {

    if (daftarProduk.length === 0) {
        alert("Belum ada produk dalam transaksi!");
        return;
    }

    // Total perhitungan
    let totalHarga = daftarProduk.reduce((total, item) => {
        return total + (item.harga * item.qty);
    }, 0);

    // Set hidden input
    $("#input_kode_transaksi").val($("#kode_transaksi").val());
    $("#input_tgl_penjualan").val($("#tgl_transaksi").val());
    $("#input_total_harga").val(totalHarga);
    $("#input_items").val(JSON.stringify(daftarProduk));

    // Submit form
    $("#formSimpan").submit();
});


// =========================================
// SHOW DETAIL PENJUALAN (MODAL)
// =========================================

$(document).on('click', '.btn-detail', function() {

    let id = $(this).data('id');

    let url = URL_DETAIL_PENJUALAN.replace(':id', id);

    $.ajax({
        url: url,
        type: "GET",
        success: function(res) {

            $("#d_kode").text(res.kode_transaksi);
            $("#d_tanggal").text(res.tgl_penjualan);
            $("#d_user").text(res.nama_user ?? "-");
            $("#d_total").text(Number(res.total_bayar).toLocaleString('id-ID'));

            let rows = "";

            res.detail.forEach(item => {
                rows += `
                    <tr>
                        <td>${item.kode_produk}</td>
                        <td>${item.produk ? item.produk.nama_produk : '-'}</td>
                        <td>${item.jumlah}</td>
                        <td>Rp ${Number(item.subtotal).toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });

            $("#tabelDetailProduk").html(rows);
            $("#modalDetail").modal('show');
        }
    });

});

