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
    $stmt = $conn->prepare("SELECT id, username, verification_expires FROM users WHERE verification_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $expiry_time = strtotime($user['verification_expires']);
        
        if (time() <= $expiry_time) {
            // Update user as verified
            $update = $conn->prepare("UPDATE users SET email_verified = 1, verification_token = NULL, verification_expires = NULL WHERE verification_token = ?");
            $update->bind_param("s", $token);
            
            if ($update->execute()) {
                $success_message = "Email berhasil diverifikasi! Akun Anda sekarang aktif. Silakan login untuk melanjutkan.";
            } else {
                $error_message = "Terjadi kesalahan saat memverifikasi email. Silakan coba lagi.";
            }
        } else {
            $error_message = "Link verifikasi email sudah kedaluwarsa. Silakan minta link baru.";
        }
    } else {
        $error_message = "Token tidak valid. Silakan minta link verifikasi email baru.";
    }
} else {
    $error_message = "Token tidak ditemukan. Silakan minta link verifikasi email baru.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - PurpleSite</title>
    <link rel="stylesheet" href="../Login page/Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .alert {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 15px;
            text-align: center;
            line-height: 1.6;
        }
        
        .alert-success {
            background-color: rgba(72, 187, 120, 0.2);
            border-left: 4px solid #48bb78;
            color: #fff;
            position: relative;
            padding-top: 60px;
        }
        
        .alert-danger {
            background-color: rgba(245, 101, 101, 0.2);
            border-left: 4px solid #f56565;
            color: #fff;
        }
        
        .alert-info {
            background-color: rgba(66, 153, 225, 0.2);
            border-left: 4px solid #4299e1;
            color: #fff;
        }
        
        .success-icon {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(72, 187, 120, 0.8);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: bounceIn 0.6s ease;
        }
        
        .btn-login {
            display: inline-block;
            background: linear-gradient(to right, #a760ff, #7e3bff);
            color: white;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(123, 59, 255, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(123, 59, 255, 0.4);
        }
        
        .btn-login i {
            margin-left: 8px;
        }
        
        .form-box {
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes bounceIn {
            0% { transform: translateX(-50%) scale(0); }
            50% { transform: translateX(-50%) scale(1.2); }
            100% { transform: translateX(-50%) scale(1); }
        }
        
        .top-header {
            margin-bottom: 30px;
        }
        
        .top-header h3 {
            font-size: 28px;
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="top-header">
                <h3>Verifikasi Email</h3>
            </div>
            
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success">
                    <div class="success-icon">
                        <i class='bx bx-check'></i>
                    </div>
                    <?php echo $success_message; ?>
                    <div>
                        <a href="../Login page/Index.html" class="btn-login">Login Sekarang <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if (empty($success_message) && empty($error_message)): ?>
                <div class="alert alert-info">
                    <i class='bx bx-loader-alt bx-spin' style="font-size: 24px; margin-right: 10px;"></i>
                    Memverifikasi email Anda...
                </div>
            <?php endif; ?>
            
            <?php if (!empty($error_message)): ?>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="../Login page/Index.html" class="btn-login">Kembali ke Halaman Login <i class='bx bx-home-alt'></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>