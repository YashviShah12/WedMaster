<?php
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM wedding_venues ORDER BY id DESC");
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Premium Corporate Events | Fernweh Weddings</title>
        <meta name="description" content="Discover our exceptional corporate event venues for your business gatherings">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
        
        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
        
        .venues-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .venues-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('assets/img/patterns/dot-pattern.png') repeat;
            opacity: 0.05;
            z-index: 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 70px;
            position: relative;
            z-index: 1;
        }
        
        .section-title h2 {
            font-size: 48px;
            color: var(--dark-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-title p {
            max-width: 700px;
            margin: 20px auto 0;
            font-size: 18px;
            color: var(--text-color);
        }
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
    
    

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            width: 350px;
            overflow: hidden;
            transition: var(--transition);
            margin-bottom: 30px;
            position: relative;
        }

        .card:before {
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

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }
        
        .card:hover:before {
            opacity: 1;
        }

        .card-img-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }
        
        .card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 25px;
            position: relative;
            z-index: 2;
            background: var(--white);
        }

        .card-body h3 {
            color: var(--primary-color);
            margin-bottom: 12px;
            font-size: 24px;
            font-weight: 600;
            font-family: 'Playfair Display', serif;
            transition: var(--transition);
        }
        
        .card-body h3 a {
            color: inherit;
            text-decoration: none;
        }
        
        .card:hover .card-body h3 {
            color: var(--accent-color);
        }

        .card-body .location {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: var(--text-color);
            font-size: 16px;
        }
        
        .card-body .location i {
            margin-right: 8px;
            color: var(--secondary-color);
            font-size: 18px;
        }

        .card-body p {
            font-size: 15px;
            color: var(--text-color);
            line-height: 1.6;
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
        
        .no-image {
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 16px;
            height: 100%;
            font-style: italic;
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

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .card {
                width: 300px;
            }
        }
        
        @media (max-width: 992px) {
            .section-title h2 {
                font-size: 36px;
            }
            
            .section-title p {
                font-size: 16px;
            }
        }
        
        @media (max-width: 768px) {
            .venues-section {
                padding: 60px 0;
            }
            
            .grid {
                gap: 20px;
            }
            
            .card {
                width: 100%;
                max-width: 350px;
            }
            
            .section-title h2 {
                font-size: 32px;
            }
        }
        
        @media (max-width: 576px) {
            .section-title h2 {
                font-size: 28px;
            }
            
            .card-img-container {
                height: 200px;
            }
        }
        </style>
   </head>

   <body>
    <!--? Preloader Start -->
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
    <!-- Preloader Start -->
    
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
    
    <main>
        <!--? Hero Area Start-->
        <div class="slider-area2">
            <div class="single-slider slider-height2 hero-overly d-flex align-items-center" style="background-image: url('assets/img/gallery/our/8.jpeg')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 data-aos="fade-up" data-aos-delay="200">Corporate Events</h2>
                                <p data-aos="fade-up" data-aos-delay="400" style="color:#ffffff">Professional venues for your business gatherings and conferences</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

        <section class="venues-section">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Premium Corporate Venues</h2>
                    <p>Exceptional spaces designed for productive business meetings and events</p>
                </div>
                
                <div class="grid">
                  <?php while ($row = $result->fetch_assoc()): 
                      // Handle both full path and just filename cases
                      $imagePath = $row['image'];
                      if (!empty($imagePath)) {
                          if (strpos($imagePath, 'uploads/') === false) {
                              $imagePath = 'uploads/' . $imagePath;
                          }
                      } else {
                          $imagePath = ''; // No image available
                      }
                  ?>
                    <div class="card" data-aos="fade-up" data-aos-delay="<?= rand(100, 300) ?>">
                        <a href="productview2.php?id=<?= $row['id'] ?>">
                            <div class="card-img-container">
                            <?php if (!empty($imagePath)) { ?>
                              <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($row['name']) ?>" 
                                   onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'no-image\'>Image Not Available</div>';">
                            <?php } else { ?>
                              <div class="no-image">Image Not Available</div>
                            <?php } ?>
                            </div>
                        </a>
                        <div class="card-body">
                            <h3><a href="productview2.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></a></h3>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($row['location']) ?></p>
                            <p><?= htmlspecialchars($row['description']) ?></p>
                            <a href="productview2.php?id=<?= $row['id'] ?>" class="view-btn">View Venue</a>
                        </div>
                    </div>
                  <?php endwhile; ?>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/backgrounds/cta-bg.jpg') center/cover no-repeat; padding: 100px 0; text-align: center; color: white;">
            <div class="container" data-aos="fade-up">
                <h2 style="font-size: 36px; margin-bottom: 20px;">Need Help Planning Your Corporate Event?</h2>
                <p style="font-size: 18px; max-width: 700px; margin: 0 auto 30px;">Our event specialists can help you organize a flawless business gathering</p>
                <a href="contact.html" class="view-btn" style="background: var(--secondary-color); border-color: var(--secondary-color);">Contact Our Team</a>
            </div>
        </section>

        <!-- Vendors Section Start -->
        <section class="vendors-section">
            <div class="container vendor-container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-70" data-aos="fade-up">
                            <h2>Our Corporate Partners</h2>
                            <img src="assets/img/gallery/tittle_img.png" alt="">
                            <p>Trusted by leading businesses for exceptional corporate event services</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <?php
                    $vendors = [
                        ["name" => "Conference Facilities", "img" => "assets/img/gallery/gallery1.png"],
                        ["name" => "Catering Services", "img" => "assets/img/gallery/gallery2.png"],
                        ["name" => "AV Equipment", "img" => "assets/img/gallery/gallery3.png"],
                        ["name" => "Team Building", "img" => "assets/img/gallery/gallery4.png"],
                        ["name" => "Event Planning", "img" => "assets/img/gallery/gallery01.png"],
                        ["name" => "Branding Services", "img" => "assets/img/gallery/gallery01.png"],
                        ["name" => "Transportation", "img" => "assets/img/gallery/gallery01.png"],
                        ["name" => "Accommodation", "img" => "assets/img/gallery/gallery01.png"]
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
                                    <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt="" style="max-width: 250px;"></a>
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
                                <h4>Corporate Services</h4>
                                <ul>
                                    <li><a href="#">Conference Planning</a></li>
                                    <li><a href="#">Team Building</a></li>
                                    <li><a href="#">Product Launches</a></li>
                                    <li><a href="#">Annual Meetings</a></li>
                                    <li><a href="#">Corporate Retreats</a></li>
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
                                <p style="font-weight: 500; color: #ffffff;">Subscribe for corporate event trends and special offers</p>
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
    
    <script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-in-out'
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
    
    // Card hover effect enhancement
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    </script>
   </body>
</html>