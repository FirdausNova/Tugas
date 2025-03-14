<?php
include '../php/Koneksi.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load environment variables from .env file
$env = parse_ini_file('../.env');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validasi password harus ada huruf besar, kecil, angka, minimal 8 karakter
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        header("Location: ../Register Page/Index.html?error=password");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: ../Register Page/Index.html?error=mismatch");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../Register Page/Index.html?error=exists");
        exit();
    }
    
    // Generate verification token
    $verification_token = bin2hex(random_bytes(32));
    $verification_expires = date('Y-m-d H:i:s', time() + 24*3600); // 24 hours expiry
    
    // Insert user with verification token
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, email_verified, verification_token, verification_expires) VALUES (?, ?, ?, 0, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $hashed_password, $verification_token, $verification_expires);

    if ($stmt->execute()) {
        // Create verification link
        $verification_link = "http://" . $_SERVER['HTTP_HOST'] . "/Tugas/php/verify_email.php?token=" . $verification_token;
        
        // Send verification email with PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Set to 2 for verbose debug output
            $mail->isSMTP();
            $mail->Host = $env['MAIL_HOST'] ?? 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $env['MAIL_USERNAME'] ?? 'your-email@gmail.com';
            $mail->Password = $env['MAIL_PASSWORD'] ?? 'your-app-password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $env['MAIL_PORT'] ?? 587;
            
            // Recipients
            $mail->setFrom($env['MAIL_FROM'] ?? 'your-email@gmail.com', $env['MAIL_FROM_NAME'] ?? 'PurpleSite Admin');
            $mail->addAddress($email);
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Verifikasi Email PurpleSite';
            $mail->Body = "<p>Halo {$username},</p>
                <p>Terima kasih telah mendaftar di PurpleSite.</p>
                <p>Silakan klik link berikut untuk memverifikasi email Anda:</p>
                <p><a href='{$verification_link}'>{$verification_link}</a></p>
                <p>Link ini akan kedaluwarsa dalam 24 jam.</p>
                <p>Terima kasih,<br>Tim PurpleSite</p>";
            
            $mail->send();
        } catch (Exception $e) {
            // Log error but continue with registration
            error_log("Failed to send verification email: {$mail->ErrorInfo}");
            
            // Add more detailed error logging for debugging
            error_log("PHPMailer Error in Register.php: " . $e->getMessage());
            
            // Check for common SMTP errors
            if (strpos($e->getMessage(), 'authenticate') !== false) {
                error_log("Authentication error: Check MAIL_USERNAME and MAIL_PASSWORD in .env file");
            } elseif (strpos($e->getMessage(), 'connect') !== false) {
                error_log("Connection error: Check MAIL_HOST and MAIL_PORT in .env file");
            } elseif (strpos($e->getMessage(), 'timed out') !== false) {
                error_log("Timeout error: Check network connection");
            }
        }
        
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrasi Berhasil</title>
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
                
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: "Poppins", sans-serif;
                }
                
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    background: url(../Foto/img.jpg) no-repeat;
                    background-size: cover;
                    background-position: center;
                }
                
                .success-container {
                    width: 420px;
                    background: transparent;
                    border: 2px solid rgba(255, 255, 255, .2);
                    backdrop-filter: blur(20px);
                    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
                    color: #fff;   
                    border-radius: 10px;
                    padding: 30px 40px;
                    text-align: center;
                }
                
                .success-icon {
                    font-size: 80px;
                    color: #4CAF50;
                    margin-bottom: 20px;
                    animation: bounce 2s ease infinite;
                }
                
                .success-container h1 {
                    font-size: 28px;
                    margin-bottom: 15px;
                }
                
                .success-container p {
                    margin-bottom: 25px;
                    line-height: 1.6;
                }
                
                .username {
                    font-weight: 600;
                    color: #4CAF50;
                }
                
                .btn {
                    display: inline-block;
                    padding: 12px 30px;
                    background: #fff;
                    color: #333;
                    border-radius: 40px;
                    text-decoration: none;
                    font-weight: 600;
                    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
                    transition: all 0.3s ease;
                }
                
                .btn:hover {
                    background: #f0f0f0;
                    transform: scale(1.05);
                }
                
                .countdown {
                    margin-top: 20px;
                    font-size: 14px;
                    color: rgba(255, 255, 255, 0.8);
                }
                
                @keyframes bounce {
                    0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
                    40% {transform: translateY(-20px);}
                    60% {transform: translateY(-10px);}
                }
            </style>
        </head>
        <body>
            <div class="success-container">
                <i class='bx bx-check-circle success-icon'></i>
                <h1>Registrasi Berhasil!</h1>
                <p>Selamat <span class="username"><?php echo htmlspecialchars($username); ?></span>, akun Anda telah berhasil dibuat.</p>
                <p>Silakan periksa email Anda untuk melakukan verifikasi. Anda perlu memverifikasi email sebelum dapat login.</p>
                <p>Jika Anda tidak menerima email verifikasi, periksa folder spam atau junk Anda.</p>
                <a href="../Login page/Index.html" class="btn">Ke Halaman Login</a>
                <div class="countdown">
                    Dialihkan ke halaman login dalam <span id="timer">10</span> detik
                </div>
            </div>
            
            <script>
                let timeLeft = 10;
                const timerElement = document.getElementById('timer');
                
                const countdown = setInterval(function() {
                    timeLeft--;
                    timerElement.textContent = timeLeft;
                    
                    if (timeLeft <= 0) {
                        clearInterval(countdown);
                        window.location.href = '../Login page/Index.html';
                    }
                }, 1000);
            </script>
        </body>
        </html>
        <?php
    } else {
        header("Location: ../Register Page/Index.html?error=failed");
        exit();
    }
}
?>