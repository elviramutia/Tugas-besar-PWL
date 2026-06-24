<nav x-data="{ mobileMenuOpen: false }" class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Side: Logo & Main Links -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center text-white shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm-4 6v-7.5l4-2.222"></path></svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-gray-900 hidden sm:block">SIAKAD</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:-my-px sm:ml-8 sm:flex sm:space-x-8">
                    <!-- Dashboard -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('dosen.dashboard') || request()->routeIs('mahasiswa.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Auth::user()->role === 'admin')
                        <!-- Admin Dropdown -->
                        <div class="hidden sm:flex sm:items-center">
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('admin.*') ? 'text-gray-900 border-b-2 border-rose-500' : '' }} py-5">
                                        <div>Master Data</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase">Data Utama</div>
                                    <x-dropdown-link :href="route('admin.dosen.index')">Dosen</x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.mahasiswa.index')">Mahasiswa</x-dropdown-link>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase">Akademik</div>
                                    <x-dropdown-link :href="route('admin.matakuliah.index')">Mata Kuliah</x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.jadwal.index')">Jadwal & Penugasan</x-dropdown-link>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase">Sistem</div>
                                    <x-dropdown-link :href="route('admin.users.index')">Kelola Pengguna</x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    @if (Auth::user()->role === 'mahasiswa')
                        <x-nav-link :href="route('mahasiswa.krs.index')" :active="request()->routeIs('mahasiswa.krs.*')">Data KRS</x-nav-link>
                        <x-nav-link :href="route('mahasiswa.absensi.index')" :active="request()->routeIs('mahasiswa.absensi.*')">Absensi Kelas</x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side: Profile & Notifications -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 gap-3">
                
                <!-- Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out border border-transparent rounded-full px-1 py-1 hover:bg-gray-50">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-rose-100 text-rose-700 rounded-full flex items-center justify-center font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div class="text-left hidden lg:block">
                                    <div class="text-sm font-semibold text-gray-800 leading-none">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-500 mt-1 capitalize">{{ Auth::user()->role }}</div>
                                </div>
                                <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-medium">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile Menu Toggle) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" class="sm:hidden border-t border-gray-200 bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('dosen.dashboard') || request()->routeIs('mahasiswa.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if (Auth::user()->role === 'admin')
                <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase bg-gray-50 mt-2">Master Data</div>
                <x-responsive-nav-link :href="route('admin.dosen.index')" :active="request()->routeIs('admin.dosen.*')">Dosen</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.mahasiswa.index')" :active="request()->routeIs('admin.mahasiswa.*')">Mahasiswa</x-responsive-nav-link>
                
                <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase bg-gray-50 mt-2">Akademik</div>
                <x-responsive-nav-link :href="route('admin.matakuliah.index')" :active="request()->routeIs('admin.matakuliah.*')">Mata Kuliah</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.*')">Jadwal & Penugasan</x-responsive-nav-link>

                <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase bg-gray-50 mt-2">Pengaturan</div>
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">Kelola Pengguna</x-responsive-nav-link>
            @endif

            @if (Auth::user()->role === 'mahasiswa')
                <x-responsive-nav-link :href="route('mahasiswa.krs.index')" :active="request()->routeIs('mahasiswa.krs.*')">Data KRS</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('mahasiswa.absensi.index')" :active="request()->routeIs('mahasiswa.absensi.*')">Absensi Kelas</x-responsive-nav-link>
            @endif
        </div>

        <!-- Mobile Profile Info -->
        <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-rose-100 text-rose-700 rounded-full flex items-center justify-center font-bold text-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
