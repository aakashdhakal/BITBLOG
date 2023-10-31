<?php
session_start();
include("includes/database-config.php");


if (!isset($_SESSION['username'])) {

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"]; // This is the plain text password entered by the user.

        // Use a prepared statement to prevent SQL injection
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the hashed password against the entered plain text password
            if (password_verify($password, $row["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["profilepic"] = $row["profilepic"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["email"] = $row["email"];
                echo "success";
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
    }
}
