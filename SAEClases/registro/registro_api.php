<?php
require_once '../config/db_connection.php';

function registrarUsuario($nombre, $apellido, $email, $password) {
    global $conn;

    // Verificar si la persona está autorizada
    $sql_persona = "SELECT DNI_PERSONA, NOMBRE_PERSONA, APELLIDO_PERSONA, CARGO FROM personas WHERE NOMBRE_PERSONA = ? AND APELLIDO_PERSONA = ?";
    $stmt_persona = $conn->prepare($sql_persona);
    $stmt_persona->bind_param("ss", $nombre, $apellido);
    $stmt_persona->execute();
    $stmt_persona->store_result();

    if ($stmt_persona->num_rows == 0) {
        // La persona no está autorizada para registrarse
        $stmt_persona->close();
        return [
            'status' => 'no_autorizado',
            'message' => 'No está autorizada para registrarse - Comunicarse con Secretaría'
        ];
    }

    $stmt_persona->bind_result($dni_persona, $nombre_persona, $apellido_persona, $cargo_persona);
    $stmt_persona->fetch();
    $stmt_persona->close();

    // Verificar si ya existe un usuario con el mismo email
    $sql_registro = "SELECT CODIGO_USUARIO FROM usuarios WHERE MAIL_USUARIO = ?";
    $stmt_registro = $conn->prepare($sql_registro);
    $stmt_registro->bind_param("s", $email);
    $stmt_registro->execute();
    $stmt_registro->store_result();

    if ($stmt_registro->num_rows > 0) {
        // El usuario ya existe
        $stmt_registro->close();
        return [
            'status' => 'usuario_existente',
            'message' => 'El usuario ya está registrado.'
        ];
    }
    $stmt_registro->close();

    // Registrar al nuevo usuario
    $sql_usuario = "INSERT INTO usuarios (DNI_PERSONA, MAIL_USUARIO, CONTRASEÑA_USUARIO) VALUES (?, ?, ?)";
    $stmt_usuario = $conn->prepare($sql_usuario);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt_usuario->bind_param("iss", $dni_persona, $email, $hashed_password);
    $resultado = $stmt_usuario->execute();
    $codigo_usuario = $conn->insert_id; // Obtener el ID autogenerado
    $stmt_usuario->close();

    if ($resultado) {
        // Devolver todos los datos necesarios para crear el objeto Usuario
        return [
            'status' => 'registro_exitoso',
            'usuario' => [
                'codigo_usuario' => $codigo_usuario,
                'dni_persona' => $dni_persona,
                'nombre_persona' => $nombre_persona,
                'apellido_persona' => $apellido_persona,
                'cargo_persona' => $cargo_persona,
                'email' => $email,
                'password' => $hashed_password
            ]
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Ocurrió un error al registrar el usuario.'
        ];
    }
}
