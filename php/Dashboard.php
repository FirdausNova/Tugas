<?php
session_start();

// Cek jika user belum login
if (!isset($_SESSION["username"])) {
    header("Location: ../Login Page/Index.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            background: url(../Foto/img.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            color: #fff;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background: rgba(48, 16, 80, 0.3);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        
        .logo a {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
        }
        
        /* User menu styling - diambil dari Style.css */
        .user-menu {
            position: relative;
        }
        
        .user-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 40px;
            padding: 0.5rem 1.2rem;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .user-button:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .user-button i.bxs-user-circle {
            font-size: 1.5rem;
        }
        
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 220px;
            background: rgba(48, 16, 80, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            color: #fff;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .dropdown-item i {
            font-size: 1.2rem;
        }
        
        .dropdown-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 5px 0;
        }
        
        .dropdown-item.logout {
            color: #ff6b6b;
        }
        
        .dropdown-item.logout:hover {
            background: rgba(255, 99, 99, 0.1);
        }
        
        .dropdown-item.active {
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }
        
        @keyframes pulseLogout {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .dropdown-item.logout:hover i {
            animation: pulseLogout 0.8s infinite;
        }
        
        .container {
            max-width: 1200px;
            margin: 100px auto 40px; /* Increased top margin to accommodate fixed navbar */
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        .welcome-card {
            text-align: center;
            padding: 40px 20px;
            margin-bottom: 30px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }
        
        .welcome-card h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .welcome-card .username {
            color: #4CAF50;
            font-weight: 700;
        }
        
        .welcome-card p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .stat-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .stat-card p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        /* Responsive styling for mobile */
        @media screen and (max-width: 1000px) {
            .dropdown-menu {
                position: fixed;
                top: auto;
                right: auto;
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">PurpleSite</a>
        </div>
        <div class="navbar-right">
            <div class="user-menu">
                <div class="user-button">
                    <i class='bx bxs-user-circle'></i>
                    <span><?php echo htmlspecialchars($username); ?></span>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="dropdown-menu">
                    <a href="../Navbar/Navbar.php" class="dropdown-item active"><i class='bx bxs-home'></i> Home</a>
                    <a href="#" class="dropdown-item"><i class='bx bxs-user-detail'></i> Profil</a>
                    <a href="#" class="dropdown-item"><i class='bx bxs-cog'></i> Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item logout"><i class='bx bx-log-out'></i> Keluar</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="welcome-card">
            <h1>Selamat Datang, <span class="username"><?php echo htmlspecialchars($username); ?></span>!</h1>
            <p>Anda telah berhasil login ke dashboard aplikasi. Sekarang Anda dapat mengakses semua fitur dan layanan yang tersedia.</p>
        </div>
        
        <div class="dashboard-stats">
            <div class="stat-card">
                <i class='bx bx-user'></i>
                <h3>Profil Pengguna</h3>
                <p>Kelola informasi pribadi dan pengaturan akun Anda</p>
            </div>
            
            <div class="stat-card">
                <i class='bx bx-message-square-detail'></i>
                <h3>Pesan</h3>
                <p>0 pesan baru menunggu untuk dibaca</p>
            </div>
            
            <div class="stat-card">
                <i class='bx bx-bell'></i>
                <h3>Notifikasi</h3>
                <p>Tidak ada notifikasi baru untuk saat ini</p>
            </div>
            
            <div class="stat-card">
                <i class='bx bx-cog'></i>
                <h3>Pengaturan</h3>
                <p>Konfigurasi preferensi dan keamanan akun</p>
            </div>
        </div>
    </div>

    <script>
        // Script untuk user dropdown menu
        const userButton = document.querySelector('.user-button');
        if (userButton) {
            userButton.addEventListener('click', () => {
                document.querySelector('.dropdown-menu').classList.toggle('show');
            });
            
            // Menutup dropdown jika user klik di luar
            window.addEventListener('click', (e) => {
                if (!e.target.closest('.user-menu')) {
                    const dropdown = document.querySelector('.dropdown-menu');
                    if (dropdown && dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            });
        }
    </script>
</body>
</html>