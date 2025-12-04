<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class KategoriProdukController extends Controller
{
    // Tampilkan halaman index + tabel kategori
    public function index()
    {
        $kategoriproduk = KategoriProduk::all(); // Ambil semua kategori
        return view('superadmin.kategoriproduk.index', compact('kategoriproduk'));
    }

    // Simpan data kategori baru dari modal
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('superadmin.kategoriproduk.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Update kategori dari modal edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        $kategori = KategoriProduk::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('superadmin.kategoriproduk.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    // Hapus kategori
    public function destroy($id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        $kategori->delete();

        return redirect()->route('superadmin.kategoriproduk.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }
}
