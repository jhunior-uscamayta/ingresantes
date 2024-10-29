<?php
require 'vendor/autoload.php'; // Solo si usas Composer para instalar MongoDB

try {
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $database = $cliente->nombre_base_datos; // Cambia "nombre_base_datos" por el nombre de tu base de datos
    $collection = $database->nombre_coleccion; // Cambia "nombre_coleccion" por el nombre de tu colección
} catch (Exception $e) {
    die("Error de conexión a MongoDB: " . $e->getMessage());
}
?>
