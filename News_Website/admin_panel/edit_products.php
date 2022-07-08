<?php 
  if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $editProducts = new User();
    $row=$editProducts->editProducts($edit_id);
  }
?>
<div class="container mt-5">
  <h1 class="text-center">Edit Product</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_title" class="form-label">Product Title</label>
      <input type="text" id="product_title" value=<?php echo $row['product_title']; ?> name="product_title" class="form-control" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_description" class="form-label">Product Description</label>
      <textarea type="text" rows="10" name="product_description" id="product_description" class="form-control" 
      required="required"><?php echo $row['product_description'];?></textarea>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_category_id" class="form-label">Product Categories</label>
      <select name="product_category_id" class="form-select">
      <?php
      $selectCategorysOptions = new User();
      $selectCategorysOptions->selectCategorysOptions();
      ?>
      </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_image1" class="form-label">Product Image</label>
      <div class="d-flex">
        <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
        <img src="./product_images/<?php echo $row['product_image1'];?>" alt="" class="product_img">
      </div>
    </div>
    <div class="w-50 m-auto">
      <button type="submit" class="btn btn-primary bg-dark px-3 mb-3" name="edit_news">Update News</button>
    </div>
  </form>
</div>

<?php
if(isset($_POST['edit_news'])) {
  if(isset($_POST['product_title']) && !empty($_POST['product_title']) && isset($_POST['product_description']) && !empty($_POST['product_description']) 
    && isset($_POST['product_category_id']) && !empty($_POST['product_category_id']) && isset($_FILES['product_image1']) && !empty($_FILES['product_image1'])) {
      $product_title=$_POST['product_title'];
      $product_description=$_POST['product_description'];
      $product_category_id=$_POST['product_category_id'];
    
      $product_image1=$_FILES['product_image1']['name'];
    
      $temp_image1=$_FILES['product_image1']['tmp_name'];
      
      move_uploaded_file($temp_image1,"./product_images/$product_image1");

      $updateProducts = new User();
      $updateProducts->updateProducts($product_title, $product_description, $product_category_id, $product_image1, $edit_id);
      
  } else {
    echo "<script>alert('Please fill all the fields and continue the process')</script>";
  }
}
?>