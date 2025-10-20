<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 4");
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
                            <li><a href="/aplicacion/relaciones/relacion4/ejercicio1">1º apartado</a></li>
                           <li><a href="/aplicacion/relaciones/relacion4/ejercicio2">2º apartado</a></li>
                        </ul>
                
                    </li>

                </ul>
            </div>
<?php

}