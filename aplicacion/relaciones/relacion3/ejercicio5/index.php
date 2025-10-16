<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 5");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
echo "<br>Resta<br>";
echo hacerOperacion("resta", 3, 1); // Devuelve 2
echo "<br> Suma <br>";
echo hacerOperacion("suma", 5, 7);  // Devuelve 12
echo "<br>Multiplicacion<br>";
echo hacerOperacion("multiplicacion", 4, 3); // Devuelve 12
echo "<br>Prueba fallo<br>";
if(hacerOperacion("division", 10, 2)){
    echo "Esto nunca saldra";
} else 
echo "Error...";
}
