<?php
include_once "dbconnection.php";

$username = $_POST['username'];
$prevUsername = $_POST['prevUsername'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$jerseyNo = $_POST['jerseyNo'];
$position = $_POST['position'];
$col_off = $_POST['college'];


if(isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK){
   
    $fileName = basename($_FILES['profilePicture']['name']);
    $targetFile = $fileName;

    
    if(move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetFile)){

        $conn->query("UPDATE `account`
            SET 
                `username` = '$username',
                `password`='$password',
                `email`='$email',
                `firstname`='$firstName',
                `lastname`='$lastName',
                `jerseyNo`='$jerseyNo',
                `position`='$position',
                `college`='$col_off',
                `profilePicture`='$targetFile'
            WHERE `username`='$prevUsername'");
    } else {
        echo "Error uploading file.";
        exit();
    }
} else {

    $conn->query("UPDATE `account`
        SET 
            `username` = '$username',
            `password`='$password',
            `email`='$email',
            `firstname`='$firstName',
            `lastname`='$lastName',
            `jerseyNo`='$jerseyNo',
            `position`='$position',
            `college`='$col_off'
        WHERE `username`='$prevUsername'");
}

if($conn->affected_rows == 1) {
    header("Location: main.php");
    exit();
} else {
    echo "No record updated!";
}
?>
<a href="main.php">Go back</a>
