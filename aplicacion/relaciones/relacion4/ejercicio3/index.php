<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio3");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    $InstrViento = new InstrumentoViento("metal", 20);

    echo $InstrViento; 
    echo "<br>";
    echo $InstrViento->sonido();
    echo "<br>";
    echo $InstrViento->afinar();
}