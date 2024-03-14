<?php
session_start();
include "includes/database-config.php";
include "includes/extra-script.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $slug_url = createSlugUrl($title);
    $author = $_SESSION["username"];
    $status = $_POST["status"];
    $quill_delta = $_POST["quillDelta"];
    $category = "Uncategorized";

    if (isset($_FILES["cover"]) && $_FILES["cover"]["error"] == 0) {
        $cover = $_FILES["cover"];
        $uploadFolder = "images/cover-img/";
        $fileName = $slug_url . "-thumbnail" . rand(1000, 1000000);
        $uploadFilePath = $uploadFolder . $fileName . "." . strtolower(pathinfo($cover["name"], PATHINFO_EXTENSION));
        move_uploaded_file($cover["tmp_name"], $uploadFilePath);
        $cover = $uploadFilePath; // update $cover with the path of the uploaded file
    }


    $sql = "INSERT INTO posts (title, content, slug_url, thumbnail, author, status, quill_delta, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $title, $content, $slug_url, $cover, $author, $status, $quill_delta, $category);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
