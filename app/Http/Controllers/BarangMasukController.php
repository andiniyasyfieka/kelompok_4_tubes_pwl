<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::paginate(10);
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        return view('barang-masuk.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'id_barang' => 'required|string|max:255',
        'nama_barang' => 'required|string|max:255',
        'jumlah_masuk' => 'required|integer|min:1',
    ]);

    BarangMasuk::create($validatedData);

    return redirect()->route('barang-masuk.index')->with('success', 'Data berhasil ditambahkan.');
}

    public function destroy($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Data berhasil dihapus.');
    }
    public function edit($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        return view('barang-masuk.edit', compact('barang'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'id_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jumlah_masuk' => 'required|integer|min:1',
        ]);

        // Mencari data barang yang akan di-update
        $barang = BarangMasuk::findOrFail($id);

        // Update data barang
        $barang->update([
            'tanggal' => $request->tanggal,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_masuk' => $request->jumlah_masuk,
        ]);

        // Redirect ke halaman index setelah berhasil update
        return redirect()->route('barang-masuk.index')->with('success', 'Data barang berhasil di-update.');
    }
}


