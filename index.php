<?php
require 'includes/functions.php';
$estudiantes = obtenerEstudiantes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Listado de Estudiantes</title>
</head>
<body>

<header>
    <h1>Registro de Estudiantes</h1>
</header>

<div class="container">
    <h2>Listado de Estudiantes</h2>
    <a href="agregar_estudiante.php">Agregar Estudiante</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Fecha de Nacimiento</th>
            <th>Foto</th>
            <th>Lugar de Procedencia</th>
            <th>Certificado</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($estudiantes)): ?>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr>
                    <td><?= htmlspecialchars($estudiante['nombre']) ?></td>
                    <td><?= htmlspecialchars($estudiante['apellidos']) ?></td>
                    <td><?= htmlspecialchars($estudiante['dni']) ?></td>
                    <td><?= htmlspecialchars($estudiante['fecha_nacimiento']) ?></td>
                    <td>
                        <?php if (!empty($estudiante['foto']) && file_exists($estudiante['foto'])): ?>
                            <img src="<?= htmlspecialchars($estudiante['foto']) ?>" width="50" height="50" alt="Foto de <?= htmlspecialchars($estudiante['nombre']) ?>">
                        <?php else: ?>
                            <img src="images/default.jpg" width="50" height="50" alt="Foto no disponible">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($estudiante['lugar_procedencia']) ?></td>
                    <td>
                        <?php if (!empty($estudiante['certificado'])): ?>
                            <a href="ver_certificado.php?id=<?= htmlspecialchars($estudiante['_id']) ?>">Ver PDF</a>
                        <?php else: ?>
                            No disponible
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="editar_estudiante.php?id=<?= htmlspecialchars($estudiante['_id']) ?>">Editar</a>
                        <a href="eliminar_estudiante.php?id=<?= htmlspecialchars($estudiante['_id']) ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?');">Eliminar</a>
                    </td>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No hay estudiantes registrados.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
