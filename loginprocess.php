<?php
include 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $foundUser = $user->find($username);

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
