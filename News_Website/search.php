<?php
    include("includes/connection.php");
    include("includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-primary bg-black">
  <div class="container-fluid">
      <!-- LOGO -->
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><h6>Home</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><h6>Register</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><h6>Contact</h6></a>
        </li>
      </ul>
      <!-- SEARCH -->
      <form class="d-flex" action="" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit" name="search_product" value="Search">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <ul class="navbar-nav me-auto">
    <li class="nav-item">
      <a class="nav-link text-black" href="#"><h6>Welcome Guest</h6></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-black" href="#"><h6>Login</h6></a>
    </li>
  </ul>
  <button><a href="admin_panel/index.php" class="nav-link text-light bg-danger">Admin Panel</a></button>
</nav>

<!-- third child -->
<div class="bg-light">
  <a class="nav-link active bg-secondary text-center p-4" aria-current="page" href="index.php"><h1>News Website</h1></a>
</div>

<!-- fourth cild -->
<div class="row">
  <!-- sidebar -->
  <div class="col-md-1 bg-secondary p-0">

    <!-- Categories -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-black">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php 
        $selectCategory = new User();
        $selectCategory->selectCategory();
      ?>
    </ul>
  </div>
  <!-- products -->
  <div class="col-md-10">
    <div class="row">
        <?php
            if(isset($_GET['search_product'])) {
                $search = $_GET['search'];
                $selectProducts = new User();
                $selectProducts->search($search);
            }
        ?>
    </div>
  </div>
</div>


    <!-- last child -->
    <div class="bg-dark p-3 text-center text-white"> 
        <p>All rignts reserved</p>
    </div>
</div>
    


 <!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
 crossorigin="anonymous"></script>
</body>
</html>
