<?php
require_once ("connection.php");
require_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error {
            color:red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>



<?php
/////////////////////////////                      SELECT                            ////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $sql = "SELECT * FROM registration;"; //WHERE user_first='Daniel';";
    $result = mysqli_query($conn, $sql);

////////////////////////     PIRMAS VARIANTAS        ///////////////////////////////////////////////////////////////////////

    $resultCheck = mysqli_num_rows($result); // eilutine nebutina, skirta tikrinti
    if($resultCheck > 0) { // eilutine nebutina, skirta tikrinti
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['user_uid'] . "<br>";
        }
    }

/////////////////////        ANTRAS VARIANTAS          /////////////////////////////////////////////////////////////////////

    // if($result->num_rows > 0) {
    // while($clients = mysqli_fetch_array($result)) { 
    //     echo "<tr>";
    //       echo "<td>". $clients["vardas"]. "</td>";
    //       echo "<td>". $clients["pavarde"]. "</td>";
    //       echo "<td>". $clients["el_pastas"]. "</td>";
    // }
    // }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<?php
/////////////////////////////                      FORMA                            /////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<h2>Signup</h2>
<form action="index.php" ("includes/signup.inc.php") method="POST">
    <input class="form-control" type="text" name="username" placeholder="Prisijungimo vardas" />

    <input class="form-control" type="text" name="name" placeholder="Prisijungimo vardas" />

    <input class="form-control" type="text" name="surname" placeholder="Prisijungimo vardas" />

    <input class="form-control" type="text" name="email" placeholder="Prisijungimo vardas" />
   
    <input class="form-control" type="password" name="password" placeholder="Slaptažodis" />
            
    <button class="btn btn-success" type="submit" name="submit">Sign up</button>    
</form>
<?php
/////////////////////////////                      INSERT                            ////////////////////////////////////////
/////////////////////////////                   SQL INJECTION                        ////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
require_once 'dbh.inc.php';

$username = mysqli_real_escape_string($conn, $_POST['username']); //Protect your database against SQL injection using MySQLi
$name = mysqli_real_escape_string($conn, $_POST['name']); //Protect your database against SQL injection using MySQLi
$surname = mysqli_real_escape_string($conn, $_POST['surname']); //Protect your database against SQL injection using MySQLi
$email = mysqli_real_escape_string($conn, $_POST['email']); //Protect your database against SQL injection using MySQLi
$password = mysqli_real_escape_string($conn, $_POST['password']); //Protect your database against SQL injection using MySQLi

$sql= "INSERT INTO `registration`(`prisijungimo_vardas`, `vardas`, `pavarde`, `el_pastas`, `slaptazodis`) 
       VALUES ('$username','$name','$surname','$email','$password');";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

//KADANGI FORMA BUNA KITAME PUSLAPYJE O INSERT KODAS KITAME PUSLAPYJE, REIKIA HEADER, JOG KODAS GRYZTU I FORMOS PUSLAPI IR SUVEIKTU
header("Location: ../index.php?signup=success");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<?php
/////////////////////////////             PREPARED STATEMENS SELECT             /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$data = "Admin";

//CREATED A TEMPLATE
$sql = "SELECT * FROM registration WHERE user_uid=?;"; // username=?;";

//CREATE A PREPARED STATEMENT
$stmt = mysqli_stmt_init($conn);

//PREPARE THE PREPARED STATEMENT
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    //BIND PARAMETERS TO THE PLACEHOLDER
    mysqli_stmt_bind_param($stmt, "s", $data);

    //RUN PARAMETERS INSIDE DATABASE
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

////////////////////////     PIRMAS VARIANTAS        ///////////////////////////////////////////////////////////////////////

    while($row = mysqli_fetch_assoc($result)) {
        echo $row['user_uid'] . "<br>";
    }

/////////////////////        ANTRAS VARIANTAS          /////////////////////////////////////////////////////////////////////

    // while($clients = mysqli_fetch_array($result)) { 
    //         echo "<tr>";
    //           echo "<td>". $clients["vardas"]. "</td>";
    //           echo "<td>". $clients["pavarde"]. "</td>";
    //           echo "<td>". $clients["el_pastas"]. "</td>";
    //     }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<?php 
/////////////////////////////             PREPARED STATEMENS INSERT             /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$username = mysqli_real_escape_string($conn, $_POST['username']); //Protect your database against SQL injection using MySQLi
$name = mysqli_real_escape_string($conn, $_POST['name']); //Protect your database against SQL injection using MySQLi
$surname = mysqli_real_escape_string($conn, $_POST['surname']); //Protect your database against SQL injection using MySQLi
$email = mysqli_real_escape_string($conn, $_POST['email']); //Protect your database against SQL injection using MySQLi
$password = mysqli_real_escape_string($conn, $_POST['password']); //Protect your database against SQL injection using MySQLi

$sql= "INSERT INTO `registration`(`prisijungimo_vardas`, `vardas`, `pavarde`, `el_pastas`, `slaptazodis`) 
       VALUES (?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL error";
} else {
    mysqli_stmt_bind_param($stmt, "sssss", $username, $name, $surname, $email, $password); // s raidziu skaicius, priklauso nuo klaustuku skaiciaus
    mysqli_stmt_execute($stmt);

    header("Location: ../index.php?signup=success");
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<h2>Signup</h2>
<form action="index.php" ("includes/signup.inc.php") method="POST">
    <input class="form-control" type="text" name="username" placeholder="Username">

    <input class="form-control" type="text" name="name" placeholder="Name">

    <input class="form-control" type="text" name="surname" placeholder="Surname"> 

    <input class="form-control" type="text" name="email" placeholder="Email">
   
    <input class="form-control" type="password" name="password" placeholder="Slaptažodis">
            
    <button class="btn btn-success" type="submit" name="submit">Sign up</button>    
</form>
<?php
////////////////////////     PIRMAS VARIANTAS        ///////////////////////////////////////////////////////////////////////

//   $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//   if (strpos($fullUrl, "signup=empty") == true) {
//     echo "<p class='error'>You did not fill in all fields!</p>";
//     exit();
//   } 
//   elseif (strpos($fullUrl, "signup=char") == true) {
//     echo "<p class='error'>You used invalid characters!</p>";
//     exit();
//   } 
//   elseif (strpos($fullUrl, "signup=email") == true) {
//     echo "<p class='error'>You used an invalid e-mail!</p>";
//     exit();
//   } 
//   elseif (strpos($fullUrl, "signup=success") == true) {
//     echo "<p class='success'>You have been signed up!</p>";
//     exit();
//   } 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<h2>Signup</h2>
<form action="index.php" ("includes/signup.inc.php") method="POST">
    <?php
    if (isset($GET['username'])) {
      $username = $GET['username'];
      echo '<input class="form-control" type="text" name="username" placeholder="Username" value="'.$username.'">';
    } 
    else {
        echo '<input class="form-control" type="text" name="username" placeholder="Username">';
    }

    if (isset($GET['name'])) {
        $name = $GET['name'];
        echo '<input class="form-control" type="text" name="name" placeholder="Name" value="'.$name.'">';
    } 
    else {
        echo '<input class="form-control" type="text" name="name" placeholder="Name">';
    }

    if (isset($GET['surname'])) {
        $surname = $GET['surname'];
        echo '<input class="form-control" type="text" name="surname" placeholder="Surname"> value="'.$surname.'">';
    } 
    else {
        echo '<input class="form-control" type="text" name="surname" placeholder="Surname">';
    }
    ?>

    <input class="form-control" type="text" name="email" placeholder="Email">
   
    <input class="form-control" type="password" name="password" placeholder="Slaptažodis">
            
    <button class="btn btn-success" type="submit" name="submit">Sign up</button>    
</form>
<?php
/////////////////////        ANTRAS VARIANTAS          /////////////////////////////////////////////////////////////////////

if (!isset($_GET['signup'])) {
    exit();
}
else {
  $signupChesck = $_GET['signup'];

  if ($signupChesck == "empty") {
    echo "<p class='error'>You did not fill in all fields!</p>";
    exit();
  }
  elseif ($signupChesck == "char") {
    echo "<p class='error'>You used invalid characters!</p>";
    exit();
  }
  elseif ($signupChesck == "email") {
    echo "<p class='error'>You used an invalid e-mail!</p>";
    exit();
  }
  elseif ($signupChesck == "success") {
    echo "<p class='success'>You have been signed up!</p>";
    exit();
  }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
/////////////////////////////                      ERROR                   //////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST["submit"])) {
  include_once 'dbh.inc.php';

  $username = $_POST['username'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //Check if inputs are empty
  if (empty($username) || empty($name) || empty($surname) || empty($email) || empty($password)) {
    header("Location: ../index.php?signup=empty");
    exit();
  } else {
    //Check if inputs characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $username) || !preg_match("/^[a-zA-Z]*$/", $name)) {
      header("Location: ../index.php?signup=char");
      exit();
    } else {
      //Check if email is valid
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?signup=email&name=$name&surname=$surname&username=$username");
        exit();
      } else {
        header("Location: ../index.php?signup=success");
        exit();
      }
    }
  }
} else {
  header("Location: ../index.php");
  exit();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<?php
/////////////////////////////             HASHING AND DE-HASHING            /////////////////////////////////////////////////
echo "test123";
echo"<br>";
echo password_hash("test123", PASSWORD_DEFAULT);

$input = "test123";
$hashedPwdInDb = password_hash("test123", PASSWORD_DEFAULT);

//CHECK
echo password_verify($input, $hashedPwdInDb);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
    
</body>
</html>