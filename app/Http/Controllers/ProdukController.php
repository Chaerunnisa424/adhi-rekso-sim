<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * LIST DATA PRODUK
     */
    public function index()
    {
        $produk = DB::table('produk')
                    ->leftJoin('kategori_produk', 'produk.id_kategori', '=', 'kategori_produk.id_kategori')
                    ->select(
                        'produk.*',
                        'kategori_produk.nama_kategori'
                    )
                    ->orderBy('produk.id_produk', 'DESC')
                    ->get();

        return view('superadmin.produk.index', compact('produk'));
    }

    /**
     * FORM TAMBAH PRODUK
     */
    public function create()
    {
        $kategori = DB::table('kategori_produk')->get();
        return view('superadmin.produk.create', compact('kategori'));
    }

    /**
     * SIMPAN DATA PRODUK
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_produk'   => 'required|unique:produk',
            'nama_produk'   => 'required',
            'id_kategori'   => 'required|numeric',
            'satuan'        => 'required',
            'harga_beli'    => 'required|numeric',
            'harga_jual'    => 'required|numeric',
            'stok'          => 'required|numeric',
            'stok_minimum'  => 'nullable|numeric',
        ]);

        Produk::create([
            'kode_produk'   => $request->kode_produk,
            'nama_produk'   => $request->nama_produk,
            'id_kategori'   => $request->id_kategori,
            'satuan'        => $request->satuan,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual,
            'stok'          => $request->stok,
            'stok_minimum'  => $request->stok_minimum,
        ]);

        return redirect()->route('superadmin.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * FORM EDIT PRODUK
     */
    public function edit($id_produk)
{
    $produk = Produk::findOrFail($id_produk);
        $kategori = DB::table('kategori_produk')->get();

        return view('superadmin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * UPDATE PRODUK
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'   => 'required',
            'id_kategori'   => 'required|numeric',
            'satuan'        => 'required',
            'harga_beli'    => 'required|numeric',
            'harga_jual'    => 'required|numeric',
            'stok'          => 'required|numeric',
            'stok_minimum'  => 'nullable|numeric',
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk'   => $request->nama_produk,
            'id_kategori'   => $request->id_kategori,
            'satuan'        => $request->satuan,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual,
            'stok'          => $request->stok,
            'stok_minimum'  => $request->stok_minimum,
        ]);

        return redirect()->route('superadmin.produk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * HAPUS PRODUK
     */
    public function destroy($id)
    {
        Produk::destroy($id);

        return redirect()->route('superadmin.produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
