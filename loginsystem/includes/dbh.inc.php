<?php

$database_server = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "loginsystemtut";

$conn = mysqli_connect($database_server,$database_username,$database_password,$database_name);

if(!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}