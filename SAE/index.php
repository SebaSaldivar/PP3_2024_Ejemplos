<?php
session_start(); // Inicia la sesión para acceder a la variable de sesión

// Lógica para habilitar los enlaces si el usuario está logueado
$sesion_iniciada = isset($_SESSION['usuario']);

?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE</title>
    <link rel="icon" href="assets/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/logo1.png" alt="Logo">
            </a>
            <img src="assets/SAE.png" alt="Tittle1" class="sae">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro/registro.php">Registro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container text-center">
        <h1>Sistema de Administración Educativa</h1>
        <p>Bienvenido, <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'invitado'; ?></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
