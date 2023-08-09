<?php

$con = new mysqli('127.0.0.1', 'root', '', 'myfirstdatabase'); // Replace 'mydatabase' with your actual database name

if($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}
?>
