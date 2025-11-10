<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
include_once(dirname(__FILE__) . "/../../../scripts/clases/Punto.php");
require_once(dirname(__FILE__) . "/../../../scripts/librerias/validacion.php");
require_once(dirname(__FILE__) . "/../../../scripts/funciones/funciones.php");
//Controlador
//Inicializo variables
$errores = [];
$mensaje = '';
$puntos = [ //puntos iniciales
    new Punto(100, 100, "red", 1),
    new Punto(200, 150, "green", 2),
    new Punto(300, 200, "blue", 3)
];
$datos = [ 
    'x' => $_POST['x'] ?? '',
    'y' => $_POST['y'] ?? '',
    'color' => $_POST['color'] ?? '',
    'grosor' => $_POST['grosor'] ?? ''
];

$rutaImagen = dirname(__FILE__) . "/../../../img/puntos/" . obtenerNombreImagen(); // esta es la ruta para guardar la imagen
$rutaWeb = "http://www.practica1.es/img/puntos/" . obtenerNombreImagen(); // esta es la ruta que usará el navegador he tenido que poner la url completa porque si no no me enseñaba la imagen creada
crearImagen($puntos, $rutaImagen);

// Procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $x = $_POST['x'] ?? '';
    $y = $_POST['y'] ?? '';
    $color = $_POST['color'] ?? '';
    $grosor = $_POST['grosor'] ?? '';

    $xInt = (int)$x;
    $yInt = (int)$y;
    $grosorInt = (int)$grosor;


    //Validaciones
    if (!validaEntero($xInt, 0, 500, -1)) {
        $errores['x'] = "Debe estar entre 0 y 500";
    }

    if (!validaEntero($yInt, 0, 500, -1)) {
        $errores['y'] = "Debe estar entre 0 y 500";
    }

    if (!validaRango($color, Punto::COLORES, 2)) {
        $errores['color'] = "Color no válido";
    }

    if (!validaRango($grosorInt, Punto::GROSORES, 2)) {
        $errores['grosor'] = "Seleccione un grosor válido";
    }

    if (empty($errores)) {
        try {
            $nuevo = new Punto($xInt, $yInt, $color, $grosorInt);
            $puntos[] = $nuevo;
            $mensaje = "Punto guardado correctamente";
        } catch (Exception $e) {
            $mensaje = "Error: " . $e->getMessage();
        }
    }

   
}


//Dibuja la plantilla de la vista 
inicioCabecera("Relacion 7");
cabecera();
finCabecera();

inicioCuerpo("Relaciones de Ejercicios");
cuerpo($errores, $mensaje, $puntos, $datos, $rutaWeb); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo(array $errores = [], string $mensaje = '', array $puntos = [], array $datos = [], string $rutaWeb = '')
{
?>
<!-- Creamos el form  -->
   <form action="index.php" method="post">
    <label for="x">Coordenada x:</label>
    <input type="number" name="x" id="x" value="<?= $datos['x'] ?? '' ?>">
    <span style="color:red"><?= $errores['x'] ?? '' ?></span>

    <label for="y">Coordenada y:</label>
    <input type="number" name="y" id="y" value="<?= $datos['y'] ?? '' ?>">
    <span style="color:red"><?= $errores['y'] ?? '' ?></span>

    <label for="color">Color:</label>
    <select name="color" id="color">
        <?php foreach (Punto::COLORES as $clave => $info): ?> <!-- Obtenemos los colores recorreidno el array colores que tenemos en Punto -->
            <option value="<?= $clave ?>" <?= (isset($datos['color']) && $datos['color'] === $clave) ? 'selected' : '' ?>>
                <?= $info['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <span style="color:red"><?= $errores['color'] ?? '' ?></span>

    <fieldset> <!-- hacemos que selecione los  grosores del array que tenemos en punto -->
        <legend>Grosor:</legend>
        <?php foreach (Punto::GROSORES as $clave => $nombre): ?>
            <label>
                <input type="radio" name="grosor" value="<?= $clave ?>" <?= (isset($datos['grosor']) && $datos['grosor'] == $clave) ? 'checked' : '' ?>>
                <?= $nombre ?>
            </label>
        <?php endforeach; ?>
        <span style="color:red"><?= $errores['grosor'] ?? '' ?></span>
    </fieldset>

    <button type="submit" name="guardar">Guardar</button> <!-- boton para guardar los datos -->
</form>

<h3>Puntos actuales:</h3> <!-- mostramos los puntos actuales -->
<textarea rows="10" cols="50" readonly> 
    <?php
    foreach ($puntos as $p) {
        echo $p->__toString() . "\n";
    }
    ?>
</textarea>

<h3>Imagen creada</h3> <!-- mostramos la imagen creada -->
<img src="<?= $rutaWeb ?>" alt="Imagen de puntos" id="imagenPuntos">



<?php

}
