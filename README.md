# 📧 PurpleSite - Panduan Konfigurasi Email

## 📋 Ringkasan
Dokumen ini berisi petunjuk lengkap untuk mengatur dan mengatasi masalah pada fitur email di aplikasi PurpleSite. Panduan ini akan membantu Anda mengonfigurasi sistem email untuk fitur seperti reset password, verifikasi email, dan formulir kontak.

## ✅ Persyaratan Sistem
- PHP 7.4 atau lebih tinggi
- Composer
- Library PHPMailer
- Akses SMTP (Direkomendasikan menggunakan akun Gmail)

## 📁 Struktur Folder
```
Tugas/
│-- Foto/
│-- Login page/
│-- Navbar/
│-- Register Page/
│-- css/
│-- database/
│-- php/
    │-- test_email.php
    │-- forgot_password.php
    │-- reset_password.php
    │-- verify_email.php
```

## 🚀 Langkah-langkah Konfigurasi

### 1. 💻 Install Dependensi
```
composer install
```
Perintah ini akan menginstal PHPMailer dan library lain yang diperlukan untuk fungsi email.

### 2. ⚙️ Konfigurasi Pengaturan Email
- Salin file `.env.example` menjadi `.env` di direktori utama:
```
copy .env.example .env
```
- Buka file `.env` dan ubah nilai-nilai berikut sesuai dengan akun email Anda:
```
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email-anda@gmail.com
MAIL_PASSWORD=password-aplikasi-anda
MAIL_FROM=email-anda@gmail.com
MAIL_FROM_NAME="Nama Admin Anda"
```

### 3. 🔐 Membuat Password Aplikasi Gmail
Jika menggunakan Gmail, Anda perlu membuat Password Aplikasi:
1. Buka [Pengaturan Akun Google](https://myaccount.google.com/) > Keamanan
2. Aktifkan Verifikasi 2 Langkah jika belum diaktifkan
3. Buka menu "Password Aplikasi"
4. Pilih "Email" dan "Lainnya (Nama kustom)"
5. Masukkan "PurpleSite" dan klik Generate
6. Gunakan password yang dihasilkan di file `.env` Anda

## 🧪 Pengujian Fungsi Email

1. Akses halaman uji: `/php/test_email.php`
2. Masukkan alamat email tujuan untuk mengirim email tes
3. Periksa output debug untuk mendeteksi kesalahan
4. Periksa kotak masuk email tujuan (termasuk folder spam)

## ⚠️ Pemecahan Masalah Umum

### 1. PHPMailer Tidak Ditemukan
- Jalankan `composer install` untuk menginstal dependensi
- Pastikan folder `vendor` ada dan berisi PHPMailer
- Verifikasi bahwa `autoload.php` dimuat dengan benar

### 2. Autentikasi Gagal
- Periksa email dan password di file `.env`
- Untuk Gmail, pastikan Anda menggunakan App Password, bukan password biasa
- Verifikasi bahwa Verifikasi 2 Langkah diaktifkan untuk akun Google Anda

### 3. Masalah Koneksi
- Verifikasi pengaturan `MAIL_HOST` dan `MAIL_PORT`
- Periksa apakah server Anda mengizinkan koneksi SMTP keluar
- Coba gunakan port yang berbeda (465 dengan SSL alih-alih 587 dengan TLS)

### 4. Email Tidak Diterima
- Periksa folder spam/junk
- Verifikasi alamat email penerima sudah benar
- Periksa apakah penyedia email Anda memblokir pesan keluar

## 📝 Fitur Email yang Tersedia

### 1. Formulir Kontak
Formulir kontak tersedia di `/Navbar/Kontak.php` dan diproses oleh `process_contact.php`.

Jika pengujian email berhasil tetapi formulir kontak tidak berfungsi, periksa:
- Penanganan form di `process_contact.php`
- Pesan kesalahan yang muncul
- Variabel sesi jika menggunakan email pengguna yang masuk

### 2. Reset Password
Fitur reset password menggunakan `forgot_password.php` dan `reset_password.php` untuk memungkinkan pengguna mengatur ulang password mereka melalui email.

### 3. Verifikasi Email
Verifikasi email pengguna baru menggunakan `verify_email.php` untuk memastikan alamat email yang valid.

## 📞 Dukungan
Jika Anda mengalami masalah yang tidak tercantum dalam panduan ini, silakan hubungi tim dukungan PurpleSite untuk bantuan lebih lanjut.
