<?php

// Establish database connection
$db_conn = mysqli_connect("localhost", "Adoa", "1234", "amalajoint");

// Check connection and enable error reporting
if($db_conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
}
?>



//$db_conn = mysqli_connect("localhost", "root", "", "amalajoint");
// Check connection//
//if($db_conn === false){
 //   die("ERROR: Could not connect. " . mysqli_connect_error());
//}
//error_reporting(E_ALL);//
//ini_set('display_errors','Off');

?>