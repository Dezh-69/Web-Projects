<?php
include_once "dbconnection.php";

$positionCode = $_GET['positionCode'];

$conn->query("DELETE FROM position WHERE positionCode ='$positionCode'");

header("Location: mainPosition.php");
exit();
?>
