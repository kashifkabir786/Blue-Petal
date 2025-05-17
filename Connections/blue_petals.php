<?php
$hostname_blue_petals = "localhost";
$database_blue_petals = "blue_petal";
$username_blue_petals = "blue_petal";
$password_blue_petals = "123";
$blue_petals = mysqli_connect( $hostname_blue_petals, $username_blue_petals, $password_blue_petals, $database_blue_petals )or trigger_error( mysqli_connect_error(), E_USER_ERROR );

global $blue_petals;
if ( !function_exists( "GetSQLValueString" ) ) {
    function GetSQLValueString( $theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "" ) {
        //  if (PHP_VERSION < 6) {
        //    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        //  }
        global $blue_petals;
        $theValue = function_exists( "mysqli_real_escape_string" ) ? mysqli_real_escape_string( $blue_petals, $theValue ) : mysqli_escape_string( $theValue );
        switch ( $theType ) {
            case "text":
                $theValue = ( $theValue != "" ) ? "'" . $theValue . "'": "NULL";
                break;
            case "long":
            case "int":
                $theValue = ( $theValue != "" ) ? intval( $theValue ) : "NULL";
                break;
            case "double":
                $theValue = ( $theValue != "" ) ? doubleval( $theValue ) : "NULL";
                break;
            case "date":
                $theValue = ( $theValue != "" ) ? "'" . $theValue . "'": "NULL";
                break;
            case "defined":
                $theValue = ( $theValue != "" ) ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}
?>