<?php

class User extends Dbh {
    
    public function sameCategory($category_title) {
        $sql = "SELECT * FROM categories WHERE category_title='$category_title'";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        return $numRows;
    }

    public function insertCategory($category_title) {
        $sql = "INSERT INTO `categories`(category_title, category_date) VALUES ('$category_title', NOW())";
        $result=$this->connection()->query($sql);
    }

    public function selectCategory() {
        $sql = "SELECT * FROM categories ORDER BY `category_title` ASC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_categories=$result->fetch_assoc()) {
                $category_id = $row_categories["category_id"];
                $category_title = $row_categories["category_title"];

                echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-dark'><h6>$category_title</h6></a></li>";
            }
        }
    }

    public function selectCategoryOptions() {
        $sql = "SELECT * FROM categories WHERE 1";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_categories=$result->fetch_assoc()) {
                $category_id = $row_categories["category_id"];
                $category_title = $row_categories["category_title"];

                echo "<option value='$category_id'>$category_title</option>";
            }
        }
    }

    public function insertProducts($product_title, $product_description, $product_category_id, $product_image1) {
        $sql = "INSERT INTO `products`(product_title, product_description, product_category_id, product_image1, product_date) 
        VALUES ('$product_title', '$product_description', '$product_category_id', '$product_image1', NOW() )";
        $result = $this->connection()->query($sql);

        if($result) {
            echo "<script>alert('The Product successfully inserted')</script>";
        }
    }

    public function selectProducts() {
        $sql = "SELECT * FROM products ORDER BY `product_date` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_products=$result->fetch_assoc()) {
                $product_id = $row_products["product_id"];
                $product_title = $row_products["product_title"];
                $product_description = $row_products["product_description"];
                $product_category_id = $row_products["product_category_id"];
                $product_image1 = $row_products["product_image1"];
                $product_date = $row_products["product_date"];
        
              echo "<div class='col-md-4 mb-2 p-5'>
                        <div class='card'>
                            <img src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                               <h3 class='card-title text-center'>$product_title</h3>
                                <p class='hidde-text card-text'>$product_description</p>
                                <a href='index.php?category=$product_category_id' class='nav-link text-dark'><h6>$product_category_id</h6></a>
                                <p class='card-text'>Date: $product_date</p>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Read full news</a>
                            </div>
                        </div>
                    </div>";
            
        
    }
        }
    }


    public function select_unice_category($category_id) {
        $sql = "SELECT * FROM products WHERE product_category_id = $category_id ORDER BY `product_date` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows == 0) {
            echo "<h2 class='text-center text-danger'>Category is empty</h2>";
        }
        while($row_products=$result->fetch_assoc()) {
            $product_id = $row_products["product_id"];
            $product_title = $row_products["product_title"];
            $product_description = $row_products["product_description"];
            $product_category_id = $row_products["product_category_id"];
            $product_image1 = $row_products["product_image1"];
            $product_date = $row_products["product_date"];

            echo "<div class='col-md-4 mb-2 p-5'>
                    <div class='card'>
                      <img src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                      <div class='card-body'>
                      <h3 class='card-title text-center'>$product_title</h3>
                        <p class='hidde-text card-text'>$product_description</p>
                        <p class='card-text'>Date: $product_date</p>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Read full news</a>
                      </div>
                    </div>
                  </div>";
        }
    }

    public function search($search) {
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$search%' ORDER BY `product_date` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows == 0) {
            echo "<h2 class='text-center text-danger'>Result of searching not found...</h2>";
        }
        while($row_products=$result->fetch_assoc()) {
            $product_id = $row_products["product_id"];
            $product_title = $row_products["product_title"];
            $product_description = $row_products["product_description"];
            $product_category_id = $row_products["product_category_id"];
            $product_image1 = $row_products["product_image1"];
            $product_date = $row_products["product_date"];

            echo "<div class='col-md-4 mb-2 p-5'>
                    <div class='card'>
                        <img src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h3 class='card-title text-center'>$product_title</h3>
                            <p class='hidde-text card-text'>$product_description</p>
                            <p class='card-text'>Date: $product_date</p>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Read full news</a>
                        </div>
                    </div>
                    </div>";
        }
        
    }

    public function view_details($product_id) {
        $sql = "SELECT * FROM products WHERE product_id='$product_id'";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_products=$result->fetch_assoc()) {
                $product_id = $row_products["product_id"];
                $product_title = $row_products["product_title"];
                $product_description = $row_products["product_description"];
                $product_category_id = $row_products["product_category_id"];
                $product_image1 = $row_products["product_image1"];
                $product_date = $row_products["product_date"];

            echo "<div class='col-md-11 p-5'>
                        <div class='card'>
                            <img src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h3 class='card-title text-center'>$product_title</h3>
                                <p class='card-text'>$product_description</p>
                                <div class='img-flex'>
                                <img class='img p-1' src='./admin_panel/product_images/$product_image1' class='card-img-top'>
                                <img class='img p-1' src='./admin_panel/product_images/$product_image1' class='card-img-top'>
                                <img class='img p-1' src='./admin_panel/product_images/$product_image1' class='card-img-top'>
                                <img class='img p-1' src='./admin_panel/product_images/$product_image1' class='card-img-top'>
                                </div>
                                <p class='card-text'>$product_description</p>
                                <p class=' card-text'>Date: $product_date</p>
                                <a href='index.php' class='btn btn-secondary'>Home page</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    public function viewProducts() {
        $sql = "SELECT * FROM products ORDER BY `product_id` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_products=$result->fetch_assoc()) {
                $product_id = $row_products["product_id"];
                $product_title = $row_products["product_title"];
                $product_description = $row_products["product_description"];
                $product_category_id = $row_products["product_category_id"];
                $product_date = $row_products["product_date"];
                
                echo "<tr class='text-center'>
                <td>$product_id</td>
                <td>$product_title</td>
             
                <td>$product_category_id</td>
                <td>$product_date</td>
                <td><a href='index.php?edit_product=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";

            }
        }
    }

    public function editProducts($edit_id){
        $sql = "SELECT * FROM products WHERE product_id='$edit_id'";
        $result = $this->connection()->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }
    }


    public function selectCategorysOptions() {
        $sql = "SELECT * FROM categories WHERE 1";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_categories=$result->fetch_assoc()) {
                $category_id = $row_categories["category_id"];
                $category_title = $row_categories["category_title"];

                echo "<option value='$category_id'>$category_title</option>";
            }
        }
    }

    public function updateProducts($product_title, $product_description, $product_category_id, $product_image1, $edit_id) {
        $sql = "UPDATE `products` SET product_title='$product_title', product_description='$product_description', product_category_id='$product_category_id', product_image1='$product_image1', product_date=NOW() WHERE product_id='$edit_id'";
        $result = $this->connection()->query($sql);
        if($result){
            echo "<script>alert('Product update successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }

    public function deleteProducts($delete_id){
        $sql = "DELETE FROM `products` WHERE product_id='$delete_id'";
        $result = $this->connection()->query($sql);
        if($result) {
            echo "<script>alert('Product delete successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }


    public function viewCategories() {
        $sql = "SELECT * FROM categories ORDER BY `category_id` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_category=$result->fetch_assoc()) {
                $category_id = $row_category["category_id"];
                $category_title = $row_category["category_title"];
                $category_date = $row_category["category_date"];
                
                echo "<tr class='text-center'>
                <td>$category_id</td>
                <td>$category_title</td>
                <td>$category_date</td>
                <td><a href='index.php?edit_category=$category_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=$category_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";

            }
        }
    }

    public function editCategories($edit_category){
        $sql = "SELECT * FROM categories WHERE category_id='$edit_category'";
        $result = $this->connection()->query($sql);
        if($result->num_rows>0){
            $row_category=$result->fetch_assoc();
            return $row_category;
        }
    }

    public function updateCategories($category_title, $edit_category) {
        $sql = "UPDATE `categories` SET category_title='$category_title', category_date=NOW() WHERE category_id='$edit_category'";
        $result = $this->connection()->query($sql);
        if($result){
            echo "<script>alert('Category update successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }

    public function deleteCategories($delete_category){
        $sql = "DELETE FROM `categories` WHERE category_id='$delete_category'";
        $result = $this->connection()->query($sql);
        if($result) {
            echo "<script>alert('Category delete successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }

    public function insertComments($email, $comment) {
        $sql = "INSERT INTO `comments`(email, comment, comment_date) 
        VALUES ('$email', '$comment', NOW() )";
        $result = $this->connection()->query($sql);

        if($result) {
            $sql = "SELECT * FROM products WHERE 1";
            $result = $this->connection()->query($sql);
            $numRows = $result->num_rows;
            if($numRows > 0) {
            while($row_products=$result->fetch_assoc()) {
                $product_id = $row_products["product_id"];
                echo "<script>alert('The Comment successfully inserted')</script>";
                echo "<script>window.open('./product_details.php?product_id=$product_id','_self')</script>";
            }
        }
        }
    }

    public function fetchComments() {
        $sql = "SELECT * FROM comments ORDER BY `comment_id` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_comment=$result->fetch_assoc()) {
                $comment_id = $row_comment["comment_id"];
                $email = $row_comment["email"];
                $comment = $row_comment["comment"];
                $comment_date = $row_comment["comment_date"];


                echo "<div class='col-md-11 p-5'>
                <div class='card'>
                    <div class='card-body'>
                        <h3 class='card-title'>$email</h3>
                        <p class='card-text'>$comment</p>
                        <p class=' card-text'>Date: $comment_date</p>
                    </div>
                </div>
            </div>";

               
            }
        }
    }

    public function viewComments() {
        $sql = "SELECT * FROM comments ORDER BY `comment_id` DESC";
        $result = $this->connection()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0) {
            while($row_comment=$result->fetch_assoc()) {
                $comment_id = $row_comment["comment_id"];
                $email = $row_comment["email"];
                $comment = $row_comment["comment"];
                $comment_date = $row_comment["comment_date"];
                
                echo "<tr class='text-center'>
                <td>$comment_id</td>
                <td>$email</td>
                <td>$comment</td>
                <td>$comment_date</td>
                <td><a href='index.php?delete_comment=$comment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";

            }
        }
    }

    public function deleteComments($delete_id){
        $sql = "DELETE FROM `comments` WHERE comment_id='$delete_id'";
        $result = $this->connection()->query($sql);
        if($result) {
            echo "<script>alert('Comment delete successfully')</script>";
            echo "<script>window.open('./index.php?view_comments','_self')</script>";
        }
    }

}
?>