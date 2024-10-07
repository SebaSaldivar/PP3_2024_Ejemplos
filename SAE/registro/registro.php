<?php
include '../config/db_connection.php'; // Incluye el archivo de conexión a la base de datos
include 'registro_api.php'; // Incluye el archivo con la lógica de registro

// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Llama a la función para registrar al usuario
    $resultado = registrarUsuario($nombre, $apellido, $email, $password);

    if ($resultado === 'registro_exitoso') {
        echo "<p>Registro exitoso. <a href='../index.php'>Iniciar sesión</a></p>";
    } elseif ($resultado === 'no_autorizado') {
        echo "<p>No está autorizado a registrarse. Por favor, contáctese con Secretaría.</p>";
    } elseif ($resultado === 'usuario_existente') {
        echo "<p>El usuario ya está registrado.</p>";
    } else {
        echo "<p>No es posible registrarlo, por favor contáctese con Soporte técnico.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Registro de Usuario</h1>
    <form action="registro.php" method="post" class="w-50 mx-auto mt-5">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrarme</button>
    </form>
    <p class="text-center mt-3"><a href="../index.php">Volver al inicio</a></p>

</body>

</html>