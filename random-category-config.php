<?php
$conn = new mysqli("localhost", "root", "", "blogs");

$sql = "SELECT category FROM posts GROUP BY category ORDER BY RAND() LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
    $category = $row['category'];
    echo " <a href='' class='category'>$category</a>";
}
