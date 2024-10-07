    APLIKASI SISTEM INFORMASI MASJID
------------------------------------------------------
<a href="https://v-project.my.id"> Demo Website </a>
------------------------------------------------------
Quick Use (Laravel 10)(PHP > 8.2)(LIVEWIRE 3)
------------------------------------------------------
- clone this repository
- composer update
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- npm install
- npm run dev / npm run build && php artisan serve
-------------------------------------------------------
Deskripsi
-------------------------------------------------------
Aplikasi Sistem Informasi Masjid ini dibuat oleh :
- <a href='https://linkedin.com/in/oliverkore'>Oliver Dillon</a> -> (Backend)
- Ridho Zikri -> (Frontend)
- Gilang -> (Frontend)
--------------------------------------------------------
Fitur
--------------------------------------------------------
1. Guest
   - Melihat Landing Page Yang Memuat Informasi Countdown Waktu Sekarang s.d. Waktu Sholat Berikutnya, Jam, Pengumuman, Petugas Hari Jumat, dan Alur Keuangan
2. Moderator
   - Melihat Dashboard, Manajemen Pengumuman, Keuangan dan Petugas Jumat, Melihat Log History Sendiri
3. Admin
   - Melihat Dashboard, Manajemen Pengumuman, Keuangan, Petugas Jumat, Mengelola Akun dan Melihat Log Histori Admin & Moderator
3. Super Admin
   - Melihat Dashboard, Manajemen Pengumuman, Keuangan, Petugas Jumat, Mengelola Akun, Melihat Log Histori dan Recovery Data Terhapus
--------------------------------------------------------
Revisi
--------------------------------------------------------
- 26 June 24
-- Filter Data
-- Paginasi Data
-- History Pengurus Jumat
- 04 July 24
-- Tetap Tampil Petugas Jumat, Tanggal Jumat Terdekat.
- 05 Oct 24
-- Bilal dihapus dari petugas jumat
-- Buat 3 tipe pengurus yaitu petugas jumat, petugas taraweh, sholat eid
-- Alarm pada saat adzan
-- Fix Bug petugas jumat [Done]
--------------------------------------------------------
Bugs
--------------------------------------------------------
- Tidak ada bug ditemukan
--------------------------------------------------------
Testing
--------------------------------------------------------
- symlink
--------------------------------------------------------
To Do List
--------------------------------------------------------
- Implementasi Sweetalert ke DataTable (Done)
- Menambah History (Done)
- Membuat SuperAdmin (Done)
- Membuat Log User (Done)
- Membuat Data Tabel untuk akun (Done)
- Responsive Aktivitas & Manajemen Akun (done)

- Membuat Tata Letak Landing Page
- Paginasi data (Done)
