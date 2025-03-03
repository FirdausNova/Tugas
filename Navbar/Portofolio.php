<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Portofolio</title>
    <link rel="stylesheet" href="../css/Stylenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Portfolio page specific styling */
        .portfolio-hero {
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 0 2rem;
            background: linear-gradient(rgba(48, 16, 80, 0.5), rgba(48, 16, 80, 0.7));
            margin-top: -80px; /* To counteract the padding-top in .content */
        }
        
        .portfolio-hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .portfolio-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Portfolio filter section */
        .portfolio-filter {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem 10%;
            text-align: center;
        }
        
        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .filter-btn {
            padding: 0.6rem 1.5rem;
            background: white;
            color: rgb(48, 16, 80);
            border: 2px solid rgb(48, 16, 80);
            border-radius: 30px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: rgb(48, 16, 80);
            color: white;
        }
        
        /* Portfolio gallery */
        .portfolio-gallery {
            padding: 3rem 10%;
            background: rgba(255, 255, 255, 0.95);
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .portfolio-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .portfolio-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }
        
        .portfolio-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(48, 16, 80, 0.9);
            color: white;
            padding: 1.5rem;
            transform: translateY(100%);
            transition: all 0.3s ease;
        }
        
        .portfolio-item:hover .portfolio-overlay {
            transform: translateY(0);
        }
        
        .portfolio-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }
        
        .portfolio-category {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 1rem;
        }
        
        .portfolio-desc {
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }
        
        .portfolio-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .portfolio-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(5px);
        }
        
        /* Client section */
        .clients-section {
            padding: 4rem 10%;
            background: white;
            text-align: center;
        }
        
        .section-title {
            font-size: 2.2rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto 3rem auto;
        }
        
        .client-logos {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .client-logo {
            width: 150px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .client-logo:hover {
            opacity: 1;
            transform: scale(1.1);
        }
        
        .client-logo i {
            font-size: 3rem;
            color: rgb(48, 16, 80);
        }
        
        /* Testimonial section */
        .testimonial-section {
            padding: 4rem 10%;
            background: linear-gradient(to right, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
        }
        
        .testimonial-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 3rem;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 2rem;
            position: relative;
        }
        
        .testimonial-text {
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            margin-right: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .author-avatar i {
            font-size: 1.8rem;
        }
        
        .author-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }
        
        .author-info p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .quote-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2rem;
            opacity: 0.2;
        }
        
        /* Call to action */
        .cta-section {
            background: white;
            padding: 4rem 10%;
            text-align: center;
        }

        /* Footer styling - kept from your original file */
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
            .portfolio-hero h1 {
                font-size: 2.5rem;
            }
            
            .filter-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .filter-btn {
                width: 80%;
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
            <li><a href="Navbar.php">Beranda</a></li>
            <li><a href="Tentang.php">Tentang</a></li>
            <li><a href="Layanan.php">Layanan</a></li>
            <li><a href="#" class="active">Portofolio</a></li>
            <li><a href="#">Kontak</a></li>
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
        <!-- Hero Section for Portfolio -->
        <section class="portfolio-hero">
            <div class="hero-content">
                <h1>Portofolio Karya Kami</h1>
                <p>Kumpulan proyek terbaik yang telah kami selesaikan dengan dedikasi dan profesionalisme untuk klien-klien terpercaya.</p>
            </div>
        </section>
        
        <!-- Portfolio Filter Section -->
        <section class="portfolio-filter">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Semua Proyek</button>
                <button class="filter-btn" data-filter="web">Pengembangan Web</button>
                <button class="filter-btn" data-filter="mobile">Aplikasi Mobile</button>
                <button class="filter-btn" data-filter="design">Desain Grafis</button>
                <button class="filter-btn" data-filter="branding">Branding</button>
                <button class="filter-btn" data-filter="marketing">Digital Marketing</button>
            </div>
        </section>
        
        <!-- Portfolio Gallery -->
        <section class="portfolio-gallery">
            <div class="gallery-grid">
                <!-- Project 1 -->
                <div class="portfolio-item" data-category="web">
                    <img src="/api/placeholder/600/400" alt="E-commerce Website" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">MegaMart E-commerce</h3>
                        <p class="portfolio-category">Pengembangan Web</p>
                        <p class="portfolio-desc">Platform e-commerce lengkap dengan sistem pembayaran terintegrasi dan dashboard admin yang komprehensif.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="portfolio-item" data-category="mobile">
                    <img src="/api/placeholder/600/400" alt="Finance App" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">FinTrack - Financial App</h3>
                        <p class="portfolio-category">Aplikasi Mobile</p>
                        <p class="portfolio-desc">Aplikasi pelacak keuangan dengan visualisasi data, pengingat tagihan, dan integrasi perbankan.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 3 -->
                <div class="portfolio-item" data-category="design">
                    <img src="/api/placeholder/600/400" alt="Brand Identity" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">GreenLife Organics</h3>
                        <p class="portfolio-category">Desain Grafis</p>
                        <p class="portfolio-desc">Identitas visual lengkap termasuk logo, kemasan produk, dan materi pemasaran untuk bisnis produk organik.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 4 -->
                <div class="portfolio-item" data-category="branding">
                    <img src="/api/placeholder/600/400" alt="Hotel Branding" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Luxe Hotel & Resorts</h3>
                        <p class="portfolio-category">Branding</p>
                        <p class="portfolio-desc">Rebrand menyeluruh untuk jaringan hotel dengan fokus pada pengalaman mewah dan ramah lingkungan.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 5 -->
                <div class="portfolio-item" data-category="marketing">
                    <img src="/api/placeholder/600/400" alt="Marketing Campaign" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">FreshFit Campaign</h3>
                        <p class="portfolio-category">Digital Marketing</p>
                        <p class="portfolio-desc">Kampanye digital multi-platform yang meningkatkan keterlibatan pengguna sebesar 200% dalam 3 bulan.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 6 -->
                <div class="portfolio-item" data-category="web">
                    <img src="/api/placeholder/600/400" alt="Educational Platform" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">EduConnect</h3>
                        <p class="portfolio-category">Pengembangan Web</p>
                        <p class="portfolio-desc">Platform edukasi dengan fitur video conference, kuis interaktif, dan sistem manajemen konten yang mudah digunakan.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 7 -->
                <div class="portfolio-item" data-category="mobile">
                    <img src="/api/placeholder/600/400" alt="Health App" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">HealthPulse</h3>
                        <p class="portfolio-category">Aplikasi Mobile</p>
                        <p class="portfolio-desc">Aplikasi kesehatan yang melacak aktivitas fisik, nutrisi, dan menyediakan rencana kesehatan personal.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 8 -->
                <div class="portfolio-item" data-category="design">
                    <img src="/api/placeholder/600/400" alt="Magazine Design" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Urban Lifestyle Magazine</h3>
                        <p class="portfolio-category">Desain Grafis</p>
                        <p class="portfolio-desc">Desain editorial untuk majalah gaya hidup urban dengan layout modern dan tipografi yang dinamis.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <!-- Project 9 -->
                <div class="portfolio-item" data-category="branding">
                    <img src="/api/placeholder/600/400" alt="Restaurant Branding" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Spice Garden Restaurant</h3>
                        <p class="portfolio-category">Branding</p>
                        <p class="portfolio-desc">Identitas brand lengkap untuk restoran fusion Asia termasuk logo, menu, dan interior signage.</p>
                        <a href="#" class="portfolio-link">Lihat Detail <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Clients Section -->
        <section class="clients-section">
            <h2 class="section-title">Klien Terpercaya Kami</h2>
            <p class="section-subtitle">Kami bangga telah berkolaborasi dengan berbagai bisnis dan organisasi terkemuka.</p>
            
            <div class="client-logos">
                <div class="client-logo">
                    <i class='bx bxl-amazon'></i>
                </div>
                <div class="client-logo">
                    <i class='bx bxl-microsoft'></i>
                </div>
                <div class="client-logo">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
                <div class="client-logo">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="client-logo">
                    <i class='bx bxl-spotify'></i>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <?php
        if(!isset($_SESSION["username"])) {
        echo '<section class="cta-section">
            <h2 class="section-title">Siap Membuat Proyek Anda Selanjutnya?</h2>
            <p class="section-subtitle">Jadikan PurpleSite sebagai partner digital Anda untuk hasil yang maksimal dan profesional.</p>
            <div class="hero-buttons">
                <a href="../Register Page/Index.html" class="primary-btn" style="background: rgb(48, 16, 80); color: #fff;">Mulai Sekarang</a>
            </div>
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
                        <li><a href="Navbar.php">Beranda</a></li>
                        <li><a href="Tentang.php">Tentang Kami</a></li>
                        <li><a href="Layanan.php">Layanan</a></li>
                        <li><a href="#">Portofolio</a></li>
                        <li><a href="Kontak.php">Kontak</a></li>
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
        // Hamburger menu functionality
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
        
        // Portfolio filtering functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                const filter = button.getAttribute('data-filter');
                
                portfolioItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 100);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
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