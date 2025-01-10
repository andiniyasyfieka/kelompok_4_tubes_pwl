<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Masuk') }}
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
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
    </x-slot>

    <main class="p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
            <div class="mb-6 flex justify-between">
                <a href="{{ route('barang-masuk.create') }}" 
                   class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-blue-600 transition">
                   Tambah Barang
                </a>
            </div>

            <table class="table-auto w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">No.</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">ID Barang</th>
                        <th class="px-4 py-2 text-left">Nama Barang</th>
                        <th class="px-4 py-2 text-left">Jumlah Masuk</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangMasuk as $index => $barang)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $barang->tanggal }}</td>
                            <td class="px-4 py-2">{{ $barang->id_barang }}</td>
                            <td class="px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="px-4 py-2">{{ $barang->jumlah_masuk }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('barang-masuk.edit', $barang->id) }}" 
                                   class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                   Edit
                                </a>
                                <form action="{{ route('barang-masuk.destroy', $barang->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $barangMasuk->links() }}
            </div>
        </div>
    </main>
</x-app-layout>
