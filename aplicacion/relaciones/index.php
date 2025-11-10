<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relaciones de Ejercicios");
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
                    <li>Relaciones
                        <ul>
                            <li><a href="/aplicacion/relaciones/relacion1">Relacion1</a></li>
                            <li><a href="/aplicacion/relaciones/relacion2">Relacion2</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3">Relacion3</a></li>
                            <li><a href="/aplicacion/relaciones/relacion4">Relacion4</a></li>
                            <li><a href="/aplicacion/relaciones/relacion5">Relacion5</a></li>
                            <li><a href="/aplicacion/relaciones/relacion7">Relacion7</a></li>
                        </ul>
                
                </li>

                </ul>
            </div>
<?php

}