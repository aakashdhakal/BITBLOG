<?php
include "includes/database-config.php";


$sql = "SELECT * FROM posts ORDER BY date DESC LIMIT 8";
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
    $post_views = $row["views"];
    $post_id = $row["id"];
    $post_slug_url = $row["slug_url"];

    $author = get_author_info($post_author);
    $post_author_name =  $author["firstname"] . " " . $author["lastname"] . " " . verification_badge($post_author);
    $post_author_profilepic = $author["profilepic"];
    include "post-card.php";
}
