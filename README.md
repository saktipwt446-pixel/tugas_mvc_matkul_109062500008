Project MVC Data Mata Kuliah Wahyu

Aplikasi CRUD sederhana untuk mengelola data mata kuliah menggunakan PHP Native dengan pola Model-View-Controller (MVC).

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti Laragon
- Git

## Instalasi
1. Simpan project di folder web server Laragon.
2. Import file `database/matakuliah.sql` ke database `db_kuliah`.
3. Sesuaikan koneksi database pada `config/database.php`.
4. Jalankan Apache dan MySQL di Laragon.
5. Buka `http://localhost/mvc_matakuliah_wahyu/public/index.php`.

## Struktur MVC
- `app/models/` : mengelola data dan query database.
- `app/controllers/` : mengatur alur aplikasi dan pemanggilan Model/View.
- `app/views/` : menampilkan halaman dan form mata kuliah.
- `config/` : konfigurasi koneksi database.
- `database/` : menyimpan file SQL database.
- `public/` : halaman utama untuk menjalankan aplikasi.

## Fitur
- Menampilkan data mata kuliah.
- Menambah data mata kuliah.
- Mengubah data mata kuliah.
- Menghapus data mata kuliah.

## Data Mata Kuliah
Data mata kuliah terdiri dari kode mata kuliah, nama mata kuliah, SKS, semester, dosen pengampu, dan program studi.

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan project.
