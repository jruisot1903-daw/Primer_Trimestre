<?php
    
function dadoAleatorio() {
    echo "Lanzamiento de dado 6 veces: </br>";
    for ($i = 0; $i < 6; $i++) { // hacemos el for para tirar 6 veces 
        $resultado = mt_rand(1, 6); //utilizamos el mt_rand para que nos de un numero "aleatorio" entre 1 y 6 
        echo "Lanzamiento " . ($i+1) . ": " . $resultado."</br>"; //mostramos el resultado , sumandole 1 a i para que no empiece en 0
    }

    $num = 1000; // inicializamos la variable num y le asignamos su valor 

$conteo = array_fill(1, 6, 0);  // creamos un array y lo rellenamos directamente desde el 1 al 6 y lo rellenamos con 0

for ($i = 0; $i < $num; $i++) {
    $lado = mt_rand(1, 6);
    $conteo[$lado]++; // vamos almacenando las veces que sale cada lado
}

echo "</br>Conteo de lados en " . $num . " lanzamientos:";
foreach ($conteo as $lado => $cantidad) { // hacemos el foreach del array que hemos rellenado 
    $porcentaje = ($cantidad / $num)*100; // obtenemos el % de cada numero 
    echo "<br>Lado $lado: $cantidad con un porcentaje de ".round($porcentaje)."%"; // Pintamos cada numero con su % correspondiente
}
}
?>

