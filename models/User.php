<?php
class User {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getAll() {
        return $this->db->query("SELECT id, username, email, full_name, role, balance, is_active, created_at FROM users ORDER BY created_at DESC")->fetchAll();
    }

    public function updateBalance($userId, $amount) {
        $stmt = $this->db->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        return $stmt->execute([$amount, $userId]);
    }

    /**
     * Hitung ulang saldo user berdasarkan semua order PAID untuk produk yang dijual.
     * Komisi 10% otomatis dipotong (penjual dapat 90%).
     */
    public function recalculateBalance($userId) {
        // Ambil total pendapatan dari order dengan status 'paid'
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(o.amount * 0.9), 0) 
            FROM orders o 
            JOIN products p ON o.product_id = p.id 
            WHERE p.seller_id = ? AND o.status = 'paid'
        ");
        $stmt->execute([$userId]);
        $balance = $stmt->fetchColumn();

        // Update saldo dengan nilai yang dihitung
        $update = $this->db->prepare("UPDATE users SET balance = ? WHERE id = ?");
        return $update->execute([$balance, $userId]);
    }

    public function toggleActive($id) {
        $stmt = $this->db->prepare("UPDATE users SET is_active = !is_active WHERE id = ?");
        return $stmt->execute([$id]);
    }
}