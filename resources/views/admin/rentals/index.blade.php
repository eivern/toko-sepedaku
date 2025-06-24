@extends('layouts.app')
@section('content')
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Riwayat Transaksi Sewa</h5>
        <a href="{{ route('admin.rentals.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Transaksi Baru
        </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Customer</th>
                    <th scope="col" class="px-6 py-3">Sepeda</th>
                    <th scope="col" class="px-6 py-3">Durasi</th>
                    <th scope="col" class="px-6 py-3">Total Harga</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $rental->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $rental->customer->name }}</td>
                    <td class="px-6 py-4">{{ $rental->bicycle->name }}</td>
                    <td class="px-6 py-4">{{ $rental->duration_hours }} Jam</td>
                    <td class="px-6 py-4">Rp {{ number_format($rental->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{
                            $rental->status }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">Belum ada riwayat transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $rentals->links() }}</div>
</div>
@endsection