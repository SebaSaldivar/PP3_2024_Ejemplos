<?php
    /**Conexion a Base de Datos**/
    $servidor = "localhost";
    $basededatos = "gestion_clases_ppr3";
    $usuario  = "root";
    $password = "";

    $conn = new mysqli($servidor, $usuario, $password, $basededatos);
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error){
        http_response_code(500);
        echo json_encode(array('message' => 'Error de conexion a la base de datos: ' . $conn->connect_error));
        exit;
    }

?>