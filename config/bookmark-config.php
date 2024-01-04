<?php
session_start();
include "includes/database-config.php";

if (isset($_POST['post']) && isset($_POST['action'])) {
    if (isset($_SESSION['username'])) {
        $post_id = $_POST['post'];
        $username = $_SESSION['username'];
        $action = $_POST['action'];


        if ($action === "bookmark") {
            // Save the post
            $bookmarkSql = $conn->prepare("INSERT INTO bookmarks (user_username, post_id) VALUES (?, ?)");
            $bookmarkSql->bind_param("si", $username, $post_id);
            $bookmarkResult = $bookmarkSql->execute();
            if ($bookmarkResult) {
                echo "success";
            } else {
                echo "error";
            }
        } else if ($action === "unbookmark") {
            // Unsave the post
            $unbookmarkSql = $conn->prepare("DELETE FROM bookmarks WHERE user_username = ? AND post_id = ?");
            $unbookmarkSql->bind_param("si", $username, $post_id);
            $unbookmarkResult = $unbookmarkSql->execute();
            if ($unbookmarkResult) {
                echo "success";
            } else {
                echo "error";
            }
        }
    } else {
        echo "login";
    }
}
