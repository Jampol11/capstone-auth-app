<?php
require_once __DIR__ . '/../database/db.php';

class User {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function register(string $firstname, string $lastname, string $email, string $password): bool {
        if ($this->emailExists($email)) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            'INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)'
        );

        return $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $hash,
        ]);
    }

    public function login(string $email, string $password) {
        $stmt = $this->conn->prepare('SELECT id, firstname, lastname, email, password FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }

        return false;
    }

    private function emailExists(string $email): bool {
        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
    }
}
?>
