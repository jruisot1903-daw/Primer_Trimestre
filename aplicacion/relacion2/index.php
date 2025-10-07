<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 2");
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
                    <li>Ejercicios
                        <ul>
                            <li><a href="/aplicacion/relacion2/ejercicio1"> 1º apartado</a></li>
                            <li><a href="/aplicacion/relacion2/ejercicio2">2º aprtado</a></li>
                        </ul>
                
                </li>

                </ul>
            </div>
<?php

}