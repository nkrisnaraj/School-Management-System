<?php
include 'includes/init.php';
session_destroy();
header('Location: index.php');
exit;
?>
