<?php

class Connection {
  private $servername;
  private $username;
  private $password;
  private $dbname;

    public function connect() {
      $this->servername = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "sonaro";

      try {
        $dsn ="mysql:host=".$this->servername.";dbname=".$this->dbname;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);//????(dar klausimas)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      } catch (PDOException $e) {
         echo "Connection failed: ".$e->getMessage();
      }
    }
}