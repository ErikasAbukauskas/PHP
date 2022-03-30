<?php
session_start();
require_once('controller.php');
require_once("includes.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!-- Registration -->
<?php if(!isset($_SESSION["ID"])) { ?>
    <div class="container">
        <form action="registration.php" method="POST">
            <h3>REGISTRACIJA</h3>
            <div class="flex-container">
                <label class="label" for="username">Prisijungimo vardas</label>
                <input class="form-control" type="text" name="username" required />
            </div>
            <div class="flex-container">
                <label class="label" for="name">Vardas</label>
                <input class="form-control" type="text" name="name" required />
            </div>
            <div class="flex-container">
                <label class="label" for="surname">Pavardė</label>
                <input class="form-control" type="text" name="surname" required />
            </div>
            <div class="flex-container">
                <label class="label" for="email">El.paštas</label>
                <input class="form-control" type="email" name="email" required />
            </div>
            <div class="flex-container">
                <label class="label" for="password">Slaptažodis</label>
                <input class="form-control" type="password" name="password" required />
            </div>
            <div class="flex-container">
                <label class="label" for="repeat-password">Slaptažodžio pakartojimas</label>
                <input class="form-control" type="password" name="repeat_password" required />
            </div>
            <div class="flex-container btnspace">
                <div style="flex-grow: 1">
                    <button class="btn btn-primary btnreg" type="submit" name="submit"> Saugoti </button>
                    <a class="btn btn-success btnreg" href="login.php"> Prisijungti </a>
                </div>
            </div>
        </form>
    </div>
<?php } else {
header("location:clients.php");
}?> 
<?php
if(isset($_POST["submit"])) {
    if(isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat_password"]) && !empty($_POST["username"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["repeat_password"])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
       
        $object = new Data();
        $object->registration($username, $name, $surname, $email, $password);
        echo "naujas vartotojas sukurtas";
    } else {

        echo "suveskite visus duomenis";

    }
}
?>
</body>

</html>