<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 7");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{

$vector = array("uno", "grande", "caminos", "a");

ordenar($vector);

print_r($vector);

}
