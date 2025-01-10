<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome!!') }}
        </h2>
        <div class="flex items-center mt-4">
            <input id="searchInput" type="text" placeholder="Cari data barang..." class="flex-grow px-4 py-2 border rounded-lg shadow-sm" onkeyup="filterData()" />
        </div>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-center text-3xl font-bold text-black mb-6">Data Barang</h1>

            <!-- Pesan sukses -->
            @if(session('success'))
                <div class="success-message bg-blue-100 text-white p-4 rounded-lg mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah Barang -->
            <div style="text-align: right; margin-bottom: 20px;">
                <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-600">Tambah Barang</a>
            </div>

            <!-- Tabel Data Barang -->
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">ID Barang</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Jenis Barang</th>
                        <th class="border px-4 py-2">Stok</th>
                        <th class="border px-4 py-2">Harga</th>
                        <th class="border px-4 py-2">Satuan</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $item)
                        <tr class="text-center {{ $loop->even ? 'bg-gray-100' : '' }}">
                            <td class="border px-4 py-2">{{ $key + 1 }}</td>
                            <td class="border px-4 py-2">{{ $item->item_id }}</td>
                            <td class="border px-4 py-2">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->type }}</td>
                            <td class="border px-4 py-2">{{ $item->stock }}</td>
                            <td class="border px-4 py-2">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $item->unit }}</td>
                            <td class="border px-4 py-2">
                                <div class="action-buttons flex justify-center gap-2">
                                    <a href="{{ route('items.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded shadow hover:bg-yellow-600">Edit</a>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600" onclick="deleteItem({{ $item->id }})">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer class="text-center mt-6 text-gray-500">
        <p>© 2025 - Sistem Penjualan Barang</p>
    </footer>
</x-app-layout>

<script>
    function deleteItem(id) {
        if (confirm('Yakin ingin menghapus barang ini?')) {
            fetch(`/items/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    alert('Barang berhasil dihapus.');
                    location.reload(); // Refresh halaman
                } else {
                    alert('Terjadi kesalahan saat menghapus barang.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus barang.');
            });
        }
    }

    // Fungsi Filter Data Barang
    function filterData() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const rowText = row.innerText.toLowerCase();
            row.style.display = rowText.includes(input) ? '' : 'none';
        });
    }
</script>
