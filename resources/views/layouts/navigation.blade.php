<header class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left Side -->
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = true" class="sm:hidden p-2 rounded-md text-gray-500 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <!-- Page Title / Breadcrumbs (Optional) -->
                @isset($header)
                    <div class="hidden sm:block ml-4 text-xl font-semibold text-gray-800">
                        {{ $header }}
                    </div>
                @else
                    <div class="hidden sm:block ml-4 text-xl font-semibold text-gray-800 capitalize">
                        {{ str_replace('.', ' / ', Route::currentRouteName() ?? 'SIAKAD') }}
                    </div>
                @endisset
            </div>

            <!-- Right Side (Search, Notifications, Profile) -->
            <div class="flex items-center gap-4">
                
                <!-- Search Placeholder -->
                <div class="hidden md:block relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-full leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors" placeholder="Search...">
                </div>

                <!-- Notifications -->
                <button class="relative p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-full hover:bg-gray-100 transition-colors">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <!-- Notification dot -->
                    <span class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative ml-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                <span class="sr-only">Open user menu</span>
                                <div class="flex items-center gap-2 pr-2 pl-1 py-1 bg-indigo-50 border border-indigo-200 rounded-full hover:bg-indigo-100 transition-colors shadow-sm">
                                    <div class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold shadow-inner">
                                         {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <span class="hidden md:block text-sm font-bold text-indigo-900">{{ Auth::user()->name }}</span>
                                    <svg class="hidden md:block w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Info -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm">Signed in as</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="mt-1">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <div class="border-t border-gray-100 mt-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-red-600 hover:text-red-800 hover:bg-red-50 font-bold flex items-center gap-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</header>
