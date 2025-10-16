<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 2");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{

    $result = "";

 $result = generarCadena();

 if ($result == false){
    echo"Error: fallo con la longitud de la cadena , no se admite (0 o numeros negativos)";
 }else{
    echo "La cadena es: $result";
 }

}
