<?php
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM wedding_vendors ORDER BY id DESC");
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Luxury Wedding Invitation Set | Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .product-details-area {
            padding: 100px 0;
        }
        .product-img {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .product-img img {
            width: 100%;
            transition: all 0.3s ease;
        }
        .product-img:hover img {
            transform: scale(1.03);
        }
        .product-thumbnails {
            display: flex;
            margin-top: 15px;
        }
        .product-thumbnails img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .product-thumbnails img:hover, .product-thumbnails img.active {
            border-color: #e7a33e;
        }
        .product-info h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        .product-price {
            font-size: 24px;
            color: #e7a33e;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .product-description {
            margin-bottom: 30px;
            color: #666;
            line-height: 1.8;
        }
        .product-meta {
            margin-bottom: 30px;
        }
        .product-meta span {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        .product-meta strong {
            color: #333;
            font-weight: 600;
            margin-right: 10px;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .quantity-selector input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: 1px solid #ddd;
            margin: 0 10px;
        }
        .btn-add-to-cart {
            background: #e7a33e;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-add-to-cart:hover {
            background: #d18d2a;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(233, 163, 62, 0.3);
        }
        .product-tabs {
            margin-top: 50px;
        }
        .nav-tabs {
            border-bottom: 1px solid #eee;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #555;
            font-weight: 600;
            padding: 15px 25px;
            margin-right: 5px;
        }
        .nav-tabs .nav-link.active {
            color: #e7a33e;
            background: transparent;
            border-bottom: 2px solid #e7a33e;
        }
        .tab-content {
            padding: 30px 0;
            color: #666;
            line-height: 1.8;
        }
        .related-products {
            margin-top: 50px;
        }
        .related-products h3 {
            font-size: 24px;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        .related-products h3:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: #e7a33e;
        }
        .single-related-product {
            text-align: center;
            margin-bottom: 30px;
        }
        .single-related-product img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        .single-related-product:hover img {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .single-related-product h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .single-related-product h4 a {
            color: #333;
        }
        .single-related-product h4 a:hover {
            color: #e7a33e;
            text-decoration: none;
        }
        .single-related-product .price {
            color: #e7a33e;
            font-weight: 600;
        }
        .grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      padding: 0 20px 40px;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      width: 280px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      padding: 15px;
    }

    .card-body h3 {
      color: #2980b9;
      margin-bottom: 10px;
      font-size: 20px;
    }

    .card-body p {
      font-size: 14px;
      color: #555;
      margin-bottom: 8px;
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
<header>
    <!-- Header Start -->
    <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt="" style="width: 120%;"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>                              
                                    <ul id="navigation">                                                          
                                       <li><a href="index.php"> home</a></li>
                                        <li><a href="#">Planning</a>
                                            <ul class="submenu">
                                                 <li><a href="hotel.php">Wedding Venues</a></li>
                                                 <li><a href="vender.php">Wedding Vendors</a></li>
                                                 <li><a href="brides.php">Brides</a></li>
                                                 <li><a href="grooms.php">Grooms</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">gallery</a></li>
                                        <li><a href="booking.html">Guestbook</a></li>
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
    <!-- Header End -->
</header>
<main>
    <!--? slider Area Start-->
    <div class="slider-area2 ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider End -->
    
    <!-- Product Details Area Start -->
    <!-- <section class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img">
                        <img src="assets/img/gallery/product1.jpg" alt="Wedding Product" id="mainProductImage">
                    </div>
                    <div class="product-thumbnails">
                        <img src="assets/img/gallery/product1.jpg" alt="Thumbnail 1" class="active" onclick="changeImage(this)">
                        <img src="assets/img/gallery/product1_alt1.jpg" alt="Thumbnail 2" onclick="changeImage(this)">
                        <img src="assets/img/gallery/product1_alt2.jpg" alt="Thumbnail 3" onclick="changeImage(this)">
                        <img src="assets/img/gallery/product1_alt3.jpg" alt="Thumbnail 4" onclick="changeImage(this)">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info">
                        <h2>Luxury Wedding Invitation Set</h2>
                        <div class="product-price">$89.99</div>
                        <div class="product-rating">★★★★★ (12 Reviews)</div>
                        <div class="product-description">
                            <p>Our premium wedding invitation set includes beautifully crafted cards with gold foil detailing, matching envelopes, and RSVP cards. Perfect for couples looking to make a sophisticated first impression with their wedding announcements.</p>
                        </div>
                        <div class="product-meta">
                            <span><strong>Material:</strong> Premium Cardstock, Gold Foil</span>
                            <span><strong>Color:</strong> Ivory with Gold Accents</span>
                            <span><strong>Includes:</strong> 25 Invitations, 25 Envelopes, 25 RSVP Cards</span>
                            <span><strong>Delivery:</strong> 3-5 Business Days</span>
                        </div>
                        <div class="quantity-selector">
                            <button class="btn btn-secondary">-</button>
                            <input type="number" value="1" min="1">
                            <button class="btn btn-secondary">+</button>
                        </div>
                        <button class="btn-add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
            --> 
            <!-- Product Tabs -->
            <!-- <div class="row product-tabs">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab">Reviews (12)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabsContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <p>Our Luxury Wedding Invitation Set is meticulously crafted to make your special day even more memorable. Each piece is printed on premium 300gsm cardstock with elegant gold foil detailing that catches the light beautifully.</p>
                            <p>The set includes 25 complete invitations with matching envelopes and RSVP cards. The design features a timeless floral motif with your names and wedding details elegantly typeset in a classic font. The interior of each invitation is lined with a delicate vellum sheet for an extra touch of luxury.</p>
                            <p>We offer customization options including different color schemes, font choices, and the ability to add a monogram or custom illustration. Please allow 3-5 business days for production before shipping.</p>
                        </div>
                        <div class="tab-pane fade" id="details" role="tabpanel">
                            <ul>
                                <li><strong>Dimensions:</strong> Invitation - 5.5" x 7.5", Envelope - 5.75" x 7.75"</li>
                                <li><strong>Paper Type:</strong> Premium 300gsm Cardstock with Vellum Insert</li>
                                <li><strong>Printing:</strong> Offset Printed with Gold Foil Accents</li>
                                <li><strong>Included Items:</strong> 25 Invitations, 25 Envelopes, 25 RSVP Cards</li>
                                <li><strong>Customization:</strong> Names, Dates, Venue, and Optional Monogram</li>
                                <li><strong>Production Time:</strong> 3-5 Business Days</li>
                                <li><strong>Shipping:</strong> Free Standard Shipping (2-3 Business Days)</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="review">
                                <div class="review-author">Sarah Johnson</div>
                                <div class="review-rating">★★★★★</div>
                                <div class="review-date">March 15, 2023</div>
                                <div class="review-content">Absolutely stunning invitations! The gold foil is even more beautiful in person. Our guests couldn't stop complimenting them.</div>
                            </div>
                            <div class="review">
                                <div class="review-author">Michael Chen</div>
                                <div class="review-rating">★★★★☆</div>
                                <div class="review-date">February 28, 2023</div>
                                <div class="review-content">High quality and elegant design. The only reason I'm not giving 5 stars is because the envelopes were slightly tight fitting.</div>
                            </div>
                            <div class="review">
                                <div class="review-author">Priya Patel</div>
                                <div class="review-rating">★★★★★</div>
                                <div class="review-date">January 10, 2023</div>
                                <div class="review-content">Worth every penny! The customization options were excellent and the final product exceeded my expectations.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <!-- Related Products -->
            <!-- <div class="row related-products">
                <div class="col-12">
                    <h3>You May Also Like</h3>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-related-product">
                        <a href="product-detail2.html">
                            <img src="assets/img/gallery/product2.jpg" alt="Bridal Jewelry">
                        </a>
                        <h4><a href="product-detail2.html">Bridal Jewelry Set</a></h4>
                        <div class="price">$129.99</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-related-product">
                        <a href="product-detail3.html">
                            <img src="assets/img/gallery/product3.jpg" alt="Wedding Favors">
                        </a>
                        <h4><a href="product-detail3.html">Wedding Favors Box</a></h4>
                        <div class="price">$49.99</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-related-product">
                        <a href="product-detail5.html">
                            <img src="assets/img/gallery/product5.jpg" alt="Guest Book">
                        </a>
                        <h4><a href="product-detail5.html">Guest Book Set</a></h4>
                        <div class="price">$59.99</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-related-product">
                        <a href="product-detail7.html">
                            <img src="assets/img/gallery/product7.jpg" alt="Ring Pillow">
                        </a>
                        <h4><a href="product-detail7.html">Ring Pillow</a></h4>
                        <div class="price">$39.99</div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Product Details Area End -->
    <div class="grid">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card">
        <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Venue Image">
        <div class="card-body">
          <h3><?= htmlspecialchars($row['name']) ?></h3>
          <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
          <p><?= htmlspecialchars($row['description']) ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</main>
<footer>
<!-- Footer Start-->
    <div class="footer-main" data-background="assets/img/gallery/section_bg4.png">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt="" style="height:350%; width: 205%;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3  col-lg-3 col-lg-2 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>WEDDING INFO</h4>
                                <ul>
                                    <li><a href="#">Why Hire a Planner?</a></li>
                                    <li><a href="#">How Can I Make An</a></li>
                                    <li><a href="#">Appointment?</a></li>
                                    <li><a href="#">How to Choose a Venue</a></li>
                                    <li><a href="#">Event Catalogue</a></li>
                                    <li><a href="#"> Accept</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>ABOUT US</h4>
                                <ul>
                                    <li><a href="#">Bridesmaids</a></li>
                                    <li><a href="#">November 22, 2020</a></li>
                                    <li><a href="#">Groomsmen</a></li>
                                    <li><a href="#">Groomsmen</a></li>
                                    <li><a href="#">November 22, 2020</a></li>
                                    <li><a href="#">JEWELRY</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>LOCATION</h4>
                                <ul>
                                    <li><a href="https://www.google.com/maps/search/321,+Super+Mall,+Chimanlal+Girdharlal+Rd,+nr.+Lal+Bunglow,+New+Commercial+Mills+Staff+Society,+Ellisbridge,+Ahmedabad,+Gujarat+380009/@23.0273283,72.5549032,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI1MDYwMS4wIKXMDSoASAFQAw%3D%3D">321, Super Mall, Chimanlal Girdharlal Rd, nr. Lal Bunglow, New Commercial Mills Staff Society, Ellisbridge, Ahmedabad, Gujarat 380009</a></li>
                                </ul>
                            </div>
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
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->    
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    <script>
        // Product image switcher
        function changeImage(element) {
            // Remove active class from all thumbnails
            document.querySelectorAll('.product-thumbnails img').forEach(img => {
                img.classList.remove('active');
            });
            
            // Add active class to clicked thumbnail
            element.classList.add('active');
            
            // Change main image
            document.getElementById('mainProductImage').src = element.src;
        }
        
        // Quantity selector
        document.querySelector('.quantity-selector .btn:nth-child(1)').addEventListener('click', function() {
            let input = document.querySelector('.quantity-selector input');
            if (input.value > 1) input.value--;
        });
        
        document.querySelector('.quantity-selector .btn:nth-child(3)').addEventListener('click', function() {
            let input = document.querySelector('.quantity-selector input');
            input.value++;
        });
        
        // Tab switching
        document.querySelectorAll('.nav-tabs .nav-link').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs and panes
                document.querySelectorAll('.nav-tabs .nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked tab and corresponding pane
                this.classList.add('active');
                document.querySelector(this.getAttribute('href')).classList.add('show', 'active');
            });
        });
    </script>
</body>
</html>