<?php
include '../conexion/db_connection.php';

$año = $_GET['año'] ?? '';
$turno = $_GET['turno'] ?? '';
$comision = $_GET['comision'] ?? '';
$materia = $_GET['materia'] ?? ''; // Nuevo filtro por materia

// Obtener el nombre de la carrera según las materias filtradas
$sql_carrera = "SELECT DISTINCT ca.TITULO_ABREVIADO 
                FROM materias m 
                JOIN carreras ca ON m.ID_CARRERA = ca.ID_CARRERA
                JOIN clases c ON m.CODIGO_MATERIA = c.CODIGO_MATERIA 
                WHERE 1=1";

// Filtros para la carrera
if ($año != '') {
    $sql_carrera .= " AND c.COMISION LIKE '$año%'";
}
if ($turno != '') {
    if ($turno == 'Mañana') {
        $sql_carrera .= " AND (c.HORA = '08:00-10:00' OR c.HORA = '10:10-12:10' OR c.HORA = '08:00-12:10')";
    } else {
        $sql_carrera .= " AND (c.HORA = '18:00-20:00' OR c.HORA = '20:10-22:10' OR c.HORA = '18:00-22:10')";
    }
}
if ($comision != '') {
    $sql_carrera .= " AND c.COMISION = '$comision'";
}

$result_carrera = $conn->query($sql_carrera);
$carrera = $result_carrera->fetch_assoc()['TITULO_ABREVIADO'] ?? 'Carrera Desconocida';

// Obtener las materias con los filtros
$sql = "SELECT m.CODIGO_MATERIA, m.NOMBRE_MATERIA, c.COMISION, c.HORA 
        FROM materias m
        JOIN clases c ON m.CODIGO_MATERIA = c.CODIGO_MATERIA
        WHERE 1=1";

// Filtros para las materias
if ($año != '') {
    $sql .= " AND c.COMISION LIKE '$año%'";
}
if ($turno != '') {
    if ($turno == 'Mañana') {
        $sql .= " AND (c.HORA = '08:00-10:00' OR c.HORA = '10:10-12:10' OR c.HORA = '08:00-12:10')";
    } else {
        $sql .= " AND (c.HORA = '18:00-20:00' OR c.HORA = '20:10-22:10' OR c.HORA = '18:00-22:10')";
    }
}
if ($comision != '') {
    $sql .= " AND c.COMISION = '$comision'";
}
if ($materia != '') {
    $sql .= " AND m.NOMBRE_MATERIA LIKE '%$materia%'"; // Filtro por descripción de la materia
}

$result = $conn->query($sql);
$materias = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Determinar turno según la hora
        $hora = $row['HORA'];
        $turno_materia = '';
        if ($hora == '08:00-10:00' || $hora == '10:10-12:10' || $hora == '08:00-12:10') {
            $turno_materia = 'Mañana';
        } else if ($hora == '18:00-20:00' || $hora == '20:10-22:10' || $hora == '18:00-22:10') {
            $turno_materia = 'Noche';
        }
        $row['TURNO'] = $turno_materia;
        $materias[] = $row;
    }
}

// Ahora `carrera` contiene el nombre de la carrera, y `materias` tiene la información de materias filtradas
return ['carrera' => $carrera, 'materias' => $materias];
?>
