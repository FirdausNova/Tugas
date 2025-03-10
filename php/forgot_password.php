<?php
session_start();
include 'Koneksi.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load environment variables from .env file
$env = parse_ini_file('../.env');
$db_host = $env['DB_HOST'] ?? 'localhost';
$db_user = $env['DB_USER'] ?? 'root';
$db_password = $env['DB_PASSWORD'] ?? '';
$db_name = $env['DB_NAME'] ?? 'Tugas';

// Initialize variables
$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Format email tidak valid!";
    } else {
        // Check if email exists in database
        $stmt = $conn->prepare("SELECT id, username FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Generate unique token
            $token = bin2hex(random_bytes(32));
            
            // Set token expiration (1 hour from now)
            $expires = date('Y-m-d H:i:s', time() + 3600);
            
            // Save token to database
            $update = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?");
            $update->bind_param("ssi", $token, $expires, $user['id']);
            
            if ($update->execute()) {
                // Create reset link
                $reset_link = "http://" . $_SERVER['HTTP_HOST'] . "/Tugas/php/reset_password.php?token=" . $token;
                
                // Send email with PHPMailer
                $mail = new PHPMailer(true);
                
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = $env['MAIL_HOST'] ?? 'smtp.gmail.com'; // Get from .env
                    $mail->SMTPAuth = true;
                    $mail->Username = $env['MAIL_USERNAME'] ?? 'your-email@gmail.com'; // Get from .env
                    $mail->Password = $env['MAIL_PASSWORD'] ?? 'your-app-password'; // Get from .env
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = $env['MAIL_PORT'] ?? 587; // Get from .env
                    
                    // Recipients
                    $mail->setFrom($env['MAIL_FROM'] ?? 'your-email@gmail.com', $env['MAIL_FROM_NAME'] ?? 'PurpleSite Admin');
                    $mail->addAddress($email);
                    
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Reset Password PurpleSite';
                    $mail->Body = "<p>Halo {$user['username']},</p>
                        <p>Kami menerima permintaan untuk mengatur ulang password akun PurpleSite Anda.</p>
                        <p>Silakan klik link berikut untuk mengatur ulang password Anda:</p>
                        <p><a href='{$reset_link}'>{$reset_link}</a></p>
                        <p>Link ini akan kedaluwarsa dalam 1 jam.</p>
                        <p>Jika Anda tidak meminta pengaturan ulang password, abaikan email ini.</p>
                        <p>Terima kasih,<br>Tim PurpleSite</p>";
                    
                    $mail->send();
                    $success_message = "Instruksi reset password telah dikirim ke email Anda.";
                } catch (Exception $e) {
                    $error_message = "Gagal mengirim email. Silakan coba lagi nanti.";
                }
            } else {
                $error_message = "Terjadi kesalahan, silakan coba lagi.";
            }
        } else {
            // Don't reveal that email doesn't exist for security reasons
            $success_message = "Jika email terdaftar, instruksi reset password akan dikirim.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - PurpleSite</title>
    <link rel="stylesheet" href="../Login page/Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
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
        
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
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
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Lupa Password</h1>
            <p style="text-align: center; margin-bottom: 20px; color: #fff;">Masukkan email Anda untuk menerima link reset password</p>
            
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
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-envelope'></i>
            </div>

            <button type="submit" class="btn">Kirim Link Reset</button>

            <div class="back-to-login">
                <a href="../php/Login.php"><i class='bx bx-arrow-back'></i> Kembali ke Login</a>
            </div>
        </form>
    </div>
</body>
</html>