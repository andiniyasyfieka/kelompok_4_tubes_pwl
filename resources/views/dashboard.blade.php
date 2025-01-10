<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="flex items-center mt-4">
            <input id="searchInput" type="text" placeholder="Cari data..." class="flex-grow px-4 py-2 border rounded-lg shadow-sm" onkeyup="filterData()" />
        </div>
    </x-slot>

    <main class="flex-grow p-6 bg-gray-800">
        <!-- Kontainer Cards -->
        <div id="cardContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md flex flex-col justify-between" data-name="Data Barang">
                <div>
                    <h3 class="text-lg font-semibold">Data Barang</h3>
                </div>
                <div class="mt-4 bg-white text-black px-4 py-2 rounded-lg">
                    <span>Jumlah: 50</span>
                </div>
            </div>

            <!-- Card Stok Barang -->
            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md flex flex-col justify-between" data-name="Stok Barang">
                <div>
                    <h3 class="text-lg font-semibold">Stok Barang</h3>
                </div>
                <div class="mt-4 bg-white text-black px-4 py-2 rounded-lg">
                    <span>Jumlah: 20</span>
                </div>
            </div>

            <!-- Card User -->
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md flex flex-col justify-between" data-name="User">
                <div>
                    <h3 class="text-lg font-semibold">User</h3>
                </div>
                <div class="mt-4 bg-white text-black px-4 py-2 rounded-lg">
                    <span>Jumlah: 10</span>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Area Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Area Chart Example</h3>
                <canvas id="areaChart"></canvas>
            </div>

            <!-- Bar Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Bar Chart Example</h3>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </main>
    <footer class="text-center mt-6 text-gray-500">
            <p>© 2025 - Sistem Penjualan Barang</p>
        </footer>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fungsi Filter Data
    function filterData() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('#cardContainer > div');

        cards.forEach(card => {
            const cardName = card.getAttribute('data-name').toLowerCase();
            if (cardName.includes(input)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }

    // Data untuk Area Chart
    const areaData = {
        labels: ['Mar 1', 'Mar 3', 'Mar 5', 'Mar 7', 'Mar 9', 'Mar 11', 'Mar 13'],
        datasets: [{
            label: 'Dataset',
            data: [10000, 20000, 15000, 30000, 25000, 35000, 40000],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            fill: true,
        }]
    };

    // Data untuk Bar Chart
    const barData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
        datasets: [{
            label: 'Dataset',
            data: [3000, 5000, 7000, 9000, 12000, 15000],
            backgroundColor: 'rgba(75, 192, 192, 0.8)',
            borderWidth: 1,
        }]
    };

    // Inisialisasi Area Chart
    const ctxArea = document.getElementById('areaChart').getContext('2d');
    new Chart(ctxArea, {
        type: 'line',
        data: areaData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
        }
    });

    // Inisialisasi Bar Chart
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: barData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
        }
    });
</script>
