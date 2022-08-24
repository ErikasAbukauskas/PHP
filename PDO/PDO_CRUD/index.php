<?php
    include('./includes/class-autoload.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="text-center">
        <!-- Button trigger modal -->
        <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
            Created Post
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- form input  -->
            <form action="post.process.php" method="POST">
                <div class="form-group">
                    <label>Title: </label>
                    <input class="form-control" name="post_title" type="text" required>
                </div>
                <div class="form-group">
                    <label>Content: </label>
                    <textarea class="form-control" name="post_content" type="text" required></textarea>
                </div>
                <div class="form-group">
                    <label>Author: </label>
                    <input class="form-control" name="post_author" type="text" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <div class="row">
        <?php $posts = new Posts();  ?>
        <?php if($posts->getPost()) : ?>
            <?php foreach($posts->getPost() as $post) : ?>
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title']; ?></h5>
                            <p class="card-text"><?= $post['body']; ?></p>
                            <h6 class="card-subtitle text-muted text-right">Author: <?= $post['author']; ?></h6>
                            <a href="editForm.php?id=<?=$post['id']?>" class="btn btn-warning">Edit</a>
                            <a href="post.process.php?id=<?=$post['id']?>" class="btn btn-danger">Delete</a>
                            <!-- <a href="post.process.php?id=<?=$post['id']?>&aaa=del" class="btn btn-danger">Delete</a> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center mt-5">Post is empty</p>
        <?php endif; ?>
                
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>