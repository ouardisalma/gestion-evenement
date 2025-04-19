// Fonction pour valider le formulaire d'événement
function validateEventForm() {
    let title = document.getElementById("eventTitle").value;
    let date = document.getElementById("eventDate").value;
    let description = document.getElementById("eventDescription").value;

    if (!title || !date || !description) {
        alert("Tous les champs doivent être remplis.");
        return false;
    }
    return true;
}

// Fonction pour confirmer la suppression d'un événement
function confirmDelete(eventId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
        window.location.href = `delete_event.php?id=${eventId}`;
    }
}

// Ajout d'une animation lors du survol des lignes de tableau
let rows = document.querySelectorAll("tr");
rows.forEach(row => {
    row.addEventListener("mouseover", () => {
        row.style.backgroundColor = "#f1f1f1";
    });

    row.addEventListener("mouseout", () => {
        row.style.backgroundColor = "";
    });
});
