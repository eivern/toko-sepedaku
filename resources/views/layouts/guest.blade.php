<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SewaSepedaku') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/" class="flex items-center mb-6">
                <svg class="h-10 me-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#3b82f6"
                        d="M352 160c-1.3 0-2.6.1-3.9.2-3.2-33.6-22.3-64.8-48.3-88.8-26.6-24.6-60-39.4-95.8-39.4-44.1 0-85.3 20.3-112.3 54.3-27.1 34-41.7 78.4-41.7 124.9 0 46.5 14.6 90.9 41.7 124.9 27 34 68.2 54.3 112.3 54.3 35.8 0 69.2-14.8 95.8-39.4 26-24 45.1-55.2 48.3-88.8 1.3.1 2.6.2 3.9.2 44.2 0 80-35.8 80-80s-35.8-80-80-80zM204 288c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm148-80c-22.1 0-40 17.9-40 40s17.9 40 40 40 40-17.9 40-40-17.9-40-40-40z" />
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SewaSepedaku</span>
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>