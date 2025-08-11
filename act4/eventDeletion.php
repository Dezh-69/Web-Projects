<?php
include_once "dbconnection.php";

$eventCode = $_GET['eventCode'];

$conn->query("DELETE FROM event WHERE eventCode='$eventCode'");

header("Location: mainEvent.php");
exit();
?>
