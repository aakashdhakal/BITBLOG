<?php
include "includes/database-config.php";


$sql = "SELECT * FROM users where role ='author' ORDER BY followers DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$top_author_id = $row["id"];
$top_author_username = $row["username"];

$top_author_name = $row["firstname"] . " " . $row["lastname"] . " " . verification_badge($top_author_username);
$top_author_profilepic = $row["profilepic"];
$top_author_followers = $row["followers"];
$top_author_bio = $row["bio"];


$sql1 = "SELECT * from posts where author = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $top_author_username);
$stmt1->execute();
$result1 = $stmt1->get_result();
$top_author_posts = 0;
$top_author_likes = 0;
while ($row1 = $result1->fetch_assoc()) {
    if ($row1['author'] == $top_author_username) {
        $top_author_posts = formatNumber($top_author_posts + 1);
        $top_author_likes = formatNumber($top_author_likes + get_likes_count($row1['id']));
    }
}

$follower_class = "not-followed";
$follower_text = "Follow";
$follower_icon = "fa-duotone fa-user-plus";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (check_follow_status($username, $top_author_username)) {
        $follower_class = "followed";
        $follower_text = "Following";
        $follower_icon = "fa-duotone fa-user-check";
    }
}
