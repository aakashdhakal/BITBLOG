<?php
include "includes/database-config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["otpCode"]) && isset($_POST["email"]) && isset($_POST["username"])) {
  $otpCode = $_POST["otpCode"];
  $email = $_POST["email"];
  $username = $_POST["username"];

  // HTML content with inline styles
  $htmlContent = "
    <!DOCTYPE html>
    <html lang='en'>

    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Document</title>
    </head>

    <body style='margin: 0; padding: 0; font-family: sans-serif;'>

      <section id='body' style='width: 83%; padding: 40px; font-family:Tahoma; margin: auto;'>
        <p style='font-size: 1rem; font-weight: 500; letter-spacing: 1px; line-height: 2;'>Hello &nbsp;<span style='font-weight: 700;'>" . $username . "</span></p>
        <p style='font-size: 1rem; font-weight: 500; letter-spacing: 1px; line-height: 2;'>Thank you for signing up in A.D Blogs. To complete your registration, please use the following verification code:</p>
        <h1 style='font-size: 2rem; font-weight: 700; letter-spacing: 5px; text-align: center; font-family: Trebuchet MS;margin: 50px auto;'>" . $otpCode . "</h1>
        <p style='font-size: 1rem; font-weight: 500; letter-spacing: 1px; line-height: 2;'>Simply enter this code on the verification page to activate your account.</p>
       <p style='font-size: 1rem; font-weight: 500; letter-spacing: 1px; line-height: 2;'>Thank you <br> The A.D Blogs Team</p>
      </section>

      <hr style='width: 83%; margin: 30px auto 30px;'>
      <section id='copyright' style='width: 83%; margin: auto;'>
        <p style='width: 100%; font-size: 0.9rem; font-weight: 500; letter-spacing: 1px; line-height: 1.8; color: gray; text-align: center;'>Copyright &copy; " . date('Y') . " Aakash Dhakal. All rights reserved.</p>
      </section>

    </body>

    </html>

    ";
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "anoother124@gmail.com";
  $mail->Password = "gomlbsbkmlvismnv";
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;

  $mail->setFrom("noreply@aakashdhakal.com.np");
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Subject = "Welcome to A.D Blogs";
  $mail->Body = $htmlContent;

  if ($mail->send()) {
    echo "success";
  } else {
    echo "Error occured" . $mail->ErrorInfo;
  }
}
