<?php
    include('./includes/class-autoload.inc.php');

    $posts = new Posts();
    $post = $posts->editPost($_GET['id']);
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $author = $post['author'];
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
    <div class="text-center my-4">
        <h3>Edit Post</h3>
    </div>
    <div class="row">
        <div class="col-md-7 mx-auto">
        <form action="post.process.php?id=<?= $id; ?>" method="POST">
                <div class="form-group my-4">
                    <label>Title: </label>
                    <input class="form-control" name="post_title" type="text" value="<?= $title; ?>" required>
                </div>
                <div class="form-group my-4">
                    <label>Content: </label>
                    <textarea class="form-control" name="post_content" type="text" required><?= $body; ?></textarea>
                </div>
                <div class="form-group my-4">
                    <label>Author: </label>
                    <input class="form-control" name="post_author" type="text" value="<?= $author; ?>" required>
                </div>
                <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" name="update" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>