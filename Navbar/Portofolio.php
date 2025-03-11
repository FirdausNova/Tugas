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
                <button class="filter-btn" data-filter="marketing">Digital Marketing</button>
                <button class="filter-btn" data-filter="hosting">Hosting & Domain</button>
                <button class="filter-btn" data-filter="ai">AI & Machine Learning</button>
            </div>
        </section>
        
        <!-- Portfolio Gallery -->
        <section class="portfolio-gallery">
            <div class="gallery-grid">
                <!-- Web Development Projects -->
                <div class="portfolio-item" data-category="web">
                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="E-commerce Website" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">MegaMart E-commerce</h3>
                        <p class="portfolio-category">Pengembangan Web</p>
                        <p class="portfolio-desc">Platform e-commerce responsif dengan sistem pembayaran terintegrasi dan dashboard admin yang komprehensif.</p>
                    </div>
                </div>
                
                <!-- Web Development Project 2 -->
                <div class="portfolio-item" data-category="web">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Company Website" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">EduConnect</h3>
                        <p class="portfolio-category">Pengembangan Web</p>
                        <p class="portfolio-desc">Platform pembelajaran online dengan fitur video conference, kuis interaktif, dan sistem manajemen konten pendidikan.</p>
                    </div>
                </div>
                
                <!-- Mobile App Projects -->
                <div class="portfolio-item" data-category="mobile">
                    <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Finance App" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">BTN Mobile Banking</h3>
                        <p class="portfolio-category">Aplikasi Mobile</p>
                        <p class="portfolio-desc">Aplikasi perbankan mobile dengan fitur transaksi lengkap, notifikasi real-time, dan keamanan tingkat tinggi.</p>
                    </div>
                </div>
                
                <!-- Mobile App Project 2 -->
                <div class="portfolio-item" data-category="mobile">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Health App" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">HealthPulse</h3>
                        <p class="portfolio-category">Aplikasi Mobile</p>
                        <p class="portfolio-desc">Aplikasi kesehatan cross-platform yang melacak aktivitas fisik, nutrisi, dan menyediakan rencana kesehatan personal.</p>
                    </div>
                </div>
                
                <!-- Graphic Design Projects -->
                <div class="portfolio-item" data-category="design">
                    <img src="https://images.unsplash.com/photo-1572044162444-ad60f128bdea?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Brand Identity" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">GreenLife Organics</h3>
                        <p class="portfolio-category">Desain Grafis</p>
                        <p class="portfolio-desc">Identitas visual lengkap termasuk logo, kemasan produk, dan materi pemasaran untuk bisnis produk organik.</p>
                    </div>
                </div>
                
                <!-- Graphic Design Project 2 -->
                <div class="portfolio-item" data-category="design">
                    <img src="https://images.unsplash.com/photo-1594312915251-48db9280c8f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Magazine Design" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Urban Lifestyle Magazine</h3>
                        <p class="portfolio-category">Desain Grafis</p>
                        <p class="portfolio-desc">Desain editorial untuk majalah gaya hidup urban dengan layout modern dan tipografi yang dinamis.</p>
                    </div>
                </div>
                
                <!-- Digital Marketing Projects -->
                <div class="portfolio-item" data-category="marketing">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Marketing Campaign" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">FreshFit Campaign</h3>
                        <p class="portfolio-category">Digital Marketing</p>
                        <p class="portfolio-desc">Kampanye digital multi-platform dengan strategi SEO dan konten yang meningkatkan keterlibatan pengguna sebesar 200%.</p>
                    </div>
                </div>
                
                <!-- Digital Marketing Project 2 -->
                <div class="portfolio-item" data-category="marketing">
                    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Social Media Campaign" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">TechVision Ads</h3>
                        <p class="portfolio-category">Digital Marketing</p>
                        <p class="portfolio-desc">Kampanye Google & Facebook Ads yang menghasilkan peningkatan konversi 150% dan ROI 3x lipat dalam waktu 2 bulan.</p>
                    </div>
                </div>
                
                <!-- Hosting & Domain Projects -->
                <div class="portfolio-item" data-category="hosting">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Hosting Solution" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">CloudSecure</h3>
                        <p class="portfolio-category">Hosting & Domain</p>
                        <p class="portfolio-desc">Solusi hosting yang aman dan cepat untuk e-commerce skala menengah dengan 99.9% uptime dan backup otomatis.</p>
                    </div>
                </div>
                
                <!-- Hosting & Domain Project 2 -->
                <div class="portfolio-item" data-category="hosting">
                    <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Domain Services" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">DomainPro</h3>
                        <p class="portfolio-category">Hosting & Domain</p>
                        <p class="portfolio-desc">Layanan pendaftaran dan pengelolaan domain dengan berbagai ekstensi populer dan sistem DNS yang handal.</p>
                    </div>
                </div>
                
                <!-- AI & Machine Learning Projects -->
                <div class="portfolio-item" data-category="ai">
                    <img src="https://images.unsplash.com/photo-1535378917042-10a22c95931a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="AI Solution" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">SmartAnalytics</h3>
                        <p class="portfolio-category">AI & Machine Learning</p>
                        <p class="portfolio-desc">Implementasi sistem analitik prediktif untuk bisnis retail yang meningkatkan akurasi forecasting inventory hingga 87%.</p>
                    </div>
                </div>
                
                <!-- AI & Machine Learning Project 2 -->
                <div class="portfolio-item" data-category="ai">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="AI Chatbot" class="portfolio-img">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">AssistAI</h3>
                        <p class="portfolio-category">AI & Machine Learning</p>
                        <p class="portfolio-desc">Chatbot AI untuk customer service yang mengotomatisasi 70% interaksi pelanggan dengan tingkat kepuasan 92%.</p>
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
        
        <!-- Testimonial Section -->
        <section class="testimonial-section">
            <h2 class="testimonial-title">Apa Kata Klien Kami</h2>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <i class='bx bxs-quote-right quote-icon'></i>
                    <p class="testimonial-text">PurpleSite telah membantu kami mengembangkan website e-commerce kami dengan hasil yang luar biasa. Respons cepat dan perhatian terhadap detail sangat kami apresiasi.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class='bx bxs-user'></i>
                        </div>
                        <div class="author-info">
                            <h4>Ahmad Faisal</h4>
                            <p>CEO, MegaMart</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <i class='bx bxs-quote-right quote-icon'></i>
                    <p class="testimonial-text">Aplikasi mobile yang dikembangkan oleh tim PurpleSite sangat intuitif dan mendapat respon positif dari pengguna kami. Kerjasama yang menyenangkan!</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class='bx bxs-user'></i>
                        </div>
                        <div class="author-info">
                            <h4>Sarah Wijaya</h4>
                            <p>Product Manager, FinTrack</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <i class='bx bxs-quote-right quote-icon'></i>
                    <p class="testimonial-text">Kampanye digital marketing yang dirancang oleh PurpleSite berhasil meningkatkan traffic website kami hingga 300% dalam 3 bulan. Hasilnya melampaui ekspektasi!</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class='bx bxs-user'></i>
                        </div>
                        <div class="author-info">
                            <h4>Budi Santoso</h4>
                            <p>Marketing Director, TechVision</p>
                        </div>
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