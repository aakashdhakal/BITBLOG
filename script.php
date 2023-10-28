<?php

$website_title = "Blogs - Aakash Dhakal";
include "featured-post-config.php";
include "top-author-config.php";

function formatNumber($number)
{
    $abbreviations = array('', 'K', 'M', 'B');
    $index = 0;
    while ($number >= 1000 && $index < count($abbreviations) - 1) {
        $number /= 1000;
        $index++;
    }
    return round($number, 1) . $abbreviations[$index];
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
    $conn = new mysqli("localhost", "root", "", "blogs");
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    return $row;
}
