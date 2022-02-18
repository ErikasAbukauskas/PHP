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

  <?php if(isset($message)) { ?> 
    <div class="alert alert-<?php echo $class; ?>" role="alert"> 
        <?php echo $message;?>
    </div>
    
  <?php } ?>
</div>


<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    
<?php













$cookie_a = $_COOKIE["prisijungta"];
$cookie_b = explode("|", $cookie_a );
$cookie_id = $cookie_b[0];
$cookie_username = $cookie_b[1];  
$cookie_name = $cookie_b[2];
$cookie_surname = $cookie_b[3];

// if(isset($_GET["search"]) && !empty($_GET["search"])) {
//   $search = $_GET["search"];
//   // $sql = "SELECT * FROM `registration` WHERE `vardas` LIKE '%".$search."%' OR `pavarde` LIKE '%".$search."%' OR `el_pastas` LIKE '%".$search."%'"; 
  
// }



$sql = "SELECT * FROM `registration` WHERE 1"; 
$result = mysqli_query($conn, $sql);
//ARBA ANTRAS BUDAS (ABU BUDAI TINKA)
// $result = mysqli_query($conn, $sql);

$date = date("Y-m-d");


while($clients = mysqli_fetch_array($result)) { 
  echo "<tr>";
    echo "<td>". $clients["vardas"]. "</td>";
    echo "<td>". $clients["pavarde"]. "</td>";
    echo "<td>". $clients["el_pastas"]. "</td>";
    $id = $clients["ID"];
  
   
    echo "<td>";

    // echo "<a href='clients.php?ID=".$cookie_name. " " .$cookie_surname. " " .$clients["vardas"]. " " .$clients["pavarde"]. "'> Redaguoti </a>";
      
?>
  
    <form action="clients.php" method="get">
      <button class="btn btn-primary" type="submit" name="submit"> Send </button>
    </form>
 

<?php
    echo "</td>";
    echo "</tr>";
  
if(isset($_GET["submit"])) {

  // if(isset($_GET["name"]) && isset($_GET["surname"])) {
  //   $vardas = $_GET["name"];    
  //   $pavarde = $_GET["surname"];
    //  $vardas = $clients["vardas"];
    //   $pavarde = $clients["pavarde"];

  
    // $sql = "SELECT vardas AND pavarde FROM `registration` WHERE vardas=$vardas AND pavarde=$pavarde"; 

      $date = date("Y-m-d");
      // $result = $conn->query($sql); 
      // $clients = mysqli_fetch_array($result);

      $vardas = $clients["vardas"];
      $pavarde = $clients["pavarde"];

      $sql= "INSERT INTO `poke`(`data`,`siuntejas`,`gavejas`) VALUES ('$date','$cookie_name $cookie_surname','$vardas $pavarde')";

      mysqli_query($conn, $sql);
     
    var_dump( $sql);
     
  }

// }
}
?>


<?php


if(!isset($_COOKIE["prisijungta"])) {
  
    header("Location: index.php");
} else {
    echo "<form action='clients.php' method='get'>";
    echo "<button class = 'btn btn-primary 'type ='submit' name='logout'> Logout </button>";
    echo "<a class='btn btn-primary' href='poke.php'> Send list  </a>";
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
