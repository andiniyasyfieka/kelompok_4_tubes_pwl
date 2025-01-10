<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container bg-white p-6 rounded-lg max-w-2xl mx-auto">
            <h1 class="text-center text-3xl font-bold text-black mb-6">Form Edit Barang</h1>

            <!-- Menampilkan error jika ada -->
            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-md">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Barang -->
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" id="name" name="name" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('name', $item->name) }}" required />
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Barang</label>
                    <input type="text" id="type" name="type" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('type', $item->type) }}" required />
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" id="stock" name="stock" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('stock', $item->stock) }}" required />
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" id="price" name="price" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('price', $item->price) }}" required />
                </div>

                <div class="mb-4">
                    <label for="unit" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <input type="text" id="unit" name="unit" class="block w-full px-4 py-2 mt-2 border rounded-md" value="{{ old('unit', $item->unit) }}" required />
                </div>

                <div class="mb-4 text-center">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow hover:bg-green-600">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
