<?php
    
function dadoAleatorio() {
    echo "Lanzamiento de dado 6 veces: </br>";
    for ($i = 0; $i < 6; $i++) {
        $resultado = mt_rand(1, 6);
        echo "Lanzamiento " . ($i + 1) . ": " . $resultado."</br>";
    }

    $num = 1000;

$conteo = array_fill(1, 6, 0);

for ($i = 0; $i < $num; $i++) {
    $lado = mt_rand(1, 6);
    $conteo[$lado]++;
}

echo "</br>Conteo de lados en " . $num . " lanzamientos:";
foreach ($conteo as $lado => $cantidad) {
    $porcentaje = ($cantidad / $num)*100;
    echo "<br>Lado $lado: $cantidad con un porcentaje de ".round($porcentaje)."%";
}
}




?>

