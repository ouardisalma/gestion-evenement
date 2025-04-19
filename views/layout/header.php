<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des événements</title>
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style personnalisé pour la barre de navigation */
        nav {
            background-color:rgb(153, 171, 198); /* Couleur principale */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav ul li a {
            color: white;
            font-size: 14px;  /* Taille du texte réduite */
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #ffdd57; /* Couleur de survol */
            background-color:rgb(47, 79, 114);
            border-radius: 5px;
        }

        /* Active link style */
        .nav-item.active a {
            color:rgb(237, 235, 242) !important; /* Couleur active */
            /* background-color: #0056b3; */
        }

        /* Responsivité pour les petites tailles d'écran */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gestion des événements</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/gestion_evenements/views/index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gestion_evenements/views/events/list_events.php">Liste des Événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gestion_evenements/views/events/create_event.php">Créer un nouvel événement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gestion_evenements/views/participants/register_participant.php">Inscrire un Participant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gestion_evenements/views/inscriptions/list_inscriptions.php">Liste des Inscriptions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<main>
    <!-- Le contenu dynamique sera affiché ici selon l'action -->
</main>

<!-- Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
