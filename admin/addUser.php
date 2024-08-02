<?php
session_start();
include '../includes/init.php';
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
    $password = generateRandomPassword(8);
    $duplicatePassword = $password;
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($admin->addUser($name, $email, $password, $role, $address, $mobile)) {
        // $mailMessage = "Dear $name,\n\n your account login password is : $duplicatePassword \n\n\n you can now login and reset your password.";
   
// Recipient email address
$to = $email;

// Subject of the email
$subject = 'Test password Email';

// Message body
$mailMessage = "This is a test email sent from PHP= $duplicatePassword";

// Additional headers
$headers = 'From: sender@example.com' . "\r\n" .
           'Reply-To: sender@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email



if (mail($to, $subject, $mailMessage, $headers)) {
            $message = "New user added successfully. and password sent to your email.";
        } else {
            $message = "New user added successfully. and password sent failed your email.";
        }
    } else {
        $message = "Failed to add new user.";
    }
    $_SESSION['$message'] = $message;
    // Refresh users list after adding a new user
    // $users = $admin->getUsers();
    header('Location:dashboard.php');
}
