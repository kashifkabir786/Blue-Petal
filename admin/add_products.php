<?php require_once('../Connections/blue_petals.php'); ?>
<?php require_once('session.php'); ?>
<?php
$flag = false;
if ( isset( $_GET[ 'product_id' ] ) ) {
    $product_id = $_GET[ 'product_id' ];

    $query_Recordset2 = "SELECT * FROM products WHERE product_id = '$product_id'";
    $Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $flag = true;
}
   
if ( isset( $_GET[ 'success' ] ) && $_GET[ 'success' ] == "Added" ) {
    $query_Recordset2 = "SELECT * FROM products ORDER BY product_id DESC LIMIT 1";
    $Recordset2 = mysqli_query( $blue_petals, $query_Recordset2 )or die( mysqli_error( $blue_petals ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $product_id = $row_Recordset2[ 'product_id' ];
    $flag = true;
}

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $target_dir = "assets/images/products/";
    $randno = rand(100, 1000); // Generate a random number
    $filename = $randno . "-" . basename($_FILES['image']['name']);
    $target_file = $target_dir . $filename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate image file type
    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif', 'jfif'])) {
        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Set image_2 and image_3 to NULL (or handle if they are provided)
            $image_2 = NULL;
            $image_3 = NULL;

            if (!empty($_FILES['image_2']['name'])) {
                $image_2_name = $randno . "-" . basename($_FILES['image_2']['name']);
                $image_2_target = $target_dir . $image_2_name;
                if (move_uploaded_file($_FILES['image_2']['tmp_name'], $image_2_target)) {
                    $image_2 = $image_2_name;
                }
            }

            if (!empty($_FILES['image_3']['name'])) {
                $image_3_name = $randno . "-" . basename($_FILES['image_3']['name']);
                $image_3_target = $target_dir . $image_3_name;
                if (move_uploaded_file($_FILES['image_3']['tmp_name'], $image_3_target)) {
                    $image_3 = $image_3_name;
                }
            }

            // Call stored procedure
            $stmt = $blue_petals->prepare("CALL managebluepetal(?, NULL, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("SQL error: " . $blue_petals->error);
            }

            $action = 'INSERT';
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amazon_link = $_POST['amazon_link'];

            $stmt->bind_param("sssssss", $action, $name, $price, $filename, $image_2, $image_3, $amazon_link);
            if ($stmt->execute()) {
                header("Location: add_products.php?success=Added");
                exit;
            } else {
                die("Execution error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Failed to upload image. Please try again.");
        }
    } else {
        die("Invalid file type. Only JPG, PNG, JPEG, GIF, JFIF are allowed.");
    }
}

// Update product details
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    // Fetch the current images from the database
    $stmt = $blue_petals->prepare("SELECT image, image_2, image_3 FROM products WHERE product_id = ?");
    if (!$stmt) {
        die("Prepare failed (SELECT): " . $blue_petals->error);
    }

    $stmt->bind_param("i", $_POST['product_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $current_images = $result->fetch_assoc();
    $stmt->close();

    // Initialize image variables
    $current_image = $current_images['image'];
    $current_image_2 = $current_images['image_2'];
    $current_image_3 = $current_images['image_3'];

    // Handle file upload for image_2 and image_3
    $target_dir = "assets/images/products/";
    $randno = rand(100, 1000);

    // Handle image_2
    if (!empty($_FILES['image_2']['name'])) {
        $image_2_name = $randno . "-" . basename($_FILES['image_2']['name']);
        $image_2_target = $target_dir . $image_2_name;
        if (move_uploaded_file($_FILES['image_2']['tmp_name'], $image_2_target)) {
            $current_image_2 = $image_2_name;
        } else {
            die("Failed to upload image_2. Please try again.");
        }
    }

    // Handle image_3
    if (!empty($_FILES['image_3']['name'])) {
        $image_3_name = $randno . "-" . basename($_FILES['image_3']['name']);
        $image_3_target = $target_dir . $image_3_name;
        if (move_uploaded_file($_FILES['image_3']['tmp_name'], $image_3_target)) {
            $current_image_3 = $image_3_name;
        } else {
            die("Failed to upload image_3. Please try again.");
        }
    }

    // Prepare the stored procedure call
    $stmt = $blue_petals->prepare("CALL managebluepetal(?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed (CALL): " . $blue_petals->error);
    }

    $action = 'UPDATE';
    $name = htmlspecialchars(trim($_POST['name']));
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $amazon_link = filter_var($_POST['amazon_link'], FILTER_SANITIZE_URL);
    $product_id = (int)$_POST['product_id']; // Cast to int for safety

    $stmt->bind_param("sissssss", $action, $product_id, $name, $price, $current_image, $current_image_2, $current_image_3, $amazon_link);

    if ($stmt->execute()) {
        header("Location: add_products.php?success=Updated&product_id=" . $product_id);
        exit();
    } else {
        die("Execution failed: " . $stmt->error);
    }
    $stmt->close();
}


// Update product image
if ((isset($_POST["MM_photo"])) && ($_POST["MM_photo"] == "form2")) {
    $target = "assets/images/products/";
    $randno = rand(100, 1000);
    $filename = basename($_FILES['image']['name']);
    $target = $target . $randno . "-" . $filename;
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    // Validate file size (e.g., 5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        die("File is too large. Maximum size is 5MB.");
    }

    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $pic = $randno . "-" . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Changed the query to update only the image field
            $stmt = $blue_petals->prepare("UPDATE products SET image = ? WHERE product_id = ?");
            $stmt->bind_param("si", $pic, $_POST['product_id']);
            
            if ($stmt->execute()) {
        // Instead of directly redirecting, add a query parameter with the product_id
        header("Location: add_products.php?success=Updated&product_id=" . $product_id);
        exit();
    } else {
                die("Error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Failed to upload image. Please try again.");
        }
    } else {
        die("Invalid file type. Only JPG, PNG, JPEG, GIF are allowed.");
    }
}

// Update product image 2
if ((isset($_POST["MM_photo"])) && ($_POST["MM_photo"] == "form3")) {
    $target = "assets/images/products/";
    $randno = rand(100, 1000);
    $filename = basename($_FILES['image_2']['name']);
    $target = $target . $randno . "-" . $filename;
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    // Validate file size (e.g., 5MB limit)
    if ($_FILES['image_2']['size'] > 5000000) {  // Changed from 'image' to 'image_2'
        die("File is too large. Maximum size is 5MB.");
    }

    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $pic = $randno . "-" . $filename;
        if (move_uploaded_file($_FILES['image_2']['tmp_name'], $target)) {  // Changed from 'image' to 'image_2'
            // Update the image_2 field instead of image
            $stmt = $blue_petals->prepare("UPDATE products SET image_2 = ? WHERE product_id = ?");  // Changed column to image_2
            $stmt->bind_param("si", $pic, $_POST['product_id']);
            
            if ($stmt->execute()) {
                header("Location: add_products.php?success=Updated&product_id=" . $_POST['product_id']);  // Fixed product_id reference
                exit();
            } else {
                die("Error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Failed to upload image. Please try again.");
        }
    } else {
        die("Invalid file type. Only JPG, PNG, JPEG, GIF are allowed.");
    }
}


// Update product image_3
if ((isset($_POST["MM_photo"])) && ($_POST["MM_photo"] == "form4")) {
    $target = "assets/images/products/";
    $randno = rand(100, 1000);
    $filename = basename($_FILES['image_3']['name']);
    $target = $target . $randno . "-" . $filename;
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    // Validate file size (e.g., 5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        die("File is too large. Maximum size is 5MB.");
    }

    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $pic = $randno . "-" . $filename;
        if (move_uploaded_file($_FILES['image_3']['tmp_name'], $target)) {
            // Changed the query to update only the image field
            $stmt = $blue_petals->prepare("UPDATE products SET image_3 = ? WHERE product_id = ?");
            $stmt->bind_param("si", $pic, $_POST['product_id']);
            
            if ($stmt->execute()) {
        // Instead of directly redirecting, add a query parameter with the product_id
        header("Location: add_products.php?success=Updated&product_id=" . $product_id);
        exit();
    } else {
                die("Error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Failed to upload image. Please try again.");
        }
    } else {
        die("Invalid file type. Only JPG, PNG, JPEG, GIF are allowed.");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Products | Blue Petals Design Studio</title>
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
                                    class="mdi mdi-office"></i> </span> Add Products </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-1"> <a href="products.php">
                                                <button type="button"
                                                    class="btn btn-gradient-primary btn-rounded btn-fw"><i
                                                        class="mdi mdi-arrow-left menu-icon"></i> &nbsp;Back</button>
                                            </a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
        if ( isset( $_GET[ 'success' ] ) ) {
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-success">Products ' . $_GET[ 'success' ] . ' Successfully</div>';
            echo '</div>';
        }
        ?>
                    <?php
      if ( isset( $_GET[ 'success' ] ) || $flag ) {
        ?>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Image 1 Section -->
                                    <div class="col-md-4">
                                        <h4>Product Image 1</h4>
                                        <div class="text-center mb-3">
                                            <img src="assets/images/products/<?php echo $row_Recordset2['image'] ?>"
                                                width="100%" class="img-thumbnail">
                                        </div>
                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                            enctype="multipart/form-data" name="form2" role="form">
                                            <div class="form-group">
                                                <input type="file" name="image" id="image" class="form-control mb-2" />
                                                <button type="submit"
                                                    class="btn btn-gradient-primary btn-fw w-100">Upload</button>
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $row_Recordset2['product_id'] ?>" />
                                                <input type="hidden" name="MM_photo" value="form2">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Image 2 Section -->
                                    <div class="col-md-4">
                                        <h4>Product Image 2</h4>
                                        <div class="text-center mb-3">
                                            <img src="assets/images/products/<?php echo $row_Recordset2['image_2'] ?>"
                                                width="100%" class="img-thumbnail">
                                        </div>
                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                            enctype="multipart/form-data" name="form3" role="form">
                                            <div class="form-group">
                                                <input type="file" name="image_2" id="image_2"
                                                    class="form-control mb-2" />
                                                <button type="submit"
                                                    class="btn btn-gradient-primary btn-fw w-100">Upload</button>
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $row_Recordset2['product_id'] ?>" />
                                                <input type="hidden" name="MM_photo" value="form3">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Image 3 Section -->
                                    <div class="col-md-4">
                                        <h4>Product Image 3</h4>
                                        <div class="text-center mb-3">
                                            <img src="assets/images/products/<?php echo $row_Recordset2['image_3'] ?>"
                                                width="100%" class="img-thumbnail">
                                        </div>
                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                            enctype="multipart/form-data" name="form4" role="form">
                                            <div class="form-group">
                                                <input type="file" name="image_3" id="image_3"
                                                    class="form-control mb-2" />
                                                <button type="submit"
                                                    class="btn btn-gradient-primary btn-fw w-100">Upload</button>
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $row_Recordset2['product_id'] ?>" />
                                                <input type="hidden" name="MM_photo" value="form4">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" name="form1" role="form"
                                        action="<?php echo $editFormAction;?>">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Products Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Products Name"
                                                        value="<?php if($flag) echo $row_Recordset2['name'] ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Price<span class="text-danger">*</span></label>
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Price"
                                                        value="<?php if($flag) echo $row_Recordset2['price'] ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <?php if(!$flag) { ?>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Image<span class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control"
                                                        value="<?php if($flag) echo $row_Recordset2['image'] ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Amazon Link</label>
                                                    <input type="text" name="amazon_link" class="form-control"
                                                        placeholder="Amazon Link"
                                                        value="<?php if($flag) echo $row_Recordset2['amazon_link'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary mt-4">Save</button>
                                        <?php
                                        if ( $flag ) {
                                            ?>
                                        <input type="hidden" name="MM_update" value="form1">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <?php } else { ?>
                                        <input type="hidden" name="MM_insert" value="form1">
                                        <?php } ?>
                                    </form>
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
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
    <script>
    $('#property_type').on('change', function() {
        //alert( this.value );
        if (this.value == "Commercial" || this.value == "Rent And Lease" || this.value == "Plot") {
            $('#bathrooms').hide();
            $('#bedrooms').hide();
            $('#waterfront_description').hide();
            $('#view').hide();
            $('#built_in').hide();
            $('#parking').hide();
            $('#waterfront').hide();
            $('#garages').hide();

        } else {
            $('#bathrooms').show();
            $('#bedrooms').show();
            $('#waterfront_description').show();
            $('#view').show();
            $('#built_in').show();
            $('#parking').show();
            $('#waterfront').show();
            $('#garages').show();
        }
    });
    </script>
</body>

</html>