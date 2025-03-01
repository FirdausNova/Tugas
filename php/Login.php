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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username atau password tidak boleh kosong!'); window.location.href = 'login.php';</script>";
        exit();
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user["username"];
            header("Location: ../Navbar/Navbar.php");
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href = 'login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href = 'login.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PurpleSite</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
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
        
        <!-- Tampilkan pesan sukses logout jika ada -->
        <?php echo $logout_message; ?>
        
        <!-- Sisa dari form login Anda -->
    </div>
</body>
</html>