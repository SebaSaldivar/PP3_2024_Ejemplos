<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gestion2";

// Crear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");

// Comprobar conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
?>
