<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 6");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{

echo "Con funciones flecha:<br>";

echo llamadaAFuncion(1, 2, fn($a, $b) => $a + $b) . "<br>"; 
echo llamadaAFuncion(5, 3, fn($a, $b) => $a - $b) . "<br>"; 
echo llamadaAFuncion(4, 6, fn($a, $b) => $a * $b) . "<br>"; 


echo "\nCon funciones anónimas:<br>";

$suma = function($a, $b) { return $a + $b; };
$resta = function($a, $b) { return $a - $b; };
$multiplicacion = function($a, $b) { return $a * $b; };


echo llamadaAFuncion(1, 2, $suma) . "<br>";          
echo llamadaAFuncion(5, 3, $resta) . "<br>";        
echo llamadaAFuncion(4, 6, $multiplicacion) . "<br>"; 

}
