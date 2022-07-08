<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        $deleteProducts = new User();
        $deleteProducts->deleteProducts($delete_id);
    }
?>