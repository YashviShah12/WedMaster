<?php
// Connect to database
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get venue ID from URL
$venue_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch venue details
$sql = "SELECT * FROM wedding_venues WHERE id = $venue_id";
$result = $conn->query($sql);
$venue = $result->fetch_assoc();

if (!$venue) {
    die("Venue not found");
}

// Handle image path
$imagePath = $venue['image'];
if (!empty($imagePath)) {
    if (strpos($imagePath, 'uploads/') === false) {
        $imagePath = 'uploads/' . $imagePath;
    }
} else {
    $imagePath = ''; // No image available
}

// Fetch related venues (excluding current venue)
$related_sql = "SELECT * FROM wedding_venues WHERE id != $venue_id ORDER BY id DESC LIMIT 4";
$related_result = $conn->query($related_sql);
$related_venues = [];
while ($row = $related_result->fetch_assoc()) {
    $related_venues[] = $row;
}

// Fetch all venues (excluding current venue)
$all_venues_sql = "SELECT * FROM wedding_venues WHERE id != $venue_id ORDER BY id DESC";
$all_venues_result = $conn->query($all_venues_sql);
$all_venues = [];
while ($row = $all_venues_result->fetch_assoc()) {
    $all_venues[] = $row;
}

$conn->close();
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($venue['name']); ?> | Wedding Venue</title>
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
        :root {
            --primary-color: #2980b9;
            --secondary-color: #e74c3c;
            --text-color: #333;
            --light-text: #666;
            --lighter-text: #888;
            --background-light: #f9f9f9;
            --white: #fff;
            --shadow: 0 5px 15px rgba(0,0,0,0.08);
            --shadow-hover: 0 15px 30px rgba(0,0,0,0.12);
            --transition: all 0.3s ease;
        }
        
        .venue-details-section {
            padding: 80px 0;
            background: var(--background-light);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--text-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            font-weight: 600;
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
        
        .venue-container {
            background: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 60px;
            transition: var(--transition);
        }
        
        .venue-container:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-5px);
        }
        
        .venue-image-container {
            width: 100%;
            height: 500px;
            overflow: hidden;
            position: relative;
            cursor: zoom-in;
        }
        
        .venue-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .venue-image-container:hover img {
            transform: scale(1.02);
        }
        
        .no-image {
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--lighter-text);
            font-size: 1.2rem;
            height: 100%;
        }
        
        .venue-info {
            padding: 40px;
        }
        
        .venue-info h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.2;
        }
        
        .venue-location {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            font-size: 1.2rem;
            color: var(--secondary-color);
        }
        
        .venue-location i {
            margin-right: 12px;
            font-size: 1.4rem;
        }
        
        .venue-description {
            margin-bottom: 35px;
            color: var(--light-text);
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        .venue-meta {
            margin-bottom: 35px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .venue-meta span {
            display: flex;
            align-items: center;
            color: var(--light-text);
            font-size: 1rem;
            background: #f0f8ff;
            padding: 10px 20px;
            border-radius: 30px;
        }
        
        .venue-meta span strong {
            margin-right: 8px;
            color: var(--primary-color);
        }
        
        .venue-tabs {
            margin-bottom: 60px;
        }
        
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 25px;
        }
        
        .nav-tabs .nav-link {
            border: none;
            color: var(--light-text);
            font-weight: 600;
            padding: 15px 30px;
            margin-right: 10px;
            font-size: 1.1rem;
            border-radius: 0;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background: transparent;
            border-bottom: 3px solid var(--primary-color);
        }
        
        .tab-content {
            padding: 30px;
            background: var(--white);
            border-radius: 0 0 10px 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .tab-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--light-text);
        }
        
        .tab-content ul {
            list-style-type: none;
            padding: 0;
        }
        
        .tab-content ul li {
            padding: 10px 0;
            font-size: 1.1rem;
            color: var(--light-text);
            border-bottom: 1px solid #eee;
        }
        
        .tab-content ul li:last-child {
            border-bottom: none;
        }
        
        .tab-content ul li strong {
            color: var(--primary-color);
            min-width: 150px;
            display: inline-block;
        }
        
        .related-venues-title, .all-venues-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .related-venues-title h3, .all-venues-title h3 {
            font-size: 2rem;
            color: var(--text-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            font-weight: 600;
        }
        
        .related-venues-title h3:after, .all-venues-title h3:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: var(--primary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .all-venues-title {
            margin-top: 80px;
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        .card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
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
            transition: transform 0.5s ease;
        }
        
        .card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 25px;
        }

        .card-body h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.4rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .card-body .location {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: var(--light-text);
            font-size: 1rem;
        }
        
        .card-body .location i {
            margin-right: 10px;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .card-body p {
            font-size: 1rem;
            color: var(--light-text);
            line-height: 1.6;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Image Zoom Modal */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            overflow: auto;
        }
        
        .modal-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        
        .modal-content img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            animation: zoomIn 0.3s;
        }
        
        @keyframes zoomIn {
            from {transform: scale(0.5); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }
        
        .close {
            position: absolute;
            top: 30px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }
        
        .close:hover {
            color: var(--secondary-color);
            transform: rotate(90deg);
        }
        
        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            cursor: pointer;
            z-index: 99;
            transition: var(--transition);
        }
        
        .fab:hover {
            background-color: #3498db;
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }
        
        @media (max-width: 992px) {
            .venue-info {
                padding: 30px;
            }
            
            .venue-info h1 {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .venue-image-container {
                height: 350px;
            }
            
            .venue-info h1 {
                font-size: 1.6rem;
            }
            
            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .card {
                max-width: 100%;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .related-venues-title h3, 
            .all-venues-title h3 {
                font-size: 1.6rem;
            }
            
            .venue-meta {
                flex-direction: column;
                gap: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .venue-details-section {
                padding: 50px 0;
            }
            
            .venue-image-container {
                height: 250px;
            }
            
            .venue-info {
                padding: 20px;
            }
            
            .nav-tabs .nav-link {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
            
            .tab-content {
                padding: 20px;
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
                                        <li><a href="#">Services</a>
                                            <ul class="submenu">
                                                 <li><a href="wevent.php">Wedding Event</a></li>
                                                 <li><a href="cevent.php">Corporate Event</a></li>
                                                 <!-- <li><a href="vender.php">Wedding Vendors</a></li>
                                                 <li><a href="brides.php">Brides</a></li>
                                                 <li><a href="grooms.php">Grooms</a></li> -->
                                            </ul>
                                        </li>
                                        <li><a href="hotel.php">Destination Wedding</a></li>
                                        <li><a href="gallery.html">gallery</a></li>
                                        <!-- <li><a href="booking.html">Book </a></li> -->
                                        <li><a href="#">About</a>
                                            <ul class="submenu">
                                                 <li><a href="about.html">About Us</a></li>
                                                 <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li> -->
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
        <section class="venue-details-section">
            <div class="container">
                <div class="venue-container">
                    <div class="row">
                        <div class="col-lg-6 p-0">
                            <div class="venue-image-container" id="venueImage">
    <?php if (!empty($imagePath)) { ?>
        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($venue['name']) ?>"
             onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'no-image\'>No Image Available</div>';">
    <?php } else { ?>
        <div class="no-image">No Image Available</div>
    <?php } ?>
</div>
<script>
    // Image Zoom Functionality
    const venueImage = document.getElementById('venueImage');
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.getElementsByClassName('close')[0];
    
    if (venueImage) {
        venueImage.addEventListener('click', function() {
            if (this.querySelector('img')) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                // Store original image source
                const imgSrc = this.querySelector('img').src;
                modalImg.src = imgSrc;
            }
        });
    }
    
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        // Reset image transform when closing
        modalImg.style.transform = 'scale(1)';
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            // Reset image transform when clicking outside
            modalImg.style.transform = 'scale(1)';
        }
    });
    
    // Optional: Add zoom in/out functionality with mouse wheel
    modalImg.addEventListener('wheel', function(e) {
        e.preventDefault();
        const scale = parseFloat(this.style.transform.replace('scale(', '').replace(')','')) || 1;
        const delta = e.deltaY > 0 ? -0.1 : 0.1;
        const newScale = Math.min(Math.max(0.5, scale + delta), 3);
        this.style.transform = `scale(${newScale})`;
    });
</script>

                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="venue-info">
                                <h1><?php echo htmlspecialchars($venue['name']); ?></h1>
                                <div class="venue-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo htmlspecialchars($venue['location']); ?>
                                </div>
                                <div class="venue-description">
                                    <p><?php echo nl2br(htmlspecialchars($venue['description'])); ?></p>
                                </div>
                                <div class="venue-meta">
                                    <?php if (!empty($venue['capacity'])): ?>
                                        <span><strong>Capacity:</strong> <?php echo htmlspecialchars($venue['capacity']); ?> guests</span>
                                    <?php endif; ?>
                                    <?php if (!empty($venue['price'])): ?>
                                        <span><strong>Starting Price:</strong> ₹<?php echo number_format($venue['price']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($venue['type'])): ?>
                                        <span><strong>Type:</strong> <?php echo htmlspecialchars($venue['type']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($venue['amenities'])): ?>
                                        <span><strong>Amenities:</strong> <?php echo htmlspecialchars($venue['amenities']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-primary btn-lg">Book This Venue</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Venue Tabs -->
                <div class="venue-tabs">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="venueTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pricing-tab" data-toggle="tab" href="#pricing" role="tab">Pricing</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="venueTabsContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <p><?php echo nl2br(htmlspecialchars($venue['description'])); ?></p>
                                </div>
                                <div class="tab-pane fade" id="details" role="tabpanel">
                                    <ul>
                                        <?php if (!empty($venue['location'])): ?>
                                            <li><strong>Location:</strong> <?php echo htmlspecialchars($venue['location']); ?></li>
                                        <?php endif; ?>
                                        <?php if (!empty($venue['capacity'])): ?>
                                            <li><strong>Capacity:</strong> <?php echo htmlspecialchars($venue['capacity']); ?> guests</li>
                                        <?php endif; ?>
                                        <?php if (!empty($venue['type'])): ?>
                                            <li><strong>Venue Type:</strong> <?php echo htmlspecialchars($venue['type']); ?></li>
                                        <?php endif; ?>
                                        <?php if (!empty($venue['amenities'])): ?>
                                            <li><strong>Amenities:</strong> <?php echo htmlspecialchars($venue['amenities']); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pricing" role="tabpanel">
                                    <ul>
                                        <?php if (!empty($venue['price'])): ?>
                                            <li><strong>Starting Price:</strong> ₹<?php echo number_format($venue['price']); ?></li>
                                        <?php endif; ?>
                                        <?php if (!empty($venue['packages'])): ?>
                                            <li><strong>Packages:</strong> <?php echo htmlspecialchars($venue['packages']); ?></li>
                                        <?php endif; ?>
                                        <?php if (!empty($venue['inclusions'])): ?>
                                            <li><strong>Inclusions:</strong> <?php echo htmlspecialchars($venue['inclusions']); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- All Venues -->
                <?php if (!empty($all_venues)): ?>
                <div class="all-venues-title">
                    <h3>Explore More Destination</h3>
                </div>
                <div class="grid">
                    <?php foreach ($all_venues as $venue_item): 
                        $allImagePath = $venue_item['image'];
                        if (!empty($allImagePath)) {
                            if (strpos($allImagePath, 'uploads/') === false) {
                                $allImagePath = 'uploads/' . $allImagePath;
                            }
                        } else {
                            $allImagePath = '';
                        }
                    ?>
                    <div class="card">
                        <a href="productview2.php?id=<?php echo $venue_item['id']; ?>">
                            <div class="card-img-container">
                                <?php if (!empty($allImagePath)) { ?>
                                    <img src="<?= htmlspecialchars($allImagePath) ?>" alt="<?= htmlspecialchars($venue_item['name']) ?>"
                                         onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'no-image\'>No Image Available</div>';">
                                <?php } else { ?>
                                    <div class="no-image">No Image Available</div>
                                <?php } ?>
                            </div>
                        </a>
                        <div class="card-body">
                            <h3><a href="productview2.php?id=<?php echo $venue_item['id']; ?>"><?php echo htmlspecialchars($venue_item['name']); ?></a></h3>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($venue_item['location']); ?></p>
                            <p><?php echo substr(htmlspecialchars($venue_item['description']), 0, 100); ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if (!empty($venue_item['price'])): ?>
                                    <span class="price">₹<?php echo number_format($venue_item['price']); ?></span>
                                <?php endif; ?>
                                <a href="productview2.php?id=<?php echo $venue_item['id']; ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <!-- Image Zoom Modal -->
   <div id="imageModal" class="image-modal">
    <span class="close">&times;</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="Zoomed Venue Image">
    </div>
</div>
    
    <!-- Floating Action Button -->
    <div class="fab" id="fabButton">
        <i class="fas fa-phone-alt"></i>
    </div>
    
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
        
        // Image Zoom Functionality
        const venueImage = document.getElementById('venueImage');
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementsByClassName('close')[0];
        
        if (venueImage) {
            venueImage.addEventListener('click', function() {
                if (this.querySelector('img')) {
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
            });
        }
        
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Floating Action Button
        const fabButton = document.getElementById('fabButton');
        if (fabButton) {
            fabButton.addEventListener('click', function() {
                window.location.href = 'tel:+1234567890';
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>