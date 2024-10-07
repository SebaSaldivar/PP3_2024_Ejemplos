<?php
// Incluye la barra de navegación
include 'Inicio/navbar.php';

// Determina qué página cargar
$page = isset($_GET['page']) ? $_GET['page'] : 'gestion_profe';

// Incluye la página correspondiente
switch ($page) {
    case 'gestion_profe':
        include 'Features/gestion_profe.php';
        break;
    case 'gestion_admin':
        include 'Features/gestion_admin.php';
        break;
    default:
        include 'Features/gestion_profe.php'; // Página por defecto
}
?>
    </div> <!-- Cierre del contenedor -->
    
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
