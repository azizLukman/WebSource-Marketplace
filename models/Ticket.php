<?php
class Ticket {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($userId, $subject, $message) {
        $stmt = $this->db->prepare("INSERT INTO tickets (user_id, subject, message) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $subject, $message]);
    }

    public function getUserTickets($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tickets WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function getAll() {
        return $this->db->query("SELECT t.*, u.username FROM tickets t JOIN users u ON t.user_id = u.id ORDER BY t.created_at DESC")->fetchAll();
    }

    public function reply($ticketId, $reply) {
        $stmt = $this->db->prepare("UPDATE tickets SET admin_reply = ?, status = 'closed' WHERE id = ?");
        return $stmt->execute([$reply, $ticketId]);
    }
}