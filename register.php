<?php
include 'includes/init.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4 " href="#">SchoolStream</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Our Mission</a></li>
                        <li><a class="dropdown-item" href="#">Our Vision</a></li>
                        <li><a class="dropdown-item" href="#">Histroy</li>


                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Features
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">User Mnagement</a></li>
                        <li><a class="dropdown-item" href="#">Class Mangement</a></li>
                        <li><a class="dropdown-item" href="#">Timetable Management</a></li>
                        <li><a class="dropdown-item" href="#">Exam Shedule</a></li>


                    </ul>
                </li>
                <li class="nav-item dropdown text-dark">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contact Us
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Support</a></li>
                        <li><a class="dropdown-item" href="#">Feed Back</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link active"  aria-current="page" href="login.php">login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- <div class="filter"> -->
<form action="" method="post" class="form">
    <h2 class="justify-content-center d-flex fw-bold">Register</h2>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>
    <label for="username">Email:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="number">Contact Number:</label>
    <input type="number" id="number" name="number" required>
    <label for='role'>Role :</label>
    <select id="userType" class="option">
        <option value="" selected disabled>Select your's Role</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select>
    <button type="submit" class="btn btn-success mt-3">Register</button>
    <p class="d-flex justify-content-center text-white fw-medium">already have an account <a href="login.php" class="ps-2">Login</a></p>

</form>
<!-- <div class="card-footer  justify-content-center d-flex bg-dark text-secondary">
    
  </div> -->
<!-- </div> -->
 <?php include './includes/footer.php';?>