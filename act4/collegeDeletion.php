<?php
include_once "dbconnection.php";

$collegeCode = $_GET['collegeCode'];

$conn->query("DELETE FROM college WHERE collegeCode='$collegeCode'");

header("Location: mainCollege.php");
exit();
?>
