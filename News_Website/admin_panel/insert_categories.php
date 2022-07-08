
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

    <!-- bootstrap CSS link -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary text-black bg-success" data-bs-toggle="modal" data-bs-target="#insertCategory">Insert Categories</button>

<!-- Modal -->
<div class="modal fade" id="insertCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creat new category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="" method="POST" class="mb-2">
            <div class="modal-body">
                <div class="container">
                    <div class="input-group w-90 mb-2 input-width">
                        <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
                        <input type="text" class="form-control" name="category_title" placeholder="Insert new category" aria-label="categories" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary bg-dark" name="submit">Insert Category</button>
                </div>
        </form>
    </div>
  </div>
</div>
    
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    if(isset($_POST['category_title']) && !empty($_POST['category_title'])) {
        $category_title=$_POST['category_title'];
        $insertCategory = new User();
        $numRows = $insertCategory->sameCategory($category_title);
        if($numRows > 0) {
            echo "<script>alert('This category all redy exists!')</script>";
        } else {
            $insertCategory->insertCategory($category_title);
            echo "<script>alert('Category has been inserted successfully!')</script>";
        }
    }   
}
?>