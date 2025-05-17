<?php require_once('../Connections/blue_petals.php'); ?>
<?php require_once('session.php'); ?>
<?php
$query_Recordset2 = "SELECT * FROM products";
$Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blue Petals Design Studio | Products</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
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
                        style="width: auto; height: 75px;" /></a> </div>
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
                                    class="mdi mdi-office"></i> </span> Products </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body"> <a href="add_products.php">
                                        <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><i
                                                class="mdi mdi-card menu-icon"></i> &nbsp;ADD PRODUCTS</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th> Product Id </th>
                                                    <th> Product Name </th>
                                                    <th> Price </th>
                                                    <th> Image </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset2 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset2['product_id']; ?></td>
                                                    <td><?php echo $row_Recordset2['name']; ?></td>
                                                    <td>₹<?php echo $row_Recordset2['price']; ?></td>
                                                    <td><a href="assets/images/products/<?php echo $row_Recordset2['image'] ?>"
                                                            target="_blank"><img
                                                                src="assets/images/products/<?php echo $row_Recordset2['image'] ?>"></a>
                                                    </td>
                                                    <td><a
                                                            href="add_products.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><i
                                                                class="mdi mdi-pencil menu-icon"></i></a>
                                                        <a
                                                            href="delete_products.php?product_id=<?php echo $row_Recordset2['product_id']; ?>"><i
                                                                class="mdi mdi-trash-can menu-icon"></i></a>
                                                    </td>
                                                </tr>
                                                <?php }while($row_Recordset2 = mysqli_fetch_assoc($Recordset2));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between"> <span
                            class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyrights &copy;
                            2025 Blue Petals Design Studio. All Rights Reserved </span></div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
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
    <script>
    new DataTable('#example');
    </script>
</body>

</html>