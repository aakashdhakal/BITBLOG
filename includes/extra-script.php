<?php

$website_title = "Blogs - Aakash Dhakal";

function formatNumber($number)
{
    $abbreviations = array('', 'K', 'M', 'B');
    $index = 0;
    while ($number >= 1000 && $index < count($abbreviations) - 1) {
        $number /= 1000;
        $index++;
    }
    return round($number, 1)  . $abbreviations[$index];
}


function getTimeAgo($date)
{
    $posted_time = strtotime($date);
    $current_time = time();
    $time_difference = $current_time - $posted_time;
    $seconds = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks = round($seconds / 604800); // 7*24*60*60;
    $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {
        $time_ago = "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            $time_ago = "1 minute ago";
        } else {
            $time_ago = "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            $time_ago = "1 hour ago";
        } else {
            $time_ago = "$hours hours ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            $time_ago = "yesterday";
        } else {
            $time_ago = "$days days ago";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12  
    {
        if ($weeks == 1) {
            $time_ago = "1 week ago";
        } else {
            $time_ago = "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            $time_ago = "1 month ago";
        } else {
            $time_ago = "$months months ago";
        }
    } else {
        if ($years == 1) {
            $time_ago = "1 year ago";
        } else {
            $time_ago = "$years years ago";
        }
    }

    return $time_ago;
}
function get_author_info($username)
{
    include "database-config.php";
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function check_follow_status($username, $author_username)
{
    include "database-config.php";
    $sql = "SELECT * FROM followers_data WHERE user_username = ? AND author_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $author_username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function verification_badge($username)
{
    include "database-config.php";
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    if ($row['is_verified'] == 1) {
        return '<i class=" fa-solid fa-badge-check" style="color: #2865cc;" title="Verified"></i>';
    } else {
        return '';
    }
}

function createSlugUrl($title)
{
    $title = strtolower($title);
    $title = str_replace(array(
        '\'', '"', ',', ';', '<', '>', ":", "/", "?", "[", "]", "{", "}", "|", "`", "~", "!", "@", "#", "$", "%", "^", "*", "(", ")", "_", "+", "=", "'",
    ), "", $title);
    $title = str_replace(" ", "-", $title);
    return $title;
}

function get_likes_count($post_id)
{
    include "database-config.php";
    $sql = "SELECT * FROM likes WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $number =  0;
    while ($row = mysqli_fetch_assoc($result)) {
        $number++;
    }
    return $number;
}

function is_followed($username, $author_username)
{
    include "database-config.php";
    $sql = "SELECT * FROM followers_data WHERE user_username = ? AND author_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $author_username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function getCategories()
{
    include "database-config.php";
    $sql = "SELECT category FROM posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($categories, $row);
    }
    return $categories;
}
