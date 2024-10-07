<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
</head>
<body>
    <a href="index.php">volver</a>
    <h1>Busqueda</h1>
    <form action="/desarrolloInterfazAdmin/template/busqueda.php" method="get">
        <input type="search" name="palabra" id="palabra">
        <input type="submit" value="Buscar">
    </form>
    <br>
    <?php
    /* Se guarda la palabra clave en la variable keyword. Luego se reemplazan los espacios en blanco con 'str_replace' (Esto es para evitar un error)*/
    $keyWord = $_GET["palabra"];
    $keyWord = str_replace(" ", "%20", $keyWord);
    ///////
    ?>
    <h2>Resultados:</h2>
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php
  
    $api_url = 'http://localhost/desarrolloInterfazAdmin/api/api_busqueda.php/'. $keyWord;

    $response = file_get_contents($api_url);
    $resultados = json_decode($response, true);

    if(is_array($resultados)){
        foreach($resultados as $resultado){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($resultado['nombre']) . " </td>"; 
            echo "<td>" . htmlspecialchars($resultado['apellido']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
    }
    ?>
    </tbody>
    </table>

</body>
</html>