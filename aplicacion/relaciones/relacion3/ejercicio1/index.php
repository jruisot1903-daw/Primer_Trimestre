<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
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

inicioCuerpo("Relacion 3 - Ejercicio 1");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    
}