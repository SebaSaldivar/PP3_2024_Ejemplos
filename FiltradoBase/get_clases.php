<?php
include 'db_connection.php';  // Conexión a la base de datos

// Consulta para obtener las clases, incluyendo la Comisión, el Turno, el Año, y la descripción de la materia
$query = "
SELECT 
    c.ID_CLASE, 
    c.CODIGO_MATERIA, 
    m.NOMBRE_MATERIA AS DESCRIPCION, 
    c.FECHA, 
    c.HORA, 
    c.TEMAS, 
    c.NOVEDADES, 
    c.COMISION,
    c.AULA,
    c.ARCHIVOS,
    CASE 
        WHEN c.HORA IN ('08:00-10:00', '10:10-12:10', '08:00-12:10') THEN 'Mañana'
        WHEN c.HORA IN ('18:00-20:00', '20:10-22:10', '18:00-22:10') THEN 'Noche'
        ELSE 'Desconocido'
    END AS TURNO,
    CASE
        WHEN LEFT(c.COMISION, 3) = '1ro' THEN '1'
        WHEN LEFT(c.COMISION, 3) = '2do' THEN '2'
        WHEN LEFT(c.COMISION, 3) = '3ro' THEN '3'
        ELSE 'Desconocido'
    END AS AÑO
FROM clases c
JOIN materias m ON c.CODIGO_MATERIA = m.CODIGO_MATERIA
";

$result = $conn->query($query);

// Verifica si hay resultados y crea el array para enviar al front-end
$clases = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clases[] = $row;
    }
}

// Enviar los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($clases);

$conn->close();
?>
