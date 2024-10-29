<?php
require_once 'conexion.php';

function obtenerEstudiantes() {
    global $collection;
    return $collection->find()->toArray() ?? [];
}

function agregarEstudiante($datos) {
    global $collection;
    try {
        $result = $collection->insertOne($datos);
        return $result->getInsertedCount() > 0;
    } catch (Exception $e) {
        echo "Error al agregar estudiante: " . $e->getMessage();
        return false;
    }
}

function obtenerEstudiantePorId($id) {
    global $collection;
    return $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function editarEstudiante($id, $datos) {
    global $collection;
    try {
        $result = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => $datos]
        );
        return $result->getModifiedCount() > 0;
    } catch (Exception $e) {
        echo "Error al editar estudiante: " . $e->getMessage();
        return false;
    }
}

function eliminarEstudiante($id) {
    global $collection;

    try {
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        return $result->getDeletedCount() > 0;
    } catch (Exception $e) {
        echo "Error al eliminar estudiante: " . $e->getMessage();
        return false;
    }
}


?>
