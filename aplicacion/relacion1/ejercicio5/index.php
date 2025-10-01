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

inicioCuerpo("Ejercicio de \$vector");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo()
{
    global $vector;

    foreach ($vector as $key => $valor) { // hacemos el foreach para recorrer el array 
             echo "Posicion: ".$key." Contenido (Tipo): ".gettype($valor)."<br>"; // Mostramos la posicion y el tipo del contenido que tiene el array
            $tipo = gettype($valor); // guardamos el tipo de la variable para utilizarlo como condición del switch
            
            switch($tipo){ // hacemos el switch con sus respectivas salidas para cada caso 
                case "string":
                    echo "&nbsp-".$valor."-<br>";
                break;

                case "double":
                    echo "&nbspNumero: ".$valor." al cuadrado es:  ".($valor**2)."<br>";
                break;
                
                case "boolean":
                        echo "&nbsp".(int)$valor." ,Opuesto ".!$valor."<br>"; // he tenido que hacerle un castin a int ya que al utilizar el echo lo pasa a texto y el falso en negativo es un string vacio
                    break;
                
                case "array":
                        foreach($valor as $keys => $value){
                            echo "&nbsp Posicion del 2 array: ".$keys." contenido: ".$value."<br>"; // &nbsp se utiliza en html para poner un espacio en blanco
                        }
                    break;
                
                case "integer":
                        echo "&nbsp Valor ".$valor." en binario ".decbin($valor);
                    break;
                
            }
        }
    
}
