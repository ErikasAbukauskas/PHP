<?php


// class connection {
//   private $database_server;
//   private $database_username;
//   private $database_password ;
//   private $database_name;

    // protected function connect() {
        //   $this->$database_server = "localhost";
        //   $this->$database_username = "root";
        //   $this->$database_password = "";
        //   $this->$database_name = "sonaro";

        // $conn = new mysqli_connect($this->$database_server, $this->$database_username, $this->$database_password, $this->$database_name);

        // if( !$conn ) {
        //     die("Failed to connect to MYSQL: " .mysqli_connect_error());
        // } else {
        //  echo "Prisijungimas ivyko sekmingai";
        //}
        
        // return $conn; // kaip ir nereikia
        
    //}
//}


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

mysqli_set_charset($conn, "utf8");



