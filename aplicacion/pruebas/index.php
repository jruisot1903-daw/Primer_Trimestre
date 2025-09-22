<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("APLICACION PRUEBA");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
?>
    Estas en pruebas
    <br>
    <a href="./sintaxisBasica.php">Sintaxisbasica</a>
<?php

}