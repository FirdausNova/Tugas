<?php
session_start();
include 'Koneksi.php';

// Initialize variables
$error_message = '';
$success_message = '';
$token = '';
$token_valid = false;

// Check if token is provided in URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Verify token exists and is not expired
    $stmt = $conn->prepare("SELECT id, username, reset_expires FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $expiry_time = strtotime($user['reset_expires']);
        
        if (time() <= $expiry_time) {
            $token_valid = true;
        } else {
            $error_message = "Link reset password sudah kedaluwarsa. Silakan minta link baru.";
        }
    } else {
        $error_message = "Token tidak valid. Silakan minta link reset password baru.";
    }
} else {
    $error_message = "Token tidak ditemukan. Silakan minta link reset password baru.";
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && $token_valid) {
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    // Validate password
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $error_message = "Password harus memiliki minimal 8 karakter, termasuk huruf besar, huruf kecil, dan angka.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Konfirmasi password tidak cocok.";
    } else {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Update password and clear reset token
        $update = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
        $update->bind_param("ss", $hashed_password, $token);
        
        if ($update->execute()) {
            $success_message = "Password berhasil diubah. Silakan login dengan password baru Anda.";
            $token_valid = false; // Prevent form from being shown
        } else {
            $error_message = "Gagal mengubah password. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PurpleSite</title>
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
        
        .password-requirements {
            margin-top: 10px;
            font-size: 12px;
            color: #fff;
            text-align: left;
            padding-left: 10px;
        }
        
        .password-requirements ul {
            margin: 5px 0 0 15px;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
            <div class="back-to-login">
                <a href="../php/Login.php"><i class='bx bx-arrow-back'></i> Kembali ke Login</a>
            </div>
        <?php elseif ($token_valid): ?>
            <form action="?token=<?php echo htmlspecialchars($token); ?>" method="post">
                <h1>Reset Password</h1>
                <p style="text-align: center; margin-bottom: 20px; color: #fff;">Buat password baru untuk akun Anda</p>
                
                <?php if (!empty($error_message)): ?>
                <div class="alert alert-error">
                    <?php echo $error_message; ?>
                </div>
                <?php endif; ?>
                
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password Baru" required>
                    <i class='bx bx-hide toggle-password' onclick="togglePassword('password')"></i>
                </div>
                
                <div class="password-requirements">
                    Password harus memiliki:
                    <ul>
                        <li>Minimal 8 karakter</li>
                        <li>Minimal 1 huruf besar</li>
                        <li>Minimal 1 huruf kecil</li>
                        <li>Minimal 1 angka</li>
                    </ul>
                </div>
                
                <div class="input-box">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
                    <i class='bx bx-hide toggle-password' onclick="togglePassword('confirm_password')"></i>
                </div>

                <button type="submit" class="btn">Ubah Password</button>
            </form>
        <?php else: ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
            <div class="back-to-login">
                <a href="../php/forgot_password.php"><i class='bx bx-arrow-back'></i> Minta Link Reset Baru</a>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bx-hide');
                toggleIcon.classList.add('bx-show');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bx-show');
                toggleIcon.classList.add('bx-hide');
            }
        }
    </script>
</body>
</html>