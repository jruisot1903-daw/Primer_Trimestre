<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion1");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
?>
    <div id="barraMenu">
                <ul> 
                    <li><a href="/index.php">Inicio</a></li>
                    <li>Ejercicios
                        <ul>
                            <li><a href="/aplicacion/relacion1/ejercicio1/index.php"> 1º apartado</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio2/index.php">2º aparatado</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio3/index.php">3º apartado</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio4/index.php">4º apartado</a></li>
                        </ul>
                
                </li>

                </ul>
            </div>
<?php

}