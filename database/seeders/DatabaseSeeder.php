<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin SIAKAD',
            'email' => 'admin@siakad.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Dosen (Tidak Dibuatkan Akun Login Sesuai Permintaan)
        $dosen1 = Dosen::create(['nidn' => '1111111111', 'nama' => 'Dr. Budi Santoso']);
        $dosen2 = Dosen::create(['nidn' => '2222222222', 'nama' => 'Prof. Andi Wijaya']);

        // Matakuliah
        Matakuliah::create(['kode_matakuliah' => 'IF123456', 'nama_matakuliah' => 'Pemrograman Web II', 'sks' => 3]);
        Matakuliah::create(['kode_matakuliah' => 'IF654321', 'nama_matakuliah' => 'Basis Data Lanjut', 'sks' => 4]);

        // Mahasiswa (Sesuai dengan nama user)
        $mhs = Mahasiswa::create([
            'npm' => '5520122139',
            'nama' => 'Elvira',
            'kelas' => 'IF-A',
            'angkatan' => 2022
        ]);
        
        User::create([
            'name' => 'Elvira',
            'email' => 'elvira@siakad.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'npm' => '5520122139'
        ]);
    }
}
