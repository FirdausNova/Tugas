<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Desain Grafis</title>
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
            background: #fff;
            text-align: center;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
            justify-content: center;
            align-items: center;
            transform: none;
            perspective: none;
        }
        
        .project-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            transform: none;
            position: relative;
            margin: 0 auto;
            max-width: 350px;
            width: 100%;
        }
        
        .project-card:hover {
            transform: translateY(-5px);
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
            transform: scale(1.05);
        }
        
        .project-content {
            padding: 1.5rem;
            background: white;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            margin-top: auto;
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
                <h1>Desain Grafis</h1>
                <p>Solusi desain visual profesional untuk memperkuat identitas brand dan komunikasi visual bisnis Anda</p>
            </div>
        </section>
        
        <!-- Service Detail Section -->
        <section class="service-detail-section">
            <h2 class="section-title">Layanan Desain Grafis Kami</h2>
            
            <div class="service-overview">
                <div class="service-image">
                    <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Graphic Design">
                </div>
                <div class="service-description">
                    <h3>Desain Visual Profesional untuk Bisnis Anda</h3>
                    <p>PurpleSite menyediakan layanan desain grafis komprehensif yang dirancang untuk membantu bisnis Anda menonjol di pasar yang kompetitif. Kami menciptakan desain visual yang tidak hanya menarik secara estetika, tetapi juga efektif dalam menyampaikan pesan dan nilai brand Anda.</p>
                    <p>Tim desainer kreatif kami menggabungkan keahlian teknis, pemahaman mendalam tentang prinsip desain, dan tren terkini untuk menghasilkan karya visual yang memukau dan sesuai dengan kebutuhan spesifik bisnis Anda. Kami fokus pada menciptakan desain yang konsisten dan memperkuat identitas brand Anda di semua titik kontak dengan pelanggan.</p>
                    <p>Setiap proyek desain kami dimulai dengan memahami tujuan bisnis Anda, target audiens, dan nilai-nilai brand. Pendekatan ini memastikan bahwa setiap elemen visual yang kami ciptakan tidak hanya indah, tetapi juga strategis dan mendukung tujuan bisnis Anda.</p>
                </div>
            </div>
            
            <div class="service-features">
                <h3 class="features-title">Apa yang Kami Tawarkan</h3>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-palette'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Logo & Brand Identity</h4>
                            <p>Desain logo profesional dan sistem identitas visual yang komprehensif</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-book-content'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Material Promosi</h4>
                            <p>Brosur, flyer, banner, dan material marketing cetak lainnya</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-devices'></i>
                        </div>
                        <div class="feature-content">
                            <h4>UI/UX Design</h4>
                            <p>Desain antarmuka pengguna yang intuitif dan menarik untuk web dan aplikasi</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bxl-instagram'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Konten Media Sosial</h4>
                            <p>Desain post, story, dan banner untuk platform media sosial</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-package'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Desain Kemasan</h4>
                            <p>Desain kemasan produk yang menarik dan fungsional</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-image'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Ilustrasi & Infografis</h4>
                            <p>Ilustrasi custom dan visualisasi data yang informatif</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-movie-play'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Motion Graphics</h4>
                            <p>Animasi dan visual dinamis untuk konten digital</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class='bx bx-book-open'></i>
                        </div>
                        <div class="feature-content">
                            <h4>Editorial Design</h4>
                            <p>Layout majalah, buku, dan publikasi cetak lainnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Technologies Section -->
        <section class="technologies-section">
            <h2 class="section-title">Tools & Software yang Kami Gunakan</h2>
            <p class="section-subtitle" style="text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">Kami menggunakan software desain profesional terkini untuk menghasilkan karya visual berkualitas tinggi</p>
            
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-adobe'></i>
                    </div>
                    <h3>Adobe Photoshop</h3>
                    <p>Manipulasi dan editing gambar profesional untuk menghasilkan visual yang sempurna dan menarik.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-adobe'></i>
                    </div>
                    <h3>Adobe Illustrator</h3>
                    <p>Pembuatan grafis vektor untuk logo, ilustrasi, dan aset visual yang dapat diskalakan tanpa kehilangan kualitas.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-adobe'></i>
                    </div>
                    <h3>Adobe InDesign</h3>
                    <p>Layout dan desain publikasi untuk brosur, majalah, dan material cetak profesional lainnya.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-adobe'></i>
                    </div>
                    <h3>Adobe After Effects</h3>
                    <p>Pembuatan motion graphics dan visual effects untuk konten video dan animasi.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bxl-figma'></i>
                    </div>
                    <h3>Figma</h3>
                    <p>Desain UI/UX kolaboratif untuk website dan aplikasi dengan prototyping interaktif.</p>
                </div>
                
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class='bx bx-palette'></i>
                    </div>
                    <h3>Procreate</h3>
                    <p>Ilustrasi digital dan artwork dengan berbagai brush dan teknik untuk hasil yang artistik.</p>
                </div>
            </div>
        </section>
        
        <!-- Projects Section -->
        <section class="projects-section">
            <h2 class="section-title">Portofolio Desain Kami</h2>
            <p class="section-subtitle" style="text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">Beberapa contoh karya desain yang telah kami kerjakan untuk klien dari berbagai industri</p>
            
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1636633762833-5d1658f1e29b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Brand Identity Project">
                    </div>
                    <div class="project-content">
                        <h3>GreenLife Organics</h3>
                        <p>Identitas brand lengkap termasuk logo, kemasan produk, dan material pemasaran untuk bisnis produk organik.</p>
                        <div class="project-tags">
                            <span class="project-tag">Branding</span>
                            <span class="project-tag">Packaging</span>
                            <span class="project-tag">Print</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Social Media Design">
                    </div>
                    <div class="project-content">
                        <h3>TechVision Campaign</h3>
                        <p>Desain konten media sosial untuk kampanye peluncuran produk teknologi dengan tema futuristik.</p>
                        <div class="project-tags">
                            <span class="project-tag">Social Media</span>
                            <span class="project-tag">Digital</span>
                            <span class="project-tag">Campaign</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="UI/UX Design">
                    </div>
                    <div class="project-content">
                        <h3>FinTrack App</h3>
                        <p>Desain UI/UX untuk aplikasi keuangan personal dengan fokus pada pengalaman pengguna yang intuitif dan visualisasi data.</p>
                        <div class="project-tags">
                            <span class="project-tag">UI/UX</span>
                            <span class="project-tag">Mobile App</span>
                            <span class="project-tag">Fintech</span>
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
                        <h3>Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek desain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Waktu pengerjaan proyek desain bervariasi tergantung pada kompleksitas dan jenis proyek. Desain logo dan identitas visual dasar biasanya membutuhkan 1-2 minggu, sementara proyek branding lengkap atau desain UI/UX yang kompleks dapat membutuhkan 3-6 minggu. Kami akan memberikan estimasi waktu yang akurat setelah berdiskusi tentang kebutuhan spesifik proyek Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Berapa biaya untuk layanan desain grafis?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Biaya layanan desain grafis kami bervariasi tergantung pada jenis proyek, kompleksitas, dan kebutuhan spesifik Anda. Kami menawarkan paket dengan harga yang kompetitif dan transparan untuk berbagai kebutuhan, mulai dari desain logo sederhana hingga sistem identitas brand yang komprehensif. Hubungi kami untuk konsultasi dan penawaran yang disesuaikan dengan kebutuhan dan anggaran Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Bagaimana proses pengerjaan proyek desain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Proses desain kami dimulai dengan konsultasi untuk memahami kebutuhan dan tujuan bisnis Anda. Kemudian kami melakukan riset dan membuat konsep awal. Setelah Anda menyetujui konsep, kami mengembangkan desain dan melakukan revisi berdasarkan feedback Anda. Setelah finalisasi, kami menyerahkan file dalam berbagai format yang Anda butuhkan. Kami menjamin kepuasan dengan memberikan kesempatan revisi yang cukup dalam setiap tahap.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah saya akan mendapatkan file sumber (source file) dari desain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, setelah proyek selesai dan pembayaran lunas, Anda akan menerima file sumber (seperti file AI, PSD, atau Figma) beserta file dalam format yang siap digunakan (JPG, PNG, PDF, dll). Ini memungkinkan Anda untuk memiliki kontrol penuh atas aset desain Anda dan melakukan modifikasi di masa depan jika diperlukan.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Apakah Anda menyediakan layanan cetak untuk material desain?</h3>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menyediakan layanan cetak berkualitas tinggi untuk berbagai material desain seperti kartu nama, brosur, flyer, banner, dan material promosi lainnya. Kami bekerja sama dengan percetakan terpercaya untuk memastikan hasil cetak yang sesuai dengan standar kualitas kami. Anda juga dapat memilih untuk hanya menerima file desain digital jika ingin mencetak sendiri.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Mewujudkan Visi Desain Anda?</h2>
                <p>Hubungi kami sekarang untuk konsultasi gratis dan diskusikan bagaimana kami dapat membantu memperkuat identitas visual bisnis Anda.</p>
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
