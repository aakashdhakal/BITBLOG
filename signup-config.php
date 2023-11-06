<?php

include "includes/database-config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $role = $_POST["role"];

    $uploadFilePath = "images/noimage.png";

    if (isset($_FILES["profilepic"]) && $_FILES["profilepic"]["error"] == 0) {
        $profilepic = $_FILES["profilepic"];
        $uploadFolder = "images/profile-pics/";
        $fileName = $username . "-profile-pic" . rand(1000, 1000000);
        $uploadFilePath = $uploadFolder . $fileName . "." . strtolower(pathinfo($profilepic["name"], PATHINFO_EXTENSION));
        if (move_uploaded_file($profilepic["tmp_name"], $uploadFilePath)) {
            echo "success";
        } else {
            echo "error uploading file";
        }
    }





    // Continue with database insert
    $sql = "INSERT INTO users (username, email, password, firstname, lastname, role, profilepic) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $username, $email, $password, $firstname, $lastname, $role, $uploadFilePath);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error" . mysqli_error($conn);
    }
}
