@extends('layouts.app')
@section('content')
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Manajemen Client (Admin)</h5>
        <a href="{{ route('superadmin.clients.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
            Client</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                        $client->name }}</th>
                    <td class="px-6 py-4">{{ $client->email }}</td>
                    <td class="px-6 py-4">
                        @if($client->status == 'active')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                        @else
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Suspended</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-3">
                        <form action="{{ route('superadmin.clients.updateStatus', $client) }}" method="POST"
                            class="inline-block">
                            @csrf @method('PATCH')
                            <button type="submit"
                                class="font-medium {{ $client->status == 'active' ? 'text-yellow-500 hover:underline' : 'text-green-500 hover:underline' }}">
                                {{ $client->status == 'active' ? 'Suspend' : 'Aktifkan' }}
                            </button>
                        </form>
                        <a href="{{ route('superadmin.clients.edit', $client) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button data-modal-target="delete-modal-{{$client->id}}"
                            data-modal-toggle="delete-modal-{{$client->id}}"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                    </td>
                </tr>
                <!-- (Modal Hapus tidak berubah) -->
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="4" class="px-6 py-4 text-center">Belum ada data client.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection