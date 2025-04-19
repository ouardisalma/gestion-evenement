<?php
require_once __DIR__ . '/../../models/InscriptionModel.php';

$model = new InscriptionModel();
$evenements = $model->getEvenements();

include_once __DIR__ . '/../layout/header.php';


?>

<link rel="stylesheet" href="/gestion_evenements/public/css/style.css">
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

    h3 {
        text-align: center;
        font-size: 16px;
        margin-bottom: 16px;
        color:rgb(62, 90, 117);
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


<?php if (isset($_GET['success'])): ?>
    <p style="color: green;">Inscription réussie !</p>
<?php endif; ?>

<?php if (empty($evenements)): ?>
    <p>Aucun événement disponible.</p>
<?php else: ?>
    <div class="form-container">
    <h3>Inscription à un événement</h3>
    <form method="post" action="../../handle.php?route=createParticipant">
    <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br>

        <label for="evenement_id">Événement :</label>
        <select name="evenement_id" id="evenement_id" required>
            <option value="">-- Choisir un événement --</option>
            <?php foreach ($evenements as $event): ?>
                <option value="<?= $event['id'] ?>">
                    <?= htmlspecialchars($event['titre']) ?> (<?= $event['date_evenement'] ?>)
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">S'inscrire</button>
    </form>
<?php endif; ?>
</div>

<?php include_once __DIR__ . '/../layout/footer.php'; ?>
