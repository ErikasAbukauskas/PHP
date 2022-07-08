<?php

class dbh {

    private $database_server;
    private $database_username;
    private $database_password;
    private $database_name;

    protected function connection() {

        $this->database_server = "localhost";
        $this->database_username = "root";
        $this->database_password = "";
        $this->database_name = "news_website";

        $conn = new mysqli (
            $this->database_server,
            $this->database_username,
            $this->database_password,
            $this->database_name
        );

        return $conn;

        $conn->set_charset("utf8");
    }
}
?>