<?php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'student_health';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$section = isset($_GET['section']) ? $conn->real_escape_string($_GET['section']) : '';
$start_date = isset($_GET['start_date']) ? $conn->real_escape_string($_GET['start_date']) : '2025-01-01';
$end_date = isset($_GET['end_date']) ? $conn->real_escape_string($_GET['end_date']) : '2025-12-31';
$test_type = isset($_GET['test_type']) ? $conn->real_escape_string($_GET['test_type']) : '';

$avg_pre_bmi = $avg_post_bmi = 0;
$avg_pre_vo2 = $avg_post_vo2 = 0;

if (!empty($test_type)) {

    $sql = "
        SELECT AVG(ft.body_mass_index) AS avg_bmi,
               AVG(ft.max_volume_of_oxygen) AS avg_vo2
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        AND ft.`test-type` = '$test_type'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");

    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_pre_bmi = round($row['avg_bmi'] ?? 0, 2);
        $avg_pre_vo2 = round($row['avg_vo2'] ?? 0, 2);
    }
} else {
 
    $sql_pre = "
        SELECT AVG(ft.body_mass_index) AS avg_bmi,
               AVG(ft.max_volume_of_oxygen) AS avg_vo2
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        AND ft.`test-type` = 'pre-test'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");

    $sql_post = "
        SELECT AVG(ft.body_mass_index) AS avg_bmi,
               AVG(ft.max_volume_of_oxygen) AS avg_vo2
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        AND ft.`test-type` = 'post-test'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");


    $result = $conn->query($sql_pre);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_pre_bmi = round($row['avg_bmi'] ?? 0, 2);
        $avg_pre_vo2 = round($row['avg_vo2'] ?? 0, 2);
    }


    $result = $conn->query($sql_post);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_post_bmi = round($row['avg_bmi'] ?? 0, 2);
        $avg_post_vo2 = round($row['avg_vo2'] ?? 0, 2);
    }
}

$avg_pre_scores = [0, 0, 0, 0, 0];
$avg_post_scores = [0, 0, 0, 0, 0];

if (!empty($test_type)) {
  
    $sql_avg = "
        SELECT AVG(flexibility) AS flexibility,
               AVG(strength) AS strength,
               AVG(agility) AS agility,
               AVG(speed) AS speed,
               AVG(endurance) AS endurance
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`test-type` = '$test_type'
        AND ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");

    $result = $conn->query($sql_avg);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_pre_scores = array_map('floatval', [
            $row['flexibility'] ?? 0,
            $row['strength'] ?? 0,
            $row['agility'] ?? 0,
            $row['speed'] ?? 0,
            $row['endurance'] ?? 0
        ]);
    }
} else {
   
    $sql_avg_pre = "
        SELECT AVG(flexibility) AS flexibility,
               AVG(strength) AS strength,
               AVG(agility) AS agility,
               AVG(speed) AS speed,
               AVG(endurance) AS endurance
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`test-type` = 'pre-test'
        AND ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");

    $sql_avg_post = "
        SELECT AVG(flexibility) AS flexibility,
               AVG(strength) AS strength,
               AVG(agility) AS agility,
               AVG(speed) AS speed,
               AVG(endurance) AS endurance
        FROM fitness_test ft
        JOIN student_section ss ON ft.student_id = ss.student_id
        WHERE ft.`test-type` = 'post-test'
        AND ft.`date-taken` BETWEEN '$start_date' AND '$end_date'
        " . (!empty($section) ? " AND ss.section_id = '$section'" : "");


    $result = $conn->query($sql_avg_pre);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_pre_scores = array_map('floatval', [
            $row['flexibility'] ?? 0,
            $row['strength'] ?? 0,
            $row['agility'] ?? 0,
            $row['speed'] ?? 0,
            $row['endurance'] ?? 0
        ]);
    }

 
    $result = $conn->query($sql_avg_post);
    if ($result && $row = $result->fetch_assoc()) {
        $avg_post_scores = array_map('floatval', [
            $row['flexibility'] ?? 0,
            $row['strength'] ?? 0,
            $row['agility'] ?? 0,
            $row['speed'] ?? 0,
            $row['endurance'] ?? 0
        ]);
    }
}


$sql = "
SELECT f.flexibility, COUNT(*) AS count
FROM fitness_test f
JOIN student_section ss ON f.student_id = ss.student_id
WHERE f.`date-taken` BETWEEN '$start_date' AND '$end_date'
" . (!empty($section) ? " AND ss.section_id = '$section'" : "") . "
" . (!empty($test_type) ? " AND f.`test-type` = '$test_type'" : "") . "
GROUP BY f.flexibility
ORDER BY f.flexibility;
";

$result = $conn->query($sql);
$flexibility_labels = [];
$flexibility_data = [];
$total_flex_score = 0;
$total_flex_count = 0;

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $score = (int)$row['flexibility'];
        $count = (int)$row['count'];
        $flexibility_labels[] = 'Score ' . $score;
        $flexibility_data[] = $count;
        $total_flex_score += $score * $count;
        $total_flex_count += $count;
    }
}

$avg_flexibility = $total_flex_count > 0 ? round($total_flex_score / $total_flex_count, 2) : 0;


$sql_count = "
    SELECT COUNT(DISTINCT f.student_id) AS total
    FROM fitness_test f
    JOIN student_section ss ON f.student_id = ss.student_id
    WHERE f.`date-taken` BETWEEN '$start_date' AND '$end_date'
    " . (!empty($section) ? " AND ss.section_id = '$section'" : "") . "
    " . (!empty($test_type) ? " AND f.`test-type` = '$test_type'" : "");

$result = $conn->query($sql_count);
$total_students = 0;
if ($result && $row = $result->fetch_assoc()) {
    $total_students = (int)$row['total'];
}


if ($test_type == 'pre-test' || $test_type == 'post-test') {
    echo json_encode([
        'bmi' => $avg_pre_bmi,
        'vo2' => $avg_pre_vo2,
        'flex_labels' => $flexibility_labels,
        'flex_data' => $flexibility_data,
        'avg_flex' => $avg_flexibility,
        'total_students' => $total_students,
        'avg_fitness_scores' => $avg_pre_scores,
        'test_type' => $test_type
    ]);
} else {
    echo json_encode([
        'bmi' => [$avg_pre_bmi, $avg_post_bmi],
        'vo2' => [$avg_pre_vo2, $avg_post_vo2],
        'flex_labels' => $flexibility_labels,
        'flex_data' => $flexibility_data,
        'avg_flex' => $avg_flexibility,
        'total_students' => $total_students,
        'avg_pre_scores' => $avg_pre_scores,
        'avg_post_scores' => $avg_post_scores,
        'test_type' => null
    ]);
}
?>
