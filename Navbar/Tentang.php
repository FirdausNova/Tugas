<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Tentang Kami</title>
    <link rel="stylesheet" href="../css/Stylenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Hero section styling */
        .hero-section {
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 0 2rem;
            background: linear-gradient(rgba(48, 16, 80, 0.6), rgba(48, 16, 80, 0.8));
            margin-top: -80px; /* To counteract the padding-top in .content */
            position: relative;
        }
        
        .hero-content {
            max-width: 800px;
            animation: fadeIn 1s ease;
            z-index: 2;
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
        
        /* About section styling */
        .about-section {
            padding: 5rem 10%;
            background: #fff;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            color: rgb(48, 16, 80);
            margin-bottom: 3rem;
            position: relative;
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: rgb(86, 36, 136);
            transform: translateX(-50%);
        }
        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .about-image {
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }
        
        .about-image:hover img {
            transform: scale(1.05);
        }
        
        .about-text h3 {
            font-size: 1.8rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1.5rem;
        }
        
        .about-text p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        /* Mission and Vision */
        .mission-vision {
            background: rgba(240, 240, 245, 0.8);
            padding: 5rem 10%;
        }
        
        .mission-vision-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        
        .mission-card, .vision-card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .mission-card:hover, .vision-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon {
            font-size: 3rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1.5rem;
        }
        
        .mission-card h3, .vision-card h3 {
            font-size: 1.8rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .mission-card p, .vision-card p {
            color: #555;
            line-height: 1.7;
        }
        
        /* Team section */
        .team-section {
            padding: 5rem 10%;
            background: #fff;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2.5rem;
        }
        
        .team-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .team-image {
            height: 250px;
            overflow: hidden;
        }
        
        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .team-card:hover .team-image img {
            transform: scale(1.1);
        }
        
        .team-info {
            padding: 1.5rem;
            text-align: center;
        }
        
        .team-info h3 {
            font-size: 1.3rem;
            color: rgb(48, 16, 80);
            margin-bottom: 0.5rem;
        }
        
        .team-info p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .team-social {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
        }
        
        .team-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(48, 16, 80, 0.1);
            color: rgb(48, 16, 80);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .team-social a:hover {
            background: rgb(48, 16, 80);
            color: white;
        }
        
        /* Milestone section */
        .milestone-section {
            padding: 5rem 10%;
            background: linear-gradient(to right, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
        }
        
        .milestone-section .section-title {
            color: white;
        }
        
        .milestone-section .section-title:after {
            background: rgba(255, 255, 255, 0.5);
        }
        
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 0;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
        }
        
        .timeline-item {
            padding: 1.5rem 2.5rem;
            position: relative;
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 2rem;
        }
        
        .timeline-item:nth-child(odd) {
            left: 0;
        }
        
        .timeline-item:nth-child(even) {
            left: 50%;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid rgb(48, 16, 80);
            top: 1.5rem;
            border-radius: 50%;
            z-index: 1;
        }
        
        .timeline-item:nth-child(odd)::after {
            right: -14px;
        }
        
        .timeline-item:nth-child(even)::after {
            left: -14px;
        }
        
        .timeline-content {
            padding: 1.5rem;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }
        
        .timeline-year {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }
        
        .timeline-content h3 {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .timeline-content p {
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
        }
        
        /* Responsive styles */
        @media screen and (max-width: 900px) {
            .about-content {
                grid-template-columns: 1fr;
            }
            
            .mission-vision-container {
                grid-template-columns: 1fr;
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item:nth-child(even) {
                left: 0;
            }
            
            .timeline-item::after {
                left: 20px;
            }
            
            .timeline-item:nth-child(odd)::after {
                right: auto;
                left: 20px;
            }
        }
        
        @media screen and (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
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
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">PurpleSite</a>
        </div>
        
        <ul class="nav-links">
            <li><a href="Navbar.php">Beranda</a></li>
            <li><a href="#" class="active">Tentang</a></li>
            <li><a href="Layanan.php">Layanan</a></li>
            <li><a href="Portofolio.php">Portofolio</a></li>
            <li><a href="Kontak.php">Kontak</a></li>
        </ul>
        
        <div class="auth-buttons">
            <?php
           if(isset($_SESSION["username"])) {
            // Jika user sudah login - tampilkan username dengan dropdown logout
            echo '<div class="user-menu">
                <div class="user-button" id="userButton">
                    <i class="bx bxs-user-circle"></i>
                    <span>' . $_SESSION["username"] . '</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <div class="dropdown-menu" id="userDropdown">
                    <a href="../php/logout.php" class="dropdown-item logout">
                        <i class="bx bx-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
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
                <h1>Tentang Kami</h1>
                <p>Mengenal lebih dekat dengan PurpleSite dan perjalanan kami dalam memberikan solusi digital terbaik</p>
            </div>
        </section>
        
        <!-- About Section -->
        <section class="about-section">
            <h2 class="section-title">Siapa Kami?</h2>
            
            <div class="about-content">
                <div class="about-image">
                    <img src="../Foto/wmremove-transformed.jpeg" alt="Tim PurpleSite">
                </div>
                <div class="about-text">
                    <h3>Membangun Masa Depan Digital</h3>
                    <p>PurpleSite didirikan pada tahun 2020 sebagai penyedia layanan digital komprehensif yang berfokus pada pengembangan web, desain grafis, dan solusi IT terpadu. Kami memiliki komitmen untuk memberikan solusi teknologi terbaik yang membantu bisnis dan individu berkembang di era digital.</p>
                    <p>Dengan tim yang terdiri dari profesional berpengalaman di bidang pengembangan web, desain, digital marketing, dan IT security, kami telah membantu ratusan klien dari berbagai industri untuk membangun dan mengembangkan kehadiran digital mereka.</p>
                    <p>Kami percaya bahwa setiap bisnis, besar maupun kecil, layak mendapatkan solusi digital berkualitas tinggi yang sesuai dengan kebutuhan dan anggaran mereka. Itulah mengapa kami menawarkan berbagai layanan yang dapat disesuaikan dan diimplementasikan sesuai dengan tujuan dan skala bisnis klien kami.</p>
                </div>
            </div>
        </section>
        
        <!-- Mission and Vision -->
        <section class="mission-vision">
            <h2 class="section-title">Misi & Visi</h2>
            
            <div class="mission-vision-container">
                <div class="mission-card">
                    <div class="card-icon">
                        <i class='bx bx-target-lock'></i>
                    </div>
                    <h3>Misi Kami</h3>
                    <p>Misi kami adalah memberikan solusi digital inovatif dan berkualitas tinggi yang membantu klien mencapai tujuan bisnis mereka. Kami berkomitmen untuk:</p>
                    <ul style="padding-left: 20px; margin-top: 10px; color: #555; line-height: 1.7;">
                        <li>Memberikan layanan dengan standar profesional tertinggi</li>
                        <li>Mengadopsi dan menerapkan teknologi terbaru</li>
                        <li>Memahami kebutuhan unik setiap klien</li>
                        <li>Mengutamakan komunikasi yang jelas dan transparan</li>
                        <li>Memberikan dukungan berkelanjutan dan membina hubungan jangka panjang</li>
                    </ul>
                </div>
                
                <div class="vision-card">
                    <div class="card-icon">
                        <i class='bx bx-bulb'></i>
                    </div>
                    <h3>Visi Kami</h3>
                    <p>Menjadi penyedia solusi digital terdepan yang dikenal karena keahlian teknis, kreativitas, dan layanan pelanggan yang luar biasa. Kami bercita-cita untuk:</p>
                    <ul style="padding-left: 20px; margin-top: 10px; color: #555; line-height: 1.7;">
                        <li>Memimpin inovasi dalam industri pengembangan web dan desain</li>
                        <li>Membentuk standar baru dalam pengalaman pengguna digital</li>
                        <li>Memberdayakan bisnis dengan teknologi yang membuka potensi pertumbuhan</li>
                        <li>Berkontribusi pada transformasi digital yang inklusif</li>
                        <li>Menjadi mitra tepercaya untuk pertumbuhan digital berkelanjutan</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- Team Section -->
        <section class="team-section">
            <h2 class="section-title">Tim Kami</h2>
            
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="../Foto/4feba49c-nyc-ceo-portrait1.jpg" alt="CEO">
                    </div>
                    <div class="team-info">
                        <h3>Samuel Davenport</h3>
                        <p>Founder & CEO</p>
                        <div class="team-social">
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="../Foto/Desain-tanpa-judul-29-300x300.png" alt="CTO">
                    </div>
                    <div class="team-info">
                        <h3>Richard Pratama</h3>
                        <p>CTO</p>
                        <div class="team-social">
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                            <a href="#"><i class='bx bxl-github'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="../Foto/Laura_Headshot.png" alt="Design Director">
                    </div>
                    <div class="team-info">
                        <h3>Laura Duda</h3>
                        <p>Creative Director</p>
                        <div class="team-social">
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                            <a href="#"><i class='bx bxl-dribbble'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="../Foto/hs_mandy-dhaliwal.png" alt="Marketing Director">
                    </div>
                    <div class="team-info">
                        <h3>Mandy Dhaliwal</h3>
                        <p>Marketing Director</p>
                        <div class="team-social">
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Milestone Section -->
        <section class="milestone-section">
            <h2 class="section-title">Perjalanan Kami</h2>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h3>Awal Mula</h3>
                        <p>PurpleSite didirikan sebagai studio desain web dengan fokus pada UX/UI untuk bisnis lokal dan startup.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2021</div>
                        <h3>Ekspansi Layanan</h3>
                        <p>Memperluas layanan ke pengembangan aplikasi mobile dan digital marketing setelah mendapatkan lebih dari 100 klien puas.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2022</div>
                        <h3>Penghargaan & Pengakuan</h3>
                        <p>Memenangkan penghargaan "Best Digital Agency" tingkat nasional dan membuka kantor kedua di Surabaya.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2023</div>
                        <h3>Inovasi Teknologi</h3>
                        <p>Meluncurkan divisi khusus untuk AI dan machine learning, memperkenalkan solusi otomatisasi untuk bisnis.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3>Kemitraan Strategis</h3>
                        <p>Menjalin kemitraan dengan perusahaan teknologi global dan melayani klien dari 10 negara berbeda.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2025</div>
                        <h3>Masa Depan</h3>
                        <p>Terus berinovasi dan berkembang dengan fokus pada teknologi berkelanjutan dan solusi digital terintegrasi.</p>
                    </div>
                </div>
            </div>
        </section>
        
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
                        <li><a href="../php/Navbar.php">Beranda</a></li>
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
        
        // Animation for timeline items when they come into view
        const observerOptions = {
            threshold: 0.3,
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.timeline-item').forEach(item => {
            observer.observe(item);
        });
        
        // Animate team cards when they come into view
        document.querySelectorAll('.team-card').forEach(card => {
            observer.observe(card);
        });

        // User dropdown functionality
        const userButton = document.getElementById('userButton');
        const userDropdown = document.getElementById('userDropdown');

        if (userButton) {
            userButton.addEventListener('click', () => {
                userDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!userButton.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.remove('show');
                }
            });
        }
        </script>
        </html>