<?php
// Conexión a la base de datos
$servername = "localhost"; // Nombre del servidor o IP
$username = "root";        // Nombre de usuario de la BD
$password = "";            // Contraseña del usuario de la BD
$dbname = "user_db";  // Nombre de la base de datos

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if(!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
