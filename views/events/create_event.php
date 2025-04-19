<?php include_once __DIR__ . '/../layout/header.php'; ?>
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

    h2 {
        text-align: center;
        font-size: 20px;
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
    form input[type="date"],
    form textarea {
        width: 100%;
        padding: 6px 10px;
        font-size: 13px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form textarea {
        height: 70px;
        resize: vertical;
    }

    .creer {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        background-color:rgb(86, 128, 173);
        border: none;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    .creer:hover {
        background-color: #0056b3;
    }

    .error-msg {
        color: #d9534f;
        font-size: 13px;
        text-align: center;
        margin-top: 10px;
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
    <h2>Créer un événement</h2>

    <form action="../../handle_create_event.php" method="POST">
        <label for="titre">Titre</label>
        <input type="text" name="titre" required>

        <label for="date">Date</label>
        <input type="date" name="date" required>

        <label for="description">Description</label>
        <textarea name="description"></textarea>

        <input type="submit" value="Créer" class="creer">
    </form>

    <?php if (!empty($error)): ?>
        <p class="error-msg"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <a href="list_events.php" class="back-link">← Retour à la liste</a>
</div>

<?php include_once __DIR__ . '/../layout/footer.php'; ?>
