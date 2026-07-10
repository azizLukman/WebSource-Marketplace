<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load konfigurasi & class dasar
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/Helper.php';

// Autoload sederhana untuk model dan controller (supaya tidak perlu require manual)
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../core/' . $class . '.php',
        __DIR__ . '/../models/' . $class . '.php',
        __DIR__ . '/../controllers/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$url = $_GET['url'] ?? 'home';
$url = rtrim($url, '/');
$segments = explode('/', $url);

$controllerName = ucfirst($segments[0] ?? 'home') . 'Controller';
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

$controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    $controller = new $controllerName();
    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        http_response_code(404);
        echo 'Metode ' . $method . ' tidak ditemukan';
    }
} else {
    http_response_code(404);
    echo 'Halaman tidak ditemukan';
}