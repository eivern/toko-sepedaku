<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">
            Perbarui Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                Saat Ini</label>
            <input type="password" name="current_password" id="current_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                autocomplete="current-password" />
            @error('current_password', 'updatePassword')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{
                $message }}</p>@enderror
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                Baru</label>
            <input type="password" name="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                autocomplete="new-password" />
            @error('password', 'updatePassword')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
            </p>@enderror
        </div>

        <div>
            <label for="password_confirmation"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{
                $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Simpan</button>
            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">Tersimpan.</p>
            @endif
        </div>
    </form>
</section>