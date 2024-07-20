<?php
include '../includes/init.php';

if ($_SESSION['role'] !== 'student') {
    header('Location: ../index.php');
    exit;
}

$student = new Student();
?>

<h1><?php echo $student->getDashboard(); ?></h1>
<a href="../logout.php">Logout</a>
