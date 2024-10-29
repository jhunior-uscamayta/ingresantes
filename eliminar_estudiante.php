<?php
require_once __DIR__ . '/includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (eliminarEstudiante($id)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al eliminar el estudiante.";
    }
} else {
    echo "ID no válido.";
}
?>
