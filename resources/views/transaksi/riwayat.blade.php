<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Riwayat Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Riwayat Transaksi</h1>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID Transaksi</th> <!-- Kolom ID Transaksi -->
                                <th class="border border-gray-300 px-4 py-2">Nama Pelanggan</th>
                                <th class="border border-gray-300 px-4 py-2">Total Bayar</th>
                                <th class="border border-gray-300 px-4 py-2">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksis as $transaksi)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->id }}</td> <!-- Menampilkan ID Transaksi -->
                                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->customer_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($transaksi->total_price, 0, ',', '.') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @foreach($transaksi->details as $detail)
                                            <p>{{ $detail->item->name }} ({{ $detail->quantity }}) - Rp{{ number_format($detail->price, 0, ',', '.') }}</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-gray-500 py-4">Belum ada transaksi</td> <!-- Sesuaikan dengan jumlah kolom -->
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
