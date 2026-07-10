<?php
class Notification {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($userId, $message) {
        $stmt = $this->db->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        return $stmt->execute([$userId, $message]);
    }

    public function getByUser($userId, $unreadOnly = false) {
        $sql = "SELECT * FROM notifications WHERE user_id = ?";
        if ($unreadOnly) $sql .= " AND is_read = 0";
        $sql .= " ORDER BY created_at DESC LIMIT 20";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function markRead($id) {
        $stmt = $this->db->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
}