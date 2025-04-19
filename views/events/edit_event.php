<?php include_once __DIR__ . '/../layout/header.php';

require_once __DIR__ . '/../../models/EventModel.php';

if (!isset($_GET['id'])) {
    die("ID d'événement manquant.");
}

$model = new EventModel();
$event = $model->getEventById($_GET['id']);

if (!$event) {
    die("Événement non trouvé.");
}
?>

<style>
    body {
        background-color: #f5f5f5;
        font-size: 14px;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        max-width: 420px;
        margin: 20px auto;
        background: #fff;
        padding: 16px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    h2 {
        text-align: center;
        font-size: 20px;
        margin-bottom: 16px;
        color: #343a40;
    }

    form label {
        font-size: 13px;
        color: #555;
        margin-bottom: 3px;
        display: block;
    }

    form input[type="text"],
    form input[type="date"] {
        width: 100%;
        padding: 6px 10px;
        font-size: 13px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        background-color:rgb(86, 128, 173);
        border: none;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 14px;
        font-size: 13px;
        text-decoration: none;
        color: #007bff;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <h2>Modifier un Événement</h2>

    <form action="/gestion_evenements/handle.php?route=updateEvent&id=<?= $event['id'] ?>" method="POST">
        <label for="titre">Nom</label>
        <input type="text" name="titre" value="<?= htmlspecialchars($event['titre']) ?>" required>

        <label for="date_evenement">Date</label>
        <input type="date" name="date_evenement" value="<?= htmlspecialchars($event['date_evenement']) ?>" required>

        <label for="description">Description</label>
        <input type="text" name="description" value="<?= htmlspecialchars($event['description']) ?>" required>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="list_events.php" class="back-link">← Retour à la liste</a>
</div>
<br>
<?php include_once __DIR__ . '/../layout/footer.php'; ?>
