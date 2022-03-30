<?php
    require_once('connection.php');
    require_once("includes.php");
?>

<?php

class Data extends Connection {

    public function registration($username, $name, $surname, $email, $password) {
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO registration(prisijungimo_vardas, vardas, pavarde, el_pastas, slaptazodis) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $name, $surname, $email, $password]);
    }

    public function login($username, $password) {
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM registration WHERE prisijungimo_vardas = ? AND slaptazodis = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);
        $result = $stmt->fetch();
        $session_array = array(
            $result["ID"],
            $result["prisijungimo_vardas"],
        );
        if($result > 0) {
            $_SESSION["ID"] = $session_array[0];
            $_SESSION["prisijungimo_vardas"] = $session_array[1];
            header("location:clients.php");
        } else {
            echo "Blogi prisijungimo duomenys";
        }
    }

    public function logout() {
        session_unset();
        session_destroy();  
        header("location:login.php");  
    }

    public function show() {
        $sql = "SELECT * FROM registration WHERE 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
       while($clients = $stmt->fetch()) { 
            echo "<tr>";
                echo "<td>". $clients["ID"]. "</td>";
                echo "<td>". $clients["vardas"]. "</td>";
                echo "<td>". $clients["pavarde"]. "</td>";
                echo "<td>". $clients["el_pastas"]. "</td>";
                echo "<td><a href='poke.php?id=$clients[ID]'>POKE</a>";
            echo "</tr>";
        }
    }

    public function edit($id) {
        $sql = "SELECT * FROM registration WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $clients = $stmt->fetch();
        return $clients;
    }

    public function update($name, $surname, $email, $password, $id) {
        $sql = "UPDATE registration SET vardas = ?, pavarde = ?, el_pastas = ?, slaptazodis = ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $surname, $email, $password, $id]);
    }
}
