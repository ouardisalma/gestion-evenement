<?php
require_once __DIR__ . '/../../models/InscriptionModel.php';

$inscriptionModel = new InscriptionModel();
$inscriptions = $inscriptionModel->getInscriptions();

include_once __DIR__ . '/../layout/header.php';
?>

<style>
    body {
        background-color: #f9f9f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 20px;
        font-size: 22px;
    }

    .table-container {
        max-width: 900px;
        margin: 20px auto;
        background-color: white;
        padding: 16px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    thead {
        background-color:rgb(124, 146, 170);
        color: white;
    }

    th, td {
        text-align: left;
        padding: 10px 12px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color:rgb(181, 187, 238);
    }

    td[colspan="4"] {
        text-align: center;
        font-style: italic;
        color: #888;
    }

    @media (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            margin-bottom: 15px;
        }

        th {
            background-color: transparent;
            color: #333;
            font-weight: bold;
        }

        td {
            padding: 8px 10px;
            position: relative;
            padding-left: 50%;
        }

        td::before {
            position: absolute;
            top: 8px;
            left: 10px;
            width: 45%;
            white-space: nowrap;
            font-weight: bold;
            color: #555;
        }

        td:nth-of-type(1)::before { content: "Nom du Participant"; }
        td:nth-of-type(2)::before { content: "Email"; }
        td:nth-of-type(3)::before { content: "Événement"; }
        td:nth-of-type(4)::before { content: "Date de l'événement"; }
    }
</style>

<div class="table-container">
    <h2>Liste des Inscriptions</h2>

    <table>
        <thead>
            <tr>
                <th>Nom du Participant</th>
                <th>Email</th>
                <th>Événement</th>
                <th>Date de l'événement</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($inscriptions)) : ?>
                <?php foreach ($inscriptions as $inscription): ?>
                    <tr>
                        <td><?= htmlspecialchars($inscription['nom_participant']) ?></td>
                        <td><?= htmlspecialchars($inscription['email']) ?></td>
                        <td><?= htmlspecialchars($inscription['nom_evenement']) ?></td>
                        <td><?= htmlspecialchars($inscription['date_evenement']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Aucune inscription trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div><br><br><br>
<br><br><br><br><br>
<?php include_once __DIR__ . '/../layout/footer.php'; ?>
