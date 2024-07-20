<?php
include '../includes/init.php'; // Ensure session and initializations are included

// Check if the user is logged in and has teacher role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header('Location: ../index.php'); // Redirect if not a teacher
    exit;
}

// Initialize the Teacher class
$teacher = new Teacher();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../assests/dashboards.css"> <!-- Adjust path as needed -->
</head>
<div class="dashboard">
    <header>
    <div class="fw-bold fs-4">SchoolStream</div>
        <nav>
            <ul>
                <li><a href="../teacher/manage_classes.php">Manage Classes</a></li>
                <li><a href="../teacher/grade_students.php">Grade Students</a></li>
                <li><a href="../teacher/settings.php">Settings</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="d-flex bg-secondary text-white fs-4 fw-300 justify-content-center p-1">
        Teacher Dashboard
    </div>
    <main>
        <h2>Welcome to the Teacher Dashboard</h2>
        <!-- Add dashboard content here -->
        <p>Manage your classes, grade students, and adjust settings from this dashboard.</p>
    </main>
</div>
<?php include '../includes/footer.php' ?>
