<?php
include '../config/db_connection.php'; // Incluir la conexión a la base de datos
include '../classes/Usuario.php'; // Incluir la clase Usuario
include 'registro_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Llamar a la función de la API para registrar al usuario
    $resultado = registrarUsuario($nombre, $apellido, $email, $password);

    if ($resultado['status'] === 'registro_exitoso') {
        // Crear el objeto Usuario con los datos retornados
        $usuario_data = $resultado['usuario'];
        $nuevoUsuario = new Usuario(
            $usuario_data['codigo_usuario'],
            $usuario_data['dni_persona'],
            $usuario_data['nombre_persona'],
            $usuario_data['apellido_persona'],
            $usuario_data['cargo_persona'],
            $usuario_data['email'],
            $usuario_data['password']
        );

        // Ahora puedes trabajar con el objeto $nuevoUsuario
        echo "Registro exitoso. Bienvenido, " . $nuevoUsuario->getNombre();
    } else {
        // Mostrar mensajes de error basados en el estado
        echo $resultado['message'];
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