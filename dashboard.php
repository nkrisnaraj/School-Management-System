<?php
include './includes/init.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user = null;
switch ($_SESSION['role']) {
    case 'admin':
        $user = new Admin();
        break;
    case 'teacher':
        $user = new Teacher();
        break;
    case 'student':
        $user = new Student();
        break;
}

if ($user) {
    echo $user->getDashboard();
} else {
    echo "Invalid role";
}
?>
