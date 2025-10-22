<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio6");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    // Ejemplo de uso
foreach (new SerieFibonacci(10) as $valor) {
    echo "$valor&nbsp;";
}

// Ejemplo de uso del generador
echo "<br>Usando el generador:<br>";
foreach (SerieFibonacci::fFibonacci(10) as $valor) {
    echo "$valor&nbsp;";
}

}
