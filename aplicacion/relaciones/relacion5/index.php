<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
require_once '../../../scripts/librerias/validacion.php';

//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 5");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    $num = 25;
    echo "<h1>Pruebas Validaciones normales/filter</h1><br>";

    echo "Prueba con validaEntero con el numero $num: ";
    echo validaEntero($num, 1, 35, 10) ? "<p>El número es entero</p><br>" : "<p>El número no es entero</p><br>";
   
    echo "Prueba con validaEntero Fallando: ";
    echo validaEntero($num, 1, 20, 10) ? "<p>El número es entero</p><br>" : "<p>El número no es entero</p><br>";
    echo "el numero 25 a cambiado a : $num <br>";

    $num = (float) $num;
    echo "<br>Prueba con validaReal con el numero $num: ";
    echo validaReal($num,1,0,10) ? "<p>El número es real</p><br>" : "<p>El número no es real</p><br>";

    $fecha = "1/2/2004";
    echo "Prueba con validaFecha: ";
    echo validaFecha($fecha,"1/1/2000") ? "<p>La fecha es correcta </p><br>" : "<p>La fecha no es correcta</p><br>";


    


}