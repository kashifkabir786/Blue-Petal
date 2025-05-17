<?php require_once('../Connections/blue_petals.php'); ?>
<?php
if ( isset( $_GET[ 'product_id' ] ) ) {

    $deleteSQL = sprintf( "DELETE FROM `products` WHERE  `product_id` = %s",
        GetSQLValueString( $_GET[ 'product_id' ], "int" ) );
    $Result1 = mysqli_query( $blue_petals, $deleteSQL )or die( mysqli_error( $blue_petals ) );

    unlink( "assets/images/products/" . $row_photo[ 'image' ] );

    $deleteGoTo = "products.php";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $deleteGoTo .= ( strpos( $deleteGoTo, '?' ) ) ? "&" : "?";
        $deleteGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $deleteGoTo ) );
}
?>