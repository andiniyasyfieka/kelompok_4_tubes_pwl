<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan halaman daftar barang untuk transaksi
    public function index()
    {
        $items = Item::all(); // Mengambil semua data barang
        return view('transaksi.index', compact('items')); // Mengirim data barang ke view
    }

    // Menampilkan halaman bayar
    public function create(Request $request)
    {
        $validated = $request->validate([
            'item_ids' => 'required|array|min:1', // items_ids harus berupa array dan minimal memiliki satu elemen
            'item_ids.*' => 'exists:items,id', // Setiap item dalam array harus valid (ada di tabel items)
        ]);

        $items = Item::whereIn('id', $validated['item_ids'])->get();

        return view('transaksi.bayar', compact('items'));
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'item_ids' => 'required|array|min:1',
            'item_ids.*' => 'exists:items,id',
            'quantities' => 'required|array|min:1',
            'quantities.*' => 'integer|min:1',
            'prices' => 'required|array|min:1',
            'prices.*' => 'numeric|min:0',
        ]);

        $totalPrice = array_sum(array_map(function ($price, $quantity) {
            return $price * $quantity;
        }, $validated['prices'], $validated['quantities']));

        $transaksi = Transaksi::create([
            'customer_name' => $validated['customer_name'],
            'total_price' => $totalPrice,
        ]);

        foreach ($validated['item_ids'] as $key => $itemId) {
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'item_id' => $itemId,
                'quantity' => $validated['quantities'][$key],
                'price' => $validated['prices'][$key],
            ]);
        }

        return redirect()->route('transaksi.riwayat')->with('success', 'Transaksi berhasil disimpan!');
    }

    // Menampilkan riwayat transaksi
    public function riwayat()
{
    $transaksis = Transaksi::with('details.item')->get();
    return view('transaksi.riwayat', compact('transaksis'));
}

}
