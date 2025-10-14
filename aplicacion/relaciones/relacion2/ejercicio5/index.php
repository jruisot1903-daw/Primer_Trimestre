<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2 - Ejercicio 5");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
   $texto = <<<HTML
<p>Este es un párrafo con el número 42</p>
<div>Otro número: 1234</div>
<a href="mailto:juan@gmail.com">juan@gmail.com</a>
<span>Correo alternativo: maria@gmail.org</span>
<p>Título principal</p>
HTML;

// Expresiones regulares
$regex_etiqueta = '/<[^>]+>/';                     // Cualquier etiqueta HTML <...>
$regex_numero = '/\b\d+\b/';                       // Números (una o varias cifras)
$regex_email = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/'; // Emails válidos

// Buscar coincidencias
preg_match_all($regex_etiqueta, $texto, $etiquetas, PREG_OFFSET_CAPTURE);
preg_match_all($regex_numero, $texto, $numeros, PREG_OFFSET_CAPTURE);
preg_match_all($regex_email, $texto, $emails, PREG_OFFSET_CAPTURE);

echo "<h4>=== ETIQUETAS HTML ===</h4><br>";
foreach ($etiquetas[0] as $match) {
    echo "Encontrado '{$match[0]}' en posición {$match[1]}<br>";
}

echo "<br><h4>=== NÚMEROS ===</h4><br>";
foreach ($numeros[0] as $match) {
    echo "Encontrado '{$match[0]}' en posición {$match[1]}<br>";
}

echo "<br><h4>=== EMAILS ===</h4><br>";
foreach ($emails[0] as $match) {
    echo "Encontrado '{$match[0]}' en posición {$match[1]}<br>";
}

}