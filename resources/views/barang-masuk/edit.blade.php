<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Barang Masuk
        </h2>
    </x-slot>

    <main class="p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg max-w-4xl">
            <form action="{{ route('barang-masuk.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ $barang->tanggal }}" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- ID Barang -->
                <div class="mb-4">
                    <label for="id_barang" class="block text-gray-700">ID Barang</label>
                    <input type="text" id="id_barang" name="id_barang" value="{{ $barang->id_barang }}" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Nama Barang -->
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Jumlah Masuk -->
                <div class="mb-4">
                    <label for="jumlah_masuk" class="block text-gray-700">Jumlah Masuk</label>
                    <input type="number" id="jumlah_masuk" name="jumlah_masuk" value="{{ $barang->jumlah_masuk }}" required min="1" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between">
                    <a href="{{ route('barang-masuk.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                       Kembali
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
