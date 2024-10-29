<?php
require 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $estudiante = obtenerEstudiantePorId($id);

    if ($estudiante && !empty($estudiante['certificado'])) {
        $ruta_certificado = $estudiante['certificado'];
        if (file_exists($ruta_certificado)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($ruta_certificado) . '"');
            readfile($ruta_certificado);
            exit;
        } else {
            echo "Certificado no disponible.";
        }
    } else {
        echo "Certificado no disponible.";
    }
} else {
    echo "ID no válido.";
}
?>
