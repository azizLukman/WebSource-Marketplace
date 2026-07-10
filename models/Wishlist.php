<?php
class Wishlist {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function toggle($userId, $productId) {
        $stmt = $this->db->prepare("SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$userId, $productId]);
        if ($stmt->fetch()) {
            $del = $this->db->prepare("DELETE FROM wishlist WHERE user_id = ? AND product_id = ?");
            return $del->execute([$userId, $productId]);
        } else {
            $ins = $this->db->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)");
            return $ins->execute([$userId, $productId]);
        }
    }

    public function getUserWishlist($userId) {
        $stmt = $this->db->prepare("SELECT p.* FROM products p JOIN wishlist w ON p.id = w.product_id WHERE w.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}