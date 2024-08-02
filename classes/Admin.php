<?php
class Admin extends User {
    public function addUser($name, $email, $password, $role, $address, $mobile) {
        try {
            // Prepare SQL query to insert new user
            $query = "INSERT INTO $role (name, email, password, mobile, address) VALUES (:name, :email, :password, :mobile, :address)";
            $stmt = $this->pdo->prepare($query);

            // Bind parameters
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':mobile', $mobile);
            $stmt->bindValue(':address', $address);

            // Execute the query
            return $stmt->execute();
        } catch (PDOException $e) {
            // Display error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function removeUser($userId, $role) {
        try {
            // Prepare SQL query to delete user
            $query = "DELETE FROM $role WHERE id = :id";
            $stmt = $this->pdo->prepare($query);

            // Bind parameters
            $stmt->bindValue(':id', $userId);

            // Execute the query
            return $stmt->execute();
        } catch (PDOException $e) {
            // Display error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getUsers($role) {
        try {
            // Prepare SQL query to fetch all users
            $query = "SELECT id, name, email FROM $role";
            $stmt = $this->pdo->prepare($query);

            // Execute the query
            $stmt->execute();

            // Fetch all users as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Display error message
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function createClass($classDetails) {
        // Code to create a new class
    }

    public function generateReports($criteria) {
        // Code to generate reports
    }
}
?>
