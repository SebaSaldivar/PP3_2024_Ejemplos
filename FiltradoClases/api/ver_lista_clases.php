<?php
include '../conexion/db_connection.php';

$materia_id = $_GET['materia'] ?? 0;
$comision = $_GET['comision'] ?? '';

// Obtener los datos de la materia
$sql_materia = "SELECT NOMBRE_MATERIA FROM materias WHERE CODIGO_MATERIA = $materia_id";
$result_materia = $conn->query($sql_materia);
$materia_nombre = $result_materia->fetch_assoc()['NOMBRE_MATERIA'] ?? 'Materia Desconocida';

// Obtener las clases de la materia y comisión seleccionadas
$sql_clases = "SELECT c.FECHA, c.HORA, c.TEMAS, c.NOVEDADES, c.ARCHIVOS, c.AULA
               FROM clases c
               WHERE c.CODIGO_MATERIA = $materia_id AND c.COMISION = '$comision'
               ORDER BY c.FECHA ASC";

$result_clases = $conn->query($sql_clases);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de <?php echo $materia_nombre; ?> - Comisión <?php echo $comision; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Clases de <span class="text-info"><?php echo $materia_nombre; ?></span></h1>
        <h3>Comisión: <?php echo $comision; ?></h3>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Aula</th>
                    <th>Temas</th>
                    <th>Novedades</th>
                    <th>Archivos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_clases->num_rows > 0) {
                    while ($row = $result_clases->fetch_assoc()) {
                        $fecha = date("d-m-Y", strtotime($row['FECHA']));
                        echo "<tr>
                                <td>{$fecha}</td>
                                <td>{$row['HORA']}</td>
                                <td>{$row['AULA']}</td>
                                <td>{$row['TEMAS']}</td>
                                <td>{$row['NOVEDADES']}</td>
                                <td>";
                        if ($row['ARCHIVOS']) {
                            echo "<a href='../archivos/{$row['ARCHIVOS']}' download>{$row['ARCHIVOS']}</a>";
                        } else {
                            echo "N/A";
                        }
                        echo "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay clases disponibles para esta comisión.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="../vistas/ver_clases.php?materia=<?php echo $materia_id; ?>" class="btn btn-secondary">Volver a Comisiones</a>
        <a href="../vistas/materias.php" class="btn btn-secondary">Volver a Materias</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
