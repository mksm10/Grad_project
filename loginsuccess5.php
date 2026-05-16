<?php

$conn = new mysqli("localhost", "root", "", "grading4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT average_total FROM results ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<body>

<?php
if ($row && $row['average_total'] != null) {
    echo "<h3>Average Grade for the group:   " . $row['average_total'] . "</h3>";
} else {
    echo "No average found yet.";
}
?>

</body>
</html>

<?php
$conn->close();
?>