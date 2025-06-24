<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white mb-6 text-center">Buat Akun Baru</h5>

        <!-- Name -->
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>@enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                value="{{ old('email') }}" required autocomplete="username">
            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>@enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                required autocomplete="new-password">
            @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>@enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                required autocomplete="new-password">
            @error('password_confirmation')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:text-white"
                href="{{ route('login') }}">
                Sudah punya akun?
            </a>
        </div>

        <button type="submit"
            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
    </form>
</x-guest-layout>