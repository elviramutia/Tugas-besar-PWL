<x-guest-layout>
    <!-- Split Screen Container -->
    <div class="min-h-screen w-full flex bg-white">
        
        <!-- Left Side: Branding / Hero (Hidden on Mobile) -->
        <div class="hidden lg:flex lg:w-1/2 bg-rose-600 relative overflow-hidden flex-col justify-center px-16">
            <!-- Decorative Elements -->
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-rose-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            
            <div class="relative z-10 text-white space-y-6">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-rose-600 shadow-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                    <span class="text-3xl font-extrabold tracking-wider">SIAKAD</span>
                </div>
                
                <h1 class="text-5xl font-bold leading-tight">
                    Sistem Informasi <br> Akademik Sederhana
                </h1>
                
                <p class="text-rose-100 text-lg max-w-md leading-relaxed mt-4">
                    Selamat datang di portal akademik. Kelola administrasi, jadwal kelas, dan kehadiran mahasiswa secara cerdas dan efisien.
                </p>
            </div>
            
            <div class="absolute bottom-8 left-16 text-rose-200 text-sm">
                &copy; {{ date('Y') }} Elvira SIAKAD Project. All rights reserved.
            </div>
        </div>
        
        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-16 lg:p-24 bg-gray-50 lg:bg-white">
            <div class="w-full max-w-md space-y-8">
                
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center gap-3 justify-center mb-8">
                    <div class="w-10 h-10 bg-rose-600 rounded-lg flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                    <span class="text-2xl font-extrabold tracking-wider text-gray-900">SIAKAD</span>
                </div>

                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Masuk ke Akun Anda</h2>
                    <p class="text-gray-500">Masukkan kredensial Anda untuk melanjutkan</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6 mt-8">
                    @csrf

                    <!-- Email/Identifier Address -->
                    <div>
                        <label for="login_id" class="block text-sm font-medium text-gray-700 mb-1">Email / NIDN / NPM</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <x-text-input id="login_id" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 sm:text-sm transition duration-200 ease-in-out" type="text" name="login_id" :value="old('login_id')" required autofocus autocomplete="username" placeholder="Masukkan ID Login Anda" />
                        </div>
                        <x-input-error :messages="$errors->get('login_id')" class="mt-2 text-rose-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <x-text-input id="password" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 sm:text-sm transition duration-200 ease-in-out" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-rose-500" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="w-4 h-4 text-rose-600 bg-gray-100 border-gray-300 rounded focus:ring-rose-500 focus:ring-2" name="remember">
                            <span class="ms-2 text-sm text-gray-600 font-medium">Ingat saya</span>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors duration-200">
                            Masuk ke Sistem
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
