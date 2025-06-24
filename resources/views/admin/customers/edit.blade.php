@extends('layouts.app')
@section('content')
<div
    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="{{ route('admin.customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Customer: {{ $customer->name }}</h5>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Customer</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nama Lengkap" required value="{{ old('name', $customer->name) }}">
        </div>
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                Telepon</label>
            <input type="tel" name="phone" id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="08xxxxxxxx" required value="{{ old('phone', $customer->phone) }}">
        </div>
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                (Opsional)</label>
            <textarea id="address" name="address" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Tulis alamat lengkap customer...">{{ old('address', $customer->address) }}</textarea>
        </div>
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Perbarui
            Customer</button>
    </form>
</div>
@endsection