<?php
include '../includes/init.php'; // Ensure the session and other initializations are included

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php'); // Redirect if not an admin
    exit;
}

// Initialize the Admin class
$admin = new Admin();
?>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assests/dashboards.css"> <!-- Adjust the path as needed -->
</head>
<div class="dashboard">
    <header>
        <div class="fw-bold fs-4">SchoolStream</div>
        <nav>
            <ul>
                <li><a href="../admin/manage_users.php">Manage Users</a></li>
                <li><a href="../admin/reports.php">View Reports</a></li>
                <li><a href="../admin/settings.php">Settings</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>

    </header>
    <div class="d-flex bg-secondary text-white fs-4 fw-300 justify-content-center p-1">
        Admin Dashboard
    </div>
    <main>
        <h2>Welcome to the Admin Dashboard</h2>
        <!-- Add your dashboard content here -->
        <p>Manage users, view reports, and adjust settings from this dashboard.</p>
    </main>
</div>
<?php include '../includes/footer.php' ?>