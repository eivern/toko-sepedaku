@extends('layouts.app')
@section('content')
<div
    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="{{ route('admin.rentals.store') }}" method="POST" id="rental-form">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Buat Transaksi Sewa Baru</h5>

        <div>
            <label for="customer_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Customer</label>
            <select id="customer_id" name="customer_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required>
                <option selected disabled value="">-- Pilih Customer --</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->phone }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bicycle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Sepeda</label>
            <select id="bicycle_id" name="bicycle_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required>
                <option selected disabled value="">-- Pilih Sepeda (Stok > 0) --</option>
                @foreach($bicycles as $bicycle)
                <option value="{{ $bicycle->id }}" data-price="{{ $bicycle->price_per_hour }}">
                    {{ $bicycle->name }} (Stok: {{ $bicycle->stock }}) - Rp {{
                    number_format($bicycle->price_per_hour,0,',','.') }}/jam
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="duration_hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lama Sewa
                (Jam)</label>
            <input type="number" name="duration_hours" id="duration_hours"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Contoh: 2" min="1" required>
        </div>

        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Total Harga: <span id="total-price">Rp 0</span>
            </h3>
        </div>

        <button type="submit"
            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
            Bayar & Kirim Konfirmasi WhatsApp
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bicycleSelect = document.getElementById('bicycle_id');
        const durationInput = document.getElementById('duration_hours');
        const totalPriceEl = document.getElementById('total-price');

        function calculateTotal() {
            const selectedBicycle = bicycleSelect.options[bicycleSelect.selectedIndex];
            const pricePerHour = parseFloat(selectedBicycle.getAttribute('data-price')) || 0;
            const duration = parseInt(durationInput.value) || 0;
            const total = pricePerHour * duration;

            totalPriceEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        bicycleSelect.addEventListener('change', calculateTotal);
        durationInput.addEventListener('input', calculateTotal);
    });
</script>
@endsection