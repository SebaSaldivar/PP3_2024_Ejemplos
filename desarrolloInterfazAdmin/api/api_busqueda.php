<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/** Conexion a Base de Datos **/
require_once '../conexion/conexion.php';
//////////////////////////////////////////////////////////////////


/** Se Obtiene la palabra Clave para realizar la consulta **/
if(isset($_SERVER['PATH_INFO'])){
    $path = $_SERVER['PATH_INFO']; ///Se carga la url completa en la variable 'path'
} else {
    $path = '/';
}
$buscarid = explode('/', $path);///la funcion explode recorre la url buscando las '/' y cada que las encuentra, 
                                 //toma las palabras entre las '/' y las convierte en elementos de array
if($path !== '/'){
    $keyWord = end($buscarid);///Con end se toma el ultimo elemento del array y se lo guarda en la variable keyword
} else{
    $keyWord = null;
}
//////////////////////////////////////////////////////////////////


/** Se declaran variables para el metodo y la url **/
$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
//////////////////////////////////////////////////////////////////


/** Invoca a la funcion dependiendo del tipo de metodo **/
switch($metodo){

    // se realiza la consulta SELECT si el metodo es get
    case 'GET':
        handGetRequest($conn, $url, $keyWord);
        break;
    default:
        echo "Metodo no permitido";
        break;
}
//////////////////////////////////////////////////////////////////

/** La funcion que envia la consulta a la base de datos **/
function handGetRequest($conn, $url, $keyWord){

    /// Se ejecuta si la ruta es correcta y si existe una palabra clave
    if(strpos($url, '/api/api_busqueda.php') !== false && $keyWord !== null){

        // Primera consulta: Si keyword contiene una sola palabra se busca la MISMA en cada columna (NOMBRE y APELLIDO).
        $sql = "SELECT *
                FROM usuarios
                INNER JOIN personas
                ON usuarios.DNI_PERSONA = personas.DNI_PERSONA
                WHERE personas.NOMBRE_PERSONA LIKE '%$keyWord%' OR personas.APELLIDO_PERSONA LIKE '%$keyWord%';";
        $resultado = $conn->query($sql);
        $busqueda = array();

        while($row = $resultado->fetch_assoc()){
            $busqueda[] = $row;
        }
        //////////////////////////

        // 2da y 3ra consulta: En caso de que no haya resultado de 
        //la primera consulta y la keyword en realidad son 2 palabras en 1
        if(json_encode($busqueda)=='[]'){

            $fragmentos = explode(" ", $keyWord);//Se la separa con la funcion 'explode' cuando encuentre un espacio vacio (" ") y
                                                 // las guarda como elementos en un array llamado fragmentos a cada palabra separada 
            $sql2 = "SELECT *
                    FROM usuarios
                    INNER JOIN personas
                    ON usuarios.DNI_PERSONA = personas.DNI_PERSONA
                    WHERE personas.NOMBRE_PERSONA LIKE '%$fragmentos[0]%' OR personas.APELLIDO_PERSONA LIKE '%$fragmentos[1]%';";//Despues cada elemento se consulta en cada columna
            
            $sql3 = "SELECT *
                    FROM usuarios
                    INNER JOIN personas
                    ON usuarios.DNI_PERSONA = personas.DNI_PERSONA
                    WHERE personas.NOMBRE_PERSONA LIKE '%$fragmentos[1]%' OR personas.APELLIDO_PERSONA LIKE '%$fragmentos[0]%';";//Se repite la misma consulta pero cambiando de lugar los elementos

            
            $resultado2 = $conn->query($sql2);
            $busqueda2 = array();

            $resultado3 = $conn->query($sql3);
            $busqueda3 = array();


            while($row2 = $resultado2->fetch_assoc()){
                $busqueda2[] = $row2;
            }

            while($row3 = $resultado3->fetch_assoc()){
                $busqueda3[] = $row3;
            }
            ////////////////////////////////////////////////////////

            ///Aqui se verifica si una de las dos consultas vuelve con resultados
            if(json_encode($busqueda2) =='[]'){
                echo json_encode($busqueda3);

            }elseif(json_encode($busqueda3) =='[]'){
                echo json_encode($busqueda2);
            }else{
                echo json_encode($busqueda = "No se encontraron resultados");
            }
            //////////////////////////////////////////////////////

        }elseif(json_encode($busqueda)=='[]'){
            echo json_encode($busqueda = "No se encontraron resultados");
        }else{ 
            echo json_encode($busqueda);//Aqui se devuelve lo de la primera consulta
        }
    }

}
//////////////////////////////////////////////////////////////////

?>