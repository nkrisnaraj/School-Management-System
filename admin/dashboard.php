<?php
include '../includes/init.php'; // Ensure the session and other initializations are included

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user']) || $_SESSION['userType'] !== 'admin') {
    header('Location: ../index.php'); // Redirect if not an admin
    exit;
}

// Initialize the Admin class
$admin = new Admin();
?>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assests/dashboards.css"> <!-- Adjust the path as needed -->
    <script>
        function loadContent(page) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.status == 200) {
                    document.getElementById("main-content").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", page, true);
            xhttp.send();
        }

        function refreshPage() {
            window.location.reload();
        }

        function openModal() {
            document.getElementById('userModal').style.display = 'block';
            document.getElementById('add-user').style.display = 'none';
        }

        function closeModal() {
            document.getElementById('userModal').style.display = 'none';//#endregion
            document.getElementById('add-user').style.display = 'block';

        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('userModal')) {
                closeModal();
            }
        }
        function openTeacherModal() {
            document.getElementById('teacherModal').style.display = 'block';
            document.getElementById('teacher').style.display = 'none';
        }

        function closeTeacherModal() {
            document.getElementById('teacherModal').style.display = 'none';
            document.getElementById('teacher').style.display = 'block';

        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('teacherModal')) {
                closeTeacherModal();
            }
        }
    </script>
    <style>
        /* Modal Styles */
        .addUser_modal {
            display: none; 
            /* position: fixed;  */
            justify-content: center;
            position: relative;
            align-items: center;
            margin: auto;
            z-index: 1; 
            /* left: 0;
            top: 0; */
            width:50% ; 
            height: 100%; 
           
            overflow: auto; 
            
        }

        .addUser_modal-content {
            background-color: rgba(0,0,0,0.6);
            border: 5px solid rgba(0,0,0,0.4); 
            border-radius:5%;
            box-shadow: 20px;
            padding: 20px;
            color: white;
            /* width: 50%;  */
        }

        .addUser_close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .addUser_close:hover,
        .addUser_close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<div class="dashboard">
    <header>
        <div class="fw-bold fs-4">SchoolStream</div>
        <nav>
            <ul>
                <li onclick="loadContent('manageUsers.php')">Manage Users</li>
                <li><a href="../admin/reports.php">View Reports</a></li>
                <li><a href="../admin/settings.php">Settings</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>

    </header>
    <div class="d-flex bg-secondary text-white fs-4 fw-300 justify-content-center p-1">
        Admin Dashboard
    </div>
    <main id="main-content">

        <?php if (!empty($_SESSION['$message'])) {
            $message  = $_SESSION['$message'] 
            // $message  = "message" ?>
            <div class="w-50 d-flex flex-column justify-content-center align-items-center bg-white text-secondary " style="height:100px;margin:auto; ">
               <p class="m-3"> <?php echo $message; ?></p> 
                <button action="" class="btn btn-primary text-white " style="width:25%" onclick="refreshPage()">OK</button>
            </div>

        <?php
            $_SESSION['$message'] = null;
        } else {
        ?>
            <h2>Welcome to the Admin Dashboard</h2>
            <!-- Add your dashboard content here -->
            <p>Manage users, view reports, and adjust settings from this dashboard.</p><?php } ?>
    </main>
</div>
<?php include '../includes/footer.php' ?>