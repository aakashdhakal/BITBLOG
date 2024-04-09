<?php
include "./includes/database-config.php";

//change password according to email
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password, $email);
    //check if error occurred or not
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
}
