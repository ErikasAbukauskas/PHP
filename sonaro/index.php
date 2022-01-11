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

    <?php require_once("includes.php"); ?>

    
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
        font-size: 30px;
        line-height: 0px;
        }
        .flex-container {
        display: flex;
        align-items: stretch;
        margin-top: 50px;
        }

        .btn{
            width: 200px;
        }

        h3 {
            margin: 50px
        }

        .alert {
            font-size: 17px;
            margin-top: 20px;
        }


    </style>

</head>
<body>


<?php

    if(isset($_GET["submit"])) {

            if(isset($_GET["username"]) && isset($_GET["password"]) && !empty($_GET["username"]) && !empty($_GET["password"])) {

                    $username = $_GET["username"];
                    $password = $_GET["password"];

                   
                    $sql = "SELECT * FROM `registration` WHERE prisijungimo_vardas='$username' AND slaptazodis='$password'"; 

                    $result = $conn->query($sql);



                    if($result->num_rows == 1) { 

                        
                        $user_info = mysqli_fetch_array($result); 

                        $cookie_array = array (
                            $user_info["ID"],
                            $user_info["prisijungimo_vardas"],
                            
                            
                        );


                        $cookie_array = implode("|", $cookie_array);

                        setcookie("prisijungta", $cookie_array, time() + 3600, "/");
                        

                        // var_dump($cookie_array);

                        header("Location: clients.php");

                    } else {

                        $message = "Slapyvardis arba slaptazodis yra neteisingas";
                    }

                    // var_dump($result);

                
            } else {

                $message = "Laukeliai yra tušti arba duomenys yra neteisingi";
            }
    }

?>
<?php if(!isset($_COOKIE["prisijungta"])) { ?>
    
    <div class="container" >
  
        <form action="index.php" method="get">
        <h3> PRISIJUNGIMAS <h3>
            <div class="form-group">
                <label for="username"></label>
                <input class="form-control" type="text" placeholder="Prisijungimo vardas" name="username" />
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input class="form-control" type="password" placeholder="Slaptažodis" name="password" />
            </div>
            <div class="flex-container">
                <div style="flex-grow: 1">
                    
                    <button class="btn btn-success" type="submit" name="submit"> Prisijungti </button>

                    <a class="btn btn-primary" href="registration.php"> Registruotis  </a>

                </div>
            </div>
        </form>

        <?php if(isset($message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message;?>
            </div>
        <?php } ?>
        
</div>
<?php } else {
    
    header("Location: clients.php");
    
    }?>

    
</body>
</html>
