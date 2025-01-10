<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-gray-200 leading-tight">
            {{ __('Halaman Pembayaran') }}
        </h2>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <div class="container mx-auto p-6 bg-white shadow-lg max-w-4xl">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                        <input type="text" name="customer_name" id="customer_name" placeholder="Nama Pelanggan" 
                            class="mt-1 px-4 py-2 border rounded-md w-full" required />
                    </div>

                    <div>
                        @foreach($items as $item)
                            <input type="hidden" name="item_ids[]" value="{{ $item->id }}">
                            <input type="hidden" name="prices[]" value="{{ $item->price }}">
                            <div class="mb-4">
                                <p class="font-semibold">{{ $item->name }} - Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                <label for="quantity-{{ $item->id }}" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="quantities[]" value="1" min="1" 
                                    id="quantity-{{ $item->id }}" class="mt-1 px-4 py-2 border rounded-md w-full" />
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <p>Total Bayar: <span id="totalBayar" class="font-semibold text-lg">0</span></p>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const quantities = document.querySelectorAll('input[name="quantities[]"]');
        const prices = document.querySelectorAll('input[name="prices[]"]');
        const totalBayar = document.getElementById('totalBayar');

        function updateTotal() {
            let total = 0;
            quantities.forEach((qty, index) => {
                total += qty.value * prices[index].value;
            });
            totalBayar.textContent = total.toLocaleString();
        }

        quantities.forEach(qty => qty.addEventListener('input', updateTotal));
        updateTotal();
    </script>
</x-app-layout>
