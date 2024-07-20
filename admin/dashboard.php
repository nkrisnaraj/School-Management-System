<?php
include '../includes/init.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

$admin = new Admin();
?>

<h1><?php echo $admin->getDashboard(); ?></h1>
<a href="../logout.php">Logout</a>
