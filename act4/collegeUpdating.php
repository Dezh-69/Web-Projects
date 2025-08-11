<?php
include_once "dbconnection.php";

$collegeCode = $_POST['collegeCode'];
$prevCollegeCode = $_POST['prevCollegeCode'];
$collegeDescription = $_POST['collegeDescription'];


    $conn->query("UPDATE `college`
        SET 
            `collegeCode` = '$collegeCode',
            `collegeDescription`='$collegeDescription'
        WHERE `collegeCode`='$prevCollegeCode'");


if($conn->affected_rows == 1) {
    header("Location: mainCollege.php");
    exit();
} else {
    echo "No record updated!";
}
?>
<a href="main.php">Go back</a>
