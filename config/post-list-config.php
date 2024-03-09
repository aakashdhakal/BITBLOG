<?php

include "includes/database-config.php";
include_once "includes/extra-script.php";


if (isset($_POST['category'])) {
    $category = $_POST['category'];
    if ($category != "All") {
        $sql = "SELECT * FROM posts WHERE category = ? ORDER BY RAND() LIMIT 5";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category);
    } else {
        $sql = "SELECT * FROM posts ORDER BY RAND() LIMIT 5";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    }
} else {
    $sql = "SELECT * FROM posts ORDER BY RAND() LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
}
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

    $post_id = $row["id"];
    $post_title = $row["title"];
    $post_content = strip_tags(substr($row["content"], 0, 500)) . "...";
    $post_image = $row["thumbnail"];
    $post_category = $row["category"];
    $date = $row["date"];
    $post_date = date("F j, Y", strtotime($date));
    $post_author = $row["author"];
    $post_views = $row["views"];
    $post_comments = $row["comments"];

    $author_info = get_author_info($post_author);
    $post_author_name = $author_info['firstname'] . " " . $author_info['lastname'] . " " . verification_badge($post_author);

    include "UI/homepage/post-list.php";
}
