<?php
// Recibimos el array de carrera y materias
$data = include '../api/filtrar_materias.php';
$carrera = $data['carrera'];
$materias = $data['materias'];

// Recuperamos los valores actuales de los filtros
$año_seleccionado = $_GET['año'] ?? '';
$turno_seleccionado = $_GET['turno'] ?? '';
$comision_seleccionada = $_GET['comision'] ?? '';
$materia_seleccionada = $_GET['materia'] ?? ''; // Nuevo filtro por materia
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias - Gestión Clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h3 class="my-4">Materias de la Carrera: <span class="text-info"><?php echo $carrera; ?></span></h3>

        <form action="materias.php" method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="año" class="form-label">Filtrar por Año</label>
                <select id="año" name="año" class="form-select">
                    <option value="" <?php echo ($año_seleccionado == '') ? 'selected' : ''; ?>>Todos</option>
                    <option value="1" <?php echo ($año_seleccionado == '1') ? 'selected' : ''; ?>>1° Año</option>
                    <option value="2" <?php echo ($año_seleccionado == '2') ? 'selected' : ''; ?>>2° Año</option>
                    <option value="3" <?php echo ($año_seleccionado == '3') ? 'selected' : ''; ?>>3° Año</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="turno" class="form-label">Filtrar por Turno</label>
                <select id="turno" name="turno" class="form-select">
                    <option value="" <?php echo ($turno_seleccionado == '') ? 'selected' : ''; ?>>Todos</option>
                    <option value="Mañana" <?php echo ($turno_seleccionado == 'Mañana') ? 'selected' : ''; ?>>Mañana</option>
                    <option value="Noche" <?php echo ($turno_seleccionado == 'Noche') ? 'selected' : ''; ?>>Noche</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="comision" class="form-label">Filtrar por Comisión</label>
                <select id="comision" name="comision" class="form-select">
                    <option value="" <?php echo ($comision_seleccionada == '') ? 'selected' : ''; ?>>Todas</option>
                    <option value="1ro1ra" <?php echo ($comision_seleccionada == '1ro1ra') ? 'selected' : ''; ?>>1ro1ra</option>
                    <option value="1ro2da" <?php echo ($comision_seleccionada == '1ro2da') ? 'selected' : ''; ?>>1ro2da</option>
                    <option value="2do1ra" <?php echo ($comision_seleccionada == '2do1ra') ? 'selected' : ''; ?>>2do1ra</option>
                    <!-- Agregar más opciones según las comisiones -->
                </select>
            </div>

            <!-- Nuevo filtro por materia -->
            <div class="col-md-3">
                <label for="materia" class="form-label">Filtrar por Materia</label>
                <input type="text" id="materia" name="materia" class="form-control" placeholder="Buscar por materia" value="<?php echo htmlspecialchars($materia_seleccionada); ?>">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="materias.php" class="btn btn-secondary">Borrar Filtros</a> <!-- Botón de Borrar Filtros -->
            </div>
        </form>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Código de Materia</th>
                    <th>Descripción</th>
                    <th>Comisión</th>
                    <th>Turno</th>
                    <th>Horario</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($materias as $materia) {
                    echo "<tr>
                        <td>{$materia['CODIGO_MATERIA']}</td>
                        <td>{$materia['NOMBRE_MATERIA']}</td>
                        <td>{$materia['COMISION']}</td>
                        <td>{$materia['TURNO']}</td>
                        <td>{$materia['HORA']}</td>
                        <td><a href='ver_clases.php?materia={$materia['CODIGO_MATERIA']}' class='btn btn-info'>Ver Clases</a></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
