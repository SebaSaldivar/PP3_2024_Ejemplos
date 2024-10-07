<?php
require_once '../config/db_connection.php'; // Conexión a la base de datos

function login($email, $password)
{
    global $conn;

    $sql = "SELECT DNI_PERSONA, MAIL_USUARIO, CONTRASEÑA_USUARIO FROM usuarios WHERE MAIL_USUARIO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($dni_persona, $email, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            //ALTER TABLE usuarios MODIFY CONTRASEÑA_USUARIO VARCHAR(255);
            $stmt->close();

             // Nueva consulta para obtener el NOMBRE_PERSONA desde personas
             $sql_persona = "SELECT NOMBRE_PERSONA FROM personas WHERE DNI_PERSONA = ?";
             $stmt_persona = $conn->prepare($sql_persona);
             $stmt_persona->bind_param("i", $dni_persona);
             $stmt_persona->execute();
             $stmt_persona->bind_result($nombre_persona);
             $stmt_persona->fetch();
 
             // Cerramos el statement y devolvemos el nombre
             $stmt_persona->close();

             return ['nombre_persona' => $nombre_persona]; // Retorna el nombre de la persona
        }
    }

    // Si la contraseña es incorrecta o no se encuentra el usuario
    return false;
}
