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

## Testing Email Functionality

1. Access the test page at: `/php/test_email.php`
2. Enter an email address to send a test email
3. Check the debug output for any errors

## Troubleshooting

### Common Issues

1. **PHPMailer Not Found**
   - Run `composer install` to install dependencies
   - Verify that the vendor directory exists

2. **Authentication Failed**
   - Check your email and password in the .env file
   - For Gmail, ensure you're using an App Password, not your regular password
   - Verify that 2-Step Verification is enabled for your Google account

3. **Connection Issues**
   - Verify MAIL_HOST and MAIL_PORT settings
   - Check if your server allows outgoing SMTP connections
   - Try using a different port (465 with SSL instead of 587 with TLS)

4. **Email Not Received**
   - Check spam/junk folders
   - Verify recipient email address is correct
   - Check if your email provider is blocking outgoing messages

## Contact Form

The contact form in `/Navbar/Kontak.php` uses the same email configuration to send messages. If the test email works but the contact form doesn't, check:

1. Form submission handling in `process_contact.php`
2. Error messages returned to the contact page
3. Session variables if using logged-in user's email
