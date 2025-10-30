<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//inicializaciones
$datos = [
      "nombre" => "",
      "edad" => 18
];
$errores = []; //comprobar si se ha dado a insertar

if (isset($_POST["crear"])) {

      $nombre = "";
      if (isset($_POST["nombre"])) 
            {
                  $nombre = $_POST["nombre"];
                  $nombre = trim($nombre);
            }
      if (mb_strlen($nombre)<10)
            {  
                  $errores["nombre"][]="El nombre debe tener al menos 10 caracteres";
            }
      $datos["nombre"] = $nombre;


      $edad = 0;
      if (isset($_POST["edad"])) {
            $edad = intval($_POST["edad"]);
      }
      if ($edad <15)
            { 
                  $errores["edad"][] = "Debes tener al menos 15 años";
                  $edad=15;
            }
      $datos["edad"] = $edad;

      if (!$errores) //no hay errores hago la insercion
      {
            //codigo para el nuevo articulo
            $codigo = 1; //codigo
            //se guarda el articulo
            //ir a ver el articulo insertado
            echo "nombre:{$datos["nombre"]}";
            exit;
      }
}


//dibuja la plantilla de la vista
inicioCabecera("pruebas");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($datos,$errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $datos, array $errores)
{
?>
      <br>
      <br>
      <br>
<?php
      formulario($datos, $errores);
}

function formulario($datos, $errores)
{
      if ($errores) { //mostrar los errores
            echo "<div class='error'>";
            foreach ($errores as $clave => $valor) {
                  foreach ($valor as $error)
                        echo "$clave => $error<br>" . PHP_EOL;
            }
            echo "</div>";
      }
?>
      <form action="" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"
                  value="<?php echo $datos["nombre"]; ?>" size=21
                  maxlength="20"><br>
            <label for="precio">Precio: </label>
            <input type="text" name="edad" id="edad"
                  value="<?php echo $datos["edad"]; ?>" size=3
                  maxlength="3"><br>
            <input type="submit" class="boton" name="crear" value="Crear">
      </form>
<?php
}
