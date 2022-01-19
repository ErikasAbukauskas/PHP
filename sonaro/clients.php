<?php 
require_once("connection.php");
?>  
<!DOCTYPE html>
<html lang="lt"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require_once("includes.php");
    ?>
    
</head>
<body>
<div class="container">
<?php require_once("menu.php"); ?>
  <?php if(isset($message)) { ?> 
    <div class="alert alert-<?php echo $class; ?>" role="alert"> 
        <?php echo $message;?>
    </div>
    
  <?php } ?>
<?php 
$cookie_a = $_COOKIE["prisijungta"];
$cookie_b = explode("|", $cookie_a );
$cookie_id = $cookie_b[0];
$cookie_username = $cookie_b[1];
?>
</div>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Vardas</th>
        <th scope="col">Pavarde</th>
        <th scope="col">Elektroninis paštas</th>
        <th scope="col">Veiksmai</th>
      </tr>
    </thead>
    <tbody>
<?php
if(isset($_GET["search"]) && !empty($_GET["search"])) {
  $search = $_GET["search"];
  $sql = "SELECT * FROM `registration` WHERE `vardas` LIKE '%".$search."%' AND ID!=$cookie_id OR `pavarde` LIKE '%".$search."%' AND ID!=$cookie_id OR `el_pastas` LIKE '%".$search."%' AND ID!=$cookie_id"; 
}
$result = $conn->query($sql); 
      
while($clients = mysqli_fetch_array($result)) { 
  echo "<tr>";
    echo "<td>". $clients["vardas"]. "</td>";
    echo "<td>". $clients["pavarde"]. "</td>";
    echo "<td>". $clients["el_pastas"]. "</td>";

    echo "<td>";
?>
    <!-- // echo "<a href='clients.php?vardas=".$clients["vardas"]." "."clients.php?pavarde=".$clients["pavarde"]."'> Poke </a>"; -->

    <form action="clients.php" method="get">
      <button class="btn btn-primary" type="submit" name="submit"> Poke </button>
    </form>
 
</form>
<?php
    echo "</td>";
  }

  ?>

  <?php

  
  if(isset($_GET["submit"])) {



    $vardas = $clients["vardas"];

    $pavarde = $clients["pavarde"];

    $cookie_a = $_COOKIE["prisijungta"];
    $cookie_b = explode("|", $cookie_a );
    $cookie_id = $cookie_b[0];
    $cookie_username = $cookie_b[1];  
    $cookie_name = $cookie_b[2];
    $cookie_surname = $cookie_b[3];


        $date = date("Y-m-d");


        $result = $conn->query($sql); 


        $sql = "SELECT 'vardas' AND 'pavarde' FROM `registration` WHERE 'vardas=$vardas' AND 'pavarde='$pavarde'";

        $clients = mysqli_fetch_array($result);


        // var_dump(  $clients);


      $sql= "INSERT INTO `poke`(`data`,`siuntejas`, `gavejas`) VALUES ('$date','$cookie_name $cookie_surname','$clients[2] $clients[3]')";

      $res = mysqli_query($conn, $sql);

    //   if($res) {
    //     echo "irasas yra pridetas";
    // } else {
    //     echo "kazkas negerai";
    // }
  }
  
?>


<?php


if(!isset($_COOKIE["prisijungta"])) {
  
    header("Location: index.php");
} else {
    echo "<form action='clients.php' method='get'>";
    echo "<button class = 'btn btn-primary 'type ='submit' name='logout'> Logout </button>";
    echo "</form>";
    if(isset($_GET["logout"])) {
        setcookie("prisijungta", " ", time() - 3600, "/");
        header("Location: index.php");
    }
}
?>
    </tbody>
  </table>
</div>
</div>
</body>
</html>
<!-- <form action="clients.php" method="get">
  <button class="btn btn-primary" type="submit" name="submit"> Poke </button>
</form> -->