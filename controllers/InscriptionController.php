<?php
// require_once 'models/InscriptionModel.php';
require_once __DIR__ . '/../models/InscriptionModel.php';  // Remonter d'un niveau pour accéder à models/

class InscriptionController {
    private $inscriptionModel;

    public function __construct() {
        $this->inscriptionModel = new InscriptionModel();
    }

    public function list() {
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        include __DIR__ . '/../views/inscriptions/list_inscriptions.php';
    }

    public function create() {
        $participants = $this->inscriptionModel->getParticipants();
        $evenements = $this->inscriptionModel->getEvenements();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $participant_id = $_POST['participant_id'] ?? '';
            $evenement_id = $_POST['evenement_id'] ?? '';

            if (!empty($participant_id) && !empty($evenement_id)) {
                $success = $this->inscriptionModel->createInscription($participant_id, $evenement_id);
                if ($success) {
                    header('Location: index.php?action=inscriptions');
                    exit();
                } else {
                    echo "Erreur lors de l’inscription.";
                }
            } else {
                echo "Tous les champs sont requis.";
            }
        }

        include 'views/inscriptions/create.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $deleted = $this->inscriptionModel->deleteInscription($id);
            if ($deleted) {
                header('Location: index.php?action=inscriptions');
                exit();
            } else {
                echo "Erreur lors de la suppression de l’inscription.";
            }
        } else {
            echo "ID de l’inscription manquant.";
        }
    }
}
