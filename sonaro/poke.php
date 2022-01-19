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


</head>
<body>

<!-- <form class="form-inline my-2 my-lg-0" action="poke.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Ieškoti pagal vardą" aria-label="Search Client">
      <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search_button">Search</button>
    </form>  -->



</div>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Siuntejas</th>
        <th scope="col">Gavejas</th>
      </tr>
    </thead>
    <tbody>
<?php


// if(isset($_GET["search"]) && !empty($_GET["search"])) {

//     $search = $_GET["search"];

//     $sql = "SELECT * FROM `poke` WHERE `siuntejas` LIKE '%".$search."%' OR `gavejas` LIKE '%".$search."%'"; 

// }


  $sql = "SELECT * FROM `poke` WHERE 1"; 


$result = $conn->query($sql); 


while($clients = mysqli_fetch_array($result)) { 

echo "<tr>";
    echo "<td>". $clients["data"]. "</td>";
    echo "<td>". $clients["siuntejas"]. "</td>";
    echo "<td>". $clients["gavejas"]. "</td>";
    echo "<td>";
echo "</tr>";
}
?>


</body>
</html> 