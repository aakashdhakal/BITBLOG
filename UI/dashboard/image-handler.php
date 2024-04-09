<?php
//request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0 && isset($_POST['action'])) {

        if ($_POST['action'] == 'upload') {
            $uploadFolder = "images/other-img/";
            $fileName = "other-img" . rand(1000, 1000000);
            $uploadFilePath = $uploadFolder . $fileName . "." . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFilePath);
            echo "/A.D-Blogs/" . $uploadFilePath;
        }
    } else if ($_POST['action'] == 'delete') {
        $filePath = $_POST['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
            echo "deleted";
        } else {
            echo "file not found";
        }
    }
}
