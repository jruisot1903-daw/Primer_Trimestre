<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 1");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    $vector = array();
    $numero = 0;

   if (cuentaVeces($vector,"1osición",7,$numero)) {
    echo "<h3>Llamada número:$numero</h3>";
    foreach($vector as $key => $value)
        echo"<br>Clave: $key => valor: $value<br>";
} else {
    echo "Error al poner la clave , No se admiten el nombre de '2daw' ni primera ";
}

if (cuentaVeces($vector,"otra",2,$numero)) {
    echo "<h3>Llamada número:$numero</h3>";
    foreach($vector as $key => $value)
        echo"<br>Clave: $key => valor: $value";
} else {
    echo "Error al poner la clave , No se admiten el nombre de '2daw' ni primera ";
}



}
