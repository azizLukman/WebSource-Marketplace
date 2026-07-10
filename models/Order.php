<?php
class Order {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $token = Helper::generateToken();
        $expiry = date('Y-m-d H:i:s', strtotime('+24 hours'));
        $stmt = $this->db->prepare("INSERT INTO orders (buyer_id, product_id, license_type, amount, token, token_expiry, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
        $stmt->execute([$data['buyer_id'], $data['product_id'], $data['license_type'], $data['amount'], $token, $expiry]);
        return $this->db->lastInsertId();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT o.*, p.title as product_title, p.file_path, p.seller_id, u.username as buyer_name FROM orders o JOIN products p ON o.product_id = p.id JOIN users u ON o.buyer_id = u.id WHERE o.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByBuyer($buyerId) {
        $stmt = $this->db->prepare("SELECT o.*, p.title as product_title FROM orders o JOIN products p ON o.product_id = p.id WHERE o.buyer_id = ? ORDER BY o.created_at DESC");
        $stmt->execute([$buyerId]);
        return $stmt->fetchAll();
    }

    public function getBySeller($sellerId) {
        $stmt = $this->db->prepare("SELECT o.*, p.title as product_title, u.username as buyer_name FROM orders o JOIN products p ON o.product_id = p.id JOIN users u ON o.buyer_id = u.id WHERE p.seller_id = ? ORDER BY o.created_at DESC");
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function uploadPaymentProof($id, $filename) {
        $stmt = $this->db->prepare("UPDATE orders SET payment_proof = ? WHERE id = ?");
        return $stmt->execute([$filename, $id]);
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT o.*, p.title as product_title, u.username as buyer_name FROM orders o JOIN products p ON o.product_id = p.id JOIN users u ON o.buyer_id = u.id ORDER BY o.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function incrementDownload($id) {
        $stmt = $this->db->prepare("UPDATE orders SET download_count = download_count + 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
}