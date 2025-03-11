<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Digital Marketing</title>
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
        
        .section-subtitle {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 2rem;
            color: #555;
            line-height: 1.7;
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
            
            .service-overview {
                grid-template-columns: 1fr;
            }
            
            .service-image {
                margin-bottom: 2rem;
            }
        }
        
        /* Projects section */
        .projects-section {
            padding: 5rem 10%;
            background: #fff;
            text-align: center;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            margin: 3rem auto 0;
            max-width: 1200px;
            justify-content: center;
        }
        
        .project-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin: 0 auto;
            max-width: 350px;
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
                <h1>Digital Marketing</h1>
                <p>Strategi pemasaran digital yang efektif untuk meningkatkan visibilitas online dan pertumbuhan bisnis Anda</p>
            </div>
        </section>
        
        <!-- Service Detail Section -->
        <section class="service-detail-section">
            <h2 class="section-title">Layanan Digital Marketing Kami</h2>
            
            <div class="service-overview">
                <div class="service-image">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Digital Marketing">
                </div>
                <div class="service-description">
                    <h3>Strategi Digital Marketing Terpadu</h3>
                    <p>PurpleSite menyediakan layanan digital marketing komprehensif yang dirancang untuk membantu bisnis Anda mencapai target audiens yang tepat, meningkatkan konversi, dan memaksimalkan ROI dari investasi pemasaran Anda.</p>
                    <p>Tim digital marketing kami menggunakan pendekatan data-driven dan strategi terkini untuk memastikan kampanye Anda mencapai hasil optimal. Kami memahami bahwa setiap bisnis unik, itulah sebabnya kami menyusun strategi yang disesuaikan dengan kebutuhan spesifik dan tujuan bisnis Anda.</p>
                    <p>Dari SEO dan content marketing hingga social media dan paid advertising, kami menawarkan solusi pemasaran digital lengkap yang akan membantu bisnis Anda tumbuh di era digital yang kompetitif ini.</p>
                </div>
            </div>
            
            <div class="service-features">
                <h3 class="features-title">Layanan Digital Marketing Kami</h3>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-search-alt'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Search Engine Optimization (SEO)</h4>
                            <p>Meningkatkan peringkat website Anda di mesin pencari untuk mendapatkan traffic organik</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-money'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Pay-Per-Click (PPC) Advertising</h4>
                            <p>Kampanye iklan berbayar yang efektif di Google, Facebook, Instagram, dan platform lainnya</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-group'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Social Media Marketing</h4>
                            <p>Pengelolaan dan optimasi kehadiran brand Anda di platform media sosial</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Email Marketing</h4>
                            <p>Kampanye email yang personal dan terukur untuk nurturing leads dan meningkatkan konversi</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-edit'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Content Marketing</h4>
                            <p>Pembuatan dan distribusi konten bernilai tinggi untuk menarik dan mempertahankan audiens</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-line-chart'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Analytics & Reporting</h4>
                            <p>Analisis data dan laporan performa kampanye yang komprehensif</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-target-lock'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Conversion Rate Optimization</h4>
                            <p>Meningkatkan persentase pengunjung yang melakukan tindakan yang diinginkan</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-bulb'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Digital Strategy Consulting</h4>
                            <p>Konsultasi strategi digital untuk memaksimalkan potensi online bisnis Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Technologies Section -->
        <section class="technologies-section">
            <h2 class="section-title">Tools & Platform yang Kami Gunakan</h2>
            <p class="section-subtitle">Kami menggunakan tools dan platform terbaik untuk memastikan kampanye digital marketing Anda mencapai hasil optimal</p>
            
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-google'></i>
                    </div>
                    <h3>Google Ads</h3>
                    <p>Platform iklan berbayar untuk meningkatkan visibilitas di mesin pencari Google dan jaringan displaynya.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-facebook'></i>
                    </div>
                    <h3>Facebook Ads Manager</h3>
                    <p>Pengelolaan kampanye iklan di Facebook dan Instagram dengan targeting audiens yang presisi.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-google'></i>
                    </div>
                    <h3>Google Analytics</h3>
                    <p>Analisis data pengunjung website untuk memahami perilaku dan mengoptimalkan konversi.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-mail-send'></i>
                    </div>
                    <h3>Mailchimp</h3>
                    <p>Platform email marketing untuk mengelola kampanye email dan otomatisasi pemasaran.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-line-chart'></i>
                    </div>
                    <h3>SEMrush</h3>
                    <p>Tool SEO komprehensif untuk riset keyword, analisis kompetitor, dan audit website.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-instagram'></i>
                    </div>
                    <h3>Hootsuite</h3>
                    <p>Platform manajemen media sosial untuk penjadwalan konten dan analisis performa.</p>
                </div>
            </div>
        </section>
        
        <!-- Projects Section -->
        <section class="projects-section">
            <h2 class="section-title">Proyek Digital Marketing Kami</h2>
            <p class="section-subtitle">Beberapa contoh kampanye digital marketing yang telah kami lakukan untuk klien dari berbagai industri</p>
            
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="E-commerce Campaign">
                    </div>
                    <div class="project-content">
                        <h3>MegaMart E-commerce</h3>
                        <p>Kampanye PPC dan SEO yang meningkatkan traffic website sebesar 150% dan konversi sebesar 75% dalam 6 bulan.</p>
                        <div class="project-tags">
                            <span class="project-tag">SEO</span>
                            <span class="project-tag">PPC</span>
                            <span class="project-tag">Google Ads</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1557838923-2985c318be48?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Restaurant Social Media Campaign">
                    </div>
                    <div class="project-content">
                        <h3>Savory Restaurant</h3>
                        <p>Kampanye social media marketing yang meningkatkan engagement sebesar 200% dan kunjungan ke restoran sebesar 45%.</p>
                        <div class="project-tags">
                            <span class="project-tag">Social Media</span>
                            <span class="project-tag">Content Marketing</span>
                            <span class="project-tag">Facebook Ads</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Property Listing Campaign">
                    </div>
                    <div class="project-content">
                        <h3>PropertyFinder</h3>
                        <p>Strategi content marketing dan email marketing yang menghasilkan 300+ leads berkualitas per bulan untuk agen real estate.</p>
                        <div class="project-tags">
                            <span class="project-tag">Email Marketing</span>
                            <span class="project-tag">Content Strategy</span>
                            <span class="project-tag">Lead Generation</span>
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
                        <h3>Berapa lama waktu yang dibutuhkan untuk melihat hasil dari kampanye digital marketing?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Waktu yang dibutuhkan untuk melihat hasil bervariasi tergantung pada jenis kampanye dan tujuan bisnis Anda. Untuk kampanye PPC dan social media ads, hasil biasanya dapat terlihat dalam beberapa hari. Untuk SEO dan content marketing, diperlukan waktu 3-6 bulan untuk melihat hasil yang signifikan. Kami selalu menetapkan ekspektasi yang realistis dan memberikan laporan berkala tentang kemajuan kampanye Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Berapa biaya untuk layanan digital marketing?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Biaya layanan digital marketing kami bervariasi tergantung pada skala bisnis, tujuan, dan jenis layanan yang Anda butuhkan. Kami menawarkan paket yang dapat disesuaikan mulai dari Rp 5 juta per bulan. Setiap paket dirancang khusus untuk memenuhi kebutuhan dan anggaran spesifik Anda. Hubungi kami untuk konsultasi gratis dan penawaran yang disesuaikan.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Bagaimana Anda mengukur keberhasilan kampanye digital marketing?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Kami mengukur keberhasilan kampanye berdasarkan KPI (Key Performance Indicators) yang ditetapkan di awal proyek. Ini bisa berupa peningkatan traffic website, jumlah leads, tingkat konversi, engagement di media sosial, atau ROI dari investasi iklan. Kami menggunakan berbagai tools analitik untuk melacak dan melaporkan metrik ini secara berkala, sehingga Anda selalu mendapatkan gambaran jelas tentang performa kampanye.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah saya perlu menggunakan semua layanan digital marketing yang ditawarkan?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Tidak, Anda tidak perlu menggunakan semua layanan yang kami tawarkan. Kami akan membantu Anda mengidentifikasi channel dan strategi yang paling sesuai dengan tujuan bisnis, target audiens, dan anggaran Anda. Pendekatan kami selalu disesuaikan dengan kebutuhan spesifik setiap klien untuk memastikan hasil yang optimal.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah Anda menyediakan laporan performa kampanye?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menyediakan laporan performa kampanye secara berkala (biasanya bulanan) yang mencakup semua metrik penting dan analisis mendalam tentang hasil kampanye. Laporan ini disajikan dalam format yang mudah dipahami dan dilengkapi dengan rekomendasi untuk perbaikan berkelanjutan. Kami juga menawarkan dashboard real-time untuk beberapa layanan, sehingga Anda dapat memantau performa kapan saja.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Meningkatkan Strategi Digital Marketing Anda?</h2>
                <p>Hubungi kami sekarang untuk konsultasi gratis dan diskusikan bagaimana kami dapat membantu bisnis Anda tumbuh melalui strategi digital marketing yang efektif.</p>
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
                        <li><a href="AplikasiMobile.php">Aplikasi Mobile</a></li>
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