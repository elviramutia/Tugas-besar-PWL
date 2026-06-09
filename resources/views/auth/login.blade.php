<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Login ID (Email / NPM / NIDN) -->
        <div>
            <label for="login_id" class="block text-sm font-medium text-gray-700">Email / NPM / NIDN</label>
            <div class="mt-1">
                <input id="login_id" type="text" name="login_id" value="{{ old('login_id') }}" required autofocus class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors" placeholder="Masukkan Email, NPM, atau NIDN anda">
            </div>
            <x-input-error :messages="$errors->get('login_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
                <input id="password" type="password" name="password" required autocomplete="current-password" class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer transition-colors">
                <label for="remember_me" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                    Ingat saya
                </label>
            </div>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                Masuk ke Sistem
            </button>
        </div>
    </form>
</x-guest-layout>
