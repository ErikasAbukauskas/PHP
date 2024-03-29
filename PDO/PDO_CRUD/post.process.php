<?php
    include('./includes/class-autoload.inc.php');

    $posts = new Posts();

    if(isset($_POST['submit'])) {
        $title = $_POST['post_title'];
        $body = $_POST['post_content'];
        $author = $_POST['post_author'];

        $posts->addPost($title, $body, $author);

        header("location: {$_SERVER['HTTP_REFERER']}");

    } else if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['post_title'];
        $body = $_POST['post_content'];
        $author = $_POST['post_author'];

        $posts->updatePost($title, $body, $author, $id);

        header("location: {$_SERVER['HTTP_ORIGIN']}/pdo/pdo_crud");

    } else if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $posts->deletePost($id);

        header("location: {$_SERVER['HTTP_ORIGIN']}/pdo/pdo_crud");
    }
    // else if(($_GET['send']) === 'del') {
    //     $id = $_GET['id'];

    //     $posts->deletePost($id);

    //     header("location: {$_SERVER['HTTP_ORIGIN']}/pdo/pdo_crud");
    // }
