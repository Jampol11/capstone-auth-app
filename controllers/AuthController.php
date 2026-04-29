<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        global $conn;
        $this->user = new User($conn);
    }

    public function register(array $data): array {
        $firstname = trim($data['firstname'] ?? '');
        $lastname = trim($data['lastname'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        if ($firstname === '' || $lastname === '' || $email === '' || $password === '') {
            return ['success' => false, 'message' => 'Please complete all fields.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Please enter a valid email address.'];
        }

        if (strlen($password) < 8) {
            return ['success' => false, 'message' => 'Password must be at least 8 characters long.'];
        }

        $created = $this->user->register($firstname, $lastname, $email, $password);
        if (!$created) {
            return ['success' => false, 'message' => 'Email is already registered.'];
        }

        return ['success' => true, 'message' => 'Registration completed. Please log in.'];
    }

    public function login(array $data): array {
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        if ($email === '' || $password === '') {
            return ['success' => false, 'message' => 'Email and password are required.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Please enter a valid email address.'];
        }

        $user = $this->user->login($email, $password);
        if (!$user) {
            return ['success' => false, 'message' => 'Invalid login credentials.'];
        }

        session_regenerate_id(true);
        $_SESSION['user'] = $user;

        return ['success' => true, 'message' => 'Login successful.'];
    }

    public function logout(): void {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
    }
}
?>
