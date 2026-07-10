<?php
class Product {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllApproved($categoryId = null, $search = '', $limit = 12, $offset = 0) {
        $sql = "SELECT p.*, u.username as seller_name 
                FROM products p 
                JOIN users u ON p.seller_id = u.id 
                WHERE p.status = 'approved'";
        $params = [];
        if ($categoryId) {
            $sql .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }
        if ($search) {
            $sql .= " AND (p.title LIKE ? OR p.description LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }
        $sql .= " ORDER BY p.created_at DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function countApproved($categoryId = null, $search = '') {
        $sql = "SELECT COUNT(*) FROM products p WHERE p.status = 'approved'";
        $params = [];
        if ($categoryId) {
            $sql .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }
        if ($search) {
            $sql .= " AND (p.title LIKE ? OR p.description LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT p.*, u.username as seller_name, u.full_name as seller_fullname FROM products p JOIN users u ON p.seller_id = u.id WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getBySeller($sellerId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE seller_id = ? ORDER BY created_at DESC");
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO products (seller_id, category_id, title, slug, description, price_regular, price_extended, file_path, demo_url, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
        $stmt->execute([
            $data['seller_id'],
            $data['category_id'] ?? null,
            $data['title'],
            $data['slug'],
            $data['description'],
            $data['price_regular'],
            $data['price_extended'],
            $data['file_path'],
            $data['demo_url'] ?? null
        ]);
        return $this->db->lastInsertId();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE products SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function getAllAdmin() {
        $stmt = $this->db->prepare("SELECT p.*, u.username as seller_name FROM products p JOIN users u ON p.seller_id = u.id ORDER BY p.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // AJAX search
    public function search($query) {
        $stmt = $this->db->prepare("SELECT id, title, price_regular FROM products WHERE status='approved' AND title LIKE ? LIMIT 5");
        $stmt->execute(["%$query%"]);
        return $stmt->fetchAll();
    }
}