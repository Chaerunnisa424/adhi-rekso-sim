<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class PembelianController extends Controller
{
    public function create()
    {
        $suppliers = DB::table('supplier')->get();

        return view('superadmin.pembelian.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|string|unique:pembelian,kode_transaksi',
            'tgl_transaksi' => 'required|date',
            'supplier' => 'required|exists:supplier,id_supplier',
            'catatan_transaksi' => 'nullable|string',
            'produk' => 'required|array|min:1',
            'produk.*.kode' => 'required|string|max:50',
            'produk.*.jumlah' => 'required|integer|min:1',
            'produk.*.harga_beli' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $totalBayar = collect($validated['produk'])
                ->sum(fn($item) => $item['jumlah'] * $item['harga_beli']);

            // Pastikan nama kolom di DB sesuai, misal supplier_id
            $idPembelian = DB::table('pembelian')->insertGetId([
                'kode_transaksi' => $validated['kode_transaksi'],
                'tgl_pembelian' => $validated['tgl_transaksi'],
                'id_supplier' => $validated['supplier'],  // <--- revisi di sini
                'catatan' => $validated['catatan_transaksi'] ?? null,
                'total_bayar' => $totalBayar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            $detailPembelian = [];
            foreach ($validated['produk'] as $item) {
                $detailPembelian[] = [
                    'id_pembelian' => $idPembelian,
                    'kode_produk' => $item['kode'],
                    'jumlah' => $item['jumlah'],
                    'harga_beli' => $item['harga_beli'],
                    'subtotal' => $item['jumlah'] * $item['harga_beli'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('detail_pembelian')->insert($detailPembelian);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi pembelian berhasil disimpan!'
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Gagal simpan pembelian: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan transaksi. Silakan coba lagi.'
            ], 500);
        }
    }
}
