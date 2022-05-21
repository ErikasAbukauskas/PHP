<?php
include 'connection.php';

if(isset($_POST['updateID'])) {
    $user_id=$_POST['updateID'];

    $sql="SELECT * FROM `crud` WHERE id=$user_id";
    $result=mysqli_query($conn,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)) {
        $response=$row;
    }
    echo json_encode($response);
} else {
    $response['status']=200;
    $response['message']="Invalid or data not found";
}

//update query
if(isset($_POST['hiddenData'])) {
    $uniqueID=$_POST['hiddenData'];
    $name=$_POST['updateName'];
    $email=$_POST['updateEmail'];
    $mobile=$_POST['updateMobile'];
    $place=$_POST['updatePlace'];

    $sql="UPDATE `crud` SET name='$name', email='$email', mobile='$mobile', place='$place' WHERE id=$uniqueID";
    $result=mysqli_query($conn,$sql);
}
?>