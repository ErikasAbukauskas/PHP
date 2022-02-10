<?php

$database_server = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "sonaro";

$conn = mysqli_connect($database_server,$database_username,$database_password,$database_name);

if( !$conn ) {
    die("Failed to connect to MYSQL: " .mysqli_connect_error());
} 
// else {
//     echo "Prisijungimas ivyko sekmingai";
// }