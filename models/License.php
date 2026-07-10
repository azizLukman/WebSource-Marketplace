<?php
class License {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function generate($orderId) {
        $key = 'LIC-' . strtoupper(bin2hex(random_bytes(12)));
        $stmt = $this->db->prepare("INSERT INTO licenses (order_id, license_key) VALUES (?, ?)");
        return $stmt->execute([$orderId, $key]);
    }

    public function getByOrder($orderId) {
        $stmt = $this->db->prepare("SELECT * FROM licenses WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch();
    }

    public function activate($orderId, $domain) {
        $stmt = $this->db->prepare("UPDATE licenses SET activation_domain = ?, activated_at = NOW() WHERE order_id = ?");
        return $stmt->execute([$domain, $orderId]);
    }
}