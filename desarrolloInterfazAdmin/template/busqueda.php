<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
</head>
<body>
    <a href="index.php">Volver</a>
    <h1>Busqueda</h1>
    <form action="/desarrolloInterfazAdmin/template/busqueda.php" method="get">
        <input type="search" name="palabra" id="palabra" value="<?php echo isset($_GET['palabra']) ? htmlspecialchars($_GET['palabra']) : ''; ?>">
        <input type="submit" value="Buscar">
    </form>
    <br>
    <?php
    // Verificar si se ha enviado una palabra clave
    if (isset($_GET["palabra"]) && !empty($_GET["palabra"])) {
        $keyWord = $_GET["palabra"];

        // Codificar la palabra clave para la URL
        $keyWord = rawurlencode($keyWord);

        // Construir la URL para la API
        $api_url = 'http://localhost/desarrolloInterfazAdmin/api/api_busqueda.php/' . $keyWord;

        // Obtener la respuesta de la API
        $response = file_get_contents($api_url);

        // Verificar si la respuesta fue obtenida correctamente
        if ($response === FALSE) {
            echo "<p>Error al conectar con la API.</p>";
        } else {
            // Decodificar la respuesta JSON
            $resultados = json_decode($response, true);

            // Verificar si hay errores en la decodificación JSON
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "<p>Error en la decodificación JSON: " . json_last_error_msg() . "</p>";
            } else {
                // Mostrar los resultados
                if (is_array($resultados) && !empty($resultados)) {
                    echo "<h2>Resultados:</h2>";
                    echo "<table border='1'>";
                    echo "<thead>";
                    echo "<tr><th>Nombre</th><th>Apellido</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($resultados as $resultado) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($resultado['NOMBRE_PERSONA']) . "</td>"; 
                        echo "<td>" . htmlspecialchars($resultado['APELLIDO_PERSONA']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No se encontraron resultados.</p>";
                }
            }
        }
    } else {
        // Mostrar un mensaje cuando no se ha enviado una búsqueda
        echo "<p>Ingrese un nombre o un apellido para buscar.</p>";
    }
    ?>
</body>
</html>
