<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // Menampilkan Daftar Barang Keluar
    public function index()
    {
        $barangKeluar = BarangKeluar::paginate(10); // Menampilkan 10 data per halaman
        return view('barang-keluar.index', compact('barangKeluar'));
    }

    // Menampilkan Form untuk Menambah Barang Keluar
    public function create()
    {
        return view('barang-keluar.create');
    }

    // Menyimpan Data Barang Keluar Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_transaksi' => 'required|unique:barang_keluar,id_transaksi',
            'tanggal' => 'required|date',
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah_keluar' => 'required|integer',
        ]);

        BarangKeluar::create($validated);
        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    // Menampilkan Form untuk Mengedit Barang Keluar
    public function edit($id)
    {
        $barang = BarangKeluar::findOrFail($id);  // Get the barang by its ID
        return view('barang-keluar.edit', compact('barang'));  // Pass the data to the view
    }

    // Update the specified Barang Keluar in the database
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'id_transaksi' => 'required|string|max:255',
            'id_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jumlah_keluar' => 'required|integer|min:1',
        ]);

        // Find the barang and update it
        $barang = BarangKeluar::findOrFail($id);
        $barang->update([
            'id_transaksi' => $request->id_transaksi,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_keluar' => $request->jumlah_keluar,
        ]);

        // Redirect back with a success message
        return redirect()->route('barang-keluar.index')->with('success', 'Barang Keluar updated successfully!');
    }
    public function destroy($id)
    {
        // Find the Barang Keluar by ID
        $barang = BarangKeluar::findOrFail($id);

        // Delete the Barang Keluar
        $barang->delete();

        // Redirect to the index page with a success message
        return redirect()->route('barang-keluar.index')->with('success', 'Barang Keluar deleted successfully!');
    }
}