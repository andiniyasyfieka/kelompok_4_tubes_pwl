<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-gray-200 leading-tight">
            {{ __('Edit Barang Keluar') }}
        </h2>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg max-w-4xl">
            <form action="{{ route('barang-keluar.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="id_transaksi" class="block text-sm font-medium text-gray-700">ID Transaksi</label>
                        <input type="text" name="id_transaksi" id="id_transaksi" value="{{ old('id_transaksi', $barang->id_transaksi) }}" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $barang->tanggal) }}" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>
                    <div>
                        <label for="id_barang" class="block text-sm font-medium text-gray-700">ID Barang</label>
                        <input type="text" name="id_barang" id="id_barang" value="{{ old('id_barang', $barang->id_barang) }}" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>
                    <div>
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>
                    <div>
                        <label for="jumlah_keluar" class="block text-sm font-medium text-gray-700">Jumlah Keluar</label>
                        <input type="number" name="jumlah_keluar" id="jumlah_keluar" value="{{ old('jumlah_keluar', $barang->jumlah_keluar) }}" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>
                    <div class="mt-6">
                        <button type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
