<?php

include "includes/database-config.php";

$sql = "SELECT * FROM posts WHERE featured=1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$featured_post = $result->fetch_assoc();

$featured_post_id = $featured_post["id"];
$featured_post_title = $featured_post["title"];
$featured_post_content_temp = $featured_post["content"];
$featured_post_content = substr($featured_post_content_temp, 0, 200) . "...";
$featured_post_image = $featured_post["thumbnail"];
$featured_post_category = $featured_post["category"];
$date = $featured_post["date"];
$featured_post_date = date("F j, Y", strtotime($date));
$featured_post_author = $featured_post["author"];
$featured_post_likes = formatNumber(get_likes_count($featured_post_id));
$featured_post_views = $featured_post["views"];
$featured_post_comments = $featured_post["comments"];

$author = get_author_info($featured_post_author);
$featured_post_author_name = $author["firstname"] . " " . $author["lastname"];
$featured_post_author_profilepic = $author["profilepic"];


$stmt->close();
$conn->close();
