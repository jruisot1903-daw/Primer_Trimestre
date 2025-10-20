<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio1");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    echo "<h3>Esta abstracto los metodos</h3>";
   /* $objt1 = new InstrumentoBase("Maracas",20);
    $objt2 = new InstrumentoBase("Maracas",21);
    
    echo "<h1>Prueba InstrumentosBase</h1><br>";
    echo "$objt1";
    echo "$objt2";*/

}