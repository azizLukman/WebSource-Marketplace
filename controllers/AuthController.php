<?php
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = Auth::attempt($email, $password);
            if ($user) {
                // Bypass OTP – langsung login
                Auth::login($user);
                $this->redirect(Auth::isAdmin() ? '/admin/dashboard' : '/user/dashboard');
            } else {
                $error = 'Email atau password salah.';
                $this->view('auth/login', ['error' => $error]);
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            if ($_POST['password'] !== $_POST['password_confirm']) {
                $error = 'Password dan konfirmasi tidak cocok.';
                $this->view('auth/register', ['error' => $error]);
                return;
            }
            if (!isset($_POST['terms']) || $_POST['terms'] != '1') {
                $error = 'Anda harus menyetujui Syarat & Ketentuan.';
                $this->view('auth/register', ['error' => $error]);
                return;
            }
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'full_name' => $_POST['full_name']
            ];
            if (Auth::register($data)) {
                $this->redirect('/auth/login');
            } else {
                $error = 'Registrasi gagal, mungkin email sudah digunakan.';
                $this->view('auth/register', ['error' => $error]);
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/auth/login');
    }
}