<?php
session_start();
include "includes/database-config.php";


if (isset($_POST['author']) && isset($_POST['action'])) {
    if (isset($_SESSION['username'])) {
        $author = $_POST['author'];
        $username = $_SESSION['username'];
        $action = $_POST['action'];
        $numbersql = "SELECT followers FROM users WHERE username = '$author'";
        $numberresult = mysqli_query($conn, $numbersql);
        $numberrow = mysqli_fetch_assoc($numberresult);
        $number = $numberrow['followers'];

        if ($action === "follow") {
            if ($username == $author) {
                echo "same";
            } else {
                // Follow the author
                $followSql = "INSERT INTO followers_data (user_username, author_username) VALUES ('$username', '$author')";
                $followResult = mysqli_query($conn, $followSql);
                if ($followResult) {
                    $number = $number + 1;
                    echo "success";
                } else {
                    echo "error";
                }
            }
        } elseif ($action === "unfollow") {
            // Unfollow the author
            $unfollowSql = "DELETE FROM followers_data WHERE user_username = '$username' AND author_username = '$author'";
            $unfollowResult = mysqli_query($conn, $unfollowSql);
            if ($unfollowResult) {
                $number = $number - 1;
                echo "success";
            } else {
                echo "error";
            }
        }
        $updateSql = "UPDATE users SET followers = '$number' WHERE username = '$author'";
        $updateResult = mysqli_query($conn, $updateSql);
    } else {
        echo "login";
    }
}
