<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        $viewFile = VIEW_PATH . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die('View tidak ditemukan: ' . $view);
        }
    }

    public function redirect($url) {
        header('Location: ' . BASE_URL . $url);
        exit;
    }

    public function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    // CSRF token untuk form
    public function csrfToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public function validateCsrf() {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            die('CSRF token tidak valid.');
        }
    }

    // Flash message
    public function setFlash($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public function getFlash($key) {
        if (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    }
}