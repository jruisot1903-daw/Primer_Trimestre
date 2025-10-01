<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador

$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Simulacion de foreach");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
   global $vector;
    
}
