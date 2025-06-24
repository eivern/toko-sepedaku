@extends('layouts.app')
@section('content')
<div
    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="{{ route('admin.bicycles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Tambah Sepeda Baru</h5>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sepeda</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Sepeda Gunung" required value="{{ old('name') }}">
        </div>
        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Sepeda</label>
            <input type="text" name="type" id="type"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="MTB, Road Bike, dll" required value="{{ old('type') }}">
        </div>
        <div>
            <label for="price_per_hour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Sewa
                / Jam</label>
            <input type="number" name="price_per_hour" id="price_per_hour"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="25000" required value="{{ old('price_per_hour') }}">
        </div>
        <div>
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
            <input type="number" name="stock" id="stock"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="10" required value="{{ old('stock') }}">
        </div>
        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status" name="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="Tersedia" @selected(old('status')=='Tersedia' )>Tersedia</option>
                <option value="Tidak Tersedia" @selected(old('status')=='Tidak Tersedia' )>Tidak Tersedia</option>
            </select>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Foto
                Sepeda</label>
            <input name="image" id="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">PNG, JPG, WEBP (MAX. 2MB).</p>
        </div>
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan
            Sepeda</button>
    </form>
</div>
@endsection