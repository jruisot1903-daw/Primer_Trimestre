<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Controlador
$vector = array();
$vector[1] = "esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"] = array(2,5,96);
$vector[56] = 23;

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Lanzamiento de un dado");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    global $vector;

    foreach ($vector as $key => $valor) {
             echo "Posicion: ".$key." Contenido (Tipo): ".gettype($valor)."<br>";
            $tipo = gettype($valor);
            
            switch($tipo){
                case "string":
                    echo "-".$valor."-<br>";
                break;

                case "double":
                    echo "Numero: ".$valor." al cuadrado es:  ".($valor**2)."<br>";
                break;
                
                case "boolean":
                        echo $valor." ,Opuesto ".!$valor."<br>";
                    break;
                
                
            }
        }
    
}
