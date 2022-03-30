<?php
require_once('controller.php');
require_once("includes.php");

session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
</div>
<?php
  $object = new Data(); 
  $clients = $object->show();
?>

<?php if(isset($_SESSION["ID"])) {
    echo $_SESSION["prisijungimo_vardas"] . " " ."<a href='edit.php?id=$_SESSION[ID]'>Edit</a>";
    echo '<br /><br /><a href="logout.php">Logout</a>'; 
 
} else {
    header("location:login.php");
}?> 



</body>
</html>