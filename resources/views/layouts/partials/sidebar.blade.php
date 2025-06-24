<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @if(auth()->user()->role === 'super_admin')
            <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <span class="ml-3 text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Super Admin
                    Menu</span>
            </li>
            <li>
                <a href="{{ route('superadmin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('superadmin.dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('superadmin.clients.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('superadmin.clients.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-2a5.963 5.963 0 0 1-1-4H7a3 3 0 0 1-3-3v-1a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h1.264A6.957 6.957 0 0 1 15 11Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Client</span>
                </a>
            </li>
            <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <span class="ml-3 text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Pengawasan
                    Global</span>
            </li>
            <li>
                <a href="{{ route('superadmin.rentals.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('superadmin.rentals.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.441V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.262a4.839 4.839 0 0 1-1.12-1.3l-6.118-6.117a2.96 2.96 0 0 1-1.515.81Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Semua Transaksi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('superadmin.bicycles.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('superadmin.bicycles.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6c-3.5 0-6 2.5-6 4s2.5 4 6 4 6-2.5 6-4-2.5-4-6-4Zm0 0V4m0 16v-2m4-11 1.5-1.5M6 11l-1.5-1.5M18 11l1.5 1.5M6 11l-1.5 1.5m10.5 2.5l1.5 1.5M6.5 17l-1.5 1.5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Semua Sepeda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('superadmin.customers.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('superadmin.customers.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-2a5.963 5.963 0 0 1-1-4H7a3 3 0 0 1-3-3v-1a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h1.264A6.957 6.957 0 0 1 15 11Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Semua Customer</span>
                </a>
            </li>
            @elseif(auth()->user()->role === 'admin')
            <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <span class="ml-3 text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Admin Menu</span>
            </li>
            <li>
                <a href="{{ route('admin.rentals.create') }}"
                    class="flex items-center p-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 group">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sewa Baru</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.rentals.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.rentals.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.441V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.262a4.839 4.839 0 0 1-1.12-1.3l-6.118-6.117a2.96 2.96 0 0 1-1.515.81Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Riwayat Transaksi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bicycles.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.bicycles.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6c-3.5 0-6 2.5-6 4s2.5 4 6 4 6-2.5 6-4-2.5-4-6-4Zm0 0V4m0 16v-2m4-11 1.5-1.5M6 11l-1.5-1.5M18 11l1.5 1.5M6 11l-1.5 1.5m10.5 2.5l1.5 1.5M6.5 17l-1.5 1.5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Sepeda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.customers.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.customers.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-2a5.963 5.963 0 0 1-1-4H7a3 3 0 0 1-3-3v-1a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h1.264A6.957 6.957 0 0 1 15 11Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Customer</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>