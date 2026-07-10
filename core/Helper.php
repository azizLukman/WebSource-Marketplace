<?php
class Helper {
    public static function redirect($path) {
        header('Location: ' . BASE_URL . $path);
        exit;
    }

    public static function slug($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        return $text ?: 'n-a';
    }

    public static function uploadFile($file, $targetDir) {
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        $destination = $targetDir . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $filename;
        }
        return false;
    }

    public static function generateToken($length = 64) {
        return bin2hex(random_bytes($length / 2));
    }

    public static function sendEmail($to, $subject, $message) {
        // Di production, gunakan PHPMailer atau Mailgun
        mail($to, $subject, $message);
    }

    public static function generateOTP($email) {
        $db = Database::getInstance()->getConnection();
        $code = rand(100000, 999999);
        $expired = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $stmt = $db->prepare("INSERT INTO otp_codes (email, code, expired_at) VALUES (?, ?, ?)");
        $stmt->execute([$email, $code, $expired]);
        self::sendEmail($email, 'Kode OTP Anda', "Kode: $code");
        return $code;
    }

    // ** BARU: Ambil setting dari database **
    public static function getSetting($key) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT value FROM settings WHERE key_name = ?");
        $stmt->execute([$key]);
        return $stmt->fetchColumn();
    }
}