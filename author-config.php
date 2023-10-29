
<?php

$conn = new mysqli("localhost", "root", "", "blogs");

$sql = "SELECT * FROM users WHERE role = 'author' ORDER BY followers DESC LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

    $author_id = $row["id"];
    $author_username = $row["username"];
    $author_firstname = $row["firstname"];
    $author_lastname = $row["lastname"];
    $author_profilepic = $row["profilepic"];
    $author_followers = $row["followers"];
    $author_bio = $row["bio"];

    $follower_class = "not-followed";
    $follower_text = "Follow";
    $follower_icon = "fa-duotone fa-user-plus";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        if ($username == $author_username) {
            continue;
        }
        $sql1 = "SELECT author_username
                     FROM followers_data
                     WHERE user_username = '$username'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {;
                if ($author_username == $row1['author_username']) {
                    $follower_class = "followed";
                    $follower_text = "Followed";
                    $follower_icon = "fa-duotone fa-user-check";
                }
            }
        }
    }

    include "author-card.php";
}
