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

        
    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    }

    .flex-container > div,h3 {
    text-align: center;
    align-items: baseline;
    line-height: 0px;
    
    }

    h3 {
        justify-content: center;
    }
    .flex-container {
    align-items: center;
    display: flex;
    align-items: stretch;
    margin-top: 20px;
    justify-content: flex-end;
    
    }

    .btn{
        width: 200px;
        margin-top: 30px;
    }

    h3 {
        margin-bottom: 70px;
        
    }

    label {
        display:flex;
        justify-content: flex-end;
        align-items: center;
        margin:0px;
        width: 300px;
        padding-right: 20px;
        float: left;
        font-size: 13px;
        
    }

    input {
        height: 50px;
    }

    .alert {
        display: flex;
        justify-content: center;
        font-size: 17px;
        margin-top: 20px;
        text-align: center;
        margin-left: 300px;
        
    }
  
    </style>

</head>
<body>

<?php


if(isset($_GET["submit"])) {
    // if(isset($_GET["name"]) && isset($_GET["surname"]) && isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["repeat_password"]) && !empty($_GET["name"]) && !empty($_GET["surname"]) && !empty($_GET["email"]) && !empty($_GET["password"]) && !empty($_GET["repeat_password"])) {
            $username = $_GET["username"];    
            $name = $_GET["name"];
            $surname = $_GET["surname"];
            $email = $_GET["email"];
            $password = $_GET["password"];
            $repeat_password = $_GET["repeat-password"];

            
            $sql = "SELECT * FROM `registration` WHERE prisijungimo_vardas='$username'";
            $sql1 = "SELECT * FROM `registration` WHERE el_pastas='$email'";
        
            $result = $conn->query($sql);
            $result1 = $conn->query($sql1);
           
        
            $class="danger";

            if($result->num_rows == 1 ) {

                $message = "Toks vartotojas duomenu bazeje jau egzistuoja";

            } else if ($result1->num_rows == 1 ) {
                
                $message1 = "Toks el.pastas duomenu bazeje jau egzistuoja";

            } else {


                $uppercase = preg_match('@[A-Z]@', $password);
                $number    = preg_match('@[0-9]@', $password);

                if (!$uppercase || !$number) {
                    $message = 'Password should be at least one upper case letter';
                    $message2 = 'Password should be at least one number';
                    
                } else if ($password == $repeat_password) {

                    $sql = "INSERT INTO `registration`(`prisijungimo_vardas`,`vardas`, `pavarde`, `el_pastas`, `slaptazodis`) 
                    VALUES ('$username','$name','$surname','$email','$password')";


                

                    if(mysqli_query($conn, $sql)) {
                    
                        $class="success";


                        $message = "Vartotojas sukurtas sekmingai";

                    } else {
            
                        $message = "!KLAIDA";
                    }

                } else {
                    $message3 = "Slaptazodis nesutampa";

    
                }
            }


    // }
}

?>

<div class="container">

        <form action="registration.php" method="get">
            <h3>REGISTRACIJA</h3>

                <div class="flex-container">

                    <label for="username">Prisijungimo vardas</label>
                
                    <input class="form-control" type="text" name="username" required="true" />

                </div>

                <div class="flex-container">
                    <label for="name">Vardas</label>
            
                    <input class="form-control" type="text" name="name"  required="true" />

                </div>

                <div class="flex-container">
                    <label for="surname">Pavarde</label>
                
                    <input class="form-control" type="text" name="surname"  required="true" />
                </div>

                <div class="flex-container">
                    <label for="email">El. paštas</label>
                
                    <input class="form-control" type="email" name="email" required="true" " />
                </div>


                <div class="flex-container">
                    <label for="password">Slaptažodis</label>
                    <input class="form-control" type="password" name="password"  required="true" />
                </div>

            
                <div class="flex-container">
                    <label for="repeat-password">Slaptažodžio pakartojimas</label>
                    <input class="form-control" type="password" name="repeat-password"  required="true" />
                </div>

                <?php if(isset($message)) { ?> 

                <div class="alert alert-<?php echo $class; ?>" role="alert"> 
                    <?php echo $message;?>
                </div>

                <?php } ?>

                <?php if(isset($message1)) { ?> 

                <div class="alert alert-<?php echo $class; ?>" role="alert"> 
                <?php echo $message1;?>
                </div>

                <?php } ?>

                <?php if(isset($message2)) { ?> 

                <div class="alert alert-<?php echo $class; ?>" role="alert"> 
                <?php echo $message2;?>
                </div>

                <?php } ?>

                <?php if(isset($message3)) { ?> 

                <div class="alert alert-<?php echo $class; ?>" role="alert"> 
                <?php echo $message3;?>
                </div>

                <?php } ?>


                <div class="flex-container">

                <button class="btn btn-primary" type="submit" name="submit"> Saugoti </button>
                <a class="btn btn-primary" href="index.php"> Back  </a>

                </div>


        </form>

</div>


    
</body>
</html>
