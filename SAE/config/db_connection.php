<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tu contraseña es diferente
$dbname = "gestion_clases_ppr3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
