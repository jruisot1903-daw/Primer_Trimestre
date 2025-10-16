<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 3");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
echo "La primera Operacion Sería la suma  <br>";
echo "<br> El resultado es: ".Operaciones(1,2,5,7,3,4)."<br>"; 

echo"<br>la segunda Operacion sería la resta <br>";
echo "<br>El resultado es :".Operaciones(5,2,5,7,3,4); 

}
