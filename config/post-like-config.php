<?php
session_start();
include "includes/database-config.php";

if (isset($_POST['post']) && isset($_POST['action'])) {
    if (isset($_SESSION['username'])) {
        $post_id = $_POST['post'];
        $username = $_SESSION['username'];
        $action = $_POST['action'];


        if ($action === "like") {
            // Like the post
            $likeSql = $conn->prepare("INSERT INTO likes (user_username, post_id) VALUES (?, ?)");
            $likeSql->bind_param("si", $username, $post_id);
            $likeResult = $likeSql->execute();
            if ($likeResult) {
                echo "success";
            } else {
                echo "error";
            }
        } else if ($action === "unlike") {
            // Unlike the post
            $unlikeSql = $conn->prepare("DELETE FROM likes WHERE user_username = ? AND post_id = ?");
            $unlikeSql->bind_param("si", $username, $post_id);
            $unlikeResult = $unlikeSql->execute();
            if ($unlikeResult) {
                echo "success";
            } else {
                echo "error";
            }
        }
    } else {
        echo "login";
    }
}
