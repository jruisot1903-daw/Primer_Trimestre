<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador


//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 3");
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
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio1">1º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio2">2º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio3">3º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio4">4º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio5">5º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio6">6º apartado</a></li>
                            <li><a href="/aplicacion/relaciones/relacion3/ejercicio7">7º apartado</a></li>
                        </ul>
                
                    </li>

                </ul>
            </div>
<?php

}