<?php
include_once "dbconnection.php";

$eventCode = $_POST['eventCode'];
$prevEventCode = $_POST['prevEventCode'];
$eventDescription = $_POST['eventDescription'];


    $conn->query("UPDATE `event`
        SET 
            `eventCode` = '$eventCode',
            `eventDescription`='$eventDescription'
        WHERE `eventCode`='$prevEventCode'");


if($conn->affected_rows == 1) {
    header("Location: mainEvent.php");
    exit();
} else {
    echo "No record updated!";
}
?>
<a href="main.php">Go back</a>
