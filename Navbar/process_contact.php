<?php
session_start();
require_once '../php/Koneksi.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load environment variables from .env file
$env = parse_ini_file('../.env');

// Initialize variables
$error_message = '';
$success_message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // If user is logged in, use their email from session
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        // If not logged in, get email from form
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    }
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = "Semua field harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Format email tidak valid.";
    } else {
        // All inputs are valid, proceed with sending email
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = $env['MAIL_HOST'] ?? 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $env['MAIL_USERNAME'] ?? 'your-email@gmail.com';
            $mail->Password = $env['MAIL_PASSWORD'] ?? 'your-app-password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $env['MAIL_PORT'] ?? 587;
            
            // Recipients
            $mail->setFrom($env['MAIL_FROM'] ?? 'your-email@gmail.com', $env['MAIL_FROM_NAME'] ?? 'PurpleSite Admin');
            
            // Use email from .env file as recipient instead of querying admin users
            $mail->addAddress($env['MAIL_FROM'] ?? 'your-email@gmail.com');
            
            $mail->addReplyTo($email, $name); // Set reply-to as the sender's email
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = "Pesan Kontak: $subject";
            $mail->Body = "
                <h2>Pesan Kontak Baru</h2>
                <p><strong>Nama:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Subjek:</strong> $subject</p>
                <p><strong>Pesan:</strong></p>
                <p>" . nl2br(htmlspecialchars($message)) . "</p>
            ";
            
            $mail->send();
            // Now send confirmation email to the user
            $userMail = new PHPMailer(true);
            
            // Server settings (same as above)
            $userMail->isSMTP();
            $userMail->Host = $env['MAIL_HOST'] ?? 'smtp.gmail.com';
            $userMail->SMTPAuth = true;
            $userMail->Username = $env['MAIL_USERNAME'] ?? 'your-email@gmail.com';
            $userMail->Password = $env['MAIL_PASSWORD'] ?? 'your-app-password';
            $userMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $userMail->Port = $env['MAIL_PORT'] ?? 587;
            
            // Recipients for user confirmation
            $userMail->setFrom($env['MAIL_FROM'] ?? 'your-email@gmail.com', $env['MAIL_FROM_NAME'] ?? 'PurpleSite Admin');
            $userMail->addAddress($email, $name); // Send to the user who submitted the form
            
            // Content for user confirmation
            $userMail->isHTML(true);
            $userMail->Subject = "Konfirmasi Pesan: $subject";
            $userMail->Body = "
                <h2>Terima Kasih Telah Menghubungi Kami</h2>
                <p>Halo <strong>$name</strong>,</p>
                <p>Kami telah menerima pesan Anda dengan subjek: <strong>$subject</strong>.</p>
                <p>Tim kami akan segera meninjau pesan Anda dan menghubungi Anda jika diperlukan.</p>
                <p>Berikut adalah salinan pesan yang Anda kirim:</p>
                <p style='background-color: #f8f9fa; padding: 15px; border-radius: 5px;'>" . nl2br(htmlspecialchars($message)) . "</p>
                <p>Terima kasih,<br>Tim PurpleSite</p>
            ";
            
            $userMail->send();
            $success_message = "Pesan Anda telah berhasil dikirim. Kami telah mengirimkan konfirmasi ke email Anda.";
        } catch (Exception $e) {
            // Log the error for debugging
            error_log("PHPMailer Error: " . $e->getMessage());
            
            // Provide more detailed error message
            $error_message = "Gagal mengirim pesan. Error: " . $e->getMessage();
            
            // Add specific troubleshooting advice based on common errors
            if (strpos($e->getMessage(), 'authenticate') !== false) {
                $error_message .= "\n\nKemungkinan penyebab: Username atau password email tidak valid.\n";
                $error_message .= "Periksa MAIL_USERNAME dan MAIL_PASSWORD di file .env.";
            } elseif (strpos($e->getMessage(), 'connect') !== false) {
                $error_message .= "\n\nKemungkinan penyebab: Masalah koneksi ke server SMTP.\n";
                $error_message .= "Periksa MAIL_HOST dan MAIL_PORT di file .env.";
            } elseif (strpos($e->getMessage(), 'timed out') !== false) {
                $error_message .= "\n\nKemungkinan penyebab: Koneksi timeout.\n";
                $error_message .= "Periksa koneksi internet Anda dan pastikan server SMTP tidak diblokir oleh firewall.";
            } elseif (strpos($e->getMessage(), 'Could not instantiate mail function') !== false) {
                $error_message .= "\n\nKemungkinan penyebab: Fungsi mail PHP tidak tersedia.";
            }
        }
    }
}

// Redirect back to contact page with status
if (!empty($success_message)) {
    header("Location: Kontak.php?status=success&message=" . urlencode($success_message));
} else {
    header("Location: Kontak.php?status=error&message=" . urlencode($error_message));
}
exit;