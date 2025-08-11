<?php
include_once "dbconnection.php";

$eventCode = $_POST['eventCode'];
$eventDescription = $_POST['eventDescription'];


$res = $conn->query("INSERT INTO event
    (eventCode, eventDescription) 
    VALUES ('$eventCode','$eventDescription')");

if($res) {
    header("Location: mainEvent.php");
    exit();
} else {
    echo $conn->error;
}
?>
 <a href="main.php">Go back</a>