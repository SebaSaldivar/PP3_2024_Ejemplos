<?php
// db_connection.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_clases_ppr3";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
