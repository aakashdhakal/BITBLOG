<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blogs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["email"]) && isset($_POST["message"])) {
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO feedback (email, feedback) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $message);


    if ($stmt->execute()) {
        // Feedback submission was successful
        echo "success";
    } else {
        // Error occurred during the database operation
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Invalid input data
    echo "Invalid input data";
}

$conn->close();
