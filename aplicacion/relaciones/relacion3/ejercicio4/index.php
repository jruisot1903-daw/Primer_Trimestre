<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//Controlador



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3 - Ejercicio 4");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    $valor = 7;

    $devuelto = devuelve($valor, 5, 2);
    echo "Le pasamos los tres parmetros (7,5,2):<br>";
    echo "Suma: $valor y la multiplicacion: $devuelto <br>";

    $valor = 7;
    $devuelto = devuelve($valor);
    echo "Solo le pasamos el primer parametro: <br>";
    echo "Suma: $valor y la multiplicacion: $devuelto <br>";
    $valor = 7;
    $devuelto = devuelve($valor, 9);
    echo "Le pasamos el primero y el segundo solo (7,9): <br>";
    echo "Suma: $valor y la multiplicacion: $devuelto <br>";

    $valor = 7;
    $devuelto = devuelve(num: $valor, num3: 9);
    echo "le pasamos el primero y el ultimo (7,,9): <br>";
    echo "Suma: $valor y la multiplicacion: $devuelto <br>";
}
