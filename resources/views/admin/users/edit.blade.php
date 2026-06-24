<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-rose-100 text-rose-600 rounded-lg shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">Edit Pengguna</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-2xl border border-white">
                <div class="p-8 sm:p-10">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                            @error('name') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required>
                            @error('email') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Role Akses</label>
                            <select name="role" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" required {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="mahasiswa" {{ old('role', $user->role) == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            </select>
                            @if($user->id === auth()->id())
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                <p class="text-xs text-orange-500 mt-1">Anda tidak dapat mengubah role Anda sendiri.</p>
                            @endif
                            @error('role') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="bg-white px-4 text-sm font-semibold text-gray-500 bg-gray-50 rounded-full py-1">Ubah Password (Opsional)</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Password Baru</label>
                                <input type="password" name="password" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" placeholder="Kosongkan jika tidak diubah">
                                @error('password') <span class="text-red-500 text-sm font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="block w-full rounded-xl border-gray-200 bg-gray-50/50 shadow-sm focus:border-rose-500 focus:ring-rose-500 transition-colors duration-200" placeholder="Kosongkan jika tidak diubah">
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-4 mt-6 border-t border-gray-100">
                            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-xl font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2.5 rounded-xl font-medium text-white bg-rose-600 hover:bg-rose-700 hover:shadow-lg hover:-translate-y-0.5 focus:ring-4 focus:ring-rose-200 transition-all duration-200 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
