<?php

require_once __DIR__ . '/../models/ParticipantModel.php';

class ParticipantController {
    private $participantModel;

    public function __construct() {
        $this->participantModel = new ParticipantModel();
    }

    public function showRegisterParticipantForm() {
        // On récupère les événements
        $evenements = $this->participantModel->getEvents();
        include_once __DIR__ . '/../views/participants/register_participant.php';
    }
    
    public function list() {
        $participants = $this->participantModel->getAllParticipants();
        include 'views/participants/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $event_id = $_POST['evenement_id'];
    
            // Créer participant
            $participant_id = $this->participantModel->addParticipant($nom, $email);
    
            // Créer inscription
            $this->participantModel->addInscription($participant_id, $event_id);
    
            // Redirige après l'inscription
            header('Location: handle.php?route=registerParticipant&success=1');
            exit();
        }
    }

    public function update() {
        $id = $_GET['id'] ?? null;
        $evenements = $this->participantModel->getEvents();
    
        if ($id) {
            $participant = $this->participantModel->getParticipantById($id);
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['nom'] ?? '';
                $email = $_POST['email'] ?? '';
                $evenement_id = $_POST['evenement_id'] ?? '';
    
                if (!empty($nom) && !empty($email) && !empty($evenement_id)) {
                    $updated = $this->participantModel->updateParticipant($id, $nom, $email);
    
                    if ($updated) {
                        // Mettre à jour l’inscription : ici, on peut choisir de supprimer et recréer
                        $this->participantModel->updateInscription($id, $evenement_id);
    
                        header('Location: index.php?action=participants');
                        exit();
                    } else {
                        echo "Erreur lors de la modification.";
                    }
                } else {
                    echo "Tous les champs sont requis.";
                }
            }
    
            include 'views/participants/update.php';
        } else {
            echo "ID du participant manquant.";
        }
    }
    

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $deleted = $this->participantModel->deleteParticipant($id);
            if ($deleted) {
                header('Location: index.php?action=participants');
                exit();
            } else {
                echo "Erreur lors de la suppression.";
            }
        } else {
            echo "ID du participant manquant.";
        }
    }
}
?>
