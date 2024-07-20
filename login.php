<?php
include 'includes/init.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<?php include 'navbar.php'?>
<div class="h-100 d-flex align-items-center justify-contet-center">
<form action="" method="post" class="form">
    <h2 class="justify-content-center d-flex fw-bold">Login</h2>

    <label for="username">Email</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="btn btn-success mt-3">Login</button>
    <p class="d-flex justify-content-center text-dark fw-medium">already haven't account <a href="register.php" class="ps-2">Register</a></p>

</form>
</div>
<?php include './includes/footer.php';?>