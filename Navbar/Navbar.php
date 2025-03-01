<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Additional mobile-specific fixes */
        @media screen and (max-width: 1000px) {
            .nav-links.active {
                left: 0;
                padding-top: 20px;
                padding-bottom: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            .auth-buttons.active {
                left: 0;
                padding-top: 20px;
                padding-bottom: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            .dropdown-menu {
                width: 80% !important;
                left: 50% !important;
                transform: translateX(-50%) translateY(-10px) !important;
                margin: 0 auto;
                top: 380px !important;
            }
            
            .dropdown-menu.show {
                transform: translateX(-50%) translateY(0) !important;
            }
            
            .user-menu {
                width: 100%;
                display: flex;
                justify-content: center;
            }
            
            .nav-links, .auth-buttons {
                z-index: 999;
            }
            
            body.menu-open {
                overflow: hidden;
            }
            
            .auth-buttons .user-button {
                width: 80%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">PurpleSite</a>
        </div>
        
        <ul class="nav-links">
            <li><a href="#" class="active">Beranda</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Portofolio</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
        
        <div class="auth-buttons">
            <?php
            session_start();
            if(isset($_SESSION["username"])) {
                // Jika user sudah login
                echo '<div class="user-menu">
                    <div class="user-button">
                        <i class="bx bxs-user-circle"></i>
                        <span>' . $_SESSION["username"] . '</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <div class="dropdown-menu">
                        <a href="../php/Dashboard.php" class="dropdown-item"><i class="bx bxs-dashboard"></i> Dashboard</a>
                        <a href="#" class="dropdown-item"><i class="bx bxs-user-detail"></i> Profil</a>
                        <a href="#" class="dropdown-item"><i class="bx bxs-cog"></i> Pengaturan</a>
                        <div class="dropdown-divider"></div>
                        <a href="../php/logout.php" class="dropdown-item logout"><i class="bx bx-log-out"></i> Keluar</a>
                    </div>
                </div>';
            } else {
                // Jika user belum login
                echo '<a href="../Login page/Index.html" class="login-btn">Masuk</a>
                      <a href="../Register Page/Index.html" class="register-btn">Daftar</a>';
            }
            ?>
        </div>
        
        <div class="hamburger">
            <i class='bx bx-menu'></i>
        </div>
    </nav>

    <div class="content">
        <!-- Konten halaman akan berada di sini -->
    </div>

    <script>
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const authButtons = document.querySelector('.auth-buttons');
        const body = document.querySelector('body');
        
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            authButtons.classList.toggle('active');
            hamburger.classList.toggle('active');
            
            // Toggle body scroll lock when menu is open
            if (navLinks.classList.contains('active')) {
                body.classList.add('menu-open');
            } else {
                body.classList.remove('menu-open');
            }
            
            // Change hamburger icon
            if (hamburger.classList.contains('active')) {
                hamburger.innerHTML = '<i class="bx bx-x"></i>';
            } else {
                hamburger.innerHTML = '<i class="bx bx-menu"></i>';
            }
        });

        // Tambahkan event listener untuk dropdown menu user
        const userButton = document.querySelector('.user-button');
        if (userButton) {
            userButton.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent event from bubbling up
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
        
        // Close mobile menu when clicking on links
        const navItems = document.querySelectorAll('.nav-links li a');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth <= 1000) {
                    navLinks.classList.remove('active');
                    authButtons.classList.remove('active');
                    hamburger.classList.remove('active');
                    body.classList.remove('menu-open');
                    hamburger.innerHTML = '<i class="bx bx-menu"></i>';
                }
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 1000) {
                navLinks.classList.remove('active');
                authButtons.classList.remove('active');
                hamburger.classList.remove('active');
                body.classList.remove('menu-open');
                hamburger.innerHTML = '<i class="bx bx-menu"></i>';
            }
        });
    </script>
</body>
</html>