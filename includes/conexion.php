<?php
require 'vendor/autoload.php'; 

try {
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $database = $cliente->bd_estudiante; 
    $collection = $database->estudiantes;
} catch (Exception $e) {
    die("Error de conexión a MongoDB: " . $e->getMessage());
}
?>
