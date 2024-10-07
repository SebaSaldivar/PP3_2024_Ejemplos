<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


/**Conexion a Base de Datos**/////////////////////////////////////
require_once '../conexion/conexion.php';
//////////////////////////////////////////////////////////////////


/* Se obtiene de la url el ID de la materia seleccionada *////
if(isset($_SERVER['PATH_INFO'])){
    $path = $_SERVER['PATH_INFO'];
} else {
    $path = '/';
}

$buscarIdMateria = explode('/', $path);

if($path !== '/'){
    $id_materia = end($buscarIdMateria);
} else{
    $id_materia = null;
}
//////////////////////////////////////////////////////////////////


/* Se obtiene el metodo y la uri para utilizarlo en el metodo GET*/
$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
//////////////////////////////////////////////////////////////////


switch($metodo){
    //consulta SELECT (lectura)
    case 'GET':
        obtenerDatosClase($conn, $url, $id_materia);
        break;
    //
    case 'POST':
        echo "Consulta de registro - POST";
        break;
    default:
        echo "Metodo no permitido";
        break;
}

//Funcion de consulta
function obtenerDatosClase($conn, $url, $id_materia){
    if(strpos($url, '/api/api_clases.php') !== false){
        $sql = "SELECT * FROM clases WHERE CODIGO_MATERIA=$id_materia";

        $resultado = $conn->query($sql);
        $clases = array();

        while($row = $resultado->fetch_assoc()){
            $clases[] = $row;
        }
        echo json_encode($clases);
    }
}

?>