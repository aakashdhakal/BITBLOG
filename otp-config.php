<?php
include "includes/database-config.php";

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["otpCode"]) && isset($_POST["email"])) {

    $otpCode = $_POST["otpCode"];
    $email = $_POST["email"];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "anoother124@gmail.com";
    $mail->Password = "gomlbsbkmlvismnv";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("contact@aakashdhakal.com.np");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "OTP Verification";
    $mail->Body = "<h1>OTP Verification</h1>
<p>Your OTP Code is <b>$otpCode</b></p>";
    $mail->send();

    echo "success";
}
