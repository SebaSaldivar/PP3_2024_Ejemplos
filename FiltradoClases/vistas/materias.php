<?php
include '../conexion/db_connection.php';

// Obtener el nombre de la carrera (puedes filtrar por ID si es necesario)
$sql_carrera = "SELECT ca.DESCRIPCION 
                FROM carreras ca 
                WHERE ca.ID_CARRERA = 1"; // Cambiar ID_CARRERA según la carrera que desees
$result_carrera = $conn->query($sql_carrera);
$carrera = $result_carrera->fetch_assoc()['DESCRIPCION'] ?? 'Carrera Desconocida';

// Obtener el listado de materias sin repetir comisiones
$sql_materias = "SELECT DISTINCT m.CODIGO_MATERIA, m.NOMBRE_MATERIA 
                 FROM materias m 
                 JOIN clases c ON m.CODIGO_MATERIA = c.CODIGO_MATERIA
                 WHERE m.ID_CARRERA = 1"; // Cambiar según la carrera que deseas listar

$result_materias = $conn->query($sql_materias);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias de la Carrera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h3 class="my-4">Listado de Materias de la Carrera: <span class="text-info"><?php echo $carrera; ?></span></h3>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Código de Materia</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_materias->num_rows > 0) {
                    while ($row = $result_materias->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['CODIGO_MATERIA']}</td>
                                <td>{$row['NOMBRE_MATERIA']}</td>
                                <td><a href='ver_clases.php?materia={$row['CODIGO_MATERIA']}' class='btn btn-info'>Ver comisiones</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay materias disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
