<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Barang Masuk
        </h2>
    </x-slot>

    <main class="p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg max-w-4xl">
            <form action="{{ route('barang-masuk.store') }}" method="POST">
                @csrf <!-- Token untuk melindungi dari CSRF -->

                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="id_barang" class="block text-gray-700">ID Barang</label>
                    <input type="text" id="id_barang" name="id_barang" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" required 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="jumlah_masuk" class="block text-gray-700">Jumlah Masuk</label>
                    <input type="number" id="jumlah_masuk" name="jumlah_masuk" required min="1" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('barang-masuk.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                       Kembali
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
