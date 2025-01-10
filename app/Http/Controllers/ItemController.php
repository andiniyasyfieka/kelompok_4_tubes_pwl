<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $items = Item::all(); // Mengambil semua data barang
        return view('items.index', compact('items')); // Mengirim data ke view
    }

    // Menampilkan form tambah barang
    public function create()
    {
        return view('items.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'item_id' => 'required|unique:items',
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'unit' => 'required',
        ]);

        // Simpan data barang
        Item::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Menampilkan form edit barang
    public function edit($id)
    {
        $item = Item::findOrFail($id); // Mencari barang berdasarkan ID
        return view('items.edit', compact('item')); // Mengirim data barang ke form edit
    }

    // Mengupdate data barang
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|string', // Masukkan sebagai string karena ada pemrosesan format
            'unit' => 'required|string|max:255',
        ]);

        // Format harga (hilangkan titik sebelum disimpan)
        $request->merge(['price' => str_replace('.', '', $request->price)]);

        // Cari item berdasarkan ID
        $item = Item::findOrFail($id);

        // Update data barang
        $item->update([
            'name' => $request->name,
            'type' => $request->type,
            'stock' => $request->stock,
            'price' => $request->price,
            'unit' => $request->unit,
        ]);

        // Redirect dengan pesan sukses ke halaman index
        return redirect()->route('items.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $item = Item::find($id);
        
        if ($item) {
            $item->delete();
            return response()->json(['success' => 'Barang berhasil dihapus.']);
        }

        return response()->json(['error' => 'Barang tidak ditemukan.'], 404);
    }
}
