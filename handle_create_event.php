<?php
// Inclure le contrôleur
require_once __DIR__ . '/controllers/EventController.php';

$controller = new EventController();
$controller->create();
