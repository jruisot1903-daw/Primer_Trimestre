<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2 - Ejercicio 4");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
   $valor = 17.5;
   $valor2 =  379987.24;

   $format1 = number_format($valor,1,',','');
   $format2 = number_format($valor2,2,',','.');
// STR_PAD_LEFT nos va a servir para poder poner lo 0 o espacios a la izquierda en este caso
   $valor1_final = '-' . str_pad($format1, 15, '0', STR_PAD_LEFT) . '-';
   $valor2_final = '-' . str_pad($format2, 15, ' ', STR_PAD_LEFT) . '-';

   echo "Primer valor: $valor1_final <br>";
   echo "Segundo valor: $valor2_final";

}