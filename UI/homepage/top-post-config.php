<?php
include "includes/database-config.php";

$status = 1;
$sql = "SELECT * FROM posts WHERE status = ? ORDER BY views LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $status);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {

    $top_post_title = $row["title"];
    $top_post_content = $row["content"];
    $top_post_image = $row["thumbnail"];
    $top_post_category = $row["category"];
    $date = $row["date"];
    $top_post_date = date("F j, Y", strtotime($date));
    $top_post_author = $row["author"];
    $top_post_views = $row["views"];
    $top_post_id = $row["id"];
    $top_slug_url = $row["slug_url"];

    $author = get_author_info($top_post_author);
    $top_post_author_name = $author["firstname"] . " " . $author["lastname"];
    $top_post_author_profilepic = $author["profilepic"];
    include "top-post.php";
}
