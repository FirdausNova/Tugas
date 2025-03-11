<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Layanan Kami</title>
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
        
        /* Services section styling */
        .services-intro {
            padding: 5rem 10%;
            background: #fff;
            text-align: center;
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
        
        .intro-text {
            max-width: 800px;
            margin: 0 auto;
            color: #555;
            line-height: 1.8;
        }
        
        /* Main services grid */
        .services-grid {
            padding: 5rem 10%;
            background: rgba(240, 240, 245, 0.8);
        }
        
        .services-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
        }
        
        .service-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .service-icon {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
            font-size: 3.5rem;
        }
        
        .service-content {
            padding: 2rem;
        }
        
        .service-content h3 {
            font-size: 1.5rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .service-content p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        
        .service-features {
            list-style: none;
            margin-bottom: 1.5rem;
        }
        
        .service-features li {
            display: flex;
            align-items: center;
            margin-bottom: 0.8rem;
            color: #555;
        }
        
        .service-features li i {
            color: rgb(86, 36, 136);
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .learn-more {
            display: inline-block;
            background: rgb(48, 16, 80);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .learn-more:hover {
            background: rgb(86, 36, 136);
            transform: translateX(5px);
        }
        
        /* Process section */
        .process-section {
            padding: 5rem 10%;
            background: #fff;
        }
        
        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .process-step {
            text-align: center;
            padding: 2rem;
            position: relative;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: rgb(48, 16, 80);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 auto 1.5rem;
        }
        
        .process-step h3 {
            font-size: 1.5rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .process-step p {
            color: #555;
            line-height: 1.7;
        }
        
        .process-step::after {
            content: '';
            position: absolute;
            top: 30px;
            right: -30px;
            width: 60px;
            height: 2px;
            background: rgba(86, 36, 136, 0.3);
        }
        
        .process-step:last-child::after {
            display: none;
        }
        
        /* Testimonials section */
        .testimonials-section {
            padding: 5rem 10%;
            background: linear-gradient(to right, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
        }
        
        .testimonials-section .section-title {
            color: white;
        }
        
        .testimonials-section .section-title:after {
            background: rgba(255, 255, 255, 0.5);
        }
        
        .testimonials-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 2rem;
        }
        
        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .testimonial-quote {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .testimonial-text {
            font-style: italic;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
            border: 2px solid white;
        }
        
        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }
        
        .author-info p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        /* CTA section */
        .cta-section {
            padding: 5rem 10%;
            background: linear-gradient(to right, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
            text-align: center;
        }
        
        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }
        
        .cta-primary {
            background: white;
            color: rgb(48, 16, 80);
            padding: 1rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .cta-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .cta-secondary {
            background: transparent;
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid white;
            transition: all 0.3s ease;
        }
        
        .cta-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
        }
        
        /* Responsive styles */
        @media screen and (max-width: 992px) {
            .service-overview {
                grid-template-columns: 1fr;
            }
            
            .service-image {
                margin-bottom: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }
        }
        
        /* Responsive styles */
        @media screen and (max-width: 900px) {
            .process-step::after {
                display: none;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .testimonials-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media screen and (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            .cta-section {
                padding: 3rem 5%;
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

        
        
        /* Animation classes */
        .animate {
            animation: fadeUp 1s ease;
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
            <li><a href="#" class="active">Layanan</a></li>
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
                <h1>Layanan Kami</h1>
                <p>Solusi digital komprehensif untuk membantu bisnis Anda berkembang di era digital</p>
            </div>
        </section>
        
        <!-- Services Introduction -->
        <section class="services-intro">
            <h2 class="section-title">Apa yang Kami Tawarkan</h2>
            <div class="intro-text">
                <p>PurpleSite menyediakan berbagai layanan digital berkualitas tinggi yang dirancang untuk memenuhi kebutuhan spesifik bisnis Anda. Dengan kombinasi keahlian teknis, kreativitas, dan pemahaman mendalam tentang tren industri terkini, kami membantu Anda memanfaatkan kekuatan teknologi untuk mencapai tujuan bisnis Anda.</p>
                <p>Tim ahli kami siap memberikan solusi yang disesuaikan dengan kebutuhan dan anggaran Anda, mulai dari pengembangan web hingga strategi digital marketing komprehensif.</p>
            </div>
        </section>
        
        <!-- Main Services -->
        <section class="services-grid">
            <h2 class="section-title">Layanan Utama</h2>
            
            <div class="services-container">
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-code-alt'></i>
                    </div>
                    <div class="service-content">
                        <h3>Pengembangan Web</h3>
                        <p>Kami membuat website responsif, cepat, dan modern yang memberikan pengalaman pengguna terbaik dengan teknologi terkini.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> Website Responsif & Mobile-Friendly</li>
                            <li><i class='bx bx-check-circle'></i> CMS Custom & Dashboard Admin</li>
                            <li><i class='bx bx-check-circle'></i> Optimasi Kecepatan & SEO</li>
                            <li><i class='bx bx-check-circle'></i> Integrasi API & Sistem Lainnya</li>
                        </ul>
                        <a href="./layanan/PengembanganWeb.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-paint'></i>
                    </div>
                    <div class="service-content">
                        <h3>Desain Grafis</h3>
                        <p>Layanan desain grafis profesional untuk memperkuat identitas brand Anda dengan elemen visual yang menarik dan konsisten.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> Logo & Branding Identity</li>
                            <li><i class='bx bx-check-circle'></i> UI/UX Design</li>
                            <li><i class='bx bx-check-circle'></i> Desain Media Sosial</li>
                            <li><i class='bx bx-check-circle'></i> Desain Material Promosi</li>
                        </ul>
                        <a href="./layanan/DesainGrafis.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-mobile-alt'></i>
                    </div>
                    <div class="service-content">
                        <h3>Aplikasi Mobile</h3>
                        <p>Kembangkan aplikasi mobile yang intuitif dan powerful untuk Android dan iOS dengan fokus pada pengalaman pengguna.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> Aplikasi Native & Cross-Platform</li>
                            <li><i class='bx bx-check-circle'></i> Integrasi Payment Gateway</li>
                            <li><i class='bx bx-check-circle'></i> Notifikasi Push & Realtime</li>
                            <li><i class='bx bx-check-circle'></i> Maintenance & Support</li>
                        </ul>
                        <a href="./layanan/AplikasiMobile.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-line-chart'></i>
                    </div>
                    <div class="service-content">
                        <h3>Digital Marketing</h3>
                        <p>Strategi pemasaran digital yang komprehensif untuk meningkatkan visibility online, traffic, dan konversi.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> SEO & Content Marketing</li>
                            <li><i class='bx bx-check-circle'></i> Social Media Management</li>
                            <li><i class='bx bx-check-circle'></i> Google & Facebook Ads</li>
                            <li><i class='bx bx-check-circle'></i> Email Marketing</li>
                        </ul>
                        <a href="./layanan/DigitalMarketing.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-server'></i>
                    </div>
                    <div class="service-content">
                        <h3>Hosting & Domain</h3>
                        <p>Layanan hosting cepat, aman, dan reliable dengan dukungan teknis 24/7 untuk memastikan website Anda selalu online.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> Shared & Cloud Hosting</li>
                            <li><i class='bx bx-check-circle'></i> VPS & Dedicated Server</li>
                            <li><i class='bx bx-check-circle'></i> SSL Certificate & Security</li>
                            <li><i class='bx bx-check-circle'></i> Backup & Restore</li>
                        </ul>
                        <a href="./layanan/HostingDomain.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class='bx bx-brain'></i>
                    </div>
                    <div class="service-content">
                        <h3>AI & Machine Learning</h3>
                        <p>Implementasi solusi AI dan machine learning untuk otomatisasi, analisis data, dan pengambilan keputusan yang lebih cerdas.</p>
                        <ul class="service-features">
                            <li><i class='bx bx-check-circle'></i> Chatbot & Virtual Assistant</li>
                            <li><i class='bx bx-check-circle'></i> Predictive Analytics</li>
                            <li><i class='bx bx-check-circle'></i> Computer Vision</li>
                            <li><i class='bx bx-check-circle'></i> Natural Language Processing</li>
                        </ul>
                        <a href="./layanan/AIMachineLearning.php" class="learn-more">Pelajari Lebih Lanjut <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Our Process -->
        <section class="process-section">
            <h2 class="section-title">Proses Kerja Kami</h2>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Konsultasi</h3>
                    <p>Kami mendengarkan kebutuhan Anda, memahami tujuan bisnis, dan mendiskusikan solusi potensial yang paling sesuai.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Perencanaan</h3>
                    <p>Menyusun strategi, timeline, dan roadmap yang jelas untuk proyek Anda dengan detail teknis dan milestone.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Eksekusi</h3>
                    <p>Tim ahli kami mengerjakan proyek dengan metode agile, memberikan update berkala dan melibatkan Anda dalam proses.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3>Peluncuran</h3>
                    <p>Setelah testing dan quality assurance, kami meluncurkan proyek Anda dan memastikan semua berjalan dengan lancar.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">5</div>
                    <h3>Dukungan</h3>
                    <p>Kami tidak berhenti di peluncuran. Kami menyediakan dukungan dan maintenance berkelanjutan untuk kesuksesan jangka panjang.</p>
                </div>
            </div>
        </section>
        
       <!-- CTA Section -->
       <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Memulai Proyek Anda?</h2>
                <p>Hubungi kami sekarang untuk konsultasi gratis dan diskusikan bagaimana kami dapat membantu mewujudkan visi digital Anda.</p>
                <div class="cta-buttons">
                    <a href="Kontak.php" class="cta-primary">Hubungi Kami</a>
                    <a href="Portofolio.php" class="cta-secondary">Lihat Portfolio</a>
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
                        <li><a href="../php/Index.php">Tentang Kami</a></li>
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
            body.style.overflow = 'hidden';
        } else {
            body.style.overflow = 'auto';
        }
    });

    // Adding animation to elements when scrolled into view
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.service-card, .process-step, .testimonial-card, .cta-container');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;
            
            if (elementPosition < screenPosition) {
                element.classList.add('animate');
            }
        });
    }

    // Run animation check on scroll
    window.addEventListener('scroll', animateOnScroll);

    // Initialize animations and user dropdown on page load
    document.addEventListener('DOMContentLoaded', () => {
        animateOnScroll();
        
        // User menu dropdown functionality
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
    });
</script>
</html>