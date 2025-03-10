<?php
session_start();
include 'koneksi.php';

// Menangani pesan sukses logout
$logout_message = '';
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    $logout_user = isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'Anda';
    $logout_message = '<div class="logout-success">
        <i class="bx bx-check-circle"></i>
        <p>' . $logout_user . ' berhasil keluar</p>
    </div>';
}

// Pesan error default kosong
$error_message = '';

// Cek cookie untuk fitur "Ingat Saya"
if (!isset($_SESSION["username"]) && isset($_COOKIE["remember_user"]) && isset($_COOKIE["remember_token"])) {
    $username = $_COOKIE["remember_user"];
    $token = $_COOKIE["remember_token"];
    
    // Verifikasi token di database
    $query = "SELECT * FROM users WHERE username = ? AND remember_token = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];
        header("Location: ../Navbar/Navbar.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $remember = isset($_POST["remember"]) ? true : false;

    if (empty($username) || empty($password)) {
        $error_message = "Username atau password tidak boleh kosong!";
    } else {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                // Check if email is verified
                if (isset($user["email_verified"]) && $user["email_verified"] == 0) {
                    $error_message = "Email belum diverifikasi. Silakan cek email Anda untuk verifikasi.";
                } else {
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["email"] = $user["email"];
                    
                    // Jika "Ingat Saya" dicentang
                    if ($remember) {
                        // Generate token unik
                        $token = bin2hex(random_bytes(32));
                        
                        // Simpan token ke database
                        $updateQuery = "UPDATE users SET remember_token = ? WHERE username = ?";
                        $updateStmt = $conn->prepare($updateQuery);
                        $updateStmt->bind_param("ss", $token, $username);
                        $updateStmt->execute();
                        
                        // Set cookie yang bertahan 30 hari
                        setcookie("remember_user", $username, time() + (86400 * 30), "/");
                        setcookie("remember_token", $token, time() + (86400 * 30), "/");
                    }
                    
                    header("Location: ../Navbar/Navbar.php");
                    exit();
                }
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Username tidak ditemukan!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PurpleSite</title>
    <link rel="stylesheet" href="../Login page/Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Styling untuk notifikasi logout success */
        .logout-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: rgba(72, 187, 120, 0.2);
            border-left: 4px solid #48bb78;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 4px;
            animation: slideIn 0.5s ease, fadeOut 0.5s ease 5s forwards;
        }
        
        .logout-success i {
            font-size: 24px;
            color: #48bb78;
        }
        
        .logout-success p {
            color: #2f855a;
            font-weight: 500;
        }
        
        /* Custom Alert Styling */
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateX(150%);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            max-width: 350px;
        }
        
        .custom-alert.show {
            transform: translateX(0);
        }
        
        .custom-alert.error {
            background-color: rgba(245, 101, 101, 0.95);
            border-left: 4px solid #e53e3e;
        }
        
        .custom-alert.success {
            background-color: rgba(72, 187, 120, 0.95);
            border-left: 4px solid #38a169;
        }
        
        .custom-alert i {
            font-size: 24px;
            color: white;
        }
        
        .custom-alert p {
            color: white;
            font-weight: 500;
            margin: 0;
        }
        
        .custom-alert .close-alert {
            position: absolute;
            top: 8px;
            right: 8px;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            font-size: 16px;
        }
        
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; height: 0; padding: 0; margin: 0; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Form login HTML di sini -->
        <div class="wrapper">
            <form action="" method="post">
                <h1>Login</h1>
                
                <!-- Tampilkan pesan sukses logout jika ada -->
                <?php echo $logout_message; ?>
                
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username Dibutuhkan">
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password Dibutuhkan">
                    <i class="bx bx-hide toggle-password" onclick="togglePassword('password')"></i>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember" value="1">Ingat Saya</label>
                    <a href="../php/forgot_password.php">Lupa Sandi</a>
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="register-link">
                    <p>Tidak Punya Akun? <a href="../Register Page/Index.html">Daftar Sekarang</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Container untuk custom alert -->
    <div id="customAlert" class="custom-alert">
        <i class="bx bx-error-circle" id="alertIcon"></i>
        <p id="alertMessage"></p>
        <i class="bx bx-x close-alert" onclick="closeAlert()"></i>
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
            
            //animasi ikon
            toggleIcon.classList.add('pulse-animation');
            setTimeout(() => {
                toggleIcon.classList.remove('pulse-animation');
            }, 300);
        }

        // Fungsi untuk menampilkan custom alert
        function showAlert(message, type = 'error') {
            const alertBox = document.getElementById('customAlert');
            const alertMessage = document.getElementById('alertMessage');
            const alertIcon = document.getElementById('alertIcon');
            
            alertMessage.textContent = message;
            
            // Reset class
            alertBox.className = 'custom-alert';
            
            // Tambahkan class berdasarkan tipe
            alertBox.classList.add(type);
            
            // Ganti icon berdasarkan tipe
            if (type === 'error') {
                alertIcon.className = 'bx bx-error-circle';
            } else if (type === 'success') {
                alertIcon.className = 'bx bx-check-circle';
            }
            
            // Tampilkan alert
            setTimeout(() => {
                alertBox.classList.add('show');
            }, 100);
            
            // Sembunyikan secara otomatis setelah beberapa detik
            setTimeout(() => {
                closeAlert();
            }, 5000);
        }
        
        // Fungsi untuk menutup custom alert
        function closeAlert() {
            const alertBox = document.getElementById('customAlert');
            alertBox.classList.remove('show');
        }
        
        // Jalankan showAlert jika ada pesan error
        <?php if (!empty($error_message)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('<?php echo $error_message; ?>', 'error');
        });
        <?php endif; ?>
    </script>
</body>
</html>