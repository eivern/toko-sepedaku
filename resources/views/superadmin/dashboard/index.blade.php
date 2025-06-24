@extends('layouts.app')
@section('content')
<h3 class="text-2xl font-bold dark:text-white mb-4">Dashboard Super Admin</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $stats['total_clients'] }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total Client Aktif</p>
    </div>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $stats['total_bicycles'] }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total Sepeda Terdaftar</p>
    </div>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $stats['total_rentals'] }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total Transaksi</p>
    </div>
    <div
        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 col-span-1 sm:col-span-2 lg:col-span-3">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp {{
            number_format($stats['total_revenue'], 0, ',', '.') }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total Pendapatan Tercatat</p>
    </div>
</div>
@endsection