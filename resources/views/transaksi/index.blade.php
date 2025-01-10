<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-gray-200 leading-tight">
            {{ __('Pilih Barang') }}
        </h2>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800 dark:bg-gray-800">
        <div class="container mx-auto p-6 bg-white dark:bg-gray-900 shadow-lg rounded-lg max-w-5xl">
            <div class="mb-4">
                <input 
                    type="text" 
                    id="searchBar" 
                    placeholder="Cari Barang..." 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300"
                >
            </div>
            <form action="{{ route('transaksi.create') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="itemsContainer">
                    @foreach($items as $item)
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 item">
                            <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2 item-name">
                                {{ $item->name }}
                            </h5>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong>Jenis:</strong> {{ $item->type }}<br>
                                <strong>Harga:</strong> Rp{{ number_format($item->price, 0, ',', '.') }}<br>
                                <strong>Stok:</strong> {{ $item->stock }} {{ $item->unit }}
                            </p>
                            <div class="mt-3">
                                <label class="inline-flex items-center">
                                    <input 
                                        type="checkbox" 
                                        class="form-checkbox h-5 w-5 text-blue-600" 
                                        name="item_ids[]" 
                                        value="{{ $item->id }}">
                                    <span class="ml-2 text-gray-800 dark:text-gray-200">Pilih Barang</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Lanjut ke Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const searchBar = document.getElementById('searchBar');
        const itemsContainer = document.getElementById('itemsContainer');
        const items = itemsContainer.getElementsByClassName('item');

        searchBar.addEventListener('input', function () {
            const query = searchBar.value.toLowerCase();

            Array.from(items).forEach(item => {
                const itemName = item.querySelector('.item-name').textContent.toLowerCase();
                if (itemName.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
