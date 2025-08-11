<?php include_once "database_conn.php"; ?>

<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$section = $_POST['section'];
$password = $_POST['password'];

$parts = explode('/', $section);

$program_id = trim($parts[0]);
$section_id = trim($parts[1]);


// add user
$sqlAddUser = "INSERT INTO user (`password`, `role`) VALUES ('$password', 'ROLE-0001')";
$stmt1 = $conn->prepare($sqlAddUser);

if ($stmt1->execute()) {
	// find the latest user which is this student
	$sqlFindUser = "SELECT user_id FROM `user` ORDER BY user_id DESC LIMIT 1";

	$result1 = $conn->query($sqlFindUser);
	$userValue = $result1->fetch_assoc();
	$latestUserID = $userValue['user_id'];

	// add student
	$sqlAddStudent = "INSERT INTO student (`user_id`, `first_name`, `last_name`, `student_sex`, `age`) VALUES ('$latestUserID', '$firstName', '$lastName', '$gender', '$age')";

	$stmt2 = $conn->prepare($sqlAddStudent);

	if ($stmt2->execute()) {

		// find the latest student-ID which is this student
		$query = "SELECT student_id FROM `student` ORDER BY student_id DESC LIMIT 1;";
		$result = $conn->query($query);
		$resultValue = $result->fetch_assoc();

		$studentID = $resultValue['student_id'];

		// add student section in student_section
		$sqlSection = "INSERT INTO student_section (`student_id`, `section_id`, `program_id`) VALUES ('$studentID', '$section_id', '$program_id')";

		$stmt3 = $conn->prepare($sqlSection);
		if ($stmt3->execute()) {
			echo "<a href='login.html'><button class='btn btn_back'>Go Back</button></a>
			<div class='confirm-div'>
				<p class='title-text'>You're all set! Account created.</p>
			";

			echo "<p class='studentID-text'>Student ID: <span>$studentID</span></p>
		<p class='note-text'>Note: Please remember your student ID as you log in.</p></div>";
		} else {
			echo "<script>alert('Error adding account: " . $conn->error . "');</script>";
		}
	} else {
		echo "<script>alert('Error adding account: " . $conn->error . "');</script>";
	}
} else {
	echo "<script>alert('Error adding account: " . $conn->error . "');</script>";
}










//you have to insert a user with the role and the password
//This is the query for it
//INSERT INTO `user`(`password`, `role`) VALUES (?,?);




// $stmt->close();
// $conn->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome!</title>
	<link rel="stylesheet" href="css/general.css" />
	<link rel="stylesheet" href="css/signUp.css" />
</head>

<body>

</body>

</html>