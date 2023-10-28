<?php
$conn = new mysqli("localhost", "root", "", "blogs");

$sql = "SELECT * FROM posts ORDER BY date DESC LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

    $post_title = $row["title"];
    $post_content = $row["content"];
    $post_image = $row["thumbnail"];
    $post_category = $row["category"];
    $post_date = getTimeAgo($row["date"]);
    $post_author = $row["author"];
    $post_likes = $row["likes"];
    $post_views = $row["views"];

    $author = get_author_info($post_author);
    $post_author_firstname = $author["firstname"];
    $post_author_lastname = $author["lastname"];
    $post_author_profilepic = $author["profilepic"];
    include "post-card.php";
}
