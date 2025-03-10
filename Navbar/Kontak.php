<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleSite - Kontak</title>
    <link rel="stylesheet" href="../css/Stylenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Header styling */
        .page-header {
            height: 40vh;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 0 2rem;
            background: linear-gradient(rgba(48, 16, 80, 0.7), rgba(48, 16, 80, 0.9));
            margin-top: -80px; /* To counteract the padding-top in .content */
        }
        
        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease;
        }
        
        .page-header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            animation: fadeIn 1.2s ease;
        }
        
        /* Contact section styling */
        .contact-section {
            padding: 5rem 10%;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            margin-top: 2rem;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }
        
        /* Contact info styling */
        .contact-info {
            background: linear-gradient(to bottom, rgb(48, 16, 80), rgb(86, 36, 136));
            color: #fff;
            padding: 3rem 2rem;
        }
        
        .contact-info h3 {
            font-size: 1.6rem;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .contact-info h3:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background: rgba(255, 255, 255, 0.5);
        }
        
        .info-item {
            display: flex;
            margin-bottom: 2rem;
            align-items: flex-start;
        }
        
        .info-item i {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .info-item .info-text {
            flex: 1;
        }
        
        .info-item .info-text h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .info-item .info-text p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }
        
        .social-links {
            margin-top: 3rem;
        }
        
        .social-links h4 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
        }
        
        .social-icons a {
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
        
        .social-icons a:hover {
            background: #fff;
            color: rgb(48, 16, 80);
            transform: translateY(-5px);
        }
        
        /* Contact form styling */
        .contact-form {
            padding: 3rem;
            background: #fff;
        }
        
        .contact-form h3 {
            font-size: 1.6rem;
            color: rgb(48, 16, 80);
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: rgb(48, 16, 80);
            box-shadow: 0 0 0 3px rgba(48, 16, 80, 0.2);
            outline: none;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            background: rgb(48, 16, 80);
            color: #fff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            background: rgb(86, 36, 136);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(48, 16, 80, 0.2);
        }
        
        /* Map section styling */
        .map-section {
            padding: 3rem 10%;
            background: rgba(248, 249, 250, 0.9);
        }
        
        .map-container {
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        /* Section title styling */
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            color: rgb(48, 16, 80);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto 3rem auto;
        }
        
        /* FAQ section styling */
        .faq-section {
            padding: 5rem 10%;
            background: #fff;
        }
        
        .accordion {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .accordion-item {
            margin-bottom: 1rem;
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .accordion-header {
            background: #f8f9fa;
            padding: 1rem 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .accordion-header:hover {
            background: #f1f1f1;
        }
        
        .accordion-header h4 {
            font-size: 1.1rem;
            color: rgb(48, 16, 80);
            margin: 0;
        }
        
        .accordion-header i {
            font-size: 1.2rem;
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
            padding: 1rem 0;
            color: #666;
            line-height: 1.6;
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
        @media screen and (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .page-header h1 {
                font-size: 2.5rem;
            }
        }
        
        @media screen and (max-width: 768px) {
            .contact-section, .map-section, .faq-section {
                padding: 3rem 5%;
            }
            
            .contact-form {
                padding: 2rem;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade {
            animation: fadeIn 0.8s ease;
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
            <li><a href="Portofolio.php">Portofolio</a></li>
            <li><a href="#" class="active">Kontak</a></li>
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
        <!-- Page Header -->
        <header class="page-header">
            <div>
                <h1>Hubungi Kami</h1>
                <p>Punya pertanyaan atau ingin berdiskusi tentang proyek? Kami siap membantu Anda.</p>
            </div>
        </header>
        
        <!-- Contact Section -->
        <section class="contact-section">
            <h2 class="section-title">Kontak Kami</h2>
            <p class="section-subtitle">Tim kami siap membantu Anda. Silakan hubungi kami melalui form di bawah ini atau melalui kontak yang tersedia.</p>
            
            <div class="contact-container animate-fade">
                <!-- Contact Info -->
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    
                    <div class="info-item">
                        <i class='bx bx-map'></i>
                        <div class="info-text">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Utama No. 123, Jakarta, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class='bx bx-phone'></i>
                        <div class="info-text">
                            <h4>Telepon</h4>
                            <p>+62 812 3456 7890</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class='bx bx-envelope'></i>
                        <div class="info-text">
                            <h4>Email</h4>
                            <p>info@purplesite.com</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class='bx bx-time'></i>
                        <div class="info-text">
                            <h4>Jam Kerja</h4>
                            <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 09:00 - 14:00</p>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <h4>Temukan Kami</h4>
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="https://github.com/FirdausNova"><i class='bx bxl-github'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form">
                    <h3>Kirim Pesan</h3>
                    
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                    <div class="alert alert-success" style="background-color: rgba(72, 187, 120, 0.2); border-left: 4px solid #48bb78; color: #2f855a; padding: 12px 16px; border-radius: 4px; margin-bottom: 20px;">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                    <div class="alert alert-error" style="background-color: rgba(245, 101, 101, 0.2); border-left: 4px solid #f56565; color: #c53030; padding: 12px 16px; border-radius: 4px; margin-bottom: 20px;">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </div>
                    <?php endif; ?>
                    
                    <form id="contactForm" action="process_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                        </div>
                        
                        <?php if(!isset($_SESSION['username']) || !isset($_SESSION['email'])): ?>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <?php else: ?>
                        <div class="form-group" style="background-color: rgba(66, 153, 225, 0.1); padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                            <p style="margin: 0; color: #4a5568;">Menggunakan email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
                        </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Pesan" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </section>
        
        <!-- Map Section -->
        <section class="map-section">
            <div class="map-container animate-fade">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3346654672405!2d106.82197117586952!3d-6.350699062132891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec25f0c61a93%3A0x3415e9c658933cf3!2sUtama%20No.123%2C%20RT.8%2FRW.16%2C%20Srengseng%20Sawah%2C%20Kec.%20Jagakarsa%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012630!5e0!3m2!1sen!2sid!4v1740962704199!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>    
            </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="faq-section">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-subtitle">Berikut adalah beberapa pertanyaan yang sering ditanyakan oleh klien kami.</p>
            
            <div class="accordion animate-fade">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Berapa biaya untuk membuat website?</h4>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Biaya pembuatan website bervariasi tergantung pada kompleksitas, fitur, dan ukuran website yang Anda inginkan. Kami menawarkan berbagai paket mulai dari Rp 5 juta untuk website sederhana hingga Rp 50 juta untuk website bisnis dengan fitur lengkap. Silakan hubungi tim kami untuk konsultasi dan penawaran yang sesuai dengan kebutuhan Anda.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek?</h4>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Durasi pengerjaan proyek bergantung pada kompleksitas dan skala proyek. Website sederhana biasanya dapat selesai dalam 2-4 minggu, sementara proyek yang lebih besar bisa membutuhkan waktu 2-3 bulan. Kami selalu berusaha memberikan timeline yang akurat saat awal proyek dan memberikan update progres secara berkala.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Apakah PurpleSite menyediakan layanan pemeliharaan website?</h4>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Ya, kami menyediakan layanan pemeliharaan website dengan paket bulanan atau tahunan. Layanan ini mencakup update keamanan, backup data berkala, monitoring performa, perbaikan bug, dan dukungan teknis. Dengan layanan pemeliharaan kami, Anda dapat fokus pada bisnis Anda sementara kami memastikan website Anda tetap aman dan berfungsi optimal.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Apakah saya akan memiliki akses penuh ke website saya?</h4>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Tentu, Anda akan memiliki akses penuh ke website Anda termasuk panel admin dan semua akun terkait. Kami juga akan memberikan tutorial penggunaan dasar agar Anda dapat mengelola konten website dengan mudah. Namun, jika Anda lebih nyaman, kami juga menawarkan layanan pengelolaan konten secara berkala.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4>Bagaimana proses pembayaran untuk proyek?</h4>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="accordion-content">
                        <p>Kami menerapkan sistem pembayaran bertahap untuk memudahkan klien. Biasanya, 30% dibayarkan di awal sebagai uang muka, 40% setelah desain dan pengembangan selesai, dan 30% sisa saat proyek selesai dan siap diluncurkan. Untuk proyek jangka panjang, kami dapat menyesuaikan jadwal pembayaran sesuai kesepakatan.</p>
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
                        <li><a href="Portofolio.php">Portofolio</a></li>
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
        // Navbar Mobile Menu Toggle
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
        
        // FAQ Accordion
        const accordionItems = document.querySelectorAll('.accordion-item');
        
        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            
            header.addEventListener('click', () => {
                const currentlyActive = document.querySelector('.accordion-item.active');
                
                if(currentlyActive && currentlyActive !== item) {
                    currentlyActive.classList.remove('active');
                }
                
                item.classList.toggle('active');
            });
        });
        
        
        // Animation on scroll
        function checkVisible() {
            const animateElements = document.querySelectorAll('.animate-fade');
            
            animateElements.forEach(el => {
                const elementPosition = el.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                
                if(elementPosition.top < windowHeight * 0.9) {
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }
            });
        }
        
        // Initial check
        window.addEventListener('load', checkVisible);
        
        // Check on scroll
        window.addEventListener('scroll', checkVisible);

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