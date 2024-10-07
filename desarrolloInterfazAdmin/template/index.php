<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver materias</title>
</head>

<body>
    <h1>Acceso a Materias</h1>
    <?php
    $api_url = 'http://localhost/desarrolloInterfazAdmin/api/api_materias.php';
    $response = file_get_contents($api_url);
    $listaMaterias = json_decode($response, true);

    if (is_array($listaMaterias)) {
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>
                <th>ID</th>
                <th>Carrera</th>
                <th>Nombre</th>
             </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($listaMaterias as $materia) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($materia['CODIGO_MATERIA']) . "</td>";
            echo "<td>" . htmlspecialchars($materia['ID_CARRERA']) . "</td>";
            echo "<td>" . htmlspecialchars($materia['NOMBRE_MATERIA']) . "</td>";
            echo "<td>
                            <a href='ver_clases.php?id=" . $materia['CODIGO_MATERIA'] . "&nombre=" . $materia['NOMBRE_MATERIA'] . "'><input type='button' value='Ver clases'></a>
                          </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<tr><td colspan='3'>No se encontraron materias.</td></tr>";
    }
    ?>
    <h1>Buscar Profesor</h1>
    <a href="busqueda.php">Buscar</a>
</body>

</html>