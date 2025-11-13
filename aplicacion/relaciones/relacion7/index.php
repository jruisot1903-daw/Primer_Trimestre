<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
include_once(dirname(__FILE__) . "/../../../scripts/clases/Punto.php");
require_once(dirname(__FILE__) . "/../../../scripts/librerias/validacion.php");
//require_once(dirname(__FILE__) . "/../../../scripts/funciones/funciones.php");

// CONTROLADOR 

// Nombre del fichero .dat único por cliente
$fichero = __DIR__ . "/datos/" . obtenerNombreFichero();
$puntos = [];

// Leer puntos desde el fichero si existe
if (file_exists($fichero)) {
    $lineas = file($fichero, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        list($x, $y, $color, $grosor) = explode(";", $linea);
        $puntos[] = new Punto(trim($x), trim($y), trim($color), trim($grosor));
    }
}

//Inicializamos las variables
$errores = [];
$mensaje = '';
$datos = [
    'x' => $_POST['x'] ?? '',
    'y' => $_POST['y'] ?? '',
    'color' => $_POST['color'] ?? '',
    'grosor' => $_POST['grosor'] ?? ''
];

// Procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $x = $_POST['x'] ?? '';
    $y = $_POST['y'] ?? '';
    $color = $_POST['color'] ?? '';
    $grosor = $_POST['grosor'] ?? '';

    $xInt = (int)$x;
    $yInt = (int)$y;
    $grosorInt = (int)$grosor;

    // Validaciones
    if (!validaEntero($xInt, 0, 500, 0)) {
        $errores['x'] = "Debe estar entre 0 y 500";
    }
    if (!validaEntero($yInt, 0, 500, 0)) {
        $errores['y'] = "Debe estar entre 0 y 500";
    }
    if (!validaRango($color, Punto::COLORES, 2)) {
        $errores['color'] = "Color no válido";
    }
    if (!validaRango($grosorInt, Punto::GROSORES, 2)) {
        $errores['grosor'] = "Seleccione un grosor válido";
    }

    // Si todo es correcto, añadimos y guardamos
    if (empty($errores)) {
        try {
            $nuevo = new Punto($xInt, $yInt, $color, $grosorInt);
            $puntos[] = $nuevo;

            // Guardar todos los puntos en el fichero .dat
            $contenido = "";
            foreach ($puntos as $p) {
                $contenido .= $p->getX() . " ; " . $p->getY() . " ; " . $p->getColor() . " ; " . $p->getGrosor() . "\n";
            }
            file_put_contents($fichero, $contenido);

            $mensaje = "Punto guardado correctamente";
        } catch (Exception $e) {
            $mensaje = "Error: " . $e->getMessage();
        }
    }
}

//Borrar puntos de la imagen 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
    $indice = $_POST['puntoSeleccionado'] ?? null;

    if ($indice !== null && isset($puntos[$indice])) {
        // Eliminar el punto del array
        unset($puntos[$indice]);

        // Volvemos a guardar el array reindzado para no tener huecos libres
        $puntos = array_values($puntos);

        // Guardar de nuevo el fichero sin ese punto
        $contenido = "";
        foreach ($puntos as $p) {
            $contenido .= $p->getX() . " ; " . $p->getY() . " ; " . $p->getColor() . " ; " . $p->getGrosor() . "\n";
        }
        file_put_contents($fichero, $contenido); // Sobrescribimos el fichero

        $mensaje = "Punto borrado correctamente";
    }
}

// Generar la imagen con todos los puntos
$rutaImagen = dirname(__FILE__) . "/../../../img/puntos/" . obtenerNombreImagen();
$rutaWeb    = "http://www.practica1.es/img/puntos/" . obtenerNombreImagen();
crearImagen($puntos, $rutaImagen);

//Subida del fichero de puntos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subir'])) {
    if (isset($_FILES['ficheroTxt']) && $_FILES['ficheroTxt']['error'] === UPLOAD_ERR_OK) {
        //Obtenemos el nombre del fichero que nos suba
        $nombreArchivo = $_FILES['ficheroTxt']['name'];
        //Obtenemos la extension del fichero que nos suba
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        if ($extension !== 'txt') { // preguntamos si la extension es txt
            $mensaje = "Solo se permiten ficheros .txt";
        } else { // si no es txt procesamos el fichero 
            $rutaTmp = $_FILES['ficheroTxt']['tmp_name'];

            // Leer líneas del fichero subido
            $lineas = file($rutaTmp, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            // vamos leyendo todas las lineas del fichero mientras vamos validando los datos del fichero
            foreach ($lineas as $linea) { 
                list($x, $y, $color, $grosor) = explode(";", $linea); // separamos los datos por el ;

                $xInt = (int)trim($x);
                $yInt = (int)trim($y);
                $colorTrim = trim($color);
                $grosorInt = (int)trim($grosor);
                // hacemos la validaciones de los datos del fichero 
                if (validaEntero($xInt, 0, 500, 0) &&
                    validaEntero($yInt, 0, 500, 0) &&
                    validaRango($colorTrim, Punto::COLORES, 2) &&
                    validaRango($grosorInt, Punto::GROSORES, 2)) {
                    $puntos[] = new Punto($xInt, $yInt, $colorTrim, $grosorInt);
                }
            }

            // Guardar puntos en el fichero .dat
            $contenido = "";
            foreach ($puntos as $p) {
                $contenido .= $p->getX() . " ; " . $p->getY() . " ; " . $p->getColor() . " ; " . $p->getGrosor() . "\n";
            }
            file_put_contents($fichero, $contenido);

            crearImagen($puntos, $rutaImagen);
            $mensaje = "Fichero .txt procesado correctamente";
        }
    } else {
        $mensaje = "Error al subir el fichero";
    }
}



//VISTA 

inicioCabecera("Relacion 7");
cabecera();
finCabecera();

inicioCuerpo("Relaciones de Ejercicios");
cuerpo($errores, $mensaje, $puntos, $datos, $rutaWeb);
finCuerpo();

function cabecera() {}

function cuerpo(array $errores = [], string $mensaje = '', array $puntos = [], array $datos = [], string $rutaWeb = '')
{
?>
    <form action="index.php" method="post">
        <label for="x">Coordenada x:</label>
        <input type="number" name="x" id="x" value="<?= $datos['x'] ?? '' ?>">
        <span style="color:red"><?= $errores['x'] ?? '' ?></span>

        <label for="y">Coordenada y:</label>
        <input type="number" name="y" id="y" value="<?= $datos['y'] ?? '' ?>">
        <span style="color:red"><?= $errores['y'] ?? '' ?></span>

        <label for="color">Color:</label>
        <select name="color" id="color">
            <?php foreach (Punto::COLORES as $clave => $info) { ?>
                <option value="<?= $clave ?>" <?= (isset($datos['color']) && $datos['color'] === $clave) ? 'selected' : '' ?>>
                    <?= $info['nombre'] ?>
                </option>
            <?php } ?>
        </select>
        <span style="color:red"><?= $errores['color'] ?? '' ?></span>

        <fieldset>
            <legend>Grosor:</legend>
            <?php foreach (Punto::GROSORES as $clave => $nombre) { ?>
                <label>
                    <input type="radio" name="grosor" value="<?= $clave ?>" <?= (isset($datos['grosor']) && $datos['grosor'] == $clave) ? 'checked' : '' ?>>
                    <?= $nombre ?>
                </label>
            <?php } ?>
            <span style="color:red"><?= $errores['grosor'] ?? '' ?></span>
        </fieldset>

        <button type="submit" name="guardar">Guardar</button>
        <a href="imagen.php">
            <button type="button">Descargar imagen</button>
        </a>
    </form>



    <h3>Puntos actuales:</h3>
    <textarea rows="10" cols="50" readonly>
    <?php foreach ($puntos as $p) echo $p->__toString() . "\n"; ?>
    </textarea>

    <h3>Imagen creada</h3>
    <img src="<?= $rutaWeb ?>" alt="Imagen de puntos" id="imagenPuntos">
    <br>
    <h3>Borrar Puntos</h3>
    <form action="index.php" method="post">
        <select name="puntoSeleccionado" id="puntos">
            <?php foreach ($puntos as $i => $p) { ?>
                <option value="<?= $i ?>">
                    <?= $p->__toString() ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" name="borrar">Borrar</button>
    </form>

    <h3>Subir fichero de puntos</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="ficheroTxt" accept=".txt">
        <button type="submit" name="subir">Subir fichero</button>
    </form>


<?php
}
