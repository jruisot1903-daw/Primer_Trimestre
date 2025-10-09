<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador
function generarCadena($cadenaPer,$lon){
     $longitud_cad = strlen($cadenaPer);
    $cadena_Ale = '';
    for($i = 0; $i < $lon; $i++) {
        $caracter_random = $cadenaPer[mt_rand(0, $longitud_cad - 1)];
        $cadena_Ale .= $caracter_random;
    }
    return $cadena_Ale;
}


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2 - Ejercicio 3");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    echo "<h3>Palabra aleatoria generada: </h3><br>";
    echo generarCadena($caracteres_permitidos, 20);
}