<?php
include_once "dbconnection.php";

$username = $_GET['username'];

$conn->query("DELETE FROM account WHERE username='$username'");

header("Location: main.php");
exit();
?>
