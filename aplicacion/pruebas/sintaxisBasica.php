<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador
$var = 12;

#Si existe o no existe es como un if y else 
if (isset($Var))
    $Var++;

unset($var++);

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("APLICACION PRUEBA");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
?>
    Estas en sintaxisBasica
<?php
# Necesitamos la etiqueta <br> para hacer el salto de linea visual
    echo "<br> Esto esta escrito desde PHP".PHP_EOL;#PHP_EOL es un salto de linea
    echo "<br>Otra linea".PHP_EOL;
    echo "<br>el host de llamada ".$_SERVER['HTTP_HOST'].
    " usando el navegador ".$_SERVER['HTTP_USER_AGENT']."<br>".PHP_EOL;
}
