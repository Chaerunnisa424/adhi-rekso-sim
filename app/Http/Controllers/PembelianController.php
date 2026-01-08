<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Pembelian; // <---- Pastikan ini ada
use App\Models\Supplier;

class PembelianController extends Controller
{

public function index(Request $request)
{
    $query = Pembelian::with(['supplier', 'detail']); // eager load relasi

    // Filter berdasarkan supplier
    if ($request->filled('supplier')) {
        $query->where('id_supplier', $request->supplier);
    }

    // Filter berdasarkan tanggal pembelian
    if ($request->filled('tanggal')) {
        $query->whereDate('tgl_pembelian', $request->tanggal);
    }

    // Limit jumlah data per halaman (default 10)
    $limit = $request->input('limit', 10);

    // Ambil data dengan urutan terbaru
    $pembelian = $query->orderBy('tgl_pembelian', 'desc')->paginate($limit);

    // Data supplier untuk dropdown filter
    $suppliers = Supplier::all();

    // Kirim data ke view
    return view('superadmin.pembelian.index', compact('pembelian', 'suppliers'));
}


    public function create()
    {
        $suppliers = DB::table('supplier')->get();
        $produk = DB::table('produk')->get(); // DITAMBAH agar view punya data produk

        return view('superadmin.pembelian.create', compact('suppliers', 'produk'));
    }

    public function destroy($id)
{
    DB::beginTransaction();

    try {
        // Ambil data pembelian beserta detailnya
        $pembelian = Pembelian::with('detail')->findOrFail($id);

        // Kembalikan stok produk sesuai jumlah pembelian sebelum hapus
        foreach ($pembelian->detail as $detail) {
            DB::table('produk')
                ->where('id_produk', $detail->id_produk)
                ->decrement('stok', $detail->jumlah);
        }

        // Hapus detail pembelian
        DB::table('detail_pembelian')->where('id_pembelian', $id)->delete();

        // Hapus pembelian
        $pembelian->delete();

        DB::commit();

        return redirect()->route('superadmin.pembelian.index')
            ->with('success', 'Transaksi pembelian berhasil dihapus.');
    } catch (Exception $e) {
        DB::rollBack();

        Log::error("Gagal menghapus pembelian: " . $e->getMessage());

        return redirect()->route('superadmin.pembelian.index')
            ->with('error', 'Gagal menghapus transaksi pembelian: ' . $e->getMessage());
    }
}


    public function store(Request $request)
    {
        // ============================
        // VALIDASI INPUT
        // ============================
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
            // ============================
            // HITUNG TOTAL BAYAR
            // ============================
            $totalBayar = collect($validated['produk'])
                ->sum(fn($item) => $item['jumlah'] * $item['harga_beli']);

            // ============================
            // SIMPAN HEADER PEMBELIAN
            // ============================
            $idPembelian = DB::table('pembelian')->insertGetId([
                'kode_transaksi' => $validated['kode_transaksi'],
                'tgl_pembelian' => $validated['tgl_transaksi'],
                'id_supplier' => $validated['supplier'],
                'catatan' => $validated['catatan_transaksi'] ?? null,
                'total_bayar' => $totalBayar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $detailPembelian = [];

            // ============================
            // SIMPAN DETAIL + UPDATE STOK
            // ============================
            foreach ($validated['produk'] as $item) {

                // Ambil produk berdasarkan kode
                $produk = DB::table('produk')
                    ->where('kode_produk', $item['kode'])
                    ->first();

                if (!$produk) {
                    throw new Exception("Produk dengan kode {$item['kode']} tidak ditemukan.");
                }

                $detailPembelian[] = [
                    'id_pembelian' => $idPembelian,
                    'id_produk' => $produk->id_produk,
                    'kode_produk' => $produk->kode_produk, // <--- WAJIB
                    'jumlah' => $item['jumlah'],
                    'harga_beli' => $item['harga_beli'],
                    'subtotal' => $item['jumlah'] * $item['harga_beli'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];


                // Update stok produk
                DB::table('produk')
                    ->where('id_produk', $produk->id_produk)
                    ->increment('stok', $item['jumlah']);
            }

            DB::table('detail_pembelian')->insert($detailPembelian);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi pembelian berhasil disimpan!'
            ]);
        }

        catch (Exception $e) {
            DB::rollBack();

            // Log error lengkap
            Log::error("Gagal menyimpan pembelian: " . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}
