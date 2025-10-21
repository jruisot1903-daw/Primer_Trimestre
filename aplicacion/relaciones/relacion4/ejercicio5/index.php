<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Controlador

// Obtener todos los casos posibles del enum
$estados = EstadoCivil::casos();

// Elegir uno aleatorio
$estadoAleatorio = $estados[array_rand($estados)];

// Crear una persona con ese estado
$persona = Persona::registraPersona(
    "Jose Luís",
    "10/09/1995",
    "Calle Mayor 15",
    "Albacete",
    $estadoAleatorio
);



//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4 - Ejercicio5");
cuerpo($persona); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo($p)
{
   echo $p;

}
