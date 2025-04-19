<?php
require_once __DIR__ . '/../models/EventModel.php'; // Inclure le modèle des événements
include __DIR__ . '/../views/events/list_events.php';

class EventController {
    private $eventModel;

    // Constructeur pour initialiser le modèle des événements
    public function __construct() {
        $this->eventModel = new EventModel();
    }

    // Afficher le formulaire de création d'événement
    public function showCreateEventForm() {
        include __DIR__ . '/../views/events/create_event.php';
    }

    // Fonction pour créer un événement
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titre = $_POST['titre'] ?? '';
            $date = $_POST['date'] ?? '';
            $description = $_POST['description'] ?? '';

            $eventModel = new EventModel();
            $result = $eventModel->createEvent($titre, $date, $description);

            if ($result) {
                echo "✅ Événement ajouté avec succès.";
                // Redirige si tu veux :
                // header("Location: ../views/events/list_events.php");
            } else {
                echo "❌ Erreur lors de l'ajout de l'événement.";
            }
        } else {
            echo "⚠️ Requête invalide.";
        }
    }
    public function getEvents() {
        $stmt = $this->conn->query("SELECT * FROM events"); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);  // Affiche le contenu de la variable pour le débogage
        return $result;
    }
    
    // Fonction pour afficher la liste des événements
    public function list() {
        $events = $this->eventModel->getAllEvents();
        include __DIR__ . '/../views/events/list_events.php'; // Inclure la vue de la liste des événements
    }

    // Fonction pour modifier un événement existant
//     public function update() {
//         $error = '';  // Variable pour stocker les messages d'erreur
//         $id = $_GET['id'] ?? null;
//         if ($id) {
//             $event = $this->eventModel->getEventById($id);

//             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                 $titre = $_POST['titre'] ?? '';
//                 $date = $_POST['date_evenement'] ?? '';
//                 $description = $_POST['description'] ?? '';

//                 // Validation des données
//                 if (empty($titre) || empty($date)) {
//                     $error = "Tous les champs sont obligatoires.";
//                 } else {
//                     $updated = $this->eventModel->updateEvent($id, $titre, $date, $description);
//                     if ($updated) {
//                         header('Location: index.php?action=list');
//                         exit();
//                     } else {
//                         $error = "Erreur lors de la mise à jour.";
//                     }
//                 }
//             }

//             // Affichage de la vue de modification
//             include __DIR__ . '/../views/events/edit_event.php';
//         } else {
//             echo "ID de l’événement manquant.";
//         }
//     }

//     // Fonction pour supprimer un événement
//     public function delete() {
//         $id = $_GET['id'] ?? null;
//         if ($id) {
//             $deleted = $this->eventModel->deleteEvent($id);
//             if ($deleted) {
//                 header('Location: index.php?action=list');
//                 exit();
//             } else {
//                 echo "Erreur lors de la suppression.";
//             }
//         } else {
//             echo "ID de l’événement manquant.";
//         }
//     }
// }
// 
// 
public function updateEvent($id) {
    require_once __DIR__ . '/../models/EventModel.php';
    $model = new EventModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $date = $_POST['date_evenement'];
        $lieu = $_POST['description'];

        $model->updateEvent($id, $titre, $date, $lieu);
        header("Location: /gestion_evenements/views/events/list_events.php?success=1");
        exit;
    } else {
        echo "Méthode non autorisée";
    }
}

// public function deleteEvent($id) {
//     require_once __DIR__ . '/../models/EventModel.php';
//     $model = new EventModel();
//     $model->deleteEvent($id);
//     header("Location: /gestion_evenements/views/events/list_events.php?deleted=1");
//     exit;
// }
public function deleteEvent($id) {
    require_once __DIR__ . '/../models/EventModel.php';
    $model = new EventModel();
    $model->deleteEvent($id);
    
    // AUCUN output ici avant le header !
    header("Location: /gestion_evenements/views/events/list_events.php?deleted=1");
    exit;
}

}
?>
