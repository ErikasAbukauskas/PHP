<?php

require_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php 

        require_once("includes.php");

    ?>  

    <style>
        h1 {
            text-align: center;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .hide {
            display: none;
        }

    </style>

</head>
<body>

<?php

if(!isset($_COOKIE["prisijungta"])) {

      header("Location: index.php");
}

if(isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "SELECT * FROM registration WHERE ID = $id";

    $result = $conn->query($sql);

    if($result->num_rows == 1){

        $client = mysqli_fetch_array($result);
        $hideForm = false;

    } else {

        $hideForm = true;

    }
}


if(isset($_GET["submit"])) {

    if(isset($_GET["a"]) && !empty($_GET["username"]) && isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["surname"]) && !empty($_GET["surname"]) && isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["password"]) && !empty($_GET["password"])) {

        $id = $_GET["ID"];
        $username = $_GET["prisijungimo_vardas"];
        $name = $_GET["vardas"];
        $surname = $_GET["pavarde"];
        $email = $_GET["el_pastas"];
        $password = $_GET["slaptazodis"];

        $sql = "UPDATE `registration` SET `prisijungimo_vardas`='$username',`vardas`='$name',`pavarde`='$surname',`el_pastas`='$email',`slaptazodis`='$password' WHERE ID = $id";

        if(mysqli_query($conn, $sql)) {

            $message = "Klientas redaguotas sekmingai";
            $class = "success";
      
        } else {
      
            $message = "KLAIDA!";
            $class = "danger";
            
        }

    } else {

        $id = $client["ID"];
        $username = $client["prisijungimo_vardas"];
        $name = $client["vardas"];
        $surname = $client["pavarde"];
        $email = $client["el_pastas"];
        $password = $client["slaptazodis"];


        $sql = "UPDATE `registration` SET `prisijungimo_vardas`='$username',`vardas`='$name',`pavarde`='$surname',`el_pastas`='$email',`slaptazodis`='$password' WHERE ID = $id";

        if(mysqli_query($conn, $sql)) {

            $message = "Klientas redaguotas sekmingai";
            $class = "success";
      
        } else {
      
            $message = "KLAIDA!";
            $class = "danger";
            
        }
    }
}

?>
<div class="container">
        <h1>VARTOTOJO REDAGAVIMAS</h1>

        <?php if($hideForm == false) { ?>

            
            <form action="clientsEdit.php" method="get">

                <input class="hide" type="text" name="ID" value ="<?php echo $client["ID"]; ?>"/>

            <!-- //cia pridejome nauja forma su divu -->
            <div class="form-group">
                    <label for="username">Prisijungimas</label>
                
                    <input disabled=true class="form-control" type="text" name="username" value="<?php echo $client["prisijungimo_vardas"]; ?>  " />

                </div>

                <div class="form-group">
                    <label for="name">Vardas</label>
                
                    <input class="form-control" type="text" name="name" value="<?php echo $client["vardas"]; ?>"/>
                </div>

                <div class="form-group">
                    <label for="surname">Pavarde</label>
                
                    <input class="form-control" type="text" name="surname" value="<?php echo $client["pavarde"]; ?>"/>
                </div>

                <div class="form-group">
                    <label for="email">Pastas</label>
                
                    <input class="form-control" type="text" name="email" value="<?php echo $client["el_pastas"]; ?>"/>
                </div>

                <div class="form-group">
                    <label for="password">Slaptazodis</label>
                
                    <input class="form-control" type="text" name="password" value="<?php echo $client["slaptazodis"]; ?>"/>
                </div>

                

                
                </div>
                
                <a href="clients.php"> Back </a></br> 

                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
      
            </form>

            
            <?php if(isset($message)) { ?> 

                <div class="alert alert-<?php echo $class; ?>" role="alert"> 
                    <?php echo $message;?>
                </div>

            <?php } ?>
            
        <?php } else {?>

            <h2> Tokio kliento nera </h2>

            <a href="clients.php"> Back </a></br> 

        <?php }?>

        </div>

    
</body>
</html>