<?php
include 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    if (empty($useremail) || empty($password)) {
        echo "Email and password are required.";
        exit;
    }
    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $user = new User();
    $foundUser = $user->find($useremail);

    if ($foundUser && $user->verifyPassword($password, $foundUser['password'])) {
        $_SESSION['user_id'] = $foundUser['id'];
        $_SESSION['role'] = $foundUser['role'];

        header('Location: dashboard.php');
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>
