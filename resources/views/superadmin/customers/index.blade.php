@extends('layouts.app')
@section('content')
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-4">Daftar Semua Customer</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Customer</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Pemilik Data (Admin)</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                        $customer->name }}</th>
                    <td class="px-6 py-4">{{ $customer->phone }}</td>
                    <td class="px-6 py-4">{{ $customer->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('superadmin.customers.edit', $customer) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <!-- Modal Button -->
                        <button data-modal-target="delete-customer-{{$customer->id}}"
                            data-modal-toggle="delete-customer-{{$customer->id}}"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Hapus</button>
                    </td>
                </tr>
                <!-- Delete Modal -->
                <div id="delete-customer-{{$customer->id}}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin
                                    menghapus customer ini?</h3>
                                <form action="{{ route('superadmin.customers.destroy', $customer) }}" method="POST"
                                    class="inline-flex">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2">Ya,
                                        hapus</button>
                                </form>
                                <button data-modal-hide="delete-customer-{{$customer->id}}" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">Tidak ada data customer.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection