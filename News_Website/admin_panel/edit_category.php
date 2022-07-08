<?php 
  if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $editCategories = new User();
    $row_category=$editCategories->editCategories($edit_category);
  }
  ?>
  <div class="container mt-5">
  <h1 class="text-center">Edit Category</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto mb-4">
      <label for="category_title" class="form-label">Category Title</label>
      <input type="text" id="category_title" value=<?php echo $row_category['category_title']; ?> name="category_title" class="form-control" required="required">
    </div>
    <div class="w-50 m-auto">
      <button type="submit" class="btn btn-primary bg-dark px-3 mb-3" name="submit_category">Update Category</button>
    </div>
  </form>
</div>

<?php
if(isset($_POST['submit_category'])) {
  if(isset($_POST['category_title']) && !empty($_POST['category_title'])) {
      $category_title=$_POST['category_title'];

      $updateCategories = new User();
      $updateCategories->updateCategories($category_title, $edit_category);
      
  } else {
    echo "<script>alert('Please fill all the fields and continue the process')</script>";
  }
}

?>