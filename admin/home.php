<?php require_once('../Connections/blue_petals.php'); ?>
<?php require_once('session.php'); ?>
<?php
$query_Recordset2 = "SELECT (SELECT COUNT(product_id) FROM products) AS total_product";
$Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

$query_Recordset3 = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 5";
$Recordset3 = mysqli_query( $blue_petals, $query_Recordset3 )or die( mysqli_error( $blue_petals ) );
$row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
$totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Blue Petals Design Studio</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"> <a
                    class="navbar-brand brand-logo" href="home.php"><img src="../assets/images/logo.png" alt="logo"
                        style="width: auto; height: 75px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span> </button>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item"> <a class="nav-link" href="home.php"> <span class="menu-title">Home</span>
                            <i class="mdi mdi-home menu-icon"></i> </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="products.php"> <span
                                class="menu-title">Products</span>
                            <i class="mdi mdi-folder menu-icon"></i> </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="change_password.php"> <span
                                class="menu-title">Change Password</span>
                            <i class="mdi mdi-folder menu-icon"></i> </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="logout.php"> <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout menu-icon"></i> </a> </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2"> <i
                                    class="mdi mdi-home"></i> </span> Dashboard </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"> <span></span>Overview <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body"> <img src="assets/images/dashboard/circle.svg"
                                        class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Total Products</h4>
                                    <h1 class="mb-5"><?php echo $row_Recordset2['total_product'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--		  customers-->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Products</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Products ID </th>
                                                    <th> Products Name </th>
                                                    <th> Price </th>
                                                    <th> Image 1 </th>
                                                    <th> Image 2 </th>
                                                    <th> Image 3 </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset3 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset3['product_id'] ?></td>
                                                    <td><?php echo $row_Recordset3['name'] ?></td>
                                                    <td><?php echo $row_Recordset3['price'] ?></td>
                                                    <td><a href="assets/images/products/<?php echo $row_Recordset3['image'] ?>"
                                                            target="_blank"><img
                                                                src="assets/images/products/<?php echo $row_Recordset3['image'] ?>"></a>
                                                    </td>
                                                    <td><a href="assets/images/products/<?php echo $row_Recordset3['image_2'] ?>"
                                                            target="_blank"><img
                                                                src="assets/images/products/<?php echo $row_Recordset3['image_2'] ?>"></a>
                                                    </td>
                                                    <td><a href="assets/images/products/<?php echo $row_Recordset3['image_3'] ?>"
                                                            target="_blank"><img
                                                                src="assets/images/products/<?php echo $row_Recordset3['image_3'] ?>"></a>
                                                    </td>
                                                </tr>
                                                <?php }while($row_Recordset3 = mysqli_fetch_assoc($Recordset3));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between"> <span
                            class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyrights &copy;
                            2025 Blue Petals Design Studio. All Rights Reserved </span></div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>