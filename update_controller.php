<?php

include('connect.php');
include('user_Model.php'); // Include your UserModel class
$userModel = new UserModel($con); 
$id = $_GET['updateid'];

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Call the insertUser method from UserModel
    if($userModel->updateUser($id,$name, $email, $mobile, $password)){
        echo "Data Updated successfully";
       header('location:display.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>