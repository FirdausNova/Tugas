# 📧 Panduan Konfigurasi Email PurpleSite

## 📋 Ringkasan
Dokumen ini berisi petunjuk lengkap untuk mengatur dan mengatasi masalah pada fitur email di aplikasi PurpleSite.

## ✅ Persyaratan Sistem
- PHP 7.4 atau lebih tinggi
- Composer
- Library PHPMailer
- Akses SMTP (Direkomendasikan menggunakan akun Gmail)

## Struktur Folder
```
Tugas/
│-- Foto/
│-- Login page/
│-- Navbar/
│-- Register Page/
│-- css/
│-- database/
│-- php/
```

1. **💻 Install Dependensi**
   ```
   composer install
   ```
   Perintah ini akan menginstal PHPMailer dan library lain yang diperlukan.

2. **⚙️ Konfigurasi Pengaturan Email**
   - Salin file `.env.example` menjadi `.env` di direktori utama:
   ```
   copy .env.example .env
   ```
   - Buka file `.env` dan ubah nilai-nilai berikut sesuai dengan akun email Anda:
   ```
   MAIL_USERNAME=email-anda@gmail.com
   MAIL_PASSWORD=password-aplikasi-anda
   MAIL_FROM=email-anda@gmail.com
   MAIL_FROM_NAME="Nama Admin Anda"
   ```

3. **🔐 Membuat Password Aplikasi Gmail**
   Jika menggunakan Gmail, Anda perlu membuat Password Aplikasi:
   - Buka [Pengaturan Akun Google](https://myaccount.google.com/) > Keamanan
   - Aktifkan Verifikasi 2 Langkah jika belum diaktifkan
   - Buka menu "Password Aplikasi"
   - Pilih "Email" dan "Lainnya (Nama kustom)"
   - Masukkan "PurpleSite" dan klik Generate
   - Gunakan password yang dihasilkan di file `.env` Anda

### **Pengujian Fungsi Email**

1. Akses halaman uji: `/php/test_email.php`  
2. Masukkan alamat email tujuan  
3. Periksa output debug untuk mendeteksi kesalahan  

### **Pemecahan Masalah Umum**  

1. **PHPMailer Tidak Ditemukan**  
   - Jalankan `composer install`  
   - Pastikan folder `vendor` ada  

2. **Autentikasi Gagal**  
   - Periksa email & password di file `.env`  
   - Gunakan App Password untuk Gmail  
   - Pastikan Verifikasi 2 Langkah diaktifkan  

3. **Masalah Koneksi**  
   - Cek konfigurasi `MAIL_HOST` dan `MAIL_PORT`  
   - Pastikan server mengizinkan koneksi SMTP  

4. **Email Tidak Diterima**  
   - Periksa folder spam  
   - Pastikan alamat email tujuan benar  

### **Formulir Kontak**  

Jika pengujian email berhasil tetapi formulir kontak (`/Navbar/Kontak.php`) tidak berfungsi, periksa:  

1. Penanganan form di `process_contact.php`  
2. Pesan kesalahan yang muncul  
3. Variabel sesi jika menggunakan email pengguna yang masuk