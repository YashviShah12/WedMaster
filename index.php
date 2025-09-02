<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wedding By Fernweh</title>
    <meta name="description" content="Premium wedding planning services creating unforgettable moments">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
    :root {
        --primary-color: #8e44ad;       /* Lavender purple */
        --secondary-color: #ff6b6b;     /* Coral */
        --accent-color: #6c5ce7;        /* Soft purple */
        --dark-color: #2d3436;          /* Dark gray */
        --light-color: #f7f1e3;         /* Cream */
        --text-color: #636e72;          /* Gray text */
        --white: #ffffff;
        --black: #000000;
        --transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
        --shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
        --shadow-xl: 0 15px 25px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.08);
    }
    
    body {
        font-family: 'Montserrat', sans-serif;
        color: var(--text-color);
        background-color: var(--white);
        overflow-x: hidden;
        line-height: 1.6;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        color: var(--dark-color);
    }
    
    /* ===== Preloader ===== */
    #preloader-active {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--white);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.8s ease;
    }
    
    .preloader-inner {
        text-align: center;
        perspective: 1000px;
    }
    
    .preloader-circle {
        width: 80px;
        height: 80px;
        border: 8px solid rgba(142, 68, 173, 0.2);
        border-top: 8px solid var(--primary-color);
        border-radius: 50%;
        margin: 0 auto 20px;
        animation: spin 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .pere-text img {
        width: 100px;
        animation: pulse 2s infinite ease-in-out;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    
    #preloader-active.fade-out {
        opacity: 0;
        pointer-events: none;
    }
    
    /* ===== Header ===== */
    .header-area {
        position: fixed;
        width: 100%;
        top: -100px;
        left: 0;
        z-index: 999;
        background-color: rgba(255, 255, 255, 1);
        box-shadow: var(--shadow-sm);
        transition: all 0.7s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    }
    
    .header-area.animate-slide-in {
        top: 0;
    }
    
    .header-sticky.sticky-bar {
        background-color: rgba(255, 255, 255, 0.98);
        box-shadow: var(--shadow-md);
        backdrop-filter: blur(5px);
    }
    
    .main-menu ul li a {
        font-weight: 500;
        color: var(--dark-color);
        position: relative;
        padding: 10px 15px;
        transition: var(--transition);
    }
    
    .main-menu ul li a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: var(--transition);
        transform: translateX(-50%);
    }
    
    .main-menu ul li a:hover {
        color: var(--primary-color);
    }
    
    .main-menu ul li a:hover:after {
        width: 60%;
    }
    
    /* ===== Hero Slider ===== */
    .slider-area {
        position: relative;
        height: 100vh;
        overflow: hidden;
    }
    
    .single-slider {
        height: 100vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .hero-overly:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
        z-index: 1;
    }
    
    .hero__caption {
        position: relative;
        z-index: 2;
        color: var(--white);
        padding: 0 15px;
    }
    
    .hero__caption span {
        display: inline-block;
        font-size: 18px;
        margin-bottom: 15px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.8);
    }
    
    .hero__caption h1 {
        font-size: 72px;
        font-weight: 700;
        margin-bottom: 30px;
        color: var(--white);
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        line-height: 1.2;
    }
    
    .hero__caption p {
        font-size: 20px;
        max-width: 600px;
        margin-bottom: 40px;
    }
    
    /* ===== Section Styling ===== */
    .section-padding {
        padding: 100px 0;
    }
    
    .section-tittle h2 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .section-tittle h2:after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--primary-color);
    }
    
    .section-tittle img {
        margin: 20px 0;
    }
    
    .section-tittle p {
        max-width: 700px;
        margin: 0 auto;
        font-size: 18px;
    }
    
    /* ===== Product Cards ===== */
    .product-slider-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    
    .product-card {
        background: var(--white);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: var(--transition);
        height: 100%;
        position: relative;
    }
    
    .product-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(142, 68, 173, 0.1), rgba(142, 68, 173, 0.3));
        opacity: 0;
        transition: var(--transition);
        z-index: 1;
    }
    
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-xl);
    }
    
    .product-card:hover:before {
        opacity: 1;
    }
    
    .product-img-container {
        width: 100%;
        height: 250px;
        overflow: hidden;
        position: relative;
    }
    
    .product-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    
    .product-card:hover .product-img-container img {
        transform: scale(1.1);
    }
    
    .product-details {
        padding: 25px;
        position: relative;
        z-index: 2;
        background: var(--white);
    }
    
    .product-details h5 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark-color);
    }
    
    .product-details p {
        font-size: 15px;
        color: var(--text-color);
        margin-bottom: 20px;
    }
    
    .view-btn {
        display: inline-block;
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        background: var(--primary-color);
        color: var(--white);
        border-radius: 30px;
        text-decoration: none;
        transition: var(--transition);
        border: 2px solid transparent;
    }
    
    .view-btn:hover {
        background: transparent;
        color: var(--primary-color);
        border-color: var(--primary-color);
        transform: translateY(-3px);
    }
    
    /* ===== Gallery ===== */
    .gallery-area {
        padding: 100px 0;
        background-color: var(--light-color);
    }
    
    .single-gallery {
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }
    
    .single-gallery:hover {
        box-shadow: var(--shadow-xl);
    }
    
    .gallery-img {
        height: 300px;
        background-size: cover;
        background-position: center;
        transition: transform 0.8s ease;
    }
    
    .single-gallery:hover .gallery-img {
        transform: scale(1.05);
    }
    
    .thumb-content-box {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        padding: 20px;
        background: rgba(0,0,0,0.7);
        transition: var(--transition);
    }
    
    .single-gallery:hover .thumb-content-box {
        bottom: 0;
    }
    
    .thumb-content {
        position: relative;
        color: var(--white);
    }
    
    .thumb-content h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }
    
    .menorie-icon {
        position: absolute;
        right: 0;
        top: 0;
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }
    
    .menorie-icon:hover {
        background: var(--secondary-color);
        transform: rotate(90deg);
    }
    
    /* ===== Vendors Section ===== */
    .vendors-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        position: relative;
        overflow: hidden;
    }
    
    .vendors-section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('assets/img/patterns/dot-pattern.png') repeat;
        opacity: 0.1;
        z-index: 0;
    }
    
    .vendor-container {
        position: relative;
        z-index: 1;
    }
    
    .vendor-item {
        text-align: center;
        padding: 20px;
        transition: var(--transition);
    }
    
    .vendor-img {
        width: 120px;
        height: 120px;
        margin: 0 auto 15px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid var(--primary-color);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }
    
    .vendor-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .vendor-item:hover .vendor-img {
        transform: scale(1.1);
        border-color: var(--secondary-color);
    }
    
    .vendor-name {
        font-weight: 600;
        color: var(--dark-color);
        margin-top: 15px;
    }
    
    /* ===== RSVP Form ===== */
    .rsvp-section {
        padding: 100px 0;
        background: url('assets/img/backgrounds/rsvp-bg.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
    }
    
    .rsvp-section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
    }
    
    .rsvp-container {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
    }
    
    .rsvp-form {
        padding: 50px;
    }
    
    .rsvp-form h2 {
        text-align: center;
        margin-bottom: 30px;
        color: var(--primary-color);
        position: relative;
    }
    
    .rsvp-form h2:after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--primary-color);
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: var(--transition);
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(142, 68, 173, 0.2);
    }
    
    .submit-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background: var(--primary-color);
        color: var(--white);
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
    }
    
    .submit-btn:hover {
        background: var(--secondary-color);
        transform: translateY(-3px);
    }
    
    /* ===== Registry Section ===== */
    .registry-section {
        padding: 80px 0;
        background-color: var(--light-color);
    }
    
    .registry-item {
        text-align: center;
        padding: 20px;
        transition: var(--transition);
    }
    
    .registry-item img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }
    
    .registry-item:hover img {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    /* ===== Map Section ===== */
    .map-section {
        padding: 80px 0;
        background-color: var(--white);
    }
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        height: 400px;
    }
    
    .address-box {
        background: var(--white);
        padding: 30px;
        border-radius: 15px;
        box-shadow: var(--shadow-md);
        height: 100%;
    }
    
    .address-box h3 {
        color: var(--primary-color);
        margin-bottom: 20px;
        position: relative;
    }
    
    .address-box h3:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--primary-color);
    }
    
    /* ===== Footer ===== */
    .footer-main {
        background: var(--dark-color);
        color: var(--white);
        padding: 80px 0 0;
    }
    
    .footer-logo img {
        max-width: 200px;
    }
    
    .footer-tittle h4 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 25px;
        position: relative;
        color: var(--white);
    }
    
    .footer-tittle h4:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--primary-color);
    }
    
    .footer-tittle ul li {
        margin-bottom: 10px;
    }
    
    .footer-tittle ul li a {
        color: rgba(255,255,255,0.7);
        transition: var(--transition);
    }
    
    .footer-tittle ul li a:hover {
        color: var(--primary-color);
        padding-left: 5px;
    }
    
    .footer-bottom-area {
        padding: 20px 0;
        background: rgba(0,0,0,0.2);
        margin-top: 50px;
    }
    
    .footer-copy-right p {
        margin: 0;
        color: rgba(255,255,255,0.5);
    }
    
    .footer-copy-right a {
        color: var(--primary-color);
    }
    
    /* ===== Animations ===== */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fadeInUp {
        animation: fadeInUp 1s both;
    }
    
    /* ===== Responsive ===== */
    @media (max-width: 992px) {
        .hero__caption h1 {
            font-size: 56px;
        }
        
        .section-tittle h2 {
            font-size: 36px;
        }
    }
    
    @media (max-width: 768px) {
        .hero__caption h1 {
            font-size: 42px;
        }
        
        .section-padding {
            padding: 60px 0;
        }
        
        .product-img-container {
            height: 200px;
        }
    }
    
    @media (max-width: 576px) {
        .hero__caption h1 {
            font-size: 32px;
        }
        
        .hero__caption p {
            font-size: 16px;
        }
        
        .section-tittle h2 {
            font-size: 28px;
        }
    }
    </style>
</head>
<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader End -->

<!-- Header Start -->
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt="" style="max-width: 180px;"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>                              
                                <ul id="navigation">                                                          
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Services</a>
                                        <ul class="submenu">
                                             <li><a href="wevent.php">Wedding Event</a></li>
                                             <li><a href="cevent.php">Corporate Event</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="hotel.php">Destination Wedding</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="#">About</a>
                                        <ul class="submenu">
                                             <li><a href="about.html">About Us</a></li>
                                             <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Main Content -->
<main>
    <!-- Hero Slider Area Start -->
    <div class="slider-area">
    <div class="slider-active">
        <!-- Single Slider with Background Video -->
        <div class="single-slider slider-height hero-overly d-flex align-items-center position-relative" style="overflow: hidden;">
            
            <!-- Video as Background -->
            <video autoplay muted loop playsinline class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 0;">
                <source src="assets/img/gallery/demo2.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Content on top of video -->
            <div class="container position-relative" style="z-index: 1;">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-8 col-lg-6 col-md-8">
                        <div class="hero__caption" data-aos="fade-up" data-aos-delay="300">
                            <!-- <span>January 23, 2024</span> -->
                            <h1 style="font-size: 90px;">Together in Heart</h1>
                            <p>Celebration of Forever</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Slide with Background Video -->
        <div class="single-slider slider-height hero-overly d-flex align-items-center position-relative" style="overflow: hidden;">
            
            <!-- Video Background -->
            <video autoplay muted loop playsinline class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 0;">
                <source src="assets/img/gallery/demo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Foreground Content -->
            <div class="container position-relative" style="z-index: 1;">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-8 col-lg-6 col-md-8">
                        <div class="hero__caption" data-aos="fade-up" data-aos-delay="300">
                            <!-- <span>Celebrating Love</span> -->
                            <h1 style="font-size: 90px">Together in Heart</h1>
                            <p>Celebration of Forever</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Hero Slider Area End -->

    <!-- Wedding Services Start -->
    <section class="product-slider-section">
        <div class="container">
            <!-- Section Title -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-70" data-aos="fade-up">
                        <h2>Details of a Dream Come True</h2>
                        <img src="assets/img/gallery/tittle_img.png" alt="">
                        <p>Quisque nec facilisis sem. In at commodo velit. Aliquam tempor volutpat laoreet. Quisque non tellus eleifend arcu gravida aliquam. Vivamus quis consequat nisl</p>
                    </div>
                </div>
            </div>

            <!-- Swiper Slider -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="swiper myHorizontalSwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $conn = new mysqli("localhost", "root", "root", "my");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-img-container">
                                        <img src="' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '">
                                    </div>
                                    <div class="product-details">
                                        <h5>' . htmlspecialchars($row['name']) . '</h5>
                                        <p><i class="fas fa-tag"></i> ' . htmlspecialchars($row['category']) . '</p>
                                        <a href="productview.php?id=' . $row['id'] . '" class="view-btn">View Details</a>
                                    </div>
                                </div>
                            </div>';
                        }
                        $conn->close();
                        ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wedding Services End -->

    <!-- Gallery Area Start -->
   <section class="gallery-area section-padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70" data-aos="fade-up">
                    <h2>Wedding Moments</h2>
                    <img src="assets/img/gallery/tittle_img.png" alt="">
                    <p>Capturing the most beautiful moments of your special day</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- First Gallery Item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('assets/img/gallery/our/1.png');">
                        <img src="assets/img/gallery/gallery1.png" alt="Bridal Preparation" style="display: none;">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>Bridal Preparation</h3>
                            <a href="assets/img/gallery/gallery1.png" class="glightbox menorie-icon">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Gallery Item -->
            <div class="col-lg-8 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('assets/img/gallery/our/2.png');">
                        <img src="assets/img/gallery/gallery2.png" alt="Ceremony" style="display: none;">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>Ceremony</h3>
                            <a href="assets/img/gallery/gallery2.png" class="glightbox menorie-icon">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Gallery Item -->
            <div class="col-lg-8 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('assets/img/gallery/our/3.png');">
                        <img src="assets/img/gallery/gallery3.png" alt="Reception" style="display: none;">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>Reception</h3>
                            <a href="assets/img/gallery/gallery3.png" class="glightbox menorie-icon">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fourth Gallery Item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('assets/img/gallery/our/4.png');">
                        <img src="assets/img/gallery/gallery4.png" alt="Dance" style="display: none;">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>Dance</h3>
                            <a href="assets/img/gallery/gallery4.png" class="glightbox menorie-icon">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Gallery Image Styling */
    .gallery-img {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 300px;
        width: 100%;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }
    
    /* Single Gallery Item */
    .single-gallery {
        position: relative;
        transition: all 0.3s ease;
    }
    
    .single-gallery:hover {
        transform: translateY(-5px);
    }
    
    /* Thumb Content Box */
    .thumb-content-box {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        padding: 20px;
        background: rgba(0,0,0,0.7);
        transition: all 0.3s ease;
    }
    
    .single-gallery:hover .thumb-content-box {
        bottom: 0;
    }
    
    .thumb-content {
        position: relative;
        color: #fff;
    }
    
    .thumb-content h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }
    
    .menorie-icon {
        position: absolute;
        right: 0;
        top: 0;
        width: 40px;
        height: 40px;
        background: #8e44ad;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .menorie-icon:hover {
        background: #ff6b6b;
        transform: rotate(90deg);
    }
</style>
    <!-- Gallery Area End -->

    <!-- Vendors Section Start -->
    <section class="vendors-section">
        <div class="container vendor-container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-70" data-aos="fade-up">
                        <h2>Our Premium Vendors</h2>
                        <img src="assets/img/gallery/demo.mp4" alt="">
                        <p>Your dream day deserves the best — trust our handpicked wedding vendors for unforgettable elegance and flawless service</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php
                $vendors = [
                    ["name" => "Bridal Couture", "img" => "assets/img/gallery/gallery1.png"],
                    ["name" => "Floral Designs", "img" => "assets/img/gallery/gallery2.png"],
                    ["name" => "Luxury Venues", "img" => "assets/img/gallery/gallery3.png"],
                    ["name" => "Gourmet Catering", "img" => "assets/img/gallery/gallery4.png"],
                    ["name" => "Photography", "img" => "assets/img/gallery/gallery01.png"],
                    ["name" => "Event Planning", "img" => "assets/img/gallery/gallery01.png"],
                    ["name" => "Jewelry", "img" => "assets/img/gallery/gallery01.png"],
                    ["name" => "Entertainment", "img" => "assets/img/gallery/gallery01.png"]
                ];
                
                foreach ($vendors as $index => $vendor) {
                    echo '
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="'.($index*100).'">
                        <div class="vendor-item">
                            <div class="vendor-img">
                                <img src="'.$vendor["img"].'" alt="'.$vendor["name"].'">
                            </div>
                            <h4 class="vendor-name">'.$vendor["name"].'</h4>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Vendors Section End -->

    <!-- RSVP Section Start -->
    <section class="rsvp-section" style="background: url('assets/img/gallery/our/5.png') center center/cover no-repeat; position: relative; z-index: 1;">
     <div class="container">
            <div class="row d-flex justify-content-center" >
                <div class="col-lg-8" >
                    <div class="section-tittle text-center mb-70" data-aos="fade-up">
                        <h2 style="color: var(--white);">Are You Attending?</h2>
                        <img src="assets/img/gallery/tittle_img_white.png" alt="" class="floating">
                        <p style="color: rgba(255,255,255,0.8);">Please let us know if you'll be joining us for our special day</p>
                    </div>
                </div>
            </div>
            
            <div class="rsvp-container" data-aos="fade-up" data-aos-delay="300">
                <form class="rsvp-form" id="rsvpForm">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" required>
                            <option value="" disabled selected>Number of Guests</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Any dietary restrictions or special requests?"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Confirm Attendance</button>
                </form>
            </div>
        </div>
    </section>
    <!-- RSVP Section End -->

    <!-- Registry Section Start -->
    <section class="registry-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-70" data-aos="fade-up">
                        <h2>Weding Destinations</h2>
                        <p>Your presence is present enough, but if you wish to give a gift, here are some ideas we'd love</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php
                $gifts = [
                    ["img" => "assets/img/gallery/gallery01.png"],
                    ["img" => "assets/img/gallery/gallery02.png"],
                    ["img" => "assets/img/gallery/gallery03.png"],
                    ["img" => "assets/img/gallery/gallery04.png"],
                    ["img" => "assets/img/gallery/gallery05.png"],
                    ["img" => "assets/img/gallery/gallery06.png"],
                    ["img" => "assets/img/gallery/gallery07.png"],
                    ["img" => "assets/img/gallery/gallery08.png"]
                ];
                
                foreach ($gifts as $index => $gift) {
                    echo '
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="'.($index*100).'">
                        <div class="registry-item">
                            <img src="'.$gift["img"].'" alt="Gift Item">
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Registry Section End -->

    <!-- Map Section Start -->
    <section class="map-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.809707670609!2d72.55595607512873!3d23.03075817916801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f1a21dffa5%3A0x5b32d82ad98185a3!2sFernweh%20Vacations!5e0!3m2!1sen!2sin!4v1749557384357!5m2!1sen!2sin" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="address-box">
                        <h3>Our Location</h3>
                        <p>
                            <i class="fas fa-map-marker-alt"></i> 321, Super Mall,<br>
                            Chimanlal Girdharlal Rd,<br>
                            nr. Lal Bunglow,<br>
                            New Commercial Mills Staff Society,<br>
                            Ellisbridge, Ahmedabad,<br>
                            Gujarat 380009
                        </p>
                        <p><i class="fas fa-phone"></i> +91 1234567890</p>
                        <p><i class="fas fa-envelope"></i> info@fernwehweddings.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->
</main>

<!-- Footer Start -->
<footer class="footer-main" data-background="assets/img/gallery/section_bg4.png">
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
    <!-- logo -->
    <div class="footer-logo">
        <a href="index.html">
            <img src="assets/img/logo/logo2_footer.png" alt="" style="max-width: 250px; height: auto;">
        </a>
    </div>
    <!-- <div class="footer-social mt-30">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div> -->
</div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Wedding Info</h4>
                            <ul>
                                <li><a href="#">Why Hire a Planner?</a></li>
                                <li><a href="#">How Can I Make An</a></li>
                                <li><a href="#">Appointment?</a></li>
                                <li><a href="#">How to Choose a Venue</a></li>
                                <li><a href="#">Event Catalogue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>About Us</h4>
                            <ul>
                                <li><a href="about.html">Our Story</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <p style="font-weight: 500; color: #ffffff;">Subscribe to get updates on wedding trends and special offers</p>
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Your Email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true" style="color: var(--secondary-color);"></i> by Fernweh Weddings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- JS here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.slicknav.min.js"></script>
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/gijgo.min.js"></script>
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out'
});

// Initialize GLightbox
const lightbox = GLightbox({
    selector: '.glightbox',
    touchNavigation: true,
    loop: true
});

// Initialize Swiper
var swiper = new Swiper(".myHorizontalSwiper", {
    direction: "horizontal",
    loop: true,
    spaceBetween: 30,
    slidesPerView: 3,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },
    breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
    }
});

// Preloader
window.addEventListener("load", function() {
    const preloader = document.getElementById("preloader-active");
    preloader.classList.add("fade-out");
    setTimeout(() => {
        preloader.style.display = "none";
    }, 800);
});

// Header Animation
document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector(".header-area");
    setTimeout(() => {
        header.classList.add("animate-slide-in");
    }, 500);

    // Sticky Header on Scroll
    window.addEventListener("scroll", function() {
        const mainHeader = document.querySelector(".main-header");
        if (window.scrollY > 100) {
            mainHeader.classList.add("sticky-bar");
        } else {
            mainHeader.classList.remove("sticky-bar");
        }
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Form submission
document.getElementById('rsvpForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Here you would typically send the form data to your server
    alert('Thank you for your RSVP! We look forward to celebrating with you.');
    this.reset();
});
</script>
</body>
</html>