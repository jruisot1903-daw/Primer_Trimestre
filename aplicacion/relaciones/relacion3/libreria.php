<?php
//Ejercicio1
function cuentaVeces(&$array, $calve, $valor, &$num2)
{
    static $llamadas = 0;

    if (($calve === "2daw") || ($calve === "primera")) {
        return false;
    } else {
        $llamadas++;
        $array[$calve] = $valor;

        $num2 = $llamadas;
        return true;
    }
}

//Ejercicio2
function generarCadena($long = 10)
{
    if ($long <= 0) {
        return false;
    }

    $cadena = '';
    for ($i = 0; $i < $long; $i++) {
        // Generar un número ASCII válido
        $ascii = rand(48, 122);

        // Validar que esté dentro de los rangos permitidos
        if (
            ($ascii >= 48 && $ascii <= 57) ||   // Números 0–9
            ($ascii >= 65 && $ascii <= 90) ||   // Letras mayúsculas A–Z
            ($ascii >= 97 && $ascii <= 122)     // Letras minúsculas a–z
        ) {
            $cadena .= chr($ascii);
        } else {
            $i--; // Repetir el ciclo si el carácter no es válido
        }
    }
    return $cadena;
}

//Ejercicio3
function Operaciones($indice, ...$otros){
    switch ($indice) {
        case 1: // el array_sum nos permite recorrer el array y sumar sus datos 
            return   array_sum($otros);
            break;
        case 2: // utilizamos el array_slice para poder recorrer el array apartir de la posicion que le pongamos 
            return $otros[0] - array_sum(array_slice($otros, 1));
            break;
        case 3: // el array_reduce nos permite recorer el array y acumular sus datos 
            return array_reduce($otros, function ($acumula, $valor) {
                return $acumula * $valor;
            });
        default: // Sumamos las posiciones pares y restamos las impares     
            $restul = 0;
            $long = count($otros);
            for ($i = 0; $i < $long; $i++) {
                if ($i % 2 == 0){
                    $restul = $restul + $otros[$i];
                }else{
                    $restul = $restul - $otros[$i];
                }
            }
            return $restul;
    }
}

//Ejercicio4 
function devuelve(&$num, $num2 = 1 , $num3 = 10){
        $valor = $num;
        $num = $valor + $num2 + $num3; 
    return $valor * $num2 * $num3;
}

//Ejercicio5

function suma($a, $b) {
    return $a + $b;
}

function resta($a, $b) {
    return $a - $b;
}

function multiplicacion($a, $b) {
    return $a * $b;
}

// Función principal que usa una variable-función
function hacerOperacion($operacion, $num1, $num2) {
    // Comprobamos si la operación es válida
    if (!in_array($operacion, ['suma', 'resta', 'multiplicacion'])) {
        return false; 
    }
    // Creamos una variable que "apunta" a la función
    $funcion = $operacion;
    // Llamamos a la función correspondiente usando la variable
    return $funcion($num1, $num2);
}

//Ejercicio6

function llamadaAFuncion(int $a, int $b, callable $callback): int {
    return $callback($a, $b);
}

//Ejercicio7
function ordenar(array &$vector): void {
    // Ordenamos el array usando una función anónima como callback
    usort($vector, function($a, $b) {
        // Compara la longitud de las cadenas de forma descendente
        return strlen($b) <=> strlen($a);
    });
}