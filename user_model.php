<?php
class UserModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertUser($name, $email, $mobile, $password) {
        $query = "INSERT INTO `crud` (name, email, mobile, password)
                  VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $mobile, $password);

        if(mysqli_stmt_execute($stmt)){
            return true;
        } else {
            return false;
        }

        mysqli_stmt_close($stmt);
    }
    public function getUserById($id) {
        $query = "SELECT * FROM `crud` WHERE id=?";
        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        return $row;
    }

    public function updateUser($id, $name, $email, $mobile, $password) {
        $query = "UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?";
        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $mobile, $password, $id); // Corrected order
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        return $success;
    }
    

    public function deleteUser($id) {
        $query = "DELETE FROM `crud` WHERE id = ?";
        
        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
        
        mysqli_stmt_close($stmt);
    }
}
?>
