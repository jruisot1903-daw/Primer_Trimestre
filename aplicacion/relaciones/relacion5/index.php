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
    echo validaEntero($num, 1, 10, 10) ? "<p>El número es entero</p><br>" : "<p>El número no es entero</p><br>";
    echo "el numero 25 a cambiado a : $num <br>";

    $num = (float) $num;
    echo "<br>Prueba con validaReal con el numero $num: ";
    echo validaReal($num,1,40,15) ? "<p>El número es real</p><br>" : "<p>El número no es real</p><br>";

    echo "<br>Prueba con validaReal Fallando: ";
    echo validaReal($num,1,9,15) ? "<p>El número es real</p><br>" : "<p>El número no es real</p><br>";
     echo "<br>el numero 10 a cambiado a : $num <br>";
     //para coger la fecha del sistema con el formato que queramos 
    $fecha = date('d/m/Y');
    $fechaMal= date('Y-m-d');
    echo "<br>Prueba con validaFecha: ";
    echo validaFecha($fecha,"1/1/2000") ? "<p>La fecha es correcta </p><br>" : "<p>La fecha no es correcta</p><br>";

    echo "<br>Prueba con validaFecha Fallando: ";
    echo validaFecha($fechaMal,"1/1/2000") ? "<p>La fecha es correcta </p><br>" : "<p>Formato de la fecha no es correcta</p><br>";

    //para obtener la hora del sistema con el formato que queramos 
    $hora = date("H:i:s");
    $horamal = date("H;i");

    echo "<br>Prueba con validaHora: ";
    echo validaHora($hora,"12:30:34") ? "<p>El formato de la hora es correcto</p>":"<p>El formato de la hora no es correcto</p>";

    echo "<br>Prueba con validaHora Fallando: ";
    echo validaHora($horamal,"12:35:10")? "<p>El formato de la hora es correcto</p>":"<p>El formato de la hora no es correcto</p>";

    


}