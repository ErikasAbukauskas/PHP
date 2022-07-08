<?php
    if(isset($_GET['delete_comment'])){
        $delete_id=$_GET['delete_comment'];
        $deleteComments = new User();
        $deleteComments->deleteComments($delete_id);
    }
?>