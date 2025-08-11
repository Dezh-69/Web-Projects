<?php
include_once "dbconnection.php";

$collegeCode = $_POST['collegeCode'];
$collegeDescription = $_POST['collgeDescription'];


$res = $conn->query("INSERT INTO college
    (collegeCode, collegeDescription) 
    VALUES ('$collegeCode','$collegeDescription')");

if($res) {
    header("Location: mainCollege.php");
    exit();
} else {
    echo $conn->error;
}
?>
 <a href="main.php">Go back</a>