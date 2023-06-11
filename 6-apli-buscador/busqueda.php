<?php
// Incluir el controlador de MongoDB para PHP
require 'vendor/autoload.php';

// Conexión a la base de datos de MongoDB
$mongoClient = new MongoDB\Client("mongodb://rootDavid:1234@localhost:27017/");
$collection = $mongoClient->juegosp1->juegosp1;

// Obtener el título ingresado por el usuario
$titulo = $_GET["titulo"];

// Consulta para buscar videojuegos por título
$cursor = $collection->find(['titulo' => ['$regex' => $titulo, '$options' => 'i']]);

// Mostrar los resultados de la búsqueda
foreach ($cursor as $document) {
    echo "Título: " . $document->titulo . "<br>";
    echo "Desarrollador: " . $document->desarrollador->nombre . "<br>";

    echo "<hr>";
}
?>