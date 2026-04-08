# Pointer

Status: In Progress
Owner: Viszello Vian
Dates: January 6, 2026 → March 31, 2026
Priority: High

# About this project

Pointer adalah sebuah aplikasi web untuk track poin pelanggaran siswa, dimana web ini bisa mengelola pelanggaran siswa dan mencetak surat-surat yang diperlukan untuk mengurus siswa.

## Core Feature

Terdapat beberapa fitur utama yang ada di dalam aplikai ini:

1. Pengelolaan data siswa & guru
2. Pencatatan Pelanggaran
3. Dokumen Otomatis
4. Pencetakan dokumen
5. Dashboard & Laporan Analitik
6. Multi-Role Akses

## Cara Kerja

Aplikasi ini memiliki cara kerja yang sederhana:

1. Input data siswa & guru
2. Catat pelanggaran
3. Tindak lanjut otomatis dengan menghitung poin
4. Buat & Cetak dokumen resmi

## Jenis-Jenis Dokumen

Terdapat 5 jenis dokumen yang tersedia untuk dikelola:

1. Surat perjanjian siswa
2. Surat perjanjian orang tua
3. Surat panggilan orang tua
4. Surat pindah sekolah
5. Rekap Laporan pelanggaran

## Arsitektur Sistem

Aplikasi ini menggunakan tech stack yang sederhana dan simple, dimana sebagai inti utama aplikasi ini menggunakan sistem MVC untuk memudahkan modifikasi dan penyesuaian sistem. Kami menggunakan bahasa pemrograman PHP yang sampai sekarang masih relevan dan MySQL sebagai database karena popularitasnya. Untuk detailnya:

1. Arsitektur: MVC
2. Bahasa pemrograman: PHP (*main*), Javascript, HTML, CSS (*tailwindcss*)
3. Server: Apache
4. Database: MySQL
5. Tech Stack: Laragon

## Role

Terdapat beberapa role user yang bisa menjalankan aplikasi ini:

1. Admin / Guru BK: User yang memiliki seluruh akses ke sistem.
2. Wakasek: User yang memiliki akses terbatas seperti:
    1. Melihat list data siswa tanpa bisa membuat, mengedit, dan menghapus.
    2. Menambah, melihat, dan mencetak pelanggaran siswa
    3. Mencetak surat-surat
3. Kepala Sekolah: User yang memiliki akses terbatas mirip dengan Wakasek.
4. Siswa: Hanya bisa melihat profile diri dan pelanggaran yang dibuat, serta surat-surat yang dibuat untuknya.

# Kekurangan dan Rencana Pengembangan

Karena keterbatasan waktu dan ilmu yang belum mencukupi, aplikasi ini masih memiliki beberapa kekurangan atau bahkan fitur yang belum dilengkapi.

**Kekurangan:**
1. Keamanan masih belum di tes secara penuh
2. Desain interface yang kurang konsisten
3. Workflow atau userflow yang kurang jelas
4. Belum adanya fitur filter dan pencarian

**Kekurangan bagian kode:**
1. Kode program yang kurang rapi
2. Kurangnya dokumentasi program
3. Tidak menerapkan DRY secara menyeluruh
4. Query SQL yang tidak efisien

Dikarenakan kekurangan-kekurangan yang telah dijelaskan berikut, rencana pengembangan ke depan adalah memperbaiki setiap kekurangan dan memperbarui desain interface secara menyeluruh demi kemudahan pengguna.

## Cara Login
Sebelum login, saya menyarankan untuk menjalankan query ini di phpMyAdmin di database school_pointer:

```sql
UPDATE users SET password = "$2y$12$i7.D4CndNqeHWX6N5DfwF.emXUqRcxS2E86K/d1FhO8kS4m4rhuni";
UPDATE students SET password = "$2y$12$i7.D4CndNqeHWX6N5DfwF.emXUqRcxS2E86K/d1FhO8kS4m4rhuni";
```

dimana ini akan set semua password guru dan siswa menjadi `user123` untuk memudahkan login.