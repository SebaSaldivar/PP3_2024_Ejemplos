<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


/**Conexion a Base de Datos**/////////////////////////////////////
require_once '../conexion/conexion.php';
//////////////////////////////////////////////////////////////////


/* Se obtiene el metodo y la uri para utilizarlo en el metodo GET*/
$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
//////////////////////////////////////////////////////////////////


switch($metodo){

    //consulta SELECT
    case 'GET':
        accederListaMaterias($conn, $url);
        break;
    //INSERT
    case 'POST':
        echo "Consulta de registro - POST";
        break;
    default:
        echo "Metodo no permitido";
        break;
}

function accederListaMaterias($conn, $url){
    if(strpos($url, '/api/api_materias.php') !== false){
        $sql = "SELECT * FROM materias";
        $resultado = $conn->query($sql);
        $lista_materias = array();
        while($row = $resultado->fetch_assoc()){
            $lista_materias[] = $row;
        }
        echo json_encode($lista_materias);
    }
}

?>