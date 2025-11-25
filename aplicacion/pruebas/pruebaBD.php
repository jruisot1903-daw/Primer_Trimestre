<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//Controlador

//conectar a bd

$bd = @new mysqli($servidor, $usuario, $contrasenia, $baseDatos); // lo declaramos en cabecera para que tengamos acceso desde todas las paginas
// le ponmos la @ delante de una cosa que nos puede dar error para quitar los warnigs

//Compruebo si se ha establecido o no la conexión.
if ($bd->connect_errno) {
    paginaError("Fallo al conectar a MySQL: " . $bd->connect_error);
    exit;
}

//establece la página de códigos del cliente
$bd->set_charset("utf8");

// escribimos la sentencia 

$sentSelect = "*";
$sentFrom = "prueba1";
$sentWhere = "";
$sentOrder = "cadena";

//recojo los criterios de filtrado
$sentWhere = "numero>10";

//recojo Ordenación

//Construyo la sentencia
/*
$sentencia = "Select $sentSelect" .
    "   from $sentFrom" .
    "   where $sentWhere" .
    "   order by $sentOrder";
*/

$sentencia = 'Select *' .
    '   from prueba1' .
    '   where id>0' .
    '   order by cadena';
// la ejecutamos 

$consulta = $bd->query($sentencia);

//comprobamos si al ejecutar la sentencia ha producido un error

if (!$consulta) {
    paginaError("Fallo al conectar a MySQL: " . $bd->connect_error);
    exit;
}

// Recogemos las columnas que nos devuelva y le añadimos nosotros info que queramos 
$filas = [];
while ($fila = $consulta->fetch_assoc()) {
    $fila["descripcion"] = $fila["cadena"] . " :" . $fila["numero"];
    $filas[] = $fila;
}

//Ejecución sentencias borrado / actualización / insertado 

if (isset($_GET["oper"]) && $_GET["oper"] == 1) {

    //evitar problemas de inyección

    //Con tipos distintos de cadena convertir siempre
    //el parametro recibido al tipo 
    $id = "2";
    $id = intval($id);

    // para cadenas usamos la funcion de escape correspondiente de la base de datos
    $cadena = "esta'esto es el ataque '";
    $cadena = $bd->real_escape_string($cadena); // con esto nos aseguramos en que no nos inyecte codigo

    //Se puede evitar el atque con consultas parametrizadas

    

    $sentencia = 'update prueba1 set' .
                 '       numero=2000' .
                 '      where id=$id';
    $consulta = $bd->query($sentencia);

    if (!$sentencia) {
        paginaError("Error al modificar : " . $bd->connect_error);
        exit;
    }
}




//Dibuja la plantilla de la vista 
inicioCabecera("2DAW Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Prueba Base de Datos ");
cuerpo($filas); //llamo a la vista
finCuerpo();



// **********************************************************

//Vista
function cabecera() {}

//Vista
function cuerpo($filas)
{
?>
    <table>
        <thead>
            <tr>
                <th>CADENA</th>
                <th>NUMERO</th>
                <th>DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($filas as $fila) {
                echo "<tr>";
                echo "<td>{$fila["cadena"]}</td>";
                echo "<td>{$fila["numero"]}</td>";
                echo "<td>{$fila["descripcion"]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="pruebaBD.php?oper=1">Modificar fila2</a>


<?php
}
