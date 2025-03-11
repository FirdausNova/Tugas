<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Aplikasi Mobile</title>
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
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
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
        }
        
        /* Projects section */
        .projects-section {
            padding: 5rem 10%;
            background: #fff;
            text-align: center;
        }
        
        .section-subtitle {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 2rem;
            color: #555;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            justify-content: center;
        }
        
        .project-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .project-image {
            height: 200px;
            overflow: hidden;
        }
        
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .project-card:hover .project-image img {
            transform: scale(1.1);
        }
        
        .project-content {
            padding: 1.5rem;
            background: white;
        }
        
        .project-content h3 {
            font-size: 1.3rem;
            color: rgb(48, 16, 80);
            margin-bottom: 0.5rem;
        }
        
        .project-content p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 1rem;
        }
        
        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .project-tag {
            background: rgba(48, 16, 80, 0.1);
            color: rgb(48, 16, 80);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
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
        
        @media screen and (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .service-detail-section,
            .technologies-section,
            .projects-section,
            .faq-section,
            .cta-section {
                padding: 3rem 5%;
            }
        }
        
        /* Animation classes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate {
            animation: fadeIn 1s ease;
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
                <h1>Aplikasi Mobile</h1>
                <p>Kembangkan aplikasi mobile yang intuitif dan powerful untuk Android dan iOS dengan fokus pada pengalaman pengguna</p>
            </div>
        </section>
        
        <!-- Service Detail Section -->
        <section class="service-detail-section">
            <h2 class="section-title">Layanan Pengembangan Aplikasi Mobile</h2>
            
            <div class="service-overview">
                <div class="service-image">
                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Mobile App Development">
                </div>
                <div class="service-description">
                    <h3>Aplikasi Mobile untuk Bisnis Anda</h3>
                    <p>PurpleSite menyediakan layanan pengembangan aplikasi mobile komprehensif yang dirancang untuk memenuhi kebutuhan spesifik bisnis Anda. Kami menciptakan aplikasi yang tidak hanya menarik secara visual, tetapi juga fungsional, cepat, dan mudah digunakan.</p>
                    <p>Tim pengembang mobile kami menggunakan teknologi terkini untuk memastikan aplikasi Anda memiliki performa tinggi, responsif, dan memberikan pengalaman pengguna yang optimal. Kami fokus pada desain intuitif dan fitur yang mencerminkan kebutuhan pengguna target Anda.</p>
                    <p>Setiap proyek pengembangan aplikasi mobile kami dimulai dengan memahami tujuan bisnis Anda, target audiens, dan kebutuhan spesifik. Pendekatan ini memastikan bahwa aplikasi yang kami kembangkan tidak hanya indah, tetapi juga efektif dalam mencapai tujuan bisnis Anda.</p>
                </div>
            </div>
            
            <div class="service-features">
                <h3 class="features-title">Apa yang Kami Tawarkan</h3>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bxl-android'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Aplikasi Android</h4>
                            <p>Aplikasi native untuk platform Android dengan performa optimal</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bxl-apple'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Aplikasi iOS</h4>
                            <p>Aplikasi native untuk iPhone dan iPad dengan UI yang elegan</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-devices'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Aplikasi Cross-Platform</h4>
                            <p>Solusi efisien untuk Android dan iOS dengan codebase tunggal</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-credit-card'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Integrasi Payment Gateway</h4>
                            <p>Solusi pembayaran aman untuk aplikasi e-commerce</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-bell'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Notifikasi Push</h4>
                            <p>Sistem notifikasi real-time untuk engagement pengguna</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-cloud'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Cloud Integration</h4>
                            <p>Sinkronisasi data dengan layanan cloud untuk akses multi-device</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Geolocation & Maps</h4>
                            <p>Fitur lokasi dan pemetaan untuk aplikasi berbasis lokasi</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-support'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Maintenance & Support</h4>
                            <p>Dukungan teknis berkelanjutan dan pembaruan reguler</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Technologies Section -->
        <section class="technologies-section" style="text-align: center;">
            <h2 class="section-title">Teknologi yang Kami Gunakan</h2>
            <p class="section-subtitle" style="text-align: center;">Kami menggunakan teknologi terkini untuk memastikan aplikasi mobile Anda memiliki performa terbaik dan fitur modern</p>
            
            <div class="tech-grid" style="margin-left: auto; margin-right: auto; max-width: 1200px; justify-content: center;">
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bxl-react'></i>
                    </div>
                    <h3>React Native</h3>
                    <p>Framework cross-platform untuk membangun aplikasi native dengan JavaScript dan React, menghemat waktu dan biaya pengembangan.</p>
                </div>
                
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bxl-flutter'></i>
                    </div>
                    <h3>Flutter</h3>
                    <p>SDK dari Google untuk membangun aplikasi native dengan UI yang indah dan performa tinggi untuk Android dan iOS.</p>
                </div>
                
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bxl-android'></i>
                    </div>
                    <h3>Kotlin & Java</h3>
                    <p>Bahasa pemrograman untuk pengembangan aplikasi Android native dengan performa dan keamanan optimal.</p>
                </div>
                
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bxl-apple'></i>
                    </div>
                    <h3>Swift</h3>
                    <p>Bahasa pemrograman modern untuk pengembangan aplikasi iOS native dengan performa tinggi dan sintaks yang ekspresif.</p>
                </div>
                
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bx-server'></i>
                    </div>
                    <h3>Firebase</h3>
                    <p>Platform backend-as-a-service untuk autentikasi, database real-time, penyimpanan, dan analitik aplikasi mobile.</p>
                </div>
                
                <div class="tech-card" style="text-align: center;">
                    <div class="tech-icon" style="display: flex; justify-content: center;">
                        <i class='bx bx-data'></i>
                    </div>
                    <h3>REST & GraphQL APIs</h3>
                    <p>Teknologi API modern untuk komunikasi efisien antara aplikasi mobile dan backend server.</p>
                </div>
            </div>
        </section>
        
        <!-- Projects Section -->
        <section class="projects-section">
            <h2 class="section-title">Proyek Terbaru Kami</h2>
            <p class="section-subtitle">Beberapa contoh aplikasi mobile yang telah kami kembangkan untuk klien dari berbagai industri</p>
            
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Food Delivery App">
                    </div>
                    <div class="project-content">
                        <h3>FoodExpress</h3>
                        <p>Aplikasi food delivery dengan fitur tracking real-time, pembayaran in-app, dan sistem rating restoran.</p>
                        <div class="project-tags">
                            <span class="project-tag">Food Delivery</span>
                            <span class="project-tag">React Native</span>
                            <span class="project-tag">Firebase</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1483478550801-ceba5fe50e8e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Fitness App">
                    </div>
                    <div class="project-content">
                        <h3>FitTrack</h3>
                        <p>Aplikasi fitness dengan program latihan personal, tracking nutrisi, dan integrasi dengan wearable devices.</p>
                        <div class="project-tags">
                            <span class="project-tag">Health & Fitness</span>
                            <span class="project-tag">Flutter</span>
                            <span class="project-tag">HealthKit</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="E-commerce App">
                    </div>
                    <div class="project-content">
                        <h3>ShopMate</h3>
                        <p>Aplikasi e-commerce dengan fitur AR untuk mencoba produk, wishlist, dan multiple payment options.</p>
                        <div class="project-tags">
                            <span class="project-tag">E-commerce</span>
                            <span class="project-tag">Kotlin</span>
                            <span class="project-tag">Swift</span>
                        </div>
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
                        <h3>Berapa lama waktu yang dibutuhkan untuk mengembangkan sebuah aplikasi mobile?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Waktu pengembangan aplikasi mobile bervariasi tergantung pada kompleksitas proyek. Aplikasi sederhana dapat selesai dalam 2-3 bulan, sementara proyek yang lebih kompleks seperti e-commerce atau aplikasi dengan fitur AI dapat membutuhkan 4-6 bulan. Kami akan memberikan estimasi waktu yang akurat setelah berdiskusi tentang kebutuhan spesifik proyek Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah lebih baik membuat aplikasi native atau cross-platform?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Keputusan antara pengembangan native atau cross-platform tergantung pada kebutuhan proyek Anda. Aplikasi native (dikembangkan khusus untuk Android atau iOS) menawarkan performa dan UX terbaik, tetapi memerlukan pengembangan terpisah untuk setiap platform. Solusi cross-platform seperti React Native atau Flutter memungkinkan pengembangan lebih cepat dan hemat biaya dengan satu codebase untuk kedua platform, dengan sedikit kompromi pada performa. Kami akan membantu Anda menentukan pendekatan terbaik berdasarkan kebutuhan bisnis, anggaran, dan timeline Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Bagaimana proses pengembangan aplikasi mobile Anda?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Proses pengembangan kami meliputi beberapa tahap: (1) Discovery & Perencanaan - memahami kebutuhan bisnis dan pengguna, (2) Wireframing & Desain UI/UX - membuat prototype interaktif, (3) Pengembangan - coding aplikasi dengan metodologi agile, (4) Testing - QA dan user testing, (5) Deployment - publikasi ke App Store/Google Play, dan (6) Maintenance - dukungan pasca-peluncuran dan pembaruan. Kami melibatkan klien di setiap tahap untuk memastikan hasil sesuai dengan ekspektasi.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah Anda membantu dalam proses publikasi aplikasi ke App Store dan Google Play?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menyediakan layanan end-to-end yang mencakup bantuan dalam proses publikasi aplikasi ke App Store dan Google Play. Kami membantu menyiapkan akun developer, mengoptimalkan listing aplikasi (termasuk screenshot, deskripsi, dan keyword), memastikan kepatuhan terhadap guidelines store, dan menangani proses review. Kami juga memberikan dukungan untuk pembaruan aplikasi setelah peluncuran.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah layanan maintenance dan support tersedia setelah aplikasi diluncurkan?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menawarkan paket maintenance dan support berkelanjutan untuk memastikan aplikasi Anda tetap aman, up-to-date, dan berfungsi optimal. Layanan ini mencakup pemantauan performa, update keamanan, perbaikan bug, adaptasi terhadap versi OS terbaru, dan dukungan untuk penambahan fitur baru sesuai kebutuhan. Kami juga menyediakan analitik untuk membantu Anda memahami perilaku pengguna dan mengoptimalkan aplikasi.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Memulai Proyek Mobile Anda?</h2>
                <p>Hubungi kami sekarang untuk konsultasi gratis dan diskusikan bagaimana kami dapat membantu mewujudkan ide aplikasi Anda.</p>
                <div class="cta-buttons">
                    <a href="../Kontak.php" class="cta-primary">Hubungi Kami</a>
                    <a href="../Portofolio.php" class="cta-secondary">Lihat Portfolio</a>
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
                        <li><a href="#">Aplikasi Mobile</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Hosting & Domain</a></li>
                        <li><a href="#">AI & Machine Learning</a></li>
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
        
        // FAQ accordion functionality
        const accordionItems = document.querySelectorAll('.accordion-item');
        
        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            
            header.addEventListener('click', () => {
                // Close all other items
                accordionItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('active');
            });
        });
        
        // Animation on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.service-overview, .tech-card, .project-card, .accordion-item');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if (elementPosition < screenPosition) {
                    element.classList.add('animate');
                }
            });
        }
        
        // Run animation check on scroll and on page load
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
        
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