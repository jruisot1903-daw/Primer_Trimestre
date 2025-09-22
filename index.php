<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("APLICACION PRUEBA");
cabecera();
finCabecera();

inicioCuerpo("APLICACION PRUEBA");
cuerpo();
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
?>

    <a href="/aplicacion/articulos/verArticulos.php"> Ver
        articulos</a><br>

<?php

}
