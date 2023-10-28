
<?php

$conn = new mysqli("localhost", "root", "", "blogs");

$sql = "SELECT * FROM users WHERE role = 'author' OR role = 'admin' ORDER BY followers DESC LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

    $author_id = $row["id"];
    $author_firstname = $row["firstname"];
    $author_lastname = $row["lastname"];
    $author_profilepic = $row["profilepic"];
    $author_followers = $row["followers"];
    include "author-card.php";
}
