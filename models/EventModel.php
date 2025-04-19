<?php
require_once __DIR__ . '/../config/Database.php';

class EventModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getEvents() {
        $stmt = $this->conn->query("SELECT * FROM events ORDER BY date_evenement DESC"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEvent($titre, $date, $description) {
        $sql = "INSERT INTO events (titre, date_evenement, description) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$titre, $date, $description]);
    }

    
    public function updateEvent($id, $titre, $date, $lieu) {
        $stmt = $this->conn->prepare("UPDATE events SET titre = ?, date_evenement = ?, description = ? WHERE id = ?");
        $stmt->execute([$titre, $date, $lieu, $id]);
    }
   
    public function deleteEvent($id) {
        $stmt = $this->conn->prepare("DELETE FROM events WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}
