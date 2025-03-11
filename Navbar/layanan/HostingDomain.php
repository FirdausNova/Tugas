<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Hosting & Domain</title>
    <link rel="stylesheet" href="../../css/Stylenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Hosting & Domain</title>
    <link rel="stylesheet" href="../../css/Stylenavbar.css">
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
        
        /* Service detail section styling */
        .service-detail-section {
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
        
        .service-overview {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
            align-items: center;
        }
        
        .service-image {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .service-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .service-description {
            color: #555;
            line-height: 1.8;
        }
        
        .service-description h3 {
            font-size: 1.8rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1.5rem;
        }
        
        .service-description p {
            margin-bottom: 1.5rem;
        }
        
        /* Technologies section */
        .technologies-section {
            padding: 5rem 10%;
            background: rgba(240, 240, 245, 0.8);
        }
        
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin: 3rem auto 0;
            max-width: 1200px;
            justify-content: center;
        }
        
        @media screen and (max-width: 992px) {
            .tech-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media screen and (max-width: 576px) {
            .tech-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .tech-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .tech-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .tech-icon {
            font-size: 3rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1.5rem;
        }
        
        .tech-card h3 {
            font-size: 1.5rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .tech-card p {
            color: #555;
            line-height: 1.7;
        }
        
        /* Service Features styling */
        .service-features {
            margin-top: 4rem;
        }
        
        .features-title {
            text-align: center;
            font-size: 1.8rem;
            color: rgb(48, 16, 80);
            margin-bottom: 2.5rem;
            position: relative;
        }
        
        .features-title:after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background: rgb(86, 36, 136);
            transform: translateX(-50%);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            display: flex;
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid rgb(86, 36, 136);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: rgb(48, 16, 80);
            margin-right: 1rem;
            display: flex;
            align-items: center;
        }
        
        .feature-content h4 {
            font-size: 1.2rem;
            color: rgb(48, 16, 80);
            margin-bottom: 0.5rem;
        }
        
        .feature-content p {
            color: #555;
            line-height: 1.5;
            font-size: 0.95rem;
        }
        
        @media screen and (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .service-overview {
                grid-template-columns: 1fr;
            }
            
            .service-image {
                margin-bottom: 2rem;
            }
        }
        
        /* Plans section */
        .plans-section {
            padding: 5rem 10%;
            background: #fff;
        }
        
        .plans-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin: 3rem auto 0;
            max-width: 1200px;
            justify-content: center;
        }
        
        .plan-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .plan-header {
            padding: 2rem;
            background: linear-gradient(135deg, rgb(48, 16, 80), rgb(86, 36, 136));
            color: white;
            text-align: center;
        }
        
        .plan-name {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .plan-price {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .plan-duration {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .plan-features {
            padding: 2rem;
        }
        
        .plan-features ul {
            list-style: none;
            margin-bottom: 2rem;
        }
        
        .plan-features li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #555;
        }
        
        .plan-features li i {
            color: rgb(86, 36, 136);
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .plan-button {
            display: block;
            background: rgb(48, 16, 80);
            color: white;
            text-align: center;
            padding: 1rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 1rem;
        }
        
        .plan-button:hover {
            background: rgb(86, 36, 136);
            transform: translateY(-5px);
        }
        
        /* FAQ section */
        .faq-section {
            padding: 5rem 10%;
            background: rgba(240, 240, 245, 0.8);
        }
        
        .accordion {
            max-width: 800px;
            margin: 3rem auto 0;
        }
        
        .accordion-item {
            background: white;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .accordion-header {
            padding: 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .accordion-header h3 {
            font-size: 1.2rem;
            color: rgb(48, 16, 80);
            margin: 0;
        }
        
        .accordion-header i {
            font-size: 1.5rem;
            color: rgb(48, 16, 80);
            transition: all 0.3s ease;
        }
        
        .accordion-content {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .accordion-content p {
            padding-bottom: 1.5rem;
            color: #555;
            line-height: 1.7;
        }
        
        .accordion-item.active .accordion-header {
            background: rgba(48, 16, 80, 0.05);
        }
        
        .accordion-item.active .accordion-header i {
            transform: rotate(180deg);
        }
        
        .accordion-item.active .accordion-content {
            max-height: 300px;
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
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">PurpleSite</a>
        </div>
        
        <ul class="nav-links">
            <li><a href="../Navbar.php">Beranda</a></li>
            <li><a href="../Tentang.php">Tentang</a></li>
            <li><a href="../Layanan.php" class="active">Layanan</a></li>
            <li><a href="../Portofolio.php">Portofolio</a></li>
            <li><a href="../Kontak.php">Kontak</a></li>
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
                    <a href="../../php/logout.php" class="dropdown-item logout">
                        <i class="bx bx-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>';
        } else {
            // Jika user belum login - hanya menampilkan tombol Daftar
            echo '<a href="../../Login Page/Index.html" class="register-btn">Login</a>';
        }
            ?>
        </div>
        
        <div class="hamburger">
            <i class='bx bx-menu'></i>
        </div>
    </nav>

    <div class="content">
        <!-- Hero Section for Hosting & Domain -->
        <section class="hero-section">
            <div class="hero-content">
                <h1>Hosting & Domain</h1>
                <p>Solusi hosting dan domain terpercaya dengan performa tinggi, keamanan maksimal, dan dukungan teknis 24/7 untuk kebutuhan website Anda.</p>
            </div>
        </section>
        
        <!-- Service Detail Section -->
        <section class="service-detail-section">
            <h2 class="section-title">Layanan Hosting & Domain Kami</h2>
            
            <div class="service-overview">
                <div class="service-image">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="Server Room">
                </div>
                
                <div class="service-description">
                    <h3>Hosting Andal untuk Website Anda</h3>
                    <p>Kami menyediakan layanan web hosting berkualitas tinggi dengan uptime 99.9% dan performa server yang optimal. Dengan infrastruktur modern dan teknologi terkini, website Anda akan berjalan dengan cepat dan stabil.</p>
                    <p>Semua paket hosting kami dilengkapi dengan panel kontrol yang user-friendly, backup otomatis, dan fitur keamanan canggih untuk melindungi data dan website Anda dari ancaman cyber.</p>
                    <p>Kami juga menawarkan layanan pendaftaran dan pengelolaan domain dengan berbagai ekstensi populer (.com, .id, .net, .org, dan lainnya) dengan harga kompetitif dan proses yang mudah.</p>
                </div>
            </div>
            
            <div class="service-features">
                <h3 class="features-title">Fitur Unggulan</h3>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-server'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Server Performa Tinggi</h4>
                            <p>Server dengan teknologi SSD dan hardware terbaru untuk kecepatan loading website yang optimal.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-shield-quarter'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Keamanan Premium</h4>
                            <p>Perlindungan DDoS, SSL gratis, dan firewall canggih untuk menjaga website Anda tetap aman.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-support'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Dukungan 24/7</h4>
                            <p>Tim support teknis berpengalaman siap membantu Anda kapan saja melalui live chat, email, dan telepon.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-transfer-alt'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Bandwidth Unlimited</h4>
                            <p>Tidak perlu khawatir tentang batasan transfer data dengan bandwidth tanpa batas.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-sync'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Backup Otomatis</h4>
                            <p>Backup harian otomatis untuk memastikan data Anda selalu aman dan dapat dipulihkan dengan cepat.</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-globe'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Domain Fleksibel</h4>
                            <p>Pilihan ekstensi domain yang beragam dengan sistem pengelolaan yang mudah dan intuitif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Technologies Section -->
        <section class="technologies-section">
            <h2 class="section-title">Teknologi yang Kami Gunakan</h2>
            
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-php'></i>
                    </div>
                    <h3>PHP Terbaru</h3>
                    <p>Dukungan untuk versi PHP terbaru dengan performa dan keamanan yang ditingkatkan.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxs-data'></i>
                    </div>
                    <h3>MySQL Optimized</h3>
                    <p>Database MySQL yang dioptimalkan untuk kecepatan query dan pengelolaan data yang efisien.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-lock-alt'></i>
                    </div>
                    <h3>SSL Certificates</h3>
                    <p>Sertifikat SSL gratis untuk mengamankan koneksi dan meningkatkan kepercayaan pengunjung.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-code-block'></i>
                    </div>
                    <h3>cPanel/Plesk</h3>
                    <p>Panel kontrol hosting yang intuitif untuk pengelolaan website yang mudah dan efisien.</p>
                </div>
            </div>
        </section>
        
        <!-- Plans Section -->
        <section class="plans-section">
            <h2 class="section-title">Paket Hosting & Domain</h2>
            
            <div class="plans-grid">
                <div class="plan-card">
                    <div class="plan-header">
                        <h3 class="plan-name">Starter</h3>
                        <div class="plan-price">Rp 99.000</div>
                        <div class="plan-duration">per tahun</div>
                    </div>
                    
                    <div class="plan-features">
                        <ul>
                            <li><i class='bx bx-check'></i> 5GB SSD Storage</li>
                            <li><i class='bx bx-check'></i> 1 Website</li>
                            <li><i class='bx bx-check'></i> 10 Email Accounts</li>
                            <li><i class='bx bx-check'></i> Free SSL Certificate</li>
                            <li><i class='bx bx-check'></i> 99.9% Uptime Guarantee</li>
                            <li><i class='bx bx-check'></i> 24/7 Support</li>
                        </ul>
                        
                        <a href="../Kontak.php?package=Starter&price=99000" class="plan-button" data-package="Starter" data-price="99.000" data-storage="5GB SSD" data-websites="1">Pilih Paket</a>
                    </div>
                </div>
                
                <div class="plan-card">
                    <div class="plan-header">
                        <h3 class="plan-name">Business</h3>
                        <div class="plan-price">Rp 199.000</div>
                        <div class="plan-duration">per tahun</div>
                    </div>
                    
                    <div class="plan-features">
                        <ul>
                            <li><i class='bx bx-check'></i> 20GB SSD Storage</li>
                            <li><i class='bx bx-check'></i> 5 Websites</li>
                            <li><i class='bx bx-check'></i> 50 Email Accounts</li>
                            <li><i class='bx bx-check'></i> Free SSL Certificate</li>
                            <li><i class='bx bx-check'></i> 99.9% Uptime Guarantee</li>
                            <li><i class='bx bx-check'></i> Priority Support</li>
                            <li><i class='bx bx-check'></i> Daily Backups</li>
                        </ul>
                        
                        <a href="../Kontak.php?package=Business&price=199000" class="plan-button" data-package="Business" data-price="199.000" data-storage="20GB SSD" data-websites="5">Pilih Paket</a>
                    </div>
                </div>
                
                <div class="plan-card">
                    <div class="plan-header">
                        <h3 class="plan-name">Enterprise</h3>
                        <div class="plan-price">Rp 399.000</div>
                        <div class="plan-duration">per tahun</div>
                    </div>
                    
                    <div class="plan-features">
                        <ul>
                            <li><i class='bx bx-check'></i> 100GB SSD Storage</li>
                            <li><i class='bx bx-check'></i> Unlimited Websites</li>
                            <li><i class='bx bx-check'></i> Unlimited Email Accounts</li>
                            <li><i class='bx bx-check'></i> Free SSL Certificate</li>
                            <li><i class='bx bx-check'></i> 99.9% Uptime Guarantee</li>
                            <li><i class='bx bx-check'></i> VIP Support</li>
                            <li><i class='bx bx-check'></i> Daily Backups</li>
                            <li><i class='bx bx-check'></i> Advanced Security</li>
                            <li><i class='bx bx-check'></i> Free Domain for 1 Year</li>
                        </ul>
                        
                        <a href="../Kontak.php?package=Enterprise&price=399000" class="plan-button" data-package="Enterprise" data-price="399.000" data-storage="100GB SSD" data-websites="Unlimited">Pilih Paket</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="faq-section">
            <h2 class="section-title">Pertanyaan Umum</h2>
            
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apa itu web hosting?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Web hosting adalah layanan yang memungkinkan individu dan organisasi untuk mempublikasikan website atau aplikasi web di internet. Layanan ini menyediakan ruang penyimpanan di server, konektivitas internet, dan layanan terkait lainnya yang diperlukan agar website dapat diakses oleh pengguna internet.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Bagaimana cara memilih nama domain yang tepat?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Pilih nama domain yang singkat, mudah diingat, dan mencerminkan brand atau bisnis Anda. Hindari penggunaan angka dan tanda hubung yang berlebihan. Pastikan juga untuk memilih ekstensi domain yang sesuai dengan jenis website Anda (.com untuk komersial, .org untuk organisasi, dll).</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah saya mendapatkan SSL gratis?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, semua paket hosting kami dilengkapi dengan sertifikat SSL gratis yang akan mengamankan koneksi website Anda dan meningkatkan kepercayaan pengunjung. SSL juga merupakan faktor penting untuk SEO dan peringkat di mesin pencari.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Bagaimana jika saya ingin pindah dari penyedia hosting lain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Kami menyediakan layanan migrasi website gratis untuk semua pelanggan baru. Tim teknis kami akan membantu memindahkan website, database, dan email Anda dari penyedia hosting lama ke server kami dengan downtime minimal.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Berapa lama proses aktivasi hosting dan domain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Layanan hosting biasanya diaktifkan dalam waktu 30 menit setelah konfirmasi pembayaran. Untuk pendaftaran domain baru, prosesnya bisa memakan waktu 24-48 jam tergantung pada ekstensi domain dan proses verifikasi yang diperlukan.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Memulai?</h2>
                <p>Dapatkan layanan hosting dan domain terbaik untuk website Anda sekarang juga.</p>
                
                <div class="cta-buttons">
                    <a href="../Kontak.php" class="cta-primary">Hubungi Kami</a>
                    <a href="../Portofolio.php" class="cta-secondary">Lihat Portofolio</a>
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
                        <li><a href="../Navbar.php">Beranda</a></li>
                        <li><a href="../Tentang.php">Tentang Kami</a></li>
                        <li><a href="../Layanan.php">Layanan</a></li>
                        <li><a href="../Portofolio.php">Portofolio</a></li>
                        <li><a href="../Kontak.php">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="PengembanganWeb.php">Pengembangan Web</a></li>
                        <li><a href="DesainGrafis.php">Desain Grafis</a></li>
                        <li><a href="AplikasiMobile.php">Aplikasi Mobile</a></li>
                        <li><a href="DigitalMarketing.php">Digital Marketing</a></li>
                        <li><a href="HostingDomain.php">Hosting & Domain</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Kontak</h3>
                    <ul>
                        <li><i class='bx bx-map'></i> Jl. Raya Utama No. 123, Jakarta</li>
                        <li><i class='bx bx-phone'></i> +62 812 3456 7890</li>
                        <li><i class='bx bx-envelope'></i> purplesiteinfo@gmail.com</li>
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
        
        // Accordion functionality for FAQ
        const accordionItems = document.querySelectorAll('.accordion-item');
        
        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            
            header.addEventListener('click', () => {
                // Close all other accordion items
                accordionItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Toggle current accordion item
                item.classList.toggle('active');
            });
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
</body>
</html>