<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2 - Ejercicio 2");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{



    $texto = "Está la niña en casa";
    echo "<h3>Prueba con mb_str_split</h3> <br>";
    $array_texto = mb_str_split($texto); //separar el texto en un array de caracteres

    foreach ($array_texto as $index => $char) {
        echo str_repeat("&nbsp", $index) . $char . "<br>"; // el &nbsp es para que no se eliminen los espacios en blanco
    }


    echo "<br> <h3>Prueba con mb_substr</h3> <br>";

    for ($i = 0; $i < mb_strlen($texto); $i++) {
        echo str_repeat("&nbsp", $i) . mb_substr($texto, $i, 1) . "<br>"; // prueba con mb_substr
    }

    echo "<br> <h3>Prueba con []</h3> <br>";

    for ($i = 0; $i < strlen($texto); $i++) {
        echo str_repeat("&nbsp", $i) . $texto[$i] . "<br>"; // Usando []
    }


    echo "<br> <h3>Prueba con substr</h3> <br>";

    for ($i = 0; $i < strlen($texto); $i++) {
        echo str_repeat("&nbsp", $i) . substr($texto, $i, 1) . "<br>"; // prueba con substr
    }

    echo "<br> Depues de probar las diferentes las unicas que sacan los caracteres especiales son las que usan mb_ <br>";

    echo "<br><h2>**************************** Orden inverso ****************************</h2><br>";

    /* $array_texto = array_reverse($array_texto); //dar la vuelta al array

foreach ($array_texto as $index => $char) {
    echo str_repeat( "&nbsp", $index) . $char . "<br>"; 
}*/

    for ($i = mb_strlen($texto) - 1; $i >= 0; $i--) {
        echo str_repeat("&nbsp", mb_strlen($texto) - 1 - $i) . mb_substr($texto, $i, 1) . "<br>";
    }

    echo "<br> Orden Inverso con mb_substr y intercalando mayusculas y minusculas<br>";
    for ($i = mb_strlen($texto) - 1; $i >= 0; $i--) {
        if ($i % 2 != 0) {
            $texto_char = mb_strtoupper(mb_substr($texto, $i, 1));
        } else {
            $texto_char = mb_strtolower(mb_substr($texto, $i, 1));
        }
        echo str_repeat("&nbsp", mb_strlen($texto) - 1 - $i) . $texto_char . "<br>";
    }

    echo "<br> <h3>Separar la cadena utilizando la letra 'a' </h3>";

    $partes = explode("a", $texto); 
// explode busca hasta el caracter que le pones dentro de la cadena que quieras y te lo guarda cada parte en un array

    foreach ($partes as $clave => $valor) {
        echo "<br> Parte $clave: $valor <br>";
    }

    echo "<br><h3>Cambiar la palabra niña y ponerle niña/mujer</h3><br>";

    $posNina = mb_strpos($texto,"niña");
    if ($posNina == false){
        echo "niña no se encuentra";
    }else
        $posiEs = $posNina+mb_strlen("niña");
        $cadena1 = mb_substr($texto,0,$posiEs) . "/mujer". mb_substr($texto,$posiEs+1);
        
        echo "<br> $cadena1";
}
