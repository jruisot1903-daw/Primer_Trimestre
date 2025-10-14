<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador

$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

$claves = array_keys($vector); //Le metemos el array de claves a $claves
$valores = array_values($vector); // le metemos el array de valores a $valores

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
   global $vector,$claves,$valores;
   echo "<h3>Simulando Foreach</h3>";
   array_walk($vector, function($value, $key) { // con el array_walk vamos recorreiendo el array como si fuera un foreach
      echo "Clave: $key, Valor: $value<br>"; 
   });

   echo "<h3>Claves del array</h3>";
   array_walk($claves, function($value){ // hacemos lo mismo con las claves 
      echo "Claves: ".$value."<br>";
   });

   echo "<h3>Valor del array</h3>";
   array_walk($valores, function($key){ // hacemos lo mismo con los valores 
      echo "Claves: ".$key."<br>";
   });
}