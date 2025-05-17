<?php require_once('Connections/blue_petals.php'); ?>
<?php
$query_Recordset2 = "SELECT * FROM products";
$Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today." />

    <!-- Font Imports -->
    <link rel="stylesheet" href="https://use.typekit.net/vgf0rfn.css" />

    <!-- Core Style -->
    <link rel="stylesheet" href="style.css" />

    <!-- Font Icons -->
    <link rel="stylesheet" href="css/font-icons.css" />

    <!-- Niche Demos -->
    <link rel="stylesheet" href="assets/jewellery-boutique.css" />
    <!-- jewellery-boutique Custom Css -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Blue Petals Design Studio | Shop</title>
</head>

<body class="stretched">
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper">
        <!-- Header
		============================================= -->
        <header id="header" class="header-size-md transparent-header semi-transparent sticky-on-scrollup"
            data-sticky-class="not-dark">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="index.html">
                                <img class="logo-default" src="assets/images/logo.png" alt="Canvas Logo" />
                            </a>
                        </div>
                        <!-- #logo end -->

                        <div class="header-misc">
                            <!-- Top Search
							============================================= -->
                            <!-- <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="bi-search"></i><i class="bi-x-lg"></i></a>
                            </div> -->
                            <!-- #top-search end -->

                            <!-- Top Cart
							============================================= -->
                            <!-- <div id="top-cart" class="header-misc-icon ms-3 ms-lg-4">
                                <a href="#" id="top-cart-trigger"><i class="bi-bag"></i><span
                                        class="top-cart-number text-dark">1</span></a>
                                <div class="top-cart-content border-top-0 shadow-lg">
                                    <div class="top-cart-title">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="top-cart-items">
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="assets/images/cart.jpg"
                                                        alt="Blue Round-Neck Tshirt" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#" class="font-primary">Beautiful Diamond Earrings</a>
                                                    <span class="top-cart-item-price d-block">$249.99</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-action">
                                        <span class="top-checkout-price">$249.95</span>
                                        <a href="#" class="canvas-button canvas-button-sm px-3 py-2 m-0"><span><span>View
                                                    Cart</span></span></a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- #top-cart end -->
                        </div>

                        <div class="primary-menu-trigger ms-1">
                            <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                            </button>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu me-lg-auto not-dark">
                            <ul class="menu-container">
                                <li class="menu-item mega-menu mega-menu-full">
                                    <a class="menu-link" href="#">
                                        <div>Products <i class="bi- uil uil-plus"></i></div>
                                    </a>
                                    <div class="mega-menu-content mega-menu-style-2">
                                        <div class="container">
                                            <div class="row">
                                                <div class="sub-menu-container mega-menu-column col-12">
                                                    <div
                                                        class="d-flex justify-content-center align-items-md-center py-4 py-md-3">
                                                        <div class="col-lg-6">
                                                            <ul class="mega-menu-links">
                                                                <li class="target-link-active"
                                                                    data-target="#target-all">
                                                                    <a href="blue-petals.html">Blue Petals Design
                                                                        Studio</a>
                                                                </li>
                                                                <li data-target="#target-necklace">
                                                                    <a href="blue-petals.html">My Indians</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="d-none d-lg-flex col-lg-5 col-xl-4 target-content">
                                                            <div class="target-active" id="target-all">
                                                                <img src="assets/images/products/8.jpg" alt="" />
                                                            </div>
                                                            <div class="" id="target-necklace">
                                                                <img src="assets/images/products/26.jpg" alt="" />
                                                            </div>
                                                            <div class="" id="target-bracelets">
                                                                <img src="assets/images/menu/3.jpg" alt="" />
                                                            </div>
                                                            <div class="" id="target-rings">
                                                                <img src="assets/images/menu/4.jpg" alt="" />
                                                            </div>
                                                            <div class="" id="target-earrings">
                                                                <img src="assets/images/menu/5.jpg" alt="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item mega-menu mega-menu-full">
                                    <a class="menu-link" href="#">
                                        <div>About Us <i class="bi- uil uil-plus"></i></div>
                                    </a>
                                    <div class="mega-menu-content mega-menu-style-2">
                                        <div class="container">
                                            <div class="row">
                                                <div class="sub-menu-container mega-menu-column col-12">
                                                    <div
                                                        class="d-flex justify-content-center align-items-md-center py-4">
                                                        <ul class="mega-menu-links">
                                                            <li>
                                                                <a href="about.html">About Resham Marwa</a>
                                                            </li>
                                                            <li>
                                                                <a href="mission-vision.html">Mission & Vision</a>
                                                            </li>
                                                            <li>
                                                                <a href="story.html">Story</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="shop.php">
                                        <div>Shop</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="contact.html">
                                        <div>Contact</div>
                                    </a>
                                </li>
                            </ul>
                            <!-- Alternate Mobile Menu -->
                            <ul class="menu-container mobile-primary-menu">
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <div>Products <i class="bi- uil uil-plus"></i></div>
                                    </a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a href="blue-petals.html" class="menu-link">Blue Petals Design Studio</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blue-petals.html" class="menu-link">My Indians</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <div>About Us <i class="bi- uil uil-plus"></i></div>
                                    </a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a href="about.html" class="menu-link">About Resham Marwa</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="mission-vision.html" class="menu-link">Mission & Vision</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="story.html" class="menu-link">Story</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="shop.php">
                                        <div>Shop</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="contact.html">
                                        <div>Contact</div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- #primary-menu end -->

                        <form class="top-search-form" action="search.html" method="get">
                            <input type="text" name="q" class="form-control border-0" value=""
                                placeholder="Type &amp; Hit Enter.." autocomplete="off" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header>
        <!-- #header end -->

        <!-- Page Title
		============================================= -->
        <section class="page-title page-title-mini">
            <div class="container">
                <div class="page-title-row">
                    <div class="page-title-content">
                        <h1>Shop</h1>
                        <span>Everything you need to know about our Company</span>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- .page-title end -->

        <!-- Story Section -->
        <section id="content">
            <div class="">
                <div class="container">
                    <div class="clear"></div>

                    <div class="tabs mt-6">
                        <div id="canvas-TabContent2" class="tab-content">

                            <div class="tab-pane fade show active" id="home2" role="tabpanel"
                                aria-labelledby="canvas-home-tab" tabindex="0">
                                <div class="shop row gutter-30">
                                    <?php 
                                    // Reset pointer to beginning of recordset
                                    mysqli_data_seek($Recordset2, 0);
                                    
                                    // Loop through all records
                                    while($row_Recordset2 = mysqli_fetch_assoc($Recordset2)) { 
                                    ?>
                                    <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="grid-inner">
                                            <div class="product-image">
                                                <div class="fslider" data-arrows="false">
                                                    <div class="flexslider">
                                                        <div class="slider-wrap">
                                                            <?php if (!empty($row_Recordset2['image'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><img
                                                                        src="admin/assets/images/products/<?php echo $row_Recordset2['image']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>" /></a>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if (!empty($row_Recordset2['image_2'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><img
                                                                        src="admin/assets/images/products/<?php echo $row_Recordset2['image_2']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>" /></a>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if (!empty($row_Recordset2['image_3'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><img
                                                                        src="admin/assets/images/products/<?php echo $row_Recordset2['image_3']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>" /></a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title">
                                                    <h3><a
                                                            href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><?php echo $row_Recordset2['name']; ?></a>
                                                    </h3>
                                                </div>
                                                <div class="product-price">₹<?php echo $row_Recordset2['price']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clear mb-4"></div>

                    <div class="clear"></div>
                </div>

                <div class="section mb-0">
                    <div class="container">
                        <div class="row col-mb-50">
                            <div class="col-sm-6 col-lg-3">
                                <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                    <div class="fbox-icon">
                                        <i class="bi-hand-thumbs-up"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3>100% Original</h3>
                                        <p class="mt-0">
                                            We guarantee you the sale of Original Brands.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                    <div class="fbox-icon">
                                        <i class="bi-credit-card"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3>Payment Options</h3>
                                        <p class="mt-0">
                                            We accept Visa, MasterCard and American Express.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                    <div class="fbox-icon">
                                        <i class="bi-truck"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3>Free Shipping</h3>
                                        <p class="mt-0">
                                            Free Delivery to 100+ Locations on orders above $40.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                    <div class="fbox-icon">
                                        <i class="bi-arrow-counterclockwise"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3>30-Days Returns</h3>
                                        <p class="mt-0">
                                            Return or exchange items purchased within 30 days.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="clear"></div>

        <!-- Content
		============================================= -->
        <section id="content">
            <!-- <div class="content-wrap pb-0"> -->
            <!-- Parallax Section - #1 -->

            <div class="clear"></div>

            <!-- Footer Banner Section - #5 -->
            <div class="section bg-transparent my-0 border-bottom py-5 py-md-3">
                <div class="container">
                    <div class="row justify-content-md-between align-items-center col-mb-30">
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                            <div class="d-flex align-items-center">
                                <img class="me-4" src="assets/images/payments/amazonpay.jpg" alt="Payments"
                                    height="25" />
                                <!-- <img
                      class="me-4"
                      src="assets/images/payments/visa.svg"
                      alt="Payments"
                      height="16"
                    />
                    <img
                      src="assets/images/payments/applepay.svg"
                      alt="Payments"
                      height="20"
                    /> -->
                            </div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-center">
                            <a href="index.html"><img src="assets/images/logo.png" height="50" alt="Canvas Logo" /></a>
                        </div>

                        <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                            <div class="d-flex align-items-center">
                                <small class="me-2 text-uppercase ls-2">Follow Us:</small>
                                <a href="#" class="social-icon mx-0 border-0 mb-0 color-facebook h-bg-facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <a href="#" class="social-icon mx-0 border-0 mb-0 color-twitter h-bg-twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                </a>

                                <a href="#" class="social-icon mx-0 border-0 mb-0 color-paypal h-bg-paypal">
                                    <i class="fa-brands fa-paypal"></i>
                                    <i class="fa-brands fa-paypal"></i>
                                </a>

                                <a href="#" class="social-icon mx-0 border-0 mb-0 color-facebook h-bg-instagram">
                                    <i class="bi-instagram"></i>
                                    <i class="bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </section>
        <!-- #content end -->

        <!-- Footer
		============================================= -->
        <footer id="footer" class="border-0" style="background-color: var(--cnvs-color-secondar)">
            <div class="container">
                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap">
                    <div class="row">
                        <!-- Introduction Column -->
                        <div class="col-lg-4">
                            <div class="widget">
                                <h4 class="fw-normal mb-4">Blue Petals Design Studio</h4>
                                <p class="mb-4">
                                    At Blue Petals Design Studio, we bring creativity to life
                                    through innovative fabric designs. Our passion lies in
                                    creating textiles that inspire, blending vibrant colors and
                                    intricate patterns to suit every style.
                                </p>
                                <div class="d-flex align-items-center mb-4">
                                    <a href="#"
                                        class="social-icon me-2 si-small border-0 rounded-circle color-facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-icon me-2 si-small border-0 rounded-circle color-twitter">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="social-icon me-2 si-small border-0 rounded-circle color-instagram">
                                        <i class="bi-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links Column -->
                        <div class="col-lg-4">
                            <div class="widget">
                                <h4 class="fw-normal mb-4">Quick Links</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="widget_links widget-li-noicon mb-0">
                                            <li><a href="blue-petals.html">Blue Petals</a></li>
                                            <li><a href="blue-petals.html">My Indians</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="shop.php">Shop</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="widget_links widget-li-noicon mb-0">
                                            <li>
                                                <a href="mission-vision.html">Mission & Vision</a>
                                            </li>
                                            <li><a href="story.html">Story</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Column -->
                        <div class="col-lg-4">
                            <div class="widget">
                                <h4 class="fw-normal mb-4">Contact Information</h4>
                                <address class="mb-3">
                                    <strong>Address:</strong><br />
                                    Jamshedpur, Jharkhand<br />
                                </address>
                                <div class="mb-3">
                                    <strong>Phone:</strong><br />
                                    <a href="tel:+14333-4444" class="text-decoration-none">+91 7091494936</a>
                                </div>
                                <div>
                                    <strong>Email:</strong><br />
                                    <a href="mailto:info@bluepetals.com"
                                        class="text-decoration-none">info@bluepetals.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .footer-widgets-wrap end -->
            </div>

            <!-- Copyrights
			============================================= -->
            <div id="copyrights" class="bg-white">
                <div class="container">
                    <div class="row col-mb-30 align-items-center">
                        <div class="col-md-6 text-center text-md-start text-black-50">
                            Copyrights &copy; 2025 All Rights Reserved by Blue Petals Design
                            Studio.<br />
                            <div class="copyright-links text-black-50">
                                <a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a>
                            </div>
                        </div>

                        <div class="col-md-6 text-center text-md-end">
                            <span class="op-05">Designed by</span>
                            <a href="https://xwaydesigns.com/website-application.html">X-Way Designs</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #copyrights end -->
        </footer>
        <!-- #footer end -->
    </div>
    <!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="uil uil-angle-double-up rounded-circle"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/functions.js"></script>

    <!-- Parallax Script
	============================================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
    <script>
    !SEMICOLON.Mobile.any() && skrollr.init({
        forceHeight: false
    });
    </script>

    <!-- Hover Image Animate -->
    <script src="assets/js/hover-img-animate.js"></script>

    <!-- Circle Rotate JS -->
    <script src="https://cdn.jsdelivr.net/npm/circletype@2.3.0/dist/circletype.min.js"></script>

    <!-- Custom Scripts - Jewellery boutique related
	============================================= -->
    <script src="assets/js/custom.js"></script>
</body>

</html>