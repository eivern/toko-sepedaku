@extends('layouts.app')
@section('content')
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-4">Daftar Semua Sepeda</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Sepeda</th>
                    <th scope="col" class="px-6 py-3">Pemilik (Admin)</th>
                    <th scope="col" class="px-6 py-3">Harga/Jam</th>
                    <th scope="col" class="px-6 py-3">Stok</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bicycles as $bicycle)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                        $bicycle->name }}</th>
                    <td class="px-6 py-4">{{ $bicycle->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($bicycle->price_per_hour, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $bicycle->stock }}</td>
                    <td class="px-6 py-4">
                        @if($bicycle->status == 'Tersedia')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Tersedia</span>
                        @else
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Tidak
                            Tersedia</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('superadmin.bicycles.edit', $bicycle) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">Tidak ada data sepeda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection