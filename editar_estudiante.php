<?php
require 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $estudiante = obtenerEstudiantePorId($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_procedencia = $_POST['lugar_procedencia'];
    
    $datos = [
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'dni' => $dni,
        'fecha_nacimiento' => $fecha_nacimiento,
        'lugar_procedencia' => $lugar_procedencia,
    ];

    // Manejo de la foto
    if ($_FILES['foto']['name']) {
        $ruta_foto = 'uploads/fotos/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);
        $datos['foto'] = $ruta_foto;
    }

    // Manejo del certificado
    if ($_FILES['certificado']['name']) {
        $ruta_certificado = 'uploads/certificados/' . basename($_FILES['certificado']['name']);
        move_uploaded_file($_FILES['certificado']['tmp_name'], $ruta_certificado);
        $datos['certificado'] = $ruta_certificado;
    }

    if (editarEstudiante($id, $datos)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al editar estudiante.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Estudiante</title>
</head>
<body>

<h1>Editar Estudiante</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($estudiante['nombre']) ?>" required>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" value="<?= htmlspecialchars($estudiante['apellidos']) ?>" required>
    <label for="dni">DNI:</label>
    <input type="text" name="dni" value="<?= htmlspecialchars($estudiante['dni']) ?>" required>
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($estudiante['fecha_nacimiento']) ?>" required>
    <label for="lugar_procedencia">Lugar de Procedencia:</label>
    <input type="text" name="lugar_procedencia" value="<?= htmlspecialchars($estudiante['lugar_procedencia']) ?>" required>
    <label for="foto">Foto (dejar en blanco si no se desea cambiar):</label>
    <input type="file" name="foto" accept="image/*">
    <label for="certificado">Certificado (dejar en blanco si no se desea cambiar):</label>
    <input type="file" name="certificado" accept="application/pdf">
    <button type="submit">Actualizar Estudiante</button>
</form>

</body>
</html>
