<?php
include 'includes/init.php';

// if (isset($_SESSION['user_id'])) {
//     header('Location: dashboard.php');
//     exit;
// }
?>
<?php include 'navbar.php'?>
<div class="h-100 d-flex align-items-center justify-contet-center">
<form action="loginprocess.php" method="post" class="form">
    <h2 class="justify-content-center d-flex fw-bold">Login</h2>

    <label for="username">Email</label>
    <input type="text" id="useremail" name="useremail" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="btn btn-success mt-3">Login</button>


</form>
</div>
<?php include './includes/footer.php';?>