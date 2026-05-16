<!DOCTYPE html>
<html>
<body>

<a href="index.php">Login another judge</a><br><br>

<?php

$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS grading4");
$conn->select_db("grading4");

$conn->query("CREATE TABLE IF NOT EXISTS results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT DEFAULT 1,
    total1 FLOAT,
    total2 FLOAT,
    total3 FLOAT,
    total4 FLOAT,
    average_total FLOAT
)");

$total1 = isset($_POST['total1']) ? floatval($_POST['total1']) : null;
$total2 = isset($_POST['total2']) ? floatval($_POST['total2']) : null;
$total3 = isset($_POST['total3']) ? floatval($_POST['total3']) : null;
$total4 = isset($_POST['total4']) ? floatval($_POST['total4']) : null;

$result = $conn->query("SELECT * FROM results ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

if (!$row) {
    $conn->query("
        INSERT INTO results (group_id, total1, total2, total3, total4, average_total)
        VALUES (1, NULL, NULL, NULL, NULL, NULL)
    ");

    $result = $conn->query("SELECT * FROM results ORDER BY id DESC LIMIT 1");
    $row = $result->fetch_assoc();
}

$id = $row['id'];

if (isset($_POST['total1'])) {
    $conn->query("UPDATE results SET total1 = $total1 WHERE id = $id");
}

if (isset($_POST['total2'])) {
    $conn->query("UPDATE results SET total2 = $total2 WHERE id = $id");
}

if (isset($_POST['total3'])) {
    $conn->query("UPDATE results SET total3 = $total3 WHERE id = $id");
}

if (isset($_POST['total4'])) {
    $conn->query("UPDATE results SET total4 = $total4 WHERE id = $id");
}

$result = $conn->query("SELECT * FROM results WHERE id = $id");
$data = $result->fetch_assoc();

$entered = 0;

if ($data['total1'] !== null) $entered++;
if ($data['total2'] !== null) $entered++;
if ($data['total3'] !== null) $entered++;
if ($data['total4'] !== null) $entered++;

echo "<b>Judges submitted: $entered / 4</b><br><br>";

if ($entered == 4) {

    $average = (
        $data['total1'] +
        $data['total2'] +
        $data['total3'] +
        $data['total4']
    ) / 4;

    $conn->query("
        UPDATE results 
        SET average_total = $average 
        WHERE id = $id
    ");

    echo "<h2>All judges grading received.</h2>";
    
    $conn->query("
        UPDATE results 
        SET total1 = NULL,
            total2 = NULL,
            total3 = NULL,
            total4 = NULL
        WHERE id = $id
    ");
}

$conn->close();

?>

</body>
</html>