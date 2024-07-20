<?php
require_once __DIR__ . '/../config.php';
class User {
    protected $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function find($useremail) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE useremail = ?");
        $stmt->execute([$useremail]);
        return $stmt->fetch();
    }

    public function verifyPassword($password, $hash) {
        if($password===$hash){
            return true;
        }
        return false;
    }
}
?>
