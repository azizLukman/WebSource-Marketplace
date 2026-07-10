<?php
session_start();

class Auth {
    public static function check() {
        return isset($_SESSION['user']);
    }

    public static function user() {
        return $_SESSION['user'] ?? null;
    }

    public static function login($user) {
        $_SESSION['user'] = $user;
    }

    public static function logout() {
        unset($_SESSION['user'], $_SESSION['otp_verified']);
        session_destroy();
    }

    public static function requireLogin() {
        if (!self::check()) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    }

    public static function isAdmin() {
        return self::check() && self::user()['role'] === 'admin';
    }

    public static function requireAdmin() {
        self::requireLogin();
        if (!self::isAdmin()) {
            die('Akses ditolak. Hanya admin.');
        }
    }

    public static function register($data) {
        $db = Database::getInstance()->getConnection();
        $hash = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (username, email, password, full_name, role) VALUES (?, ?, ?, ?, 'user')");
        return $stmt->execute([$data['username'], $data['email'], $hash, $data['full_name'] ?? '']);
    }

    public static function attempt($email, $password) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}