<?php
session_start(); // Iniciamos la sesión

// Verificamos si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigimos al login
    header('Location: ../login/login.php');
    exit();
}

$nombreUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Gestión de Profesores</h1>
        <p>Usuario logueado: <strong><?php echo $nombreUsuario; ?></strong></p>

        <p>Módulo gestión Admin.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
