<?php
require_once __DIR__ . '/../config.php';

class User
{
    protected $pdo;
    protected $user;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function check_user($email, $password, $table)
    {
        $query = "SELECT * FROM $table WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetch();
            $hash = $user['password'];
            if ($table === "admins") {
                if ($hash == $password) {
                    return $user;
                }
            } else if (password_verify($password, $hash)) {
                return $user;
            }
            return false;
        }
    }

    public function authenticate($email, $password)
    {
        $user = null;
        $userType = null;

        if ($user = $this->check_user($email, $password, 'admins')) {
            $userType = 'admin';
        } elseif ($user = $this->check_user($email, $password, 'teachers')) {
            $userType = 'teacher';
        } elseif ($user = $this->check_user($email, $password, 'students')) {
            $userType = 'student';
        } else {
            return ['message' => 'Invalid email or password'];
        }

        return [
            'user' => $user,
            'userType' => $userType
        ];
    }
}
