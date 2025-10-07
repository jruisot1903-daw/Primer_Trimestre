<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2 - Ejercicio 1");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{

    echo "<h1>Prueba de caracteres</h1>";
    echo "<p>caracteres especiales: á é í ó ú ü ñ ¿ ¡ &lt; &gt; &amp; &quot; &#39;</p><br>";
    echo "<h3>Prueba con Heredoc</h3> <br>";

    $variable = "Mundo";
    $texto = <<<EOT
    <p>Hola $variable</p>
    <p>Con Heredoc podemos hacer referencias a las variables si las acepta </p><br>
    EOT;
    echo $texto;

    echo "<h3>Prueba con Nowdoc</h3><br>";
    $variable = "Mundo";
    $texto = <<<'EOT'
    <p>Hola $variable</p>
    <p>Con Nowdoc no podemos hacer referencia a las variables porque no las coge    </p><br>
    EOT;
    echo $texto;

}