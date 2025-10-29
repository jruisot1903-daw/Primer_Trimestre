<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
require_once '../../../scripts/librerias/validacion.php';

//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 5");
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
                    <li>Actividades
                        <ul>
                            <li><a href="/aplicacion/relaciones/relacion5/pruebasValidaciones">Prueba validaciones</a></li>
                            <li><a href="/aplicacion/relaciones/relacion5/formulario">Formulario</a></li>
                            
                        </ul>
                
                </li>

                </ul>
            </div>
<?php

}