<?php
include_once "dbconnection.php";

$positionCode = $_POST['positionCode'];
$prevPositionCode = $_POST['prevPositionCode'];
$positionDescription = $_POST['positionDescription'];


    $conn->query("UPDATE `position`
        SET 
            `positionCode` = '$positionCode',
            `positionDescription`='$positionDescription'
        WHERE `positionCode`='$prevPositionCode'");


if($conn->affected_rows == 1) {
    header("Location: mainPosition.php");
    exit();
} else {
    echo "No record updated!";
}
?>
<a href="main.php">Go back</a>
