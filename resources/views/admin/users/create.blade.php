<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-rose-100 text-rose-600 rounded-lg shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">Tambah Pengguna Baru</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-2xl border border-white">
                <div class="p-8 sm:p-10">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                            @error('name') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                            @error('email') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Role Akses</label>
                            <select name="role" class="block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            </select>
                            @error('role') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Password</label>
                                <input type="password" name="password" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                                @error('password') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-4 mt-6 border-t border-gray-100">
                            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-xl font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2.5 rounded-xl font-medium text-white bg-rose-600 hover:bg-rose-700 hover:shadow-lg hover:-translate-y-0.5 focus:ring-4 focus:ring-rose-200 transition-all duration-200 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Akun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
