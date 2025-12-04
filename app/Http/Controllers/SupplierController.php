<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Tampilkan data supplier
    public function index()
    {
        $supplier = Supplier::all();
        return view('superadmin.supplier.index', compact('supplier'));
    }

    // Simpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Supplier berhasil ditambahkan!');
    }

    // Ambil data untuk edit (AJAX)
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Supplier berhasil diperbarui!');
    }

    // Hapus supplier
    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        return back()->with('success', 'Supplier berhasil dihapus!');
    }
}
