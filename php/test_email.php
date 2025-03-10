<?php
session_start();
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Load environment variables from .env file
$env = parse_ini_file('../.env');

// Initialize variables
$error_message = '';
$success_message = '';
$debug_output = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test_email = filter_var($_POST["test_email"], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Format email tidak valid!";
    } else {
        // Create a new PHPMailer instance with debug output
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
            $mail->addAddress($test_email);
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Test Email dari PurpleSite';
            $mail->Body = "<p>Ini adalah email uji coba dari PurpleSite.</p>
                <p>Jika Anda menerima email ini, berarti konfigurasi SMTP berfungsi dengan baik.</p>
                <p>Terima kasih,<br>Tim PurpleSite</p>";
            
            $mail->send();
            $success_message = "Email uji coba berhasil dikirim ke $test_email. Silakan periksa kotak masuk Anda.";
        } catch (Exception $e) {
            
            // Provide detailed error message
            $error_message = "Gagal mengirim email: " . $e->getMessage();
            
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

// Display current SMTP settings
$current_settings = "<strong>Konfigurasi SMTP Saat Ini:</strong><br>";
$current_settings .= "MAIL_HOST: " . ($env['MAIL_HOST'] ?? 'Tidak diatur') . "<br>";
$current_settings .= "MAIL_PORT: " . ($env['MAIL_PORT'] ?? 'Tidak diatur') . "<br>";
$current_settings .= "MAIL_USERNAME: " . ($env['MAIL_USERNAME'] ?? 'Tidak diatur') . "<br>";
$current_settings .= "MAIL_FROM: " . ($env['MAIL_FROM'] ?? 'Tidak diatur') . "<br>";
$current_settings .= "MAIL_FROM_NAME: " . ($env['MAIL_FROM_NAME'] ?? 'Tidak diatur') . "<br>";

// Check if password is set (don't show the actual password)
$password_status = isset($env['MAIL_PASSWORD']) && !empty($env['MAIL_PASSWORD']) ? 'Diatur' : 'Tidak diatur';
$current_settings .= "MAIL_PASSWORD: " . $password_status . "<br>";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Email - PurpleSite</title>
    <link rel="stylesheet" href="../Login page/Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .wrapper {
            width: 600px;
            max-width: 90%;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
            white-space: pre-line;
        }
        
        .alert-success {
            background-color: rgba(72, 187, 120, 0.2);
            border-left: 4px solid #48bb78;
            color: #2f855a;
        }
        
        .alert-error {
            background-color: rgba(245, 101, 101, 0.2);
            border-left: 4px solid #f56565;
            color: #c53030;
        }
        
        .settings-box {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #fff;
        }
        
        .debug-box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            color: #fff;
            font-family: monospace;
            font-size: 12px;
            white-space: pre-wrap;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 15px;
        }
        
        .back-to-login a {
            color: #a760ff;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Test Email</h1>
            <p style="text-align: center; margin-bottom: 20px; color: #fff;">Gunakan halaman ini untuk menguji konfigurasi email</p>
            
            <div class="settings-box">
                <?php echo $current_settings; ?>
            </div>
            
            <?php if (!empty($error_message)): ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
            <?php endif; ?>
            
            <div class="input-box">
                <input type="email" name="test_email" placeholder="Email Tujuan" required>
                <i class='bx bx-envelope'></i>
            </div>

            <button type="submit" class="btn">Kirim Email Test</button>

            <?php if (!empty($debug_output)): ?>
            <div class="debug-box">
                <strong>Debug Output:</strong><br>
                <?php echo htmlspecialchars($debug_output); ?>
            </div>
            <?php endif; ?>
            
            <div class="back-to-login">
                <a href="../php/Login.php"><i class='bx bx-arrow-back'></i> Kembali ke Login</a>
            </div>
        </form>
    </div>
</body>
</html>