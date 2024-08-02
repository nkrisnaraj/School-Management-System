<?php
session_start();
include '../includes/init.php';
require '../vendor/autoload.php'; // Ensure the correct path to autoload.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$admin = new Admin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    function generateRandomPassword($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }
    $password = generateRandomPassword(6);
    $duplicatePassword = $password;
    $password = password_hash($password, PASSWORD_BCRYPT);

    if ($admin->addUser($name, $email, $password, $role, $address, $mobile)) {
        // $mailMessage = "Dear $name,\n\n your account login password is : $duplicatePassword \n\n\n you can now login and reset your password.";
   
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nknkrisna@gmail.com';                 // SMTP username
            $mail->Password   = 'wqzt qnlr rfha oolb';                  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('nknkrisna@gmail.com', 'Admin of School');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Account Login Details';
            $mail->Body    = "Dear $name,<br><br>Your account login password is: $duplicatePassword.<br><br>You can now log in to your account using your email ($email) and password.";
            $mail->AltBody = "Dear $name,\n\nYour account login password is: $duplicatePassword\n\nYou can now log in to your account using your email ($email) and password.";

            $mail->send();
            $message = "New user added successfully and password sent to your email.";
        } catch (Exception $e) {
            $message = "New user added successfully but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Failed to add new user.";
    }
    $_SESSION['$message'] = $message;
    // Refresh users list after adding a new user
    // $users = $admin->getUsers();
    header('Location:dashboard.php');
}
