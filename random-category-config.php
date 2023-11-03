<?php
include "includes/database-config.php";

$sql = "SELECT category FROM posts GROUP BY category ORDER BY RAND() LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
    $category = $row['category'];
    echo " <button class='category secondary-btn' data-category='$category'>$category</button>";
}
