<?php
include '../includes/init.php'; // Ensure session and initializations are included

// Check if the user is logged in and has student role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); // Redirect if not a student
    exit;
}

// Initialize the Student class
$student = new Student();
?>

<head>

    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assests/dashboards.css"> <!-- Adjust path as needed -->
</head>
<div class="dashboard">
    <header>
    <div class="fw-bold fs-4">SchoolStream</div>
        <nav>
            <ul>
                <li><a href="../student/view_grades.php">View Grades</a></li>
                <li><a href="../student/register_courses.php">Register for Courses</a></li>
                <li><a href="../student/settings.php">Settings</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="d-flex bg-secondary text-white fs-4 fw-300 justify-content-center p-1">
        Student Dashboard
    </div>
    <main>
        <h2>Welcome to the Student Dashboard</h2>
        <!-- Add dashboard content here -->
        <p>View your grades, register for courses, and adjust settings from this dashboard.</p>
    </main>
</div>
    <?php include '../includes/footer.php' ?>
