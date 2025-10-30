<?php
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
require_once '../../../../scripts/librerias/validacion.php';
//Controlador
//inicializamos los array que vamos a utilizar 
$errores = [];
$valores = [
    'nombre' => '',
    'password' => '',
    'fecha_nac' => '',
    'dia_carnet' => '',
    'mes_carnet' => '',
    'ano_carnet' => '',
    'hora' => '',
    'estado' => '',
    'estudios' => [],
    'hermanos' => 0,
    'sueldo' => 1100
];

$estudios_validos = [
    0 => 'Sin estudios',
    1 => 'Primaria',
    2 => 'Secundaria',
    3 => 'Bachillerato',
    4 => 'Ciclo formativo',
    5 => 'Universitarios'
];

$estados_validos = [1 => 'Estudiante', 2 => 'En paro', 3 => 'Trabajando', 4 => 'Jubilado'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del POST
    $valores['nombre'] = trim($_POST['nombre'] ?? '');
    $valores['password'] = $_POST['password'] ?? '';
    $valores['fecha_nac'] = trim($_POST['fecha_nac'] ?? '');
    $valores['dia_carnet'] = (int)($_POST['dia_carnet'] ?? 0);
    $valores['mes_carnet'] = (int)($_POST['mes_carnet'] ?? 0);
    $valores['ano_carnet'] = (int)($_POST['ano_carnet'] ?? 0);
    $valores['hora'] = trim($_POST['hora'] ?? '');
    $valores['estado'] = $_POST['estado'] ?? '';
    $valores['estudios'] = $_POST['estudios'] ?? [];
    $valores['hermanos'] = (int)($_POST['hermanos'] ?? 0);
    $valores['sueldo'] = (float)($_POST['sueldo'] ?? 1100);

    // Vamos a utilizar la libreria de validaciones para validar los datos 
    if ($valores['nombre'] === '' || strtoupper($valores['nombre'][0]) === 'H') {
        $errores['nombre'] = 'El nombre no puede estar vacío ni empezar por H.';
    } elseif (!validaCadena($valores['nombre'], 25, '')) {
        $errores['nombre'] = 'El nombre supera 25 caracteres.';
    } else {
        $valores['nombre'] = strtoupper($valores['nombre']);
    }

    if (!validaCadena($valores['password'], 15, '')) {
        $errores['password'] = 'Contraseña demasiado larga.';
    } elseif (!validaExpresion($valores['password'], '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\$_\-;<>@]).{8,}$/', '')) {
        $errores['password'] = 'Debe tener minimo 8 caracteres, mayúscula, minúscula, número y carácter especial.';
    }

    if (!validaFecha($valores['fecha_nac'], '')) {
        $errores['fecha_nac'] = 'Fecha de nacimiento no válida.';
    } else {
        $fecha_nac = DateTime::createFromFormat('d/m/Y', $valores['fecha_nac']);
    }

    if (!checkdate($valores['mes_carnet'], $valores['dia_carnet'], $valores['ano_carnet'])) {
        $errores['fecha_carnet'] = 'Fecha de carnet inválida.';
    } elseif (empty($errores['fecha_nac'])) {
        $fecha_carnet = new DateTime("{$valores['ano_carnet']}-{$valores['mes_carnet']}-{$valores['dia_carnet']}");
        $mayor_edad = clone $fecha_nac;
        $mayor_edad->add(new DateInterval('P18Y'));
        if ($fecha_carnet < $mayor_edad) {
            $errores['fecha_carnet'] = 'Debe ser mayor de edad para tener carnet de conducir';
        }
    }

    if (!validaHora($valores['hora'], '00:00:00')) {
        $errores['hora'] = 'Hora inválida (HH:MM:SS).';
    }


    if (!validaRango((int)$valores['estado'], $estados_validos, 2)) {
        $errores['estado'] = 'Debe seleccionar un estado válido.';
    }

    if (empty($valores['estudios'])) {
        $errores['estudios'] = 'Debe seleccionar al menos un estudio.';
    } elseif (in_array('6', $valores['estudios'])) {
        $errores['estudios'] = 'Opción inválida.';
    } elseif (in_array('0', $valores['estudios']) && count($valores['estudios']) > 1) {
        $errores['estudios'] = 'Si marca “Sin estudios”, no puede marcar más.';
        $valores['estudios'] = ['0'];
    }

    if (!validaEntero($valores['hermanos'], 0, 20, 0)) {
        $errores['hermanos'] = 'Debe estar entre 0 y 20.';
    }

    if (!validaReal($valores['sueldo'], 1000, 150000, 1100)) {
        $errores['sueldo'] = 'Debe estar entre 1000 y 150000 €. ';
    }
}

//Dibuja la plantilla de la vista 
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("Relacion 5 - Formulario");
cuerpo($valores, $errores, $estados_validos, $estudios_validos); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo($valores, $errores, $estados_validos, $estudios_validos)
{
    //Comprovamos que no tenemos errores y comprobamos que el formulario todavia no lo hemos enviado 
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !empty($errores)) {
        //vamos a crear el formulario y poner los errores donde saldran en el caso de que este
?>

        <div class="formulario">
            <form method="post" action="">
                <label>Nombre:</label>
                <input type="text" name="nombre" maxlength="25" value="<?= htmlspecialchars($valores['nombre']) ?>">
                <span style="color:red"><?= $errores['nombre'] ?? '' ?></span><br><br>

                <label>Contraseña:</label>
                <input type="password" name="password" maxlength="15">
                <span style="color:red"><?= $errores['password'] ?? '' ?></span><br><br>

                <label>Fecha nacimiento:</label>
                <input type="text" name="fecha_nac" placeholder="dd/mm/yyyy" value="<?= htmlspecialchars($valores['fecha_nac']) ?>">
                <span style="color:red"><?= $errores['fecha_nac'] ?? '' ?></span><br><br>

                <label>Fecha carnet:</label>
                Día <input type="number" name="dia_carnet" min="1" max="31" value="<?= $valores['dia_carnet'] ?>">
                Mes <input type="number" name="mes_carnet" min="1" max="12" value="<?= $valores['mes_carnet'] ?>">
                Año <input type="number" name="ano_carnet" min="1900" max="<?= date('Y') ?>" value="<?= $valores['ano_carnet'] ?>">
                <span style="color:red"><?= $errores['fecha_carnet'] ?? '' ?></span><br><br>

                <label>Hora de levantarse:</label>
                <input type="text" name="hora" placeholder="HH:MM:SS" value="<?= htmlspecialchars($valores['hora']) ?>">
                <span style="color:red"><?= $errores['hora'] ?? '' ?></span><br><br>

                <label>Estado:</label><br>
                <?php
                $estados = [1 => 'Estudiante', 2 => 'En paro', 3 => 'Trabajando', 4 => 'Jubilado', 5 => 'Incorrecta'];
                foreach ($estados as $k => $v) {
                    $checked = ($valores['estado'] == $k) ? 'checked' : '';
                    echo "<input type='radio' name='estado' value='$k' $checked> $v<br>";
                }
                ?>
                <span style="color:red"><?= $errores['estado'] ?? '' ?></span><br>

                <label>Estudios:</label><br>
                <?php
                $estudios = [0 => 'Sin estudios', 1 => 'Primaria', 2 => 'Secundaria', 3 => 'Bachillerato', 4 => 'Ciclo formativo', 5 => 'Universitarios', 6 => 'Incorrecta'];
                foreach ($estudios as $k => $v) {
                    $checked = in_array($k, $valores['estudios']) ? 'checked' : '';
                    echo "<input type='checkbox' name='estudios[]' value='$k' $checked> $v<br>";
                }
                ?>
                <span style="color:red"><?= $errores['estudios'] ?? '' ?></span><br>

                <label>Hermanos:</label>
                <input type="number" name="hermanos" min="0" max="20" value="<?= $valores['hermanos'] ?>">
                <span style="color:red"><?= $errores['hermanos'] ?? '' ?></span><br><br>

                <label>Sueldo (€):</label>
                <input type="number" name="sueldo" step="0.01" min="1000" max="150000" value="<?= $valores['sueldo'] ?>">
                <span style="color:red"><?= $errores['sueldo'] ?? '' ?></span><br><br>

                <input type="submit" value="Enviar">
            </form>
        </div>
<?php
    } else {
        //si lo tenemos todo bien no volvemos a mostrar el formulario y mostramos un resumen con los datos

        echo "<h3>Datos introducidos correctamente {$valores['nombre']}:</h3>";
        echo "<ul>";
        echo "<li><b>Nombre:</b> {$valores['nombre']}</li>";
        echo "<li><b>Fecha nacimiento:</b> {$valores['fecha_nac']}</li>";
        echo "<li><b>Fecha carnet:</b> {$valores['dia_carnet']}/{$valores['mes_carnet']}/{$valores['ano_carnet']}</li>";
        echo "<li><b>Hora de levantarse:</b> {$valores['hora']}</li>";
        echo "<li><b>Estado:</b> {$estados_validos[$valores['estado']]}</li>";

        $estudios_mostrados = [];
        foreach ($valores['estudios'] as $codigo) {
            if (isset($estudios_validos[$codigo])) {
                $estudios_mostrados[] = $estudios_validos[$codigo];
            }
        }
        echo "<li><b>Estudios:</b> " . implode(", ", $estudios_mostrados) . "</li>";

        echo "<li><b>Hermanos:</b> {$valores['hermanos']}</li>";
        echo "<li><b>Sueldo:</b> {$valores['sueldo']} €</li>";
        echo "</ul>";
    }
}
