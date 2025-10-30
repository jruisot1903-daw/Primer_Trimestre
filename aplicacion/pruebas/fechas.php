<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$hoy = time();
$cadena=date("d/m/Y");
$cadena=date("d/m/Y");

$maniana=$hoy+24*60*60;
$cadena=date("d/m/Y",$maniana);

$inicio=0;
$cadena=date("d/m/Y",$inicio);

$fecha=mktime(0,0,0,10,1,2025);
$cadena=date("d/m/Y",$fecha);

$fecha=strftime("%d/%m/%Y",time());
//$cadena=date("d/m/Y",$fecha);

$fecha=strtotime("2025-04-26");
$cadena=date("d/m/Y",$fecha);


$fecha=new DateTime("2025-10-1");

$cadena=$fecha->format("d/m/Y");
$fecha->add(new DateInterval("P5DT5H"));
$cadena=$fecha->format("d/m/Y H:i:s");



//dibuja la plantilla de la vista
inicioCabecera("pruebas");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
   esta en pruebas fechas
<?php

}