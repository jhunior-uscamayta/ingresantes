<?php
require 'vendor/autoload.php'; 

try {
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $database = $cliente->nombre_base_datos; 
    $collection = $database->nombre_coleccion;
} catch (Exception $e) {
    die("Error de conexión a MongoDB: " . $e->getMessage());
}
?>
