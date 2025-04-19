<?php

require_once __DIR__ . '/../config/Database.php';

class ParticipantModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getEvents() {
        $stmt = $this->conn->query("SELECT * FROM events ORDER BY date_evenement ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function addParticipant($nom, $email) {
        $stmt = $this->conn->prepare("INSERT INTO participants (nom, email) VALUES (?, ?)");
        $stmt->execute([$nom, $email]);
        return $this->conn->lastInsertId(); // Utilisez $this->conn ici aussi
    }
    
    public function addInscription($participant_id, $event_id) {
        $stmt = $this->conn->prepare("INSERT INTO inscriptions (participant_id, event_id, date_inscription) VALUES (?, ?, NOW())");
        $stmt->execute([$participant_id, $event_id]);
    }

    public function getAllParticipants() {
        $stmt = $this->conn->prepare("SELECT * FROM participants");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateParticipant($id, $nom, $email, $evenement_id) {
        $stmt = $this->conn->prepare("UPDATE participants SET nom = :nom, email = :email WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'email' => $email
        ]);
    }
    
    
    public function updateInscription($participant_id, $event_id) {
        // Vérifier si une inscription existe
        $stmt = $this->conn->prepare("SELECT id FROM inscriptions WHERE participant_id = ?");
        $stmt->execute([$participant_id]);
        $existing = $stmt->fetch();
    
        if ($existing) {
            $stmt = $this->conn->prepare("UPDATE inscriptions SET event_id = ?, date_inscription = NOW() WHERE participant_id = ?");
            $stmt->execute([$event_id, $participant_id]);
        } else {
            $this->addInscription($participant_id, $event_id);
        }
    }
    
    public function deleteParticipant($id) {
        $stmt = $this->conn->prepare("DELETE FROM participants WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
