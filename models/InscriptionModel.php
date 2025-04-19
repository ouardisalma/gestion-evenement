<?php
require_once __DIR__ . '/../config/Database.php';

class InscriptionModel {
    private $conn; // Connexion à la base de données

    public function __construct() {
        // Utilise $this->conn pour la connexion
        $this->conn = Database::getConnection();
    }

    public function getAllInscriptions() {
        // Utiliser 'event_id' au lieu de 'evenement_id' dans la requête
        $stmt = $this->conn->prepare("
            SELECT i.id, p.nom AS participant_nom, 
                   e.titre AS evenement_titre, i.date_inscription
            FROM inscriptions i 
            JOIN participants p ON i.participant_id = p.id
            JOIN events e ON i.event_id = e.id  -- Changer 'i.evenement_id' en 'i.event_id'
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getInscriptions() {
        $sql = "
            SELECT p.nom AS nom_participant, p.email, e.titre AS nom_evenement, e.date_evenement
            FROM inscriptions i
            JOIN participants p ON i.participant_id = p.id
            JOIN events e ON i.event_id = e.id
            ORDER BY i.date_inscription DESC";
        
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getParticipants() {
        $stmt = $this->conn->prepare("SELECT * FROM participants");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvenements() {
        $stmt = $this->conn->prepare("SELECT * FROM events");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createInscription($participant_id, $evenement_id) {
        $stmt = $this->conn->prepare("
            INSERT INTO inscriptions (participant_id, evenement_id, date_inscription) 
            VALUES (:participant_id, :evenement_id, NOW())
        ");
        return $stmt->execute([
            'participant_id' => $participant_id,
            'evenement_id' => $evenement_id
        ]);
    }

    public function deleteInscription($id) {
        $stmt = $this->conn->prepare("DELETE FROM inscriptions WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
