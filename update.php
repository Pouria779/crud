<?php
// include('connect.php'); // Include your database connection file

// $id = $_GET['updateid'];

// // Fetch the existing data for the specified ID
// $query = "SELECT * FROM `crud` WHERE id=?";
// $stmt = mysqli_prepare($con, $query);
// mysqli_stmt_bind_param($stmt, "i", $id);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_assoc($result);

// // Close the statement
// mysqli_stmt_close($stmt);

// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $mobile = $_POST['mobile'];
//     $password = $_POST['password'];

//     // Make sure to use prepared statements to prevent SQL injection
//     $updateQuery = "UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?";

//     $stmt = mysqli_prepare($con, $updateQuery);
//     mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $mobile, $password, $id);

//     if(mysqli_stmt_execute($stmt)){
//         echo "Data updated successfully";
//         header('location: display.php'); // Redirect after successful update
//     } else {
//         echo "Error: " . mysqli_error($con);
//     }

//     mysqli_stmt_close($stmt);
// }

// mysqli_close($con);
// ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD Operation</title>
</head>
<body>
    <div class="container">
    <?php
        // Include necessary files and create objects
        include('connect.php');
        include('User_model.php');
        $userModel = new UserModel($con);

        // Get the ID from the URL parameter
        $id = $_GET['updateid'];

        // Fetch existing data for the specified ID
        $userData = $userModel->getUserById($id);
        ?>
        <h1>Edit User</h1>
        <form method="post" action="update_controller.php?updateid=<?php echo $id; ?>">
            <div class="my-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $userData['mobile']; ?>" aria-describedby="mobile">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" value="<?php echo $userData['password']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
