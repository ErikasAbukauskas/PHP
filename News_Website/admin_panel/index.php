<?php
    include("../includes/connection.php");
    include("../includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar -->
    <div class="div container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-primary bg-black">
            <div class="div container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <!-- <a href="" class="nav-link">Welcom guest</a> -->
                    <button><a href="../index.php" class="nav-link text-light bg-danger">Logout</a></button>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-primary p-1 d-flex">
                <div>
                    <a href="#"><img src="../images/admin.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center margin-top">Admin name</p>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12 p-1 d-flex">
                <div class="button text-centre">
                    <button><a href="index.php?insert_category" class="nav-link text-black bg-success my-1">Insert Categories</a></button>
                    <button><a href="index.php?insert_product" class="nav-link text-black bg-success my-1">Insert Products</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-dark my-1">View Categories</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-dark my-1">View Products</a></button>
                    <button><a href="index.php?view_comments" class="nav-link text-light bg-dark my-1">View Comments</a></button>
                </div>
            </div>
        </div>
    <div class="container my-3 d-flex">
        <?php

            if(isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }

            if(isset($_GET['insert_product'])) {
                include('insert_products.php');
            }

        ?>
    </div>
    <?php
    if(isset($_GET['view_products'])) {
        include('view_products.php');
    }
    if(isset($_GET['edit_product'])) {
        include('edit_products.php');
    }
    if(isset($_GET['delete_product'])) {
        include('delete_products.php');
    }


    if(isset($_GET['view_categories'])) {
        include('view_categories.php');
    }
    if(isset($_GET['edit_category'])) {
        include('edit_category.php');
    }
    if(isset($_GET['delete_category'])) {
        include('delete_categories.php');
    }


    if(isset($_GET['view_comments'])) {
        include('view_comments.php');
    }
    if(isset($_GET['delete_comment'])) {
        include('delete_comments.php');
    }
    ?>
    <!-- last child -->
    <!-- <?php
      include("../includes/footer.php");
    ?> -->
    
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
 crossorigin="anonymous"></script>
</body>
</html>