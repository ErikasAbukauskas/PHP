<?php
//pirmas prisijungimo variantas
class Connection1 {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "sonaro";

    public function connect() {
        $dsn = 'mysql:servername=' . $this->servername . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

    }
}


//antras prisijungimo variantas
class Connection11 {
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
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
       } catch (PDOException $e) {
         echo "Connection failed: ".$e->getMessage();
       }
    }
}





//pirmas variantas
class Data extends Connection111 {
    public function setDataStmt($username, $name, $surname, $email, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO registration(prisijungimo_vardas, vardas, pavarde, el_pastas, slaptazodis) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $name, $surname, $email, $password]);
    }
}


//sita rasome prie formos
//pirmas variantas
if(isset($_POST["submit"])) {
    if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat_password"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["repeat_password"])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
       
        $object = new Data();
        $object->setDataStmt($username, $name, $surname, $email, $password);
    }
}






//antras variantas
class Data extends Connection111 {
    public function setDataStmt() {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO registration(prisijungimo_vardas, vardas, pavarde, el_pastas, slaptazodis) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $name, $surname, $email, $password]);
    }
}

//sita rasome prie formos
//antras variantas
if(isset($_POST["submit"])) {
    if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat_password"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["repeat_password"])) {
       
        $object = new Data();
        $object->setDataStmt();
    }
}
class Data extends Connection111 {
    public function show() {
        $sql = "SELECT * FROM registration WHERE 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();
        if($result) {
            foreach($result as $clients) {
        ?>
        <tr>
            <td><?=$clients->vardas;?></td>
            <td><?=$clients->pavarde;?></td>
            <td><?=$clients->el_pastas;?></td>
            <td><?="Action"?></td>
            <tr>
                <?php
            }
        }
    }
}
?>