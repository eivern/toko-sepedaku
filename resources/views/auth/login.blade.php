<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        {{ session('status') }}
    </div>
    @endif

    @if (session('inactive_account'))
    <div class="mb-4 p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
        role="alert">
        <span class="font-medium">Akun Belum Aktif!</span> {{ session('inactive_account') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white mb-6 text-center">Login ke Akun Anda</h5>
        <!-- Email Address -->
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>@enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required autocomplete="current-password">
            @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>@enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" name="remember" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600">
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat
                    saya</label>
            </div>
            @if (Route::has('password.request'))
            <a class="text-sm text-blue-700 hover:underline dark:text-blue-500" href="{{ route('password.request') }}">
                Lupa Password?
            </a>
            @endif
        </div>

        <button type="submit"
            class="w-full mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>

        @if (Route::has('register'))
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-4 text-center">
            Belum punya akun? <a href="{{ route('register') }}"
                class="text-blue-700 hover:underline dark:text-blue-500">Daftar sekarang</a>
        </div>
        @endif
    </form>
</x-guest-layout>