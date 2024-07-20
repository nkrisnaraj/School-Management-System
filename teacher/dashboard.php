<?php
include '../includes/init.php';

if ($_SESSION['role'] !== 'teacher') {
    header('Location: ../index.php');
    exit;
}

$teacher = new Teacher();
?>

<h1><?php echo $teacher->getDashboard(); ?></h1>
<a href="../logout.php">Logout</a>
