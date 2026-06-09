
<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Jadwal</h2></x-slot>
    <div class="py-12"><div class="max-w-2xl mx-auto sm:px-6 lg:px-8"><div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                <select name="kode_matakuliah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Pilih Mata Kuliah</option>
                    @foreach($matakuliahs as $mk)
                        <option value="{{ $mk->kode_matakuliah }}" {{ old('kode_matakuliah', $jadwal->kode_matakuliah) == $mk->kode_matakuliah ? 'selected' : '' }}>{{ $mk->nama_matakuliah }}</option>
                    @endforeach
                </select>
                @error('kode_matakuliah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Dosen Pengajar</label>
                <select name="nidn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Pilih Dosen</option>
                    @foreach($dosens as $d)
                        <option value="{{ $d->nidn }}" {{ old('nidn', $jadwal->nidn) == $d->nidn ? 'selected' : '' }}>{{ $d->nama }}</option>
                    @endforeach
                </select>
                @error('nidn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kelas</label>
                    <select name="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Pilih Kelas</option>
                        @foreach(['A', 'B', 'C', 'D'] as $k)
                            <option value="{{ $k }}" {{ old('kelas', $jadwal->kelas) == $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                    @error('kelas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Angkatan</label>
                    <select name="angkatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Pilih Angkatan</option>
                        @for($year = 2022; $year <= 2026; $year++)
                            <option value="{{ $year }}" {{ old('angkatan', $jadwal->angkatan) == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                    @error('angkatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hari</label>
                    <select name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="">Pilih Hari</option>
                        @foreach(["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"] as $h)
                            <option value="{{ $h }}" {{ old('hari', $jadwal->hari) == $h ? 'selected' : '' }}>{{ $h }}</option>
                        @endforeach
                    </select>
                    @error('hari') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jam</label>
                    <input type="time" name="jam" value="{{ old('jam', date('H:i', strtotime($jadwal->jam))) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    @error('jam') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.jadwal.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div></div></div>
</x-app-layout>
