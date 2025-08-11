<?php
include_once "dbconnection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$jerseyNo = $_POST['jerseyNo'];
$position = $_POST['position'];
$college = $_POST['college'];

$profilePicture = basename($_FILES['profilePicture']['name']);
move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profilePicture);

$res = $conn->query("INSERT INTO account 
    (username, password, email, firstname, lastname, jerseyNo, profilePicture, position, college) 
    VALUES ('$username','$password','$email','$firstName','$lastName','$jerseyNo','$profilePicture','$position','$college')");


if($res) {
    header("Location: main.php");
    exit();
} else {
    echo $conn->error;
}
?>
 <a href="main.php">Go back</a>