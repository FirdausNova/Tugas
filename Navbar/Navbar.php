<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Beranda</title>
    <link rel="stylesheet" href="../css/Stylenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Hero section styling */
        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 0 2rem;
            background: linear-gradient(rgba(48, 16, 80, 0.5), rgba(48, 16, 80, 0.7));
            margin-top: -80px; /* To counteract the padding-top in .content */
        }
        
        .hero-content {
            max-width: 800px;
            animation: fadeIn 1s ease;
        }
        
        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .hero-buttons a {
            text-decoration: none;
            padding: 0.8rem 2.5rem;
            border-radius: 40px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .primary-btn {
            background: #fff;
            color: rgb(48, 16, 80);
        }
        
        .primary-btn:hover {
            background: rgba(255, 255, 255, 0.8);
            transform: scale(1.05);
        }
        
        .secondary-btn {
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .secondary-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Features section */
        .features-section {
            padding: 5rem 10%;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            color: rgb(48, 16, 80);
            margin-bottom: 3rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: rgb(48, 16, 80);
        }
        
        .feature-card p {
            color: #666;
            line-height: 1.6;
        }
        
        /* Call to action section */
        .cta-section {
            background: linear-gradient(to right, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
            padding: 4rem 10%;
            text-align: center;
        }
        
        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .cta-section p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2rem auto;
        }
        
        /* Footer styling */
        footer {
            background: rgb(30, 10, 50);
            color: #fff;
            padding: 3rem 10%;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        
        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .footer-desc {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }
        
        .footer-links h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .footer-links h3:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 40px;
            height: 2px;
            background: rgba(255, 255, 255, 0.5);
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #fff;
            padding-left: 5px;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .footer-social a:hover {
            background: #fff;
            color: rgb(48, 16, 80);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .section-title {
                font-size: 1.8rem;
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
            <li><a href="Tentang.php">Tentang</a></li>
            <li><a href="Layanan.php">Layanan</a></li>
            <li><a href="Portofolio.php">Portofolio</a></li>
            <li><a href="Kontak.php">Kontak</a></li>
        </ul>
        
        <div class="auth-buttons">
            <?php
            if(isset($_SESSION["username"])) {
                // Jika user sudah login - redirect langsung ke dashboard saat klik user button
                echo '<div class="user-menu">
                    <a href="../php/Dashboard.php" class="user-button">
                        <i class="bx bxs-user-circle"></i>
                        <span>' . $_SESSION["username"] . '</span>
                        <i class="bx bx-chevron-down"></i>
                    </a>
                </div>';
            } else {
                // Jika user belum login - hanya menampilkan tombol Daftar
                echo '<a href="../Login Page/Index.html" class="register-btn">Login</a>';
            }
            ?>
        </div>
        
        <div class="hamburger">
            <i class='bx bx-menu'></i>
        </div>
    </nav>

    <div class="content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <h1>Selamat Datang di PurpleSite</h1>
                <p>Platform digital terdepan untuk kebutuhan pengembangan web, desain grafis, dan solusi IT terpadu yang inovatif dan profesional.</p>
            </div>
        </section>
        
        <!-- Features Section -->
        <section class="features-section" id="layanan">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-code-alt'></i>
                    </div>
                    <h3>Pengembangan Web</h3>
                    <p>Layanan pembuatan website profesional dengan teknologi terkini, responsif, dan performa tinggi untuk bisnis Anda.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-palette'></i>
                    </div>
                    <h3>Desain Grafis</h3>
                    <p>Jasa desain visual berkualitas untuk brand identity, marketing material, dan konten digital yang menarik perhatian.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-mobile-alt'></i>
                    </div>
                    <h3>Aplikasi Mobile</h3>
                    <p>Pengembangan aplikasi mobile Android dan iOS yang user-friendly dengan fitur canggih untuk kebutuhan bisnis Anda.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-line-chart'></i>
                    </div>
                    <h3>Digital Marketing</h3>
                    <p>Strategi pemasaran digital komprehensif untuk meningkatkan visibilitas online dan pertumbuhan bisnis Anda.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-server'></i>
                    </div>
                    <h3>Hosting & Domain</h3>
                    <p>Layanan hosting cepat dan handal dengan dukungan teknis 24/7 untuk memastikan website Anda selalu online.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-shield-quarter'></i>
                    </div>
                    <h3>Keamanan Digital</h3>
                    <p>Solusi keamanan digital lengkap untuk melindungi data dan aset digital bisnis Anda dari ancaman cyber.</p>
                </div>
            </div>
        </section>
        
        <!-- Call to Action Section -->
        <?php
        if(!isset($_SESSION["username"])) {
        echo'<section class="cta-section" id="kontak">
            <h2>Siap Untuk Memulai Proyek Anda?</h2>
            <p>Bergabunglah bersama ribuan klien puas yang telah mempercayakan proyek digital mereka kepada tim profesional kami.</p>
            <html>
            <div class="hero-buttons">
                <a href="../Register Page/Index.html" class="primary-btn">Daftar Sekarang</a>
            </div>
            </html>
        </section>';
        }
        ?>
        
        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">PurpleSite</div>
                    <p class="footer-desc">Platform solusi digital terpadu untuk kebutuhan pengembangan web, desain, dan layanan IT profesional.</p>
                    <div class="footer-social">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="https://github.com/FirdausNova"><i class='bx bxl-github'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3>Halaman</h3>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Portofolio</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Pengembangan Web</a></li>
                        <li><a href="#">Desain Grafis</a></li>
                        <li><a href="#">Aplikasi Mobile</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Hosting & Domain</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Kontak</h3>
                    <ul>
                        <li><i class='bx bx-map'></i> Jl. Raya Utama No. 123, Jakarta</li>
                        <li><i class='bx bx-phone'></i> +62 812 3456 7890</li>
                        <li><i class='bx bx-envelope'></i> info@purplesite.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                &copy; 2025 PurpleSite. All Rights Reserved.
            </div>
        </footer>
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
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>