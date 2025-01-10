<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-gray-200 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container bg-white p-6 rounded-lg max-w-2xl mx-auto">
            <h1 class="text-center text-3xl font-bold text-black mb-6">Form Tambah Barang</h1>

            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="item_id" class="block text-sm font-medium text-gray-700">ID Barang</label>
                    <input type="text" id="item_id" name="item_id" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('item_id') }}" required />
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" id="name" name="name" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('name') }}" required />
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Barang</label>
                    <input type="text" id="type" name="type" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('type') }}" required />
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" id="stock" name="stock" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('stock') }}" required />
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" id="price" name="price" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('price') }}" required />
                </div>

                <div class="mb-4">
                    <label for="unit" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <input type="text" id="unit" name="unit" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('unit') }}" required />
                </div>

                <div class="mb-4 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600">Simpan Barang</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
