<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador

$var = 12;

#Si existe o no existe es como un if y else 
if (isset($Var))
    $Var++;

unset($var);

//Variable variable 
$num = mt_rand(1,10); //genera un numero aleatorio entre 1 y 10
$nombre = 'Profesor';
$apellido = '2daw';


if($num<=5){
    $var = "nombre";

} else {
    $var = "apellido";
}

$resultado = $$var; // nos permite assignar el contenido de una variable 

$var = 12;
if(gettype($var) == 'integer'){
    $resultado = "Es entero";
}
$var = "es una cadena";
// Con gettype podemos comprobar de que tipo es una variable 

$num = 0x1485;

$num = 1234567890123456789;

settype($num, "float"); //con settype le asigamos el tipo a una variable 
$num = intval("1234"); // para trasformar a tipo entero  
$num = intval("esto"); // en este caso no saldría NOT A NUMBER o nos lo combierte a 0 directamente

$cadena ="Esta es la cadena 'nueva cadena'";
$cadena ="Esta es la cadena '\"nueva cadena\"";
$cadena = "la variable \$num tiene como valor $num";

//Maneras de hacer casting en PHP 
$num = 12;
$num = (double) $num; // es como si lo hicieramos en java 
settype($num,"string");
$num = intval($num);

if($num>1){
    $resultado = "todo correcto";
    $cadena = "ok";
}
$sum = 10;

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("APLICACION DE PRUEBA");
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
