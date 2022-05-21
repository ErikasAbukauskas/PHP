<?php

$conn=new mysqli('localhost', 'root', '', 'crud1');

if(!$conn){
    die(mysqli_error($conn));
}
?>