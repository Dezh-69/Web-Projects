<?php include_once "database_conn.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$teacherIDVal = $_POST['teacherID'];
	$passwordVal = $_POST['password'];




	$stmt1 = $conn->prepare("SELECT * FROM teacher t JOIN user u ON t.user_id = u.user_id WHERE teacher_id = ? AND password = ?");
	$stmt1->bind_param("ss", $teacherIDVal, $passwordVal);
	$stmt1->execute();
	$result1 = $stmt1->get_result();

	$stmt2 = $conn->prepare("SELECT teacher_id FROM teacher WHERE teacher_id = ?");
	$stmt2->bind_param("s", $teacherIDVal);
	$stmt2->execute();
	$result2 = $stmt2->get_result();

	if ($result1->num_rows > 0) {
		echo "success";
	} else if ($result2->num_rows > 0) {
		echo "notMatch";
	} else {
		echo "invalid";
	}




	$stmt1->close();
	$stmt2->close();
	$conn->close();
}
?>