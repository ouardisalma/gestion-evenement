<?php

require_once 'controllers/ParticipantController.php';
require_once 'controllers/EventController.php';

$route = $_GET['route'] ?? '';  // Récupère la route demandée
$controller = new ParticipantController();  // Par défaut, on initialise le contrôleur des participants

switch ($route) {
    case 'registerParticipant':
        $controller->showRegisterParticipantForm();
        break;
    case 'createParticipant':
        $controller->create();
        break;
    // Routes pour les événements 👇
    case 'updateEvent':
        if (isset($_GET['id'])) {
            $controller = new EventController();
            $controller->updateEvent($_GET['id']);
        } else {
            echo "ID de l'événement manquant";
        }
        break;

    case 'deleteEvent':
        if (isset($_GET['id'])) {
            // Créer une nouvelle instance du contrôleur des événements
            $controller = new EventController();
            // Appel de la méthode deleteEvent() qui s'occupera de la suppression et de la redirection
            $controller->deleteEvent($_GET['id']);
        } else {
            echo "ID de l'événement manquant";
        }
        break;

    default:
        echo "Page non trouvée";
}
