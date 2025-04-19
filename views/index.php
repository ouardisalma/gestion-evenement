<?php
// Inclure le header (menu + <body>)
include __DIR__ . '/layout/header.php';


?>
<style>
    /* Style spécifique à la page d'accueil */
.accueil-content {
    min-height: 70vh; /* pour que le footer reste en bas */
    background-color: #f4f7fa;
    padding-top: 40px;
}

.accueil-content h1 {
    color: #2c3e50;
    font-size: 2.2rem;
    font-weight: bold;
}

.accueil-content p {
    font-size: 1.1rem;
    color: #555;
}

</style>
<main class="accueil-content">
    <div class="container text-center mt-5">
        <h1 class="display-5 mb-3">Bienvenue dans l'application de gestion des événements</h1>
        <p class="lead">Veuillez utiliser le menu ci-dessus pour naviguer.</p>
        <img src="/gestion_evenements/public/event.jpg" alt="Événements" class="img-fluid mt-4" style="max-width: 500px;">
    </div>
</main>

<?php
// Inclure le footer
include __DIR__ . '/layout/footer.php';
?>
