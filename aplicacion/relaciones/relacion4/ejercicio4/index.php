<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador
 $flautas = [
        Flauta::crearDesdeArray(['material' => 'plástico', 'edad' => 5]),
        Flauta::crearDesdeArray(['material' => 'metal', 'edad' => 2]),
        Flauta::crearDesdeArray([]), // usa valores por defecto
    ];

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio4");
cuerpo($flautas); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo($flautas)
{
   
// le hacemos el foreach para sacar todas las flautas que tenemos creadas
    foreach ($flautas as $flauta) {
        echo $flauta . "<br>";
    }
}
