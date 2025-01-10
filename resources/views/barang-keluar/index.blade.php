<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Keluar') }}
        </h2>
        <div class="flex items-center mt-4 space-x-3">
            <input id="searchInput" type="text" placeholder="Cari data barang..." 
                class="flex-grow px-4 py-2 border rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" 
                onkeyup="filterData()" />
            <div class="flex items-center space-x-2">
                <label for="show" class="text-sm text-gray-600">Tampilkan:</label>
                <select id="show" 
                    class="px-5 py-1 border rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <option value="0">0</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
            <div class="mb-6 flex justify-between items-center">
                <a href="{{ route('barang-keluar.create') }}" 
                    class="btn btn-success px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-green-600 transition ease-in-out duration-300">
                    Tambah Barang 
                </a>
            </div>

            <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">No.</th>
                        <th class="px-4 py-2 text-left">ID Transaksi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">ID Barang</th>
                        <th class="px-4 py-2 text-left">Nama Barang</th>
                        <th class="px-4 py-2 text-left">Jumlah Keluar</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach ($barangKeluar as $index => $barang)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $barang->id_transaksi }}</td>
                        <td class="px-4 py-2">{{ $barang->tanggal }}</td>
                        <td class="px-4 py-2">{{ $barang->id_barang }}</td>
                        <td class="px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="px-4 py-2">{{ $barang->jumlah_keluar }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('barang-keluar.edit', $barang->id) }}" 
                                class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('barang-keluar.destroy', $barang->id) }}" method="POST" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 flex justify-between items-center">
                <p class="text-sm text-gray-500">Menampilkan {{ $barangKeluar->count() }} dari {{ $barangKeluar->total() }} data</p>
                <div>
                    {{ $barangKeluar->links() }}
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center mt-6 text-gray-500">
        <p>© 2025 - Sistem Penjualan Barang</p>
    </footer>
</x-app-layout>

<script>
    function filterData() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');
        rows.forEach(row => {
            const rowText = row.innerText.toLowerCase();
            if (rowText.includes(input)) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
