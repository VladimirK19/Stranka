<?php
// config.php
$servername = "localhost";  // Adresa servera
$username = "root";         // Používateľské meno
$password = "";             // Heslo
$dbname = "databaza";       // Názov databázy
// Vytvorenie pripojenia
$connection = new mysqli($servername, $username, $password, $dbname);

// Kontrola pripojenia
if ($connection->connect_error) {
    die("Pripojenie zlyhalo: " . $connection->connect_error);
} else"";
?>