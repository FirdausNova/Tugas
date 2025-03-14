<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - AI & Machine Learning</title>
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
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
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
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
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
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
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
            <h1>AI & Machine Learning</h1>
            <p>Transformasi bisnis Anda dengan kecerdasan buatan dan pembelajaran mesin untuk solusi yang lebih cerdas dan efisien</p>
        </div>
    </section>

    <!-- Service Detail Section -->
    <section class="service-detail-section">
        <h2 class="section-title">Layanan AI & Machine Learning</h2>
        <p class="section-subtitle">Kami menyediakan solusi AI dan Machine Learning yang inovatif untuk membantu bisnis Anda mengoptimalkan proses, menganalisis data, dan membuat keputusan yang lebih baik.</p>
        
        <div class="service-overview">
            <div class="service-image">
                <img src="https://images.unsplash.com/photo-1591453089816-0fbb971b454c?q=80&w=1932&auto=format&fit=crop" alt="AI & Machine Learning">
            </div>
            <div class="service-description">
                <h3>Mengapa Memilih Layanan AI Kami?</h3>
                <p>Kecerdasan buatan (AI) dan pembelajaran mesin (Machine Learning) telah merevolusi cara bisnis beroperasi. Dengan teknologi ini, Anda dapat mengotomatisasi tugas-tugas kompleks, mendapatkan wawasan berharga dari data, dan menciptakan pengalaman yang dipersonalisasi untuk pelanggan Anda.</p>
                <p>Tim ahli kami memiliki pengalaman luas dalam mengembangkan dan menerapkan solusi AI yang disesuaikan dengan kebutuhan spesifik bisnis Anda, membantu Anda tetap kompetitif di era digital.</p>
            </div>
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="technologies-section">
        <h2 class="section-title">Teknologi yang Kami Gunakan</h2>
        <p class="section-subtitle">Kami menggunakan teknologi AI dan Machine Learning terkini untuk memberikan solusi terbaik</p>
        
        <div class="tech-grid">
            <div class="tech-card">
                <div class="tech-icon">
                    <i class='bx bx-brain'></i>
                </div>
                <h3>Deep Learning</h3>
                <p>Jaringan neural yang kompleks untuk menyelesaikan masalah yang membutuhkan pengenalan pola tingkat tinggi</p>
            </div>
            
            <div class="tech-card">
                <div class="tech-icon">
                    <i class='bx bx-line-chart'></i>
                </div>
                <h3>Predictive Analytics</h3>
                <p>Analisis prediktif untuk memperkirakan tren dan perilaku masa depan berdasarkan data historis</p>
            </div>
            
            <div class="tech-card">
                <div class="tech-icon">
                    <i class='bx bx-message-square-dots'></i>
                </div>
                <h3>Natural Language Processing</h3>
                <p>Teknologi untuk memahami dan menghasilkan bahasa manusia untuk chatbot dan analisis sentimen</p>
            </div>
            
            <div class="tech-card">
                <div class="tech-icon">
                    <i class='bx bx-camera'></i>
                </div>
                <h3>Computer Vision</h3>
                <p>Sistem yang dapat mengidentifikasi dan memproses gambar seperti yang dilakukan manusia</p>
            </div>
        </div>
        
        <div class="service-features">
            <h3 class="features-title">Fitur Utama Layanan AI Kami</h3>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-analyse'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Analisis Data Prediktif</h4>
                        <p>Menggunakan algoritma machine learning untuk memprediksi tren masa depan dan membantu pengambilan keputusan bisnis yang lebih baik.</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-bot'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Chatbot & Asisten Virtual</h4>
                        <p>Solusi chatbot cerdas yang dapat berinteraksi dengan pelanggan Anda secara alami dan memberikan bantuan 24/7.</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-user-check'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Personalisasi Pengalaman Pengguna</h4>
                        <p>Sistem rekomendasi yang mempelajari preferensi pengguna untuk memberikan pengalaman yang dipersonalisasi.</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-shield-quarter'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Deteksi Fraud & Keamanan</h4>
                        <p>Sistem AI yang dapat mendeteksi aktivitas mencurigakan dan melindungi bisnis Anda dari ancaman keamanan.</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-search-alt'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Pengenalan Gambar & Objek</h4>
                        <p>Teknologi computer vision untuk mengidentifikasi dan mengklasifikasikan gambar dan objek secara otomatis.</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Optimasi Proses Bisnis</h4>
                        <p>Mengotomatisasi dan mengoptimalkan proses bisnis menggunakan algoritma AI untuk meningkatkan efisiensi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="projects-section">
        <h2 class="section-title">Proyek AI & Machine Learning Kami</h2>
        <p class="section-subtitle">Beberapa contoh implementasi AI dan Machine Learning yang telah kami kembangkan</p>
        
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">
                    <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?q=80&w=2070&auto=format&fit=crop" alt="Sistem Rekomendasi E-commerce">
                </div>
                <div class="project-content">
                    <h3>Sistem Rekomendasi E-commerce</h3>
                    <p>Sistem rekomendasi produk berbasis AI untuk meningkatkan penjualan dan pengalaman pengguna.</p>
                    <div class="project-tags">
                        <span class="project-tag">Machine Learning</span>
                        <span class="project-tag">E-commerce</span>
                    </div>
                </div>
            </div>
            
            <div class="project-card">
                <div class="project-image">
                    <img src="https://images.unsplash.com/photo-1559526324-593bc073d938?q=80&w=2070&auto=format&fit=crop" alt="Chatbot Layanan Pelanggan">
                </div>
                <div class="project-content">
                    <h3>Chatbot Layanan Pelanggan</h3>
                    <p>Chatbot cerdas yang dapat menangani pertanyaan pelanggan dan mengurangi beban tim support.</p>
                    <div class="project-tags">
                        <span class="project-tag">NLP</span>
                        <span class="project-tag">Customer Service</span>
                    </div>
                </div>
            </div>
            
            <div class="project-card">
                <div class="project-image">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop" alt="Analisis Sentimen Media Sosial">
                </div>
                <div class="project-content">
                    <h3>Analisis Sentimen Media Sosial</h3>
                    <p>Sistem yang menganalisis sentimen publik terhadap brand dari data media sosial.</p>
                    <div class="project-tags">
                        <span class="project-tag">Sentiment Analysis</span>
                        <span class="project-tag">Social Media</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2 class="section-title">Pertanyaan Umum</h2>
        <p class="section-subtitle">Jawaban untuk pertanyaan yang sering diajukan tentang layanan AI & Machine Learning kami</p>
        
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Apa itu AI dan Machine Learning?</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="accordion-content">
                    <p>AI (Artificial Intelligence) adalah teknologi yang memungkinkan komputer untuk meniru kecerdasan manusia, sementara Machine Learning adalah cabang dari AI yang memungkinkan sistem untuk belajar dan meningkatkan dari pengalaman tanpa diprogram secara eksplisit. Keduanya bekerja sama untuk membuat sistem yang dapat belajar, beradaptasi, dan membuat keputusan berdasarkan data.</p>
                </div>
            </div>
            
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Bagaimana AI dapat membantu bisnis saya?</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="accordion-content">
                    <p>AI dapat membantu bisnis Anda dengan mengotomatisasi tugas-tugas rutin, menganalisis data dalam jumlah besar untuk mendapatkan wawasan berharga, meningkatkan pengalaman pelanggan melalui personalisasi, mengoptimalkan proses operasional, dan membantu dalam pengambilan keputusan yang lebih baik berdasarkan prediksi dan analisis yang akurat.</p>
                </div>
            </div>
            
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Berapa lama waktu yang dibutuhkan untuk mengembangkan solusi AI?</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="accordion-content">
                    <p>Waktu pengembangan solusi AI bervariasi tergantung pada kompleksitas proyek, ketersediaan data, dan kebutuhan spesifik bisnis Anda. Proyek sederhana mungkin membutuhkan waktu 2-3 bulan, sementara proyek yang lebih kompleks bisa memakan waktu 6 bulan atau lebih. Kami akan bekerja sama dengan Anda untuk menetapkan timeline yang realistis berdasarkan kebutuhan proyek Anda.</p>
                </div>
            </div>
            
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Apakah bisnis saya membutuhkan data dalam jumlah besar?</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="accordion-content">
                    <p>Meskipun data dalam jumlah besar dapat meningkatkan akurasi model AI, kami dapat bekerja dengan berbagai ukuran dataset. Jika Anda memiliki data yang terbatas, kami dapat menggunakan teknik seperti transfer learning atau augmentasi data untuk mengembangkan solusi yang efektif. Kami juga dapat membantu Anda dalam strategi pengumpulan data jika diperlukan.</p>
                </div>
            </div>
            
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Bagaimana dengan keamanan data saat menggunakan AI?</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="accordion-content">
                    <p>Keamanan data adalah prioritas utama kami. Kami menerapkan praktik keamanan terbaik dalam industri, termasuk enkripsi data, kontrol akses yang ketat, dan kepatuhan terhadap regulasi privasi data seperti GDPR. Semua solusi AI kami dirancang dengan mempertimbangkan privasi dan keamanan data dari awal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Siap Untuk Transformasi Digital Dengan AI?</h2>
            <p>Hubungi kami sekarang untuk konsultasi gratis dan pelajari bagaimana AI dan Machine Learning dapat membantu bisnis Anda mencapai potensi maksimal.</p>
            <div class="cta-buttons">
                <a href="../Kontak.php" class="cta-primary">Hubungi Kami</a>
                <a href="../Layanan.php" class="cta-secondary">Pelajari Layanan Lainnya</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <div class="footer-logo">PurpleSite</div>
                <p class="footer-desc">Menyediakan solusi digital terbaik untuk membantu bisnis Anda berkembang di era digital dengan layanan web development, mobile apps, dan solusi AI.</p>
                <div class="footer-social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Tautan Cepat</h3>
                <ul>
                    <li><a href="../Navbar.php">Beranda</a></li>
                    <li><a href="../Tentang.php">Tentang Kami</a></li>
                    <li><a href="../Layanan.php">Layanan</a></li>
                    <li><a href="../Portofolio.php">Portofolio</a></li>
                    <li><a href="../Kontak.php">Kontak</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="PengembanganWeb.php">Pengembangan Web</a></li>
                    <li><a href="AplikasiMobile.php">Aplikasi Mobile</a></li>
                    <li><a href="DesainGrafis.php">Desain Grafis</a></li>
                    <li><a href="DigitalMarketing.php">Digital Marketing</a></li>
                    <li><a href="AIMachineLearning.php">AI & Machine Learning</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Hubungi Kami</h3>
                <ul>
                    <li><i class='bx bx-map'></i> Jl. Contoh No. 123, Jakarta</li>
                    <li><i class='bx bx-phone'></i> +62 123 4567 890</li>
                    <li><i class='bx bx-envelope'></i> info@purplesite.com</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            &copy; 2023 PurpleSite. All Rights Reserved.
        </div>
    </footer>

    <script>
        // JavaScript for accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const item = this.parentElement;
                    const isActive = item.classList.contains('active');
                    
                    // Close all items
                    document.querySelectorAll('.accordion-item').forEach(accItem => {
                        accItem.classList.remove('active');
                    });
                    
                    // If the clicked item wasn't active, make it active
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>
    </div> <!-- End of content wrapper -->
</body>
</html>