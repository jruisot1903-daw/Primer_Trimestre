<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
// Nombre del fichero de salida (lo que verá el usuario al descargar)
$nombreSalida = "puntos.png";

// Ruta real de la imagen generada en tu aplicación
$rutaImagen = __DIR__ . "/../../../img/puntos/" . obtenerNombreImagen();

// Cabeceras para forzar la descarga
header('Content-Type: image/png'); // indicamos el tipo de contenido
//Le ponemos el nombre con el que se descargara
header('Content-Disposition: attachment; filename="' . $nombreSalida . '"');
// Indicamos el tamaño del archivo
header('Content-Length: ' . filesize($rutaImagen));

// Volcar el contenido de la imagen
readfile($rutaImagen);

