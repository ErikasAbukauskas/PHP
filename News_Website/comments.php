<form action="product_details.php" method="POST" enctype="multipart/form-data">
        <div class="container">
          <div class="form-outline w-50 mb-4">
            <label for="email" class="form">Email:</label>
            <input type="email" name="email" id="email" class="form-control" 
            placeholder="Enter Email" autocomplete="off" required>
          </div>
          <div class="form-outline w-50 mb-4">
            <label for="comment" class="form-label">Comment:</label>
            <textarea type="text" name="comment" id="comment" class="form-control" 
            placeholder="Enter comment" autocomplete="off" required></textarea>
            <button type="submit" class="btn btn-primary bg-dark" name="submit">Comment</button>
            <!-- <button type="submit"><a href="product_details.php?product_id=" class="btn btn-primary bg-dark" name="submit">Comment</a></button> -->
            </div>
        </div>
        </form>
        <?php

if(isset($_POST['submit'])) {
  if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['comment']) && !empty($_POST['comment'])) {
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $insertComments = new User();
    $insertComments->insertComments($email, $comment);

    }
  }
  ?>

  <?php
  $fetchComments = new User();
  $fetchComments->fetchComments($product_id);
  ?>
</div>