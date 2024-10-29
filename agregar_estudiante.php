<?php
require 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_procedencia = $_POST['lugar_procedencia'];
    $certificado = $_FILES['certificado'];
    $foto = $_FILES['foto'];
    
    // Manejo de la foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $ruta_foto = 'uploads/fotos/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);
    }

    // Manejo del certificado
    if (isset($_FILES['certificado']) && $_FILES['certificado']['error'] == UPLOAD_ERR_OK) {
        $ruta_certificado = 'uploads/certificados/' . basename($_FILES['certificado']['name']);
        move_uploaded_file($_FILES['certificado']['tmp_name'], $ruta_certificado);
    }


    // Manejo del certificado
    $ruta_certificado = 'uploads/certificados/' . basename($certificado['name']);
    move_uploaded_file($certificado['tmp_name'], $ruta_certificado);

    $datos = [
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'dni' => $dni,
        'fecha_nacimiento' => $fecha_nacimiento,
        'lugar_procedencia' => $lugar_procedencia,
        'foto' => $ruta_foto,
        'certificado' => $ruta_certificado,
    ];

    if (agregarEstudiante($datos)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al agregar estudiante.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Agregar Estudiante</title>
</head>
<body>

<h1>Agregar Estudiante</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required>
    <label for="dni">DNI:</label>
    <input type="text" name="dni" required>
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>
    <label for="lugar_procedencia">Lugar de Procedencia:</label>
    <input type="text" name="lugar_procedencia" required>
    <label for="foto">Foto:</label>
    <input type="file" name="foto" accept="image/*" required>
    <label for="certificado">Certificado (PDF):</label>
    <input type="file" name="certificado" accept="application/pdf" required>
    <button type="submit">Agregar Estudiante</button>
</form>

</body>
</html>
