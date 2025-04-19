<?php
class Database {
    private $host = "localhost";
    private $db_name = "gestion_evenements";
    private $username = "root";
    private $password = "";
    private static $conn; // Déclaration de la connexion comme variable statique

    // Rendre cette méthode statique
    public static function getConnection() {
        try {
            return new PDO("mysql:host=localhost;dbname=gestion_evenements;charset=utf8", "root", "");
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

}
?>
