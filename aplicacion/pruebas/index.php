<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador




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
   <a href="sintaxisBasica.php">Pruebas sintaxis básica</a><br>
   <a href="arrays.php">Pruebas arrays</a><br>
   <a href="fechas.php">Pruebas fechas</a><br>
   <a href="string.php">Pruebas Cadenas</a><br>
   <a href="funciones.php">Pruebas Funciones</a><br>
   <a href="clases.php">Pruebas Clases</a><br>
   <a href="formulario.php">Prueba Formulario</a><br>
   <a href="cookies_session.php">Prueba Cookies/Sesiones</a><br>
   <a href="pruebaBD.php">Prueba Base de Datos</a>
   
<?php
}