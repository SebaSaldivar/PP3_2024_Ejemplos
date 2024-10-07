<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver clases</title>
</head>

<body>
    <?php
    $nom = $_GET["nombre"];
    echo "<h1>Clases de " . $nom . "</h1>"
    ?>

    <?php

    /*FUNCION verClasesMateria */
    function verClasesMateria()
    {
        if (isset($_GET["id"])) {
            $cod_materia = $_GET["id"];
        }
        return $cod_materia;
    }

    $api_url = 'http://localhost/desarrolloInterfazAdmin/api/api_clases.php/' . verClasesMateria();
    $response = file_get_contents($api_url);
    $listaClases = json_decode($response, true);

    if (is_array($listaClases)) {
        if (is_array($listaClases) && !empty($listaClases)) {
            echo "<table border='1'>";
            echo "<thead>";
            echo "<tr>
                            <th>ID_CLASE</th>
                            <th>CODIGO_USUARIO</th>
                            <th>CODIGO_MATERIA</th>
                            <th>fecha</th>
                            <th>hora</th>
                            <th>temas</th>
                            <th>novedades</th>
                            <th>comision</th>
                            <th>aula</th>
                            <th>archivos</th>
                          </tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($listaClases as $clase) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($clase['ID_CLASE']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['CODIGO_USUARIO']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['CODIGO_MATERIA']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['FECHA']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['HORA']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['TEMAS']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['NOVEDADES']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['COMISION']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['AULA']) . "</td>";
                echo "<td>" . htmlspecialchars($clase['ARCHIVOS']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<tr><td colspan='10'>No se encontraron clases.</td></tr>";
        }
    }
    ?>
    <a href="index.php">volver</a>


</body>

</html>