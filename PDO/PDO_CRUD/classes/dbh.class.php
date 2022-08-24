<?php


class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "pdo_crud";
    protected $dsn;
    protected $conn;

    public function connect() {
        try {
            $this->dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->db;
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $this->conn;
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
}

// class Dbh {
//     private $host = "localhost";
//     private $user = "root";
//     private $password = "";
//     private $db = "pdo_crud";

//     public function connect() {
//         try {
//             $dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->db;
//             $conn = new PDO($dsn, $this->user, $this->password);
//             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             // echo "Connected successfully";
//             return $conn;
//           } catch(PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//           }
//     }
    
// }


