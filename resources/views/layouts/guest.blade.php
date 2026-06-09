<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIAKAD Pro') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#1e1b4b]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-[#1e1b4b] to-[#312e81] relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
                <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-indigo-500/20 blur-3xl"></div>
                <div class="absolute top-[60%] -right-[10%] w-[40%] h-[60%] rounded-full bg-purple-500/20 blur-3xl"></div>
            </div>

            <!-- Content Container -->
            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-10 bg-white/95 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20">
                <div class="flex flex-col items-center mb-8">
                    <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-600/40 mb-4 transform -rotate-6">
                        <svg class="w-10 h-10 text-white transform rotate-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">SIAKAD Pro</h2>
                    <p class="text-sm text-gray-500 mt-1">Sistem Informasi Akademik Terpadu</p>
                </div>

                {{ $slot }}
            </div>
            
            <div class="relative z-10 mt-8 text-indigo-200/60 text-sm">
                &copy; {{ date('Y') }} SIAKAD Pro. All rights reserved.
            </div>
        </div>
    </body>
</html>
