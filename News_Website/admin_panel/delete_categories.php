<?php
    if(isset($_GET['delete_category'])){
        $delete_category=$_GET['delete_category'];
        $deleteCategories = new User();
        $deleteCategories->deleteCategories($delete_category);
    }
?>