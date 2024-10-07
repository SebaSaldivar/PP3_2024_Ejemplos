<?php
require_once '../config/db_connection.php'; // Asegúrate de incluir la conexión a la base de datos

function registrarUsuario($nombre, $apellido, $email, $password)
{
    global $conn; // Usa la conexión global

    // Primero, verifica si la persona está autorizada a registrarse (se encuentra en personas) con el nombre y apellido proporcionados
    $sql_persona = "SELECT DNI_PERSONA FROM personas WHERE NOMBRE_PERSONA = ? AND APELLIDO_PERSONA = ?";
    $stmt_persona = $conn->prepare($sql_persona);
    $stmt_persona->bind_param("ss", $nombre, $apellido);
    $stmt_persona->execute();
    $stmt_persona->store_result();

    if ($stmt_persona->num_rows == 0) {
        // La persona no existe, no se puede registrar
        $stmt_persona->close();
        return 'no_autorizado'; // Código de estado para no autorizado, devuelvo el texto a registro.php
    }

    $stmt_persona->bind_result($dni_persona);
    $stmt_persona->fetch();
    $stmt_persona->close();

    // Segundo, verifica si la persona ya está registrada con el mail
    $sql_registro = "SELECT MAIL_USUARIO FROM usuarios WHERE MAIL_USUARIO = ?";
    $stmt_registro = $conn->prepare($sql_registro);
    $stmt_registro->bind_param("s", $email);
    $stmt_registro->execute();
    $stmt_registro->store_result();

    if ($stmt_registro->num_rows == 0) {
        // El usuario no existe, se puede registrar
        // Ahora inserta el nuevo usuario
        $sql_usuario = "INSERT INTO usuarios (DNI_PERSONA, MAIL_USUARIO, CONTRASEÑA_USUARIO) VALUES (?, ?, ?)";

        $stmt_usuario = $conn->prepare($sql_usuario);
        if ($stmt_usuario === false) {
            die('Prepare falló: ' . htmlspecialchars($conn->error));
        }

        // Hashea la contraseña para almacenarla de manera segura
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        //ALTER TABLE usuarios MODIFY CONTRASEÑA_USUARIO VARCHAR(255);

        // Enlaza los parámetros y ejecuta la consulta
        $stmt_usuario->bind_param("iss", $dni_persona, $email, $hashed_password);
        $resultado = $stmt_usuario->execute();

        // Cierra la declaración y retorna el resultado
        $stmt_usuario->close();
        return $resultado ? 'registro_exitoso' : false; // Retorna éxito o error
        // operador ternario: condición ? valor_si_verdadero : valor_si_falso;

    } else {
        $stmt_registro->close();
        return 'usuario_existente'; // Código de estado para usuario existente, devuelve el texto a registro.php
    }
}
