<?php
define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO", "desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);


spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});

include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
include(RUTABASE . "/aplicacion/config/acceso_bd.php");


// gestión bd

mysqli_report(MYSQLI_REPORT_ERROR); // paraque no nos lance exepcciones y no se pare la ejecución

 //creo todos los objetos que necesita mi aplicación

// Funciones Practica 7 

 function obtenerNombreImagen(): string {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'NO_IP';
    $ip = str_replace('.', '_', $ip);

    $navegador = strtolower($_SERVER['HTTP_USER_AGENT'] ?? 'desconocido');
    if (mb_strpos($navegador, 'chrome') !== false) {
        $nav = 'chrome';
    } elseif (mb_strpos($navegador, 'firefox') !== false) {
        $nav = 'firefox';
    } elseif (mb_strpos($navegador, 'safari') !== false) {
        $nav = 'safari';
    } else {
        $nav = 'otro';
    }

    return "imagen_{$ip}_{$nav}.jpg";
}

function crearImagen(array $puntos, string $rutaImagen): void {
    $ancho = 500;
    $alto = 500;
    $imagen = imagecreatetruecolor($ancho, $alto);

    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen, 0, 0, $blanco);

    $negro = imagecolorallocate($imagen, 0, 0, 0);
    imagerectangle($imagen, 0, 0, $ancho - 1, $alto - 1, $negro);

    foreach ($puntos as $p) {
        $rgb = Punto::COLORES[$p->getColor()]['rgb'];
        $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
        $radio = $p->getGrosor() * 3;
        imagefilledellipse($imagen, $p->getX(), $p->getY(), $radio, $radio, $color);
    }

    imagejpeg($imagen, $rutaImagen);
    imagedestroy($imagen);
}
//Version mas optima pero no sabes que navegador es 
//function obtenerNombreFichero(){
  //  $ip = $_SERVER['REMOTE_ADDR'] ?? 'NO_IP';
    //$navegador = $_SERVER['HTTP_USER_AGENT'];
    //return "puntos_". str_replace(".","_",$ip) . "_" . md5($navegador) . ".dat"; // md5 genera un hash unico del navegador para que no tengamos problemas con caracteres raros
//}

//Te indica el navegador que es en el fichero 
function obtenerNombreFichero(){
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'NO_IP';
     $navegador = strtolower($_SERVER['HTTP_USER_AGENT'] ?? 'desconocido');
    if (mb_strpos($navegador, 'chrome') !== false) {
        $navegador = 'chrome';
    } elseif (mb_strpos($navegador, 'firefox') !== false) {
        $navegador = 'firefox';
    } elseif (mb_strpos($navegador, 'safari') !== false) {
        $navegador = 'safari';
    } else {
        $navegador = 'otro';
    }

    return "puntos_". str_replace(".","_",$ip) . "_" . $navegador . ".dat"; // md5 genera un hash unico del navegador para que no tengamos problemas con caracteres raros
}

