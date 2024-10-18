<?php
include 'db_connection.php';  // Conexión a la base de datos

// Variables para almacenar los filtros
$materiaFilter = isset($_POST['materiaFilter']) ? $_POST['materiaFilter'] : '';
$turnoFilter = isset($_POST['turnoFilter']) ? $_POST['turnoFilter'] : '';
$anioFilter = isset($_POST['anioFilter']) ? $_POST['anioFilter'] : '';

// Consulta para obtener las materias disponibles para el filtro (código y descripción)
$materiasQuery = "SELECT CODIGO_MATERIA, NOMBRE_MATERIA FROM materias";
$materiasResult = $conn->query($materiasQuery);

// Consulta para obtener las clases con los filtros aplicados
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
WHERE 
    (m.NOMBRE_MATERIA LIKE ? OR ? = '') AND
    (CASE 
        WHEN c.HORA IN ('08:00-10:00', '10:10-12:10', '08:00-12:10') THEN 'Mañana'
        WHEN c.HORA IN ('18:00-20:00', '20:10-22:10', '18:00-22:10') THEN 'Noche'
        ELSE 'Desconocido'
    END LIKE ? OR ? = '') AND
    (CASE
        WHEN LEFT(c.COMISION, 3) = '1ro' THEN '1'
        WHEN LEFT(c.COMISION, 3) = '2do' THEN '2'
        WHEN LEFT(c.COMISION, 3) = '3ro' THEN '3'
        ELSE 'Desconocido'
    END LIKE ? OR ? = '')
";

// Preparar la consulta
$stmt = $conn->prepare($query);
$materiaFilterParam = '%' . $materiaFilter . '%';
$turnoFilterParam = $turnoFilter;
$anioFilterParam = $anioFilter;
$stmt->bind_param('ssssss', $materiaFilterParam, $materiaFilterParam, $turnoFilterParam, $turnoFilterParam, $anioFilterParam, $anioFilterParam);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clases</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Clases</h1>
        
        <!-- Filtros -->
        <form method="POST" class="row mb-3">
            <div class="col">
                <label for="materiaFilter">Filtrar por Materia (Descripción):</label>
                <select id="materiaFilter" name="materiaFilter" class="form-control">
                    <option value="">Todos</option>
                    <?php while ($materia = $materiasResult->fetch_assoc()): ?>
                        <option value="<?= $materia['NOMBRE_MATERIA'] ?>" <?= ($materiaFilter == $materia['NOMBRE_MATERIA']) ? 'selected' : '' ?>>
                            <?= $materia['NOMBRE_MATERIA'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col">
                <label for="turnoFilter">Filtrar por Turno:</label>
                <select id="turnoFilter" name="turnoFilter" class="form-control">
                    <option value="">Todos</option>
                    <option value="Mañana" <?= ($turnoFilter == 'Mañana') ? 'selected' : '' ?>>Mañana</option>
                    <option value="Noche" <?= ($turnoFilter == 'Noche') ? 'selected' : '' ?>>Noche</option>
                </select>
            </div>
            <div class="col">
                <label for="anioFilter">Filtrar por Año:</label>
                <select id="anioFilter" name="anioFilter" class="form-control">
                    <option value="">Todos</option>
                    <option value="1" <?= ($anioFilter == '1') ? 'selected' : '' ?>>1er Año</option>
                    <option value="2" <?= ($anioFilter == '2') ? 'selected' : '' ?>>2do Año</option>
                    <option value="3" <?= ($anioFilter == '3') ? 'selected' : '' ?>>3er Año</option>
                </select>
            </div>
            <div class="col d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <!-- Tabla de Clases -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código Materia</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Temas</th>
                    <th>Novedades</th>
                    <th>Comisión</th>
                    <th>Aula</th>
                    <th>Archivos</th>
                    <th>Turno</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($clase = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $clase['CODIGO_MATERIA'] ?></td>
                            <td><?= $clase['DESCRIPCION'] ?></td>
                            <td><?= $clase['FECHA'] ?></td>
                            <td><?= $clase['HORA'] ?></td>
                            <td><?= $clase['TEMAS'] ?></td>
                            <td><?= $clase['NOVEDADES'] ?></td>
                            <td><?= $clase['COMISION'] ?></td>
                            <td><?= $clase['AULA'] ?></td>
                            <td><?= ($clase['ARCHIVOS'] ? $clase['ARCHIVOS'] : 'N/A') ?></td>
                            <td><?= $clase['TURNO'] ?></td>
                            <td><?= $clase['AÑO'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center">No hay clases disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php 
    // Cierra la conexión
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
