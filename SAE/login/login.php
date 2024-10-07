<?php
session_start(); // Inicia la sesión

include '../config/db_connection.php'; // Conexión a la base de datos
include 'api_login.php'; // Incluye la lógica de login

// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Llama a la función para verificar el login
    $resultado = login($email, $password);

    if ($resultado) {
        $_SESSION['usuario'] = $resultado['nombre_persona']; // Guarda el nombre del usuario en la sesión
        header('Location: ../index.php'); // Redirige al index
        exit();
    } else {
        $error = "Credenciales inválidas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
    <p class="text-center mt-3"><a href="../index.php">Volver al inicio</a></p>
</body>
</html>
