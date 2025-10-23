<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador

$Objeto= new ClasesMisPropiedades ();
$Objeto->propPublica="publica";
$Objeto->_propPrivada="privada"; 
$Objeto->propiedad1=25;
$Objeto->propiedad2= "cadena de texto";

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio7");
cuerpo($Objeto); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo($Obj)
{
    
echo "la propiedad 1 vale ".$Obj->propiedad1."<br>";

}
