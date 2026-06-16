<div class="hidden sm:flex w-64 bg-[#1e1b4b] text-white flex-col h-screen fixed inset-y-0 left-0 z-50">
    <!-- Logo -->
    <div class="flex items-center justify-center h-20 border-b border-indigo-900/50">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            </div>
            <span class="text-xl font-bold tracking-wider">SIAKAD</span>
        </a>
    </div>

    <!-- Navigation Menu -->
    <div class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('dosen.dashboard') || request()->routeIs('mahasiswa.dashboard')" icon="home">
            {{ __('Dashboard') }}
        </x-sidebar-link>

        @if (Auth::user()->role === 'admin')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Data Dosen & Mahasiswa</p>
            
            <x-sidebar-link :href="route('admin.dosen.index')" :active="request()->routeIs('admin.dosen.*')" icon="users">
                Dosen
            </x-sidebar-link>
            
            <x-sidebar-link :href="route('admin.mahasiswa.index')" :active="request()->routeIs('admin.mahasiswa.*')" icon="academic-cap">
                Mahasiswa
            </x-sidebar-link>
            
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>

            <x-sidebar-link :href="route('admin.matakuliah.index')" :active="request()->routeIs('admin.matakuliah.*')" icon="book-open">
                Mata Kuliah
            </x-sidebar-link>
            
            <x-sidebar-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.*')" icon="calendar">
                Jadwal & Penugasan
            </x-sidebar-link>
        @endif

        @if (Auth::user()->role === 'mahasiswa')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>
            <x-sidebar-link :href="route('mahasiswa.krs.index')" :active="request()->routeIs('mahasiswa.krs.*')" icon="document-text">
                Data KRS
            </x-sidebar-link>
            <x-sidebar-link :href="route('mahasiswa.absensi.index')" :active="request()->routeIs('mahasiswa.absensi.*')" icon="calendar">
                Absensi Kelas
            </x-sidebar-link>
        @endif

        @if (Auth::user()->role === 'dosen')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>
            <x-sidebar-link :href="route('dosen.jadwal.index')" :active="request()->routeIs('dosen.jadwal.*') || request()->routeIs('dosen.absensi.*')" icon="calendar">
                Jadwal Mengajar
            </x-sidebar-link>
        @endif
    </div>
    
    <!-- User Profile Snippet (Bottom) -->
    <div class="p-4 border-t border-indigo-900/50 bg-[#171440]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-indigo-300 truncate capitalize">{{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Backdrop -->
<div x-show="sidebarOpen" class="fixed inset-0 z-40 bg-gray-900/80 backdrop-blur-sm sm:hidden transition-opacity" @click="sidebarOpen = false"></div>

<!-- Mobile Sidebar -->
<div x-show="sidebarOpen" 
     class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1e1b4b] text-white transition-transform transform sm:hidden flex flex-col"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full">
    
    <!-- Mobile Sidebar Content (Same as above) -->
    <div class="flex items-center justify-between h-20 px-4 border-b border-indigo-900/50">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
             <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            </div>
            <span class="text-lg font-bold tracking-wider">SIAKAD Pro</span>
        </a>
        <button @click="sidebarOpen = false" class="p-2 rounded-md text-indigo-300 hover:text-white hover:bg-indigo-800 focus:outline-none">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="home">
            {{ __('Dashboard') }}
        </x-sidebar-link>

        @if (Auth::user()->role === 'admin')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Master Data</p>
            <x-sidebar-link :href="route('admin.dosen.index')" :active="request()->routeIs('admin.dosen.*')" icon="users">Dosen</x-sidebar-link>
            <x-sidebar-link :href="route('admin.mahasiswa.index')" :active="request()->routeIs('admin.mahasiswa.*')" icon="academic-cap">Mahasiswa</x-sidebar-link>
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>
            <x-sidebar-link :href="route('admin.matakuliah.index')" :active="request()->routeIs('admin.matakuliah.*')" icon="book-open">Mata Kuliah</x-sidebar-link>
            <x-sidebar-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.*')" icon="calendar">Jadwal</x-sidebar-link>
        @endif
        @if (Auth::user()->role === 'mahasiswa')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>
            <x-sidebar-link :href="route('mahasiswa.krs.index')" :active="request()->routeIs('mahasiswa.krs.*')" icon="document-text">Data KRS</x-sidebar-link>
            <x-sidebar-link :href="route('mahasiswa.absensi.index')" :active="request()->routeIs('mahasiswa.absensi.*')" icon="calendar">Absensi Kelas</x-sidebar-link>
        @endif
        @if (Auth::user()->role === 'dosen')
            <p class="px-3 pt-4 pb-2 text-xs font-semibold text-indigo-300 uppercase tracking-wider">Akademik</p>
            <x-sidebar-link :href="route('dosen.jadwal.index')" :active="request()->routeIs('dosen.jadwal.*') || request()->routeIs('dosen.absensi.*')" icon="calendar">Jadwal Mengajar</x-sidebar-link>
        @endif
    </div>

    <!-- User Profile Snippet (Bottom) -->
    <div class="p-4 border-t border-indigo-900/50 bg-[#171440]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-indigo-300 truncate capitalize">{{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>
</div>
