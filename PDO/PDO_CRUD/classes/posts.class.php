<?php

class Posts extends Dbh {

    public function getPost() {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }

        $conn = null;
    }

    public function addPost($title, $body, $author) {
        $sql = "INSERT INTO posts(title, body, author) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $body);
        $stmt->bindParam(3, $author);
        $stmt->execute([$title, $body, $author]);

        $conn = null;
    }

    
    // public function addPost($title, $body, $author) {
    //     $sql = "INSERT INTO posts(title, body, author) VALUES(?, ?, ?)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->bindParam(1, $title);
    //     $stmt->bindParam(2, $body);
    //     $stmt->bindParam(3, $author);
    //     $stmt->execute();

    //     header("location: {$_SERVER['HTTP_REFERER']}");

    //     $conn = null;
    // }

    // public function addPost($title, $body, $author) {
    //     $sql = "INSERT INTO posts(title, body, author) VALUES(:post_title, :post_content, :post_author)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->bindParam(':post_title', $title);
    //     $stmt->bindParam(':post_content', $body);
    //     $stmt->bindParam(':post_author', $author);
    //     $stmt->execute([$title, $body, $author]);

    //     header("location: {$_SERVER['HTTP_REFERER']}");

    //     $conn = null;
    // }

    // public function addPost($title, $body, $author) {
    //     $sql = "INSERT INTO posts(title, body, author) VALUES(:post_title, :post_content, :post_author)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->bindParam(':post_title', $title);
    //     $stmt->bindParam(':post_content', $body);
    //     $stmt->bindParam(':post_author', $author);
    //     $stmt->execute();

    //     header("location: {$_SERVER['HTTP_REFERER']}");

    //     $conn = null;
    // }


    public function editPost($id) {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;

        $conn = null;
    }

    public function updatePost($title, $body, $author, $id) {
        $sql = "UPDATE posts SET title = ?, body = ?, author = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $body);
        $stmt->bindParam(3, $author);
        $stmt->bindParam(4, $id);
        $stmt->execute([$title, $body, $author, $id]);

        $conn = null;
        
    }

    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute([$id]);

        $conn = null;
    }
}