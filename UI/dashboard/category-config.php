<?php

include_once './includes/database-config.php';

// Get the request body and parse it as JSON
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['category'])) {
    $category = $input['category'];
    $sql = "SELECT DISTINCT category FROM posts WHERE category LIKE '%$category%' ";
    $result = mysqli_query($conn, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //give 2 categories as json response
    $categories = array_slice($categories, 0, 2);
    echo json_encode($categories);
}
