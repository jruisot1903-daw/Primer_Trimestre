<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador

$filas = 5; // inicializamos las filas con su valor


$numeros = []; // inicializamos el array de los numero a vacio

for ($i = 1; $i <= $filas; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        $numeros[$i][$j] = $i; 
    }
} //recorremos el array con dos for y vamos almacenando los numeros

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Triangulo de numeros");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    global $numeros; // Ponemos la variable numeros global porque si no no se reconoce con la de arriba del controlador 

    foreach ($numeros as $fila) {
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    } 
/* Para pintarlos tenemos que recorrer el array y como es bidemensional tenemos que recorerlo dos veces 
Primero se recore las filas y depues dento de cada fila vamos sacando el valor correspondiente y lo vamos pintando*/
}