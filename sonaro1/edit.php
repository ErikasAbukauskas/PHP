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
<?php if(isset($_SESSION["ID"])) { ?>

    <?php
    if(isset($_GET["id"])) {
        $id = $_GET['id'];

        $object = new Data();
        $clients = $object->edit($id);

    ?>
        <div class="container">
            <form action="edit.php" method="POST">
                <div class="flex-container">
                <input class="hidden" type="hidden" name="id" 
                    value="<?php echo $_GET['id']; ?>"
                        required />
                    <label class="label" for="username">Prisijungimo vardas</label>
                    <input class="form-control" disabled type="text" name="username"
                    value="<?php echo $clients["prisijungimo_vardas"]; ?>" required/>
                </div>
                <div class="flex-container">
                    <label class="label" for="name">Vardas</label>
                    <input class="form-control" type="text" name="name" 
                    value="<?php echo $clients["vardas"]; ?>"
                        required />
                </div>
                <div class="flex-container">
                    <label class="label" for="surname">Pavardė</label>
                    <input class="form-control" type="text" name="surname" 
                    value="<?php echo $clients["pavarde"]; ?>"
                        required />
                </div>
                <div class="flex-container">
                    <label class="label" for="email">El.paštas</label>
                    <input class="form-control" type="email" name="email" 
                    value="<?php echo $clients["el_pastas"]; ?>"
                        required />
                </div>
                <div class="flex-container">
                    <label class="label" for="password">Slaptažodis</label>
                    <input class="form-control" type="password" name="password"
                        value="<?php echo $clients["slaptazodis"]; ?>" required />
                </div>
                <div class="flex-container btnspace">
                    <div style="flex-grow: 1">
                        <button class="btn btn-primary btnreg" type="submit" name="submit"> Saugoti </button>
                        <a class="btn btn-success btnreg" href="clients.php"> Atgal </a>
                    </div>
                </div>
            </form>
        </div>
    <?php } else {
    header("location:clients.php");
    } ?>
<?php } else {
header("location:clients.php");
}?>

<?php
if(isset($_POST["submit"])) {
    if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $object = new Data();
    $object->update($name, $surname, $email, $password, $id);
    }
}
?>

</body>

</html>
