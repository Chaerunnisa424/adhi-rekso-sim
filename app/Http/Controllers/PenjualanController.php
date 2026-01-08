<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    // ==========================================================
    // HALAMAN LIST PENJUALAN
    // ==========================================================
    public function index(Request $request)
    {
        // Filter
        $kode = $request->filter_kode;
        $tanggal = $request->filter_tanggal;
        $show = $request->show ?? 5;

        // Query
        $data = DB::table('penjualan')
            ->leftJoin('user', 'penjualan.id_user', '=', 'user.id_user')
            ->select(
                'penjualan.*',
                'user.nama_lengkap as nama_user'
            )
            ->when($kode, function ($q) use ($kode) {
                return $q->where('kode_transaksi', 'LIKE', "%$kode%");
            })
            ->when($tanggal, function ($q) use ($tanggal) {
                return $q->where('tgl_penjualan', $tanggal);
            })
            ->orderBy('id_penjualan', 'DESC')
            ->paginate($show)
            ->appends($request->all());

        return view('superadmin.penjualan.index', compact('data'));
    }


    // ==========================================================
    // SHOW DETAIL PENJUALAN (UNTUK MODAL AJAX)
    // ==========================================================
    public function show($id)
    {
        $penjualan = Penjualan::with(['user', 'detailProduk.produk'])
            ->where('id_penjualan', $id)
            ->first();

        if (!$penjualan) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'kode_transaksi' => $penjualan->kode_transaksi,
            'tgl_penjualan'  => $penjualan->tgl_penjualan,
            'nama_user'      => $penjualan->user->nama_lengkap ?? '-',
            'total_bayar'    => $penjualan->total_bayar,

            'detail' => $penjualan->detailProduk->map(function ($d) {
                return [
                    'kode_produk' => $d->kode_produk,
                    'nama_produk' => $d->produk->nama_produk ?? '-',
                    'jumlah'      => $d->jumlah,
                    'subtotal'    => $d->subtotal,
                ];
            }),
        ]);
    }


    // ==========================================================
    // TAMPILKAN FORM CREATE
    // ==========================================================
    public function create()
    {
        $produk = DB::table('produk')->get();
        return view('superadmin.penjualan.create', compact('produk'));
    }


    // ==========================================================
    // SIMPAN TRANSAKSI PENJUALAN
    // ==========================================================
    public function store(Request $request)
    {
        $detail = json_decode($request->detail_penjualan, true);

        if (!$detail) {
            return back()->with('error', 'Detail penjualan kosong!');
        }

        // Simpan header
        $penjualan = Penjualan::create([
            'kode_transaksi' => $request->kode_transaksi,
            'tgl_penjualan'  => $request->tgl_penjualan,
            'id_user'        => auth()->user()->id_user ?? 4,
            'total_bayar'    => $request->total_harga
        ]);

        // Simpan detail
        foreach ($detail as $item) {
            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'kode_produk'  => $item['kode_produk'],
                'jumlah'       => $item['qty'],
                'subtotal'     => $item['harga'] * $item['qty'],
            ]);
        }

        return redirect()->route('superadmin.penjualan.index')
                         ->with('success', 'Transaksi berhasil disimpan!');
    }
}
