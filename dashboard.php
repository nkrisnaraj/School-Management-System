<?php
include 'includes/init.php';

if ($_SESSION['userType']) {

        // Redirect based on user role
        switch ($_SESSION['userType']) {
            case 'admin':
                header('Location: admin/dashboard.php');
                break;
            case 'teacher':
                header('Location: teacher/dashboard.php');
                break;
            case 'student':
                header('Location: student/dashboard.php');
                break;
            default:
                header('Location: index.php'); // Fallback for unknown roles
                break;
        }
        exit;
    } else {
        echo "Invalid username or password";
    }

?>