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
    <title>Poke system</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<!-- Login -->
<?php if(!isset($_SESSION["ID"])) { ?>
<div class="container" >
    <form action="login.php" method="POST">
        <h3> PRISIJUNGIMAS <h3>
        <div class="form-group">
            <label for="username"></label>
            <input class="form-control" type="text" placeholder="Prisijungimo vardas" name="username" />
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input class="form-control" type="password" placeholder="Slaptažodis" name="password" />
        </div>
        <div class="flex-container index">
            <div style="flex-grow: 1">
                <button class="btn btn-success" type="submit" name="submit"> Prisijungti </button>
                <a class="btn btn-primary" href="registration.php"> Registruotis  </a>
            </div>
        </div>
    </form>
</div>
<?php } else {
header("location:clients.php");
}?> 
<?php 
if(isset($_POST["submit"])) {
    if(isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        $object = new Data();
        $object->login($username, $password);

    } else {
        echo " iveskite visus prisijungimo duomenis";
    }
}
?>

</body>
</html>