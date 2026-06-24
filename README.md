# SIAKAD Pro - Modern EduTech

Sistem Informasi Akademik (SIAKAD) yang dibangun menggunakan Laravel 12 dengan implementasi fitur lengkap sesuai dengan kriteria penilaian maksimal, termasuk pencapaian bonus *deployment*.

## 📝 Penjelasan Singkat Fungsi Masing-Masing Halaman

Aplikasi ini dibagi menjadi 3 hak akses utama (Admin, Dosen, Mahasiswa), di mana setiap halamannya dirancang untuk kebutuhan spesifik:

### 1. Halaman Autentikasi (Umum)
- **Halaman Login**: Pintu masuk utama sistem. Login bersifat terpusat (*Single Login Form*), di mana sistem secara cerdas mendeteksi Role berdasarkan input (Email untuk Admin, NIDN untuk Dosen, NPM untuk Mahasiswa).

### 2. Halaman Admin (Super Akses)
- **Dashboard Admin**: Menampilkan statistik keseluruhan sistem seperti total mahasiswa, total dosen, sesi kelas hari ini, dan grafik aktivitas akademik secara *real-time*.
- **Manajemen Dosen (CRUD)**: Halaman untuk menambah, mengubah, menghapus, serta melihat daftar seluruh dosen pengajar. Saat dosen baru ditambahkan, sistem otomatis membuatkan akun login mereka.
- **Manajemen Mahasiswa (CRUD)**: Halaman pengelolaan data mahasiswa lengkap dengan penentuan dosen wali. Pembuatan akun login otomatis sinkron dengan data yang diinput.
- **Manajemen Mata Kuliah (CRUD)**: Tempat mengelola daftar kurikulum/mata kuliah beserta SKS-nya.
- **Manajemen Jadwal & Penugasan (CRUD)**: Halaman paling krusial bagi Admin untuk mengatur plot jadwal (relasi antara Dosen, Mata Kuliah, Kelas, Hari, dan Jam perkuliahan). Dilengkapi dengan fitur *filter/pencarian* lanjutan.


### 3. Halaman Mahasiswa
- **Dashboard Mahasiswa**: Ringkasan pengumuman akademik, jadwal kelas hari ini, dan progres sks.
- **Manajemen KRS**: Halaman pengisian Kartu Rencana Studi. Mahasiswa dapat melihat daftar jadwal kelas yang tersedia, melakukan "Ambil Kelas" (input), serta "Drop Kelas" (hapus). Terdapat fitur unggulan **Export KRS ke PDF**.
- **Absensi Kelas**: Halaman bagi mahasiswa untuk melakukan presensi mandiri. Tombol "Hadir" hanya akan aktif jika dosen telah membuka sesi absen pada jam tersebut.

---

## 🏆 Aspek Penilaian & Pencapaian

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

## 🎨 UI/UX Design & Struktur
Menggunakan **Tailwind CSS** dengan *Clean UI / Modern EduTech Theme*. Sistem menggunakan paduan warna Indigo/Purple yang profesional, responsif di berbagai perangkat, lengkap dengan animasi transisi yang memanjakan mata (*micro-interactions*).

Terdapat direktori `screenshots` di dalam *root* repository ini yang berisi kumpulan gambar tangkapan layar dari masing-masing halaman aplikasi, sesuai dengan ketentuan pengumpulan tugas besar.

---

### 🔑 Kredensial Uji Coba (Bawaan Seeder)
Password untuk akun admin bawah ini adalah: `password`
Password untuk semua akun mahasiswa bawah ini adalah: `12345678`

| Role | Identitas Login (Username) |
| :--- | :--- |
| **Admin** | admin@siakad.com |
| **Mahasiswa** | elvira@siakad.com |
