<?php

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

function obtenerNombreFichero(){
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'NO_IP';
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

    return "puntos_". str_replace(".","_",$ip) . "_" . $navegador . ".dat"; // md5 genera un hash unico del navegador para que no tengamos problemas con caracteres raros
}
