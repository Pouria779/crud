<?php include 'connect.php';
include('connect.php');
include('user_Model.php'); // Include your UserModel class
$userModel = new UserModel($con);

if(isset($_GET['deleteid'])){

$id= $_GET['deleteid'];
if($userModel->deleteUser($id)){
    echo "Data deleted successfully";
    header('Location: display.php');
} else {
    echo "Error: " . mysqli_error($con);
}
}


?>