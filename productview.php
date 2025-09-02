<?php
// Connect to database
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
    die("Product not found");
}

// Fetch related products (excluding current product)
$related_sql = "SELECT * FROM products WHERE category = '{$product['category']}' AND id != $product_id ORDER BY id DESC";
$related_result = $conn->query($related_sql);
$related_products = [];
while ($row = $related_result->fetch_assoc()) {
    $related_products[] = $row;
}

// Fetch all products (excluding current product)
$all_products_sql = "SELECT * FROM products WHERE id != $product_id ORDER BY id DESC";
$all_products_result = $conn->query($all_products_sql);
$all_products = [];
while ($row = $all_products_result->fetch_assoc()) {
    $all_products[] = $row;
}

$conn->close();
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($product['name']); ?> | Wedding By Fernweh</title>
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
        .product-details-section {
            padding: 60px 0;
            background: #f9f9f9;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 36px;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: #2980b9;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .product-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 50px;
        }
        
        .product-image-container {
            width: 100%;
            height: 500px;
            overflow: hidden;
            position: relative;
        }
        
        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-info {
            padding: 30px;
        }
        
        .product-info h1 {
            color: #2980b9;
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 600;
        }
        
        .product-price {
            font-size: 28px;
            color: #e74c3c;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .product-description {
            margin-bottom: 30px;
            color: #555;
            line-height: 1.8;
        }
        
        .product-meta {
            margin-bottom: 30px;
        }
        
        .product-meta span {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .quantity-selector input {
            width: 60px;
            text-align: center;
            margin: 0 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .quantity-selector button {
            background: #f8f9fa;
            border: 1px solid #ddd;
            width: 40px;
            height: 40px;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }
        
        .btn-add-to-cart {
            background: #2980b9;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .btn-add-to-cart:hover {
            background: #3498db;
        }
        
        .product-tabs {
            margin-bottom: 50px;
        }
        
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
        }
        
        .nav-tabs .nav-link {
            border: none;
            color: #666;
            font-weight: 600;
            padding: 12px 25px;
            margin-right: 5px;
        }
        
        .nav-tabs .nav-link.active {
            color: #2980b9;
            background: transparent;
            border-bottom: 3px solid #2980b9;
        }
        
        .tab-content {
            padding: 20px;
            background: #fff;
            border-radius: 0 0 8px 8px;
        }
        
        .related-products-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .related-products-title h3 {
            font-size: 28px;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .related-products-title h3:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: #2980b9;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .all-products-title {
            text-align: center;
            margin: 60px 0 40px;
        }
        
        .all-products-title h3 {
            font-size: 28px;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .all-products-title h3:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: #2980b9;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            width: 270px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }

        .card-img-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .card:hover img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-body h3 {
            color: #2980b9;
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 600;
        }

        .card-body .price {
            color: #e74c3c;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-body p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .product-image-container {
                height: 350px;
            }
            
            .product-info h1 {
                font-size: 26px;
            }
            
            .product-price {
                font-size: 24px;
            }
            
            .grid {
                gap: 20px;
            }
            
            .card {
                width: 100%;
                max-width: 350px;
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
    <header>
        <!-- Header Start -->
        <div class="header-area">
                <div class="main-header header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt="" style="width: 120%;"></a>
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
                                                 <!-- <li><a href="vender.php">Wedding Vendors</a></li>
                                                 <li><a href="brides.php">Brides</a></li>
                                                 <li><a href="grooms.php">Grooms</a></li> -->
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
        <section class="product-details-section">
            <div class="container">
                <div class="product-container">
                    <div class="row">
                        <div class="col-lg-6 p-0">
                            <div class="product-image-container">
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="product-info">
                                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                                <div class="product-price">₹<?php echo number_format($product['price']); ?></div>
                                <div class="product-description">
                                    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                                </div>
                                <div class="product-meta">
                                    <span><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></span>
                                    <!-- Add more product details as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Tabs -->
                <div class="product-tabs">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab">Details</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="productTabsContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                                </div>
                                <div class="tab-pane fade" id="details" role="tabpanel">
                                    <ul>
                                        <li><strong>Price:</strong> ₹<?php echo number_format($product['price']); ?></li>
                                        <li><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></li>
                                        <!-- Add more details as needed -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Related Products -->
                <!-- <?php if (!empty($related_products)): ?>
                <div class="related-products-title">
                    <h3>You May Also Like</h3>
                </div>
                <div class="grid">
                    <?php foreach ($related_products as $related): ?>
                    <div class="card">
                        <a href="productview.php?id=<?php echo $related['id']; ?>">
                            <div class="card-img-container">
                                <img src="<?php echo $related['image']; ?>" alt="<?php echo htmlspecialchars($related['name']); ?>">
                            </div>
                        </a>
                        <div class="card-body">
                            <h3><a href="productview.php?id=<?php echo $related['id']; ?>"><?php echo htmlspecialchars($related['name']); ?></a></h3>
                            <div class="price">₹<?php echo number_format($related['price']); ?></div>
                            <p><?php echo substr(htmlspecialchars($related['description']), 0, 100); ?>...</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                 -->
                <!-- All Products -->
                <?php if (!empty($all_products)): ?>
                <div class="all-products-title">
                    <h3>All Products</h3>
                </div>
                <div class="grid">
                    <?php foreach ($all_products as $product): ?>
                    <div class="card">
                        <a href="productview.php?id=<?php echo $product['id']; ?>">
                            <div class="card-img-container">
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            </div>
                        </a>
                        <div class="card-body">
                            <h3><a href="productview.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></a></h3>
                            <div class="price">₹<?php echo number_format($product['price']); ?></div>
                            <p><?php echo substr(htmlspecialchars($product['description']), 0, 100); ?>...</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
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
    
    <!-- All JS Custom Plugins Link Here here -->
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
                document.querySelectorAll('.nav-tabs .nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                this.classList.add('active');
                document.querySelector(this.getAttribute('href')).classList.add('show', 'active');
            });
        });
    </script>
</body>
</html>