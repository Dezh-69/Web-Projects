<?php
include_once "dbconnection.php";

$positionCode = $_POST['positionCode'];
$positionDescription = $_POST['positionDescription'];


$res = $conn->query("INSERT INTO position
    (positionCode, positionDescription) 
    VALUES ('$positionCode','$positionDescription')");

if($res) {
    header("Location: mainPosition.php");
    exit();
} else {
    echo $conn->error;
}
?>
 <a href="main.php">Go back</a>