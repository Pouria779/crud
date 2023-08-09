<?php
include('connect.php');
include('user_Model.php'); // Include your UserModel class

$userModel = new UserModel($con); 

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Call the insertUser method from UserModel
    if($userModel->insertUser($name, $email, $mobile, $password)){
        echo "Data inserted successfully";
        header('Location: display.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>