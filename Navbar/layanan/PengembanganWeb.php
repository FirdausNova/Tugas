<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Pengembangan Web</title>
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
            text-align: center;
        }
        
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            margin-left: auto;
            margin-right: auto;
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
            text-align: center;
            background: #fff;
        }
        
        .section-subtitle {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 3rem;
            color: #555;
            line-height: 1.6;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin: 0 auto;
            max-width: 1200px;
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
                <h1>Pengembangan Web</h1>
                <p>Solusi website profesional yang responsif, cepat, dan modern untuk kebutuhan bisnis Anda</p>
            </div>
        </section>
        
        <!-- Service Detail Section -->
        <section class="service-detail-section">
            <h2 class="section-title">Layanan Pengembangan Web Kami</h2>
            
            <div class="service-overview">
                <div class="service-image">
                    <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Web Development">
                </div>
                <div class="service-description">
                    <h3>Website Profesional untuk Bisnis Anda</h3>
                    <p>PurpleSite menyediakan layanan pengembangan web komprehensif yang dirancang untuk memenuhi kebutuhan spesifik bisnis Anda. Kami menciptakan website yang tidak hanya menarik secara visual, tetapi juga fungsional, cepat, dan mudah digunakan.</p>
                    <p>Tim pengembang web kami menggunakan teknologi terkini untuk memastikan website Anda memiliki performa tinggi, responsif di semua perangkat, dan dioptimalkan untuk mesin pencari. Kami fokus pada pengalaman pengguna yang intuitif dan desain yang mencerminkan identitas brand Anda.</p>
                    <p>Setiap proyek pengembangan web kami dimulai dengan memahami tujuan bisnis Anda, target audiens, dan kebutuhan spesifik. Pendekatan ini memastikan bahwa website yang kami kembangkan tidak hanya indah, tetapi juga efektif dalam mencapai tujuan bisnis Anda.</p>
                </div>
            </div>
            
            <div class="service-features">
                <h3 class="features-title">Apa yang Kami Tawarkan</h3>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-devices'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Website Responsif</h4>
                            <p>Tampilan optimal di semua perangkat (desktop, tablet, mobile)</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-palette'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Desain UI/UX Modern</h4>
                            <p>Antarmuka pengguna yang intuitif dan menarik</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-search-alt'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Optimasi SEO</h4>
                            <p>Struktur kode dan konten yang ramah mesin pencari</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-rocket'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Performa Tinggi</h4>
                            <p>Waktu loading cepat dan optimasi resource</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-edit'></i>
                        </div>
                        <div class="feature-content">
                            <h4>CMS Custom</h4>
                            <p>Sistem manajemen konten yang mudah digunakan</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-link'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Integrasi API</h4>
                            <p>Koneksi dengan sistem dan layanan pihak ketiga</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-shield-quarter'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Keamanan Tinggi</h4>
                            <p>Perlindungan dari ancaman cyber</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-support'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Support & Maintenance</h4>
                            <p>Dukungan teknis berkelanjutan</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Technologies Section -->
        <section class="technologies-section">
            <h2 class="section-title">Teknologi yang Kami Gunakan</h2>
            <p class="section-subtitle" style="text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">Kami menggunakan teknologi terkini untuk memastikan website Anda memiliki performa terbaik dan fitur modern</p>
            
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-html5'></i>
                    </div>
                    <h3>HTML5 & CSS3</h3>
                    <p>Fondasi pengembangan web modern dengan fitur terbaru untuk struktur konten dan styling yang responsif.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-javascript'></i>
                    </div>
                    <h3>JavaScript & Frameworks</h3>
                    <p>React, Vue, dan Angular untuk membangun aplikasi web interaktif dan dinamis dengan performa tinggi.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-php'></i>
                    </div>
                    <h3>PHP & Laravel</h3>
                    <p>Pengembangan backend yang powerful dengan framework Laravel untuk aplikasi web yang skalabel dan aman.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-wordpress'></i>
                    </div>
                    <h3>WordPress</h3>
                    <p>CMS populer untuk website yang mudah dikelola dengan tema custom dan plugin yang diperlukan.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-nodejs'></i>
                    </div>
                    <h3>Node.js</h3>
                    <p>Runtime JavaScript untuk backend yang cepat dan efisien dengan Express.js untuk API dan aplikasi web.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-data'></i>
                    </div>
                    <h3>Database</h3>
                    <p>MySQL, PostgreSQL, dan MongoDB untuk penyimpanan dan pengelolaan data yang efisien dan skalabel.</p>
                </div>
            </div>
        </section>
        
        <!-- Projects Section -->
        <section class="projects-section">
            <h2 class="section-title">Proyek Terbaru Kami</h2>
            <p class="section-subtitle">Beberapa contoh website yang telah kami kembangkan untuk klien dari berbagai industri</p>
            
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="E-commerce Website">
                    </div>
                    <div class="project-content">
                        <h3>MegaMart E-commerce</h3>
                        <p>Platform e-commerce lengkap dengan sistem pembayaran terintegrasi, manajemen inventori, dan dashboard admin.</p>
                        <div class="project-tags">
                            <span class="project-tag">E-commerce</span>
                            <span class="project-tag">Laravel</span>
                            <span class="project-tag">Vue.js</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Educational Platform">
                    </div>
                    <div class="project-content">
                        <h3>EduConnect</h3>
                        <p>Platform pembelajaran online dengan fitur video conference, kuis interaktif, dan sistem manajemen konten pendidikan.</p>
                        <div class="project-tags">
                            <span class="project-tag">EdTech</span>
                            <span class="project-tag">React</span>
                            <span class="project-tag">Node.js</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1551739440-5dd934d3a94a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Real Estate Website">
                    </div>
                    <div class="project-content">
                        <h3>PropertyFinder</h3>
                        <p>Website properti dengan pencarian lanjutan, virtual tour, dan sistem CRM untuk agen real estate.</p>
                        <div class="project-tags">
                            <span class="project-tag">Real Estate</span>
                            <span class="project-tag">WordPress</span>
                            <span class="project-tag">Custom CMS</span>
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
                        <h3>Berapa lama waktu yang dibutuhkan untuk mengembangkan sebuah website?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Waktu pengembangan website bervariasi tergantung pada kompleksitas proyek. Website sederhana dapat selesai dalam 2-4 minggu, sementara proyek yang lebih kompleks seperti e-commerce atau aplikasi web custom dapat membutuhkan 2-4 bulan. Kami akan memberikan estimasi waktu yang akurat setelah berdiskusi tentang kebutuhan spesifik proyek Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Berapa biaya untuk mengembangkan sebuah website?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Biaya pengembangan website tergantung pada berbagai faktor seperti jenis website, fitur yang dibutuhkan, kompleksitas desain, dan teknologi yang digunakan. Kami menawarkan paket mulai dari website landing page sederhana hingga aplikasi web enterprise yang kompleks. Hubungi kami untuk konsultasi dan penawaran yang disesuaikan dengan kebutuhan dan anggaran Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah website yang dikembangkan akan responsif di semua perangkat?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, semua website yang kami kembangkan dirancang dengan pendekatan mobile-first dan responsif di semua perangkat (desktop, tablet, dan smartphone). Kami melakukan testing di berbagai ukuran layar dan browser untuk memastikan pengalaman pengguna yang konsisten dan optimal.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah saya akan dapat mengelola konten website sendiri?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Tentu saja. Kami mengembangkan website dengan sistem manajemen konten (CMS) yang user-friendly, memungkinkan Anda untuk memperbarui konten, gambar, produk, dan informasi lainnya dengan mudah tanpa pengetahuan teknis. Kami juga menyediakan pelatihan dan dokumentasi untuk membantu Anda mengelola website dengan efektif.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah layanan maintenance dan support tersedia setelah website diluncurkan?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menawarkan paket maintenance dan support berkelanjutan untuk memastikan website Anda tetap aman, up-to-date, dan berfungsi optimal. Layanan ini mencakup update keamanan, backup reguler, pemecahan masalah teknis, dan dukungan untuk penambahan fitur baru sesuai kebutuhan.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Memulai Proyek Web Anda?</h2>
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
        // Tech cards animation
        const techCards = document.querySelectorAll('.tech-card');
        
        // Add animation when cards come into view
        function animateOnScroll() {
            techCards.forEach(card => {
                const cardPosition = card.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if (cardPosition < screenPosition) {
                    card.classList.add('animate');
                }
            });
        }
        
        // Listen for scroll events
        window.addEventListener('scroll', animateOnScroll);
        
        // Initial check on page load
        animateOnScroll();

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