<?php
include '../includes/init.php'; // Ensure the session and other initializations are included

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user']) || $_SESSION['userType'] !== 'admin') {
    header('Location: ../index.php'); // Redirect if not an admin
    exit;
}

// Initialize the Admin class
$admin = new Admin();

// Fetch users from the database
$teachers = $admin->getUsers("teachers");
$students = $admin->getUsers("students");

// Handle form submission

?>
<div id="manage-content">
    <h2>Manage Users</h2>
    <div>
        <button onclick="openModal()" id="add-user">Add New User</button>
        <button onclick="openTeacherModal()" id="teacher">Teachers</button>

    </div>
</div>





<!-- Modal Structure -->
<div id="userModal" class="addUser_modal justify-content-center ">
    <div class="addUser_modal-content">
    <div class="d-flex w-100 bg-white mb-4">
        <h3 class="d-flex justify-content-center align-items-center text-primary w-100">Add NewUser</h3>
        <div class="bg-danger d-flex align-items-center px-2"><span class="addUser_close" onclick="closeModal()">&times;</span></div>
        </div>
        <form method="POST" action="addUser.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admins">Admin</option>
                <option value="teachers">Teacher</option>
                <option value="students">Student</option>
            </select><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>

            <label for="mobile">Mobile Number:</label>
            <input type="number" id="mobile" name="mobile" required><br>

            <button type="submit">Add User</button>
        </form>
    </div>
</div>
<!-- <form method="POST" action="addUser.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    
    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="admins">Admin</option>
        <option value="teachers">Teacher</option>
        <option value="students">Student</option>
    </select><br>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>
    
    <label for="mobile">Mobile Number:</label>
    <input type="number" id="mobile" name="mobile" required><br>
    
    <button type="submit">Add User</button>
</form> -->

<div id="teacherModal" class="addUser_modal justify-content-center ">
    <div class="addUser_modal-content">
        <div class="d-flex w-100 bg-white mb-4">
        <h3 class="d-flex justify-content-center align-items-center text-primary w-100">Existing Teachers</h3>
        <div class="bg-danger d-flex align-items-center px-2"><span class="addUser_close" onclick="closeTeacherModal()">&times;</span></div>
        </div>
        <table class="w-100 text-white ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($teachers as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="editUser.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>