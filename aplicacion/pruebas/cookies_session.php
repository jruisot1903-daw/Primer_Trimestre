<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//creaccion de una cookie
setcookie("información","Hoy es Lunes",time()+2*24*3600);   // cramos la cookie
setcookie("información",false); // borramos la cookie

if(isset($_COOKIE["información"])){ // si la cookie existe 
    $mensaje=$_COOKIE["información"]; // leemos el contenido de la misma
}

// creaccion de una session

session_start(); // iniciamos la session

$_SESSION["teclado"] = "español";
$_SESSION["usado"] = false;

// session_destroy(); // destruimos / borramos la sesion 


// Roles de usuario 



//dibuja la plantilla de la vista
inicioCabecera("Cookies y Sessions");
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

}