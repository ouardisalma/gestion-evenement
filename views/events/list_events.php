<?php
require_once __DIR__ . '/../../models/EventModel.php';
require_once __DIR__ . '/../layout/header.php';

$eventModel = new EventModel();
$events = $eventModel->getEvents();
?>
<style>
    .card-title {
    font-weight: 600;
}

.card-footer a {
    min-width: 100px;
    text-align: center;
}

</style>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Événements à venir</h2>
        <a href="/gestion_evenements/views/events/create_event.php" class="btn btn-success">
            <i class="fas fa-calendar-plus"></i> Ajouter un événement
        </a>
    </div>

    <?php if (!empty($events)) : ?>
        <div class="row">
            <?php foreach ($events as $event) : ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= htmlspecialchars($event['titre']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                📅 <?= htmlspecialchars($event['date_evenement']) ?>
                            </h6>
                            <p class="card-text"><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                        </div>
                        <div class="card-footer bg-white d-flex justify-content-between">
                            <a href="/gestion_evenements/views/events/edit_event.php?id=<?= $event['id'] ?>" class="btn btn-sm btn-outline-primary">
                                Modifier
                            </a>
                            <a href="/gestion_evenements/handle.php?route=deleteEvent&id=<?= $event['id'] ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info">Aucun événement disponible pour le moment.</div>
    <?php endif; ?>
</div>

<?php include_once __DIR__ . '/../layout/footer.php'; ?>
