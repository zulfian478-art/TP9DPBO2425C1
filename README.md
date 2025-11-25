# Janji

Saya Zulfian Rais Almanshur dengan NIM 2400325 mengerjakan Tugas Praktikum 9 dalam mata kuliah 
Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya, maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. Aamiin.

# Desain Program

Program ini dibuat menggunakan arsitektur MVP (Model–View–Presenter). Struktur utama program meliputi:

1. Model → berfungsi berinteraksi dengan database (CRUD untuk Pembalap dan Jadwal).

2. View → bagian yang menampilkan form dan tabel ke pengguna (HTML + CSS).

3. Presenter → jembatan antara View dan Model, mengatur alur logika.

4. Database → MySQL, terdiri dari tabel pembalap dan jadwal.

5. Router manual → mengatur menu dan aksi CRUD berdasarkan parameter GET/POST.

# Deskripsi Program

Program ini merupakan aplikasi manajemen data pembalap dan jadwal balapan menggunakan arsitektur MVP. Program memuat:

1. CRUD untuk Pembalap dan Jadwal Balapan

2. Form input berbasis HTML + CSS sederhana

3. Routing manual menggunakan parameter menu dan action

4. Integrasi database MySQL untuk menyimpan data

5. Semua operasi (tambah, lihat, ubah, hapus) dilakukan melalui form

# Fitur Program

1. CRUD Pembalap

2. Tambah pembalap

3. Edit pembalap

4. Hapus pembalap

5. Tampilkan daftar pembalap

6. CRUD Jadwal

7. Tambah jadwal balapan

8. Edit jadwal balapan

9. Hapus jadwal balapan

10. Tampilkan daftar jadwal

# Routing Menu

Menu diakses menggunakan URL:
index.php?menu=pembalap atau index.php?menu=jadwal
Tambah/Edit via parameter screen dan id

Template Form dan Tabel

Form input rapi dengan validasi sederhana menggunakan JavaScript

Tabel daftar data menggunakan CSS minimal agar mudah dibaca

Konfigurasi Database Terpusat

Koneksi database melalui models/DB.php

CRUD dijalankan menggunakan prepared statement untuk keamanan

Struktur MVP

Program memenuhi permintaan soal untuk mengubah struktur menjadi MVP lengkap.

# Alur Program

Program dibuka melalui index.php.
Router membaca parameter menu dan menentukan Presenter + View yang dipanggil.

Jika user memilih menu Pembalap:

Router memanggil PresenterPembalap → menampilkan daftar atau form pembalap.

User dapat menambah pembalap:

Akses form tambah → submit → presenter memanggil model untuk menyimpan data ke database.

User dapat mengedit pembalap:

Klik Edit → form diisi dengan data dari database → submit → presenter memanggil model untuk update data.

User dapat menghapus pembalap:

Klik Delete → presenter memanggil model untuk hapus data dari database.

Hal yang sama berlaku untuk menu Jadwal Balapan:

CRUD untuk jadwal menggunakan form dan tabel daftar jadwal.

Layout selalu konsisten:

Navbar global dengan menu Pembalap dan Jadwal

Form dan tabel mengikuti template CSS sederhana

# Dokumentasi

https://github.com/user-attachments/assets/6b8dd5a5-b0b0-4f72-b9cd-85476509f632

