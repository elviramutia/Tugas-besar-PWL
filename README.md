# SIAKAD Pro - Modern EduTech

Sistem Informasi Akademik (SIAKAD) yang dibangun menggunakan Laravel 12 dengan implementasi fitur lengkap sesuai dengan kriteria penilaian maksimal, termasuk pencapaian bonus *deployment*.

## 🌐 Live Preview / Hosting Link (BONUS)

Aplikasi ini telah berhasil di-*deploy* / di-*hosting* dan dapat diakses secara *online* (publik) tanpa *error* pada tautan berikut:

**👉 [https://overlord-karma-icy.ngrok-free.dev](https://overlord-karma-icy.ngrok-free.dev) 👈**

---

## Aspek Penilaian & Pencapaian

Sistem ini telah memenuhi 100% persyaratan teknis dan fitur tambahan untuk mendapatkan **Nilai Akhir A (Maksimal)** pada mata kuliah Web II:

### 1. Ketentuan Teknis (Wajib)
- ✅ **Migration**: Menggunakan struktur *database* yang baik dengan relasi kunci tamu (*Foreign Keys*) dan *Cascade Update/Delete*.
- ✅ **Seeder**: Tersedia `DatabaseSeeder.php` dengan data *dummy* terintegrasi.
- ✅ **Eloquent ORM**: Seluruh manipulasi data (CRUD) dan query filtering menggunakan fitur bawaan model Eloquent.
- ✅ **Eloquent Relationship**: Menggunakan relasi `belongsTo`, `hasMany`, dan `hasOne` secara efisien antar tabel.
- ✅ **Middleware (untuk role)**: Memisahkan akses dan hak privilese (Admin, Dosen, Mahasiswa) menggunakan sistem proteksi `RoleMiddleware`.

### 2. Fitur Tambahan & Kompleksitas (Bonus Nilai)
- 🚀 **Sistem Absensi Real-time (Otomatisasi)**: Dosen dapat membuat jadwal absensi (dengan validasi rentang jam buka & tutup). Mahasiswa hanya dapat absen jika jam *server* saat ini sesuai dengan jam kelas, jika tidak maka tombol kehadiran akan terkunci secara otomatis.
- 📄 **Export KRS ke PDF**: Mahasiswa dapat mencetak dan mengunduh daftar Kartu Rencana Studi (KRS) mereka langsung dalam format PDF yang rapi.
- 🔍 **Pencarian & Filter Data**: Fitur filter kompleks di halaman Admin untuk melakukan pencarian spesifik (berdasarkan Dosen Wali, Kelas, Angkatan, Hari, dsb).
- 📊 **Dashboard Statistic**: Visualisasi data *real-time* yang informatif baik pada *dashboard* Admin maupun *dashboard* Dosen.

### 3. Fungsionalitas Utama (Multi-Role Authentication)
Sistem menggunakan satu pintu *login* sentral yang secara cerdas mendeteksi *role* pengguna berdasarkan format input:
- **Email** ➔ Login sebagai Admin.
- **NIDN (Angka)** ➔ Login sebagai Dosen.
- **NPM (Angka)** ➔ Login sebagai Mahasiswa.

*Catatan: Segala siklus manajemen pengguna (pembuatan akun Dosen dan Mahasiswa) tersinkronisasi otomatis dengan tabel `users` utama di belakang layar tanpa perlu campur tangan manual.*

## UI/UX Design
Menggunakan **Tailwind CSS** dengan *Clean UI / Modern EduTech Theme*. Sistem menggunakan paduan warna Indigo/Purple yang profesional, responsif di berbagai perangkat, lengkap dengan animasi transisi yang memanjakan mata (*micro-interactions*).

---

### Kredensial Uji Coba (Bawaan Seeder)
Password untuk semua akun di bawah ini adalah: `password`

| Role | Identitas Login (Username) |
| :--- | :--- |
| **Admin** | admin@siakad.com |
| **Dosen** | 1111111111 |
| **Dosen** | 2222222222 |
| **Mahasiswa** | 5520122139 |
