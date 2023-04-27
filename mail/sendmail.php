<!DOCTYPE html>
<html lang="en">

<head>
    <!-- include SweetAlert library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';



// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "speedypark";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // User exists, send email with password
        $row = mysqli_fetch_assoc($result);


        //Create an instance of PHPMailer
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0; //Turn off debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'mailto:abishjai03321@gmail.com'; //SMTP username
        $mail->Password = 'uxqzttqeubfmbacj'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable STARTTLS encryption
        $mail->Port = 587; //TCP port to connect to

        //Recipients
        $mail->setfrom('abishjai03321@gmail.com', 'Mailer');
        $mail->addAddress($email, $row['username']); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Password Reset';

        $mail->Body = 'Dear ' . $row['username'] . ',<br><br>We received a request to reset your password. Please click on the button below to reset your password.<br><br><a href="http://localhost/speedyparking/updatepassword.php?email=' . $email . '&token=' . $row['token'] . '"
        style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Reset Password</a><br><br>Best regards,<br>The SpeedyParking team';
        
        $mail->AltBody = 'Dear ' . $row['username'] . ',\n\nWe received a request to reset your password. Your current password is: ' . $row['password'] . '.\n\nBest regards,\nThe SpeedyParking team';
        try {
            $mail->send();
            echo "<script>
            swal({
                title: 'Success',
                text: 'Check your email',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function(){
                window.location.href = '../log in.php';
            }, 2000);
          </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Invalid credentials, show error message using SweetAlert
        echo "<script>
            swal({
                title: 'Error',
                text: 'Invalid email',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function(){
                window.location.href = '../log in.php';
            }, 2000);
          </script>";
    }
}