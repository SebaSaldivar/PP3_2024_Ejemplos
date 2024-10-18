<?php
include '../conexion/db_connection.php';

$materia_id = $_GET['materia'] ?? 0;

// Obtener los datos de la materia
$sql_materia = "SELECT NOMBRE_MATERIA FROM materias WHERE CODIGO_MATERIA = $materia_id";
$result_materia = $conn->query($sql_materia);
$materia_nombre = $result_materia->fetch_assoc()['NOMBRE_MATERIA'] ?? 'Materia Desconocida';

// Obtener las comisiones, horarios y turnos de la materia seleccionada
$sql_clases = "SELECT c.COMISION, c.HORA, 
                      CASE 
                          WHEN c.HORA LIKE '08:00%' OR c.HORA LIKE '10:10%' OR c.HORA LIKE '08:00-12:10%' THEN 'Mañana'
                          ELSE 'Noche'
                      END AS TURNO 
               FROM clases c 
               WHERE c.CODIGO_MATERIA = $materia_id
               GROUP BY c.COMISION, c.HORA
               ORDER BY c.COMISION ASC, c.HORA ASC";

$result_clases = $conn->query($sql_clases);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de <?php echo $materia_nombre; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Clases de <span class="text-info"><?php echo $materia_nombre; ?></span></h1>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Comisión</th>
                    <th>Horario</th>
                    <th>Turno</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_clases->num_rows > 0) {
                    while ($row = $result_clases->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['COMISION']}</td>
                                <td>{$row['HORA']}</td>
                                <td>{$row['TURNO']}</td>
                                <td><a href='../api/ver_lista_clases.php?materia=$materia_id&comision={$row['COMISION']}' class='btn btn-info'>Ver Clases</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay clases disponibles para esta materia.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="materias.php" class="btn btn-secondary">Volver a Materias</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
