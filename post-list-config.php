<?php

include("includes/database-config.php");


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
    $post_content = $row["content"];
    $post_image = $row["thumbnail"];
    $post_category = $row["category"];
    $date = $row["date"];
    $post_date = date("F j, Y", strtotime($date));
    $post_author = $row["author"];
    $post_likes = $row["likes"];
    $post_views = $row["views"];
    $post_comments = $row["comments"];

    $sql1 = "SELECT * FROM users WHERE username = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $post_author);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $author = mysqli_fetch_assoc($result1);
    $post_author_name = $author["firstname"] . " " . $author["lastname"];

    include "post-list.php";
}
