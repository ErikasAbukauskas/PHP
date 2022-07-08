
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary text-black bg-success" data-bs-toggle="modal" data-bs-target="#insertProduct">Insert Product</button>

<!-- Modal -->
<div class="modal fade" id="insertProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container">
                <!-- Title -->
                <div class="form-outline mb-4">
                  <label for="product_title" class="form-label">Product title</label>
                  <input type="text" name="product_title" id="product_title" class="form-control" 
                  placeholder="Enter product title" autocomplete="off" required>
                </div>

                <!-- Description -->
                <div class="form-outline mb-4">
                  <label for="product_description" class="form-label">Product description</label>
                  <textarea type="text" rows="10" name="product_description" id="product_description" class="form-control" 
                  placeholder="Enter product description" autocomplete="off" required></textarea>
                </div>

                <!-- Categories -->
                <div class="form-outline mb-4">
                  <label for="product_category_id" class="form-label">Option of Categories</label>
                  <select name="product_category_id" id="" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php $selectCategoryOptions = new User(); $selectCategoryOptions->selectCategoryOptions();?>
                  </select>
                </div>

                <!-- Product image 1 -->
                <div class="form-outline mb-4">
                  <label for="product_image1" class="form-label">Product image 1</label>
                  <input type="file" name="product_image1" id="product_image1" class="form-control" 
                  required>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary bg-dark" name="submit">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
    

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
 crossorigin="anonymous"></script>
</body>
</html>

<?php 
if(isset($_POST['submit'])) {
  if(isset($_POST['product_title']) && !empty($_POST['product_title']) && isset($_POST['product_description']) && !empty($_POST['product_description']) 
    && isset($_POST['product_category_id']) && !empty($_POST['product_category_id']) && isset($_FILES['product_image1']) && !empty($_FILES['product_image1'])) {

    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_category_id = $_POST['product_category_id'];
    
    //images
    $product_image1 = $_FILES['product_image1']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];

    move_uploaded_file($temp_image1, "./product_images/$product_image1");

    $insertProducts = new User();
    $insertProducts->insertProducts($product_title, $product_description, $product_category_id, $product_image1);

  } else {

    echo "<script>alert('Please fill all the available fields')</script>";
    exit();

  }
  
}

?>