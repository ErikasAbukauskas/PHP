<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .navbar{
            justify-content: space-between
        }

    </style>

</head>
<body>
    
</body>
</html>

<nav class="navbar navbar-expand-lg navbar-light bg-light">


<?php

$cookie_a = $_COOKIE["prisijungta"];
$cookie_b = explode("|", $cookie_a );
$cookie_id = $cookie_b[0];
$cookie_username = $cookie_b[1];

$sql = "SELECT * FROM `registration` WHERE 1"; 


  $result = $conn->query($sql); 

  if($result = $conn->query($sql)) { ?>
  

  <h2> 
    <?php
      echo $cookie_username;
    ?>
  <h2>

<h6>
    <?php
    echo "<a href='clientsEdit.php?ID=".$cookie_id."'> push </a>";
    ?>
<h6>

 <?php } ?>

    <form class="form-inline my-2 my-lg-0" action="clients.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Ieškoti pagal vardą" aria-label="Search Client">
      <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search_button">Search</button>
    </form> 
    <form action="clients.php" method="get">
        <?php if(isset($_GET["search"]) && !empty($_GET["search"])) { ?>
            <a class="btn btn-primary" href="clients.php"> Išvalyti paiešką</a>
        <?php } ?>
    </form>

</nav>
