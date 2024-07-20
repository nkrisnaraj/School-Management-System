<?php
require_once __DIR__ . '/../config.php';
class User {
    protected $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function find($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}
?>
