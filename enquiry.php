<?php require_once('Connections/blue_petals.php'); ?>
<?php
if ( isset( $_GET[ 'product_id' ] ) ) {
    $product_id = $_GET[ 'product_id' ];

    $query_Recordset2 = "SELECT * FROM products WHERE product_id = '$product_id'";
    $Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
}
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
    <title>Blue Petals Design Studio | Enquiry Form</title>
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
                        <h1>Enquiry Form</h1>
                        <span>Everything you need to know about our Company</span>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Enquiry Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- .page-title end -->

        <!-- Story Section -->
        <section id="content">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-lg">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <!-- Product Details Column -->
                                    <div class="col-lg-5 mb-4 mb-lg-0">
                                        <div class="product-showcase text-center">
                                            <div class="product-image mb-4">
                                                <div class="fslider" data-arrows="false">
                                                    <div class="flexslider">
                                                        <div class="slider-wrap">
                                                            <?php if (!empty($row_Recordset2['image'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>">
                                                                    <img src="admin/assets/images/products/<?php echo $row_Recordset2['image']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>"
                                                                        class="rounded-3 img-fluid shadow-sm" />
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if (!empty($row_Recordset2['image_2'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>">
                                                                    <img src="admin/assets/images/products/<?php echo $row_Recordset2['image_2']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>"
                                                                        class="rounded-3 img-fluid shadow-sm" />
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if (!empty($row_Recordset2['image_3'])) { ?>
                                                            <div class="slide">
                                                                <a
                                                                    href="enquiry.php?product_id=<?php echo $row_Recordset2['product_id']; ?>">
                                                                    <img src="admin/assets/images/products/<?php echo $row_Recordset2['image_3']; ?>"
                                                                        alt="<?php echo $row_Recordset2['name']; ?>"
                                                                        class="rounded-3 img-fluid shadow-sm" />
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="product-title h4 fw-bold">
                                                <?php echo $row_Recordset2['name']; ?>
                                            </h3>
                                            <div class="product-meta text-muted">
                                                <small>Reference ID:
                                                    #<?php echo $row_Recordset2['product_id']; ?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Enquiry Form Column -->
                                    <div class="col-lg-7">
                                        <h2 class="h3 fw-bold mb-4">Product Enquiry</h2>
                                        <form class="mb-0" action="#" method="post">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="name" name="name"
                                                            class="form-control required"
                                                            placeholder="Enter your Full Name">
                                                        <label for="name">Full Name <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" id="email" name="email"
                                                            class="form-control required"
                                                            placeholder="Enter your Email">
                                                        <label for="email">Email Address <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="tel" id="phone" name="phone"
                                                            class="form-control required"
                                                            placeholder="Enter your Phone Number">
                                                        <label for="phone">Phone Number <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="subject" name="subject"
                                                            class="form-control required" placeholder="Enter Subject">
                                                        <label for="subject">Subject <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control required" id="message"
                                                            name="message" style="height: 150px"
                                                            placeholder="Enter your Message"></textarea>
                                                        <label for="message">Your Message <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg w-100 text-uppercase fw-bold">
                                                        <i class="bi bi-send me-2"></i> Send Enquiry
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="clear"></div>


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