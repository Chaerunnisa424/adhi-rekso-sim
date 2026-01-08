<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index(Request $request)
{
    $query = Pengeluaran::orderBy('id_pengeluaran', 'DESC');

    // Jika ada filter tanggal
    if ($request->tgl) {
        $query->where('tgl_pengeluaran', $request->tgl);
    }

    $pengeluaran = $query->paginate(10);

    return view('superadmin.pengeluaran.index', compact('pengeluaran'));
}


    public function create()
    {
        return view('superadmin.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_pengeluaran' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required|numeric'
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('superadmin.pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('superadmin.pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus');
    }

}
