<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$valor[0] =18;
$valor[1]="Hola";
$valor[2]=true;
$valor[3]=3.4;
$valor[5]=[25];
$valor["primera"]="esta es la primera posicion";
$valor[]=100;

$valor1=array(19,"Hola",true,
              3.4,5=>array(25),
              "primera"=>"esta es la primera posicion",
              100);

$valor2=[19,"Hola",true,
              3.4,5=>[25],
              "primera"=>"esta es la primera posicion",
              100];

$aux=$valor2[5][0];


//for ($cont=0; $cont<count($valor);$cont++)
//    $aux=$valor[$cont];

foreach($valor as $indice=>$contenido)
{
  $aux=$contenido;
}

foreach($valor as $contenido)
{
  $aux=$contenido;
}


$capital=array("Castilla y León"=>"Valladolid",
      "Asturias"=>"Oviedo",
      "Aragón"=>"Zaragoza");

reset($capital);
while(key($capital)!= NULL){
   $aux= current($capital)."<br />";
   next($capital);
}


$array=array(1,2,3,4,5,6,7);
prueba($array);
$aux= $array[0];

$dat=["array"=>$array,
      "aux"=> $aux,
      "capi"=>$capital
];

//dibuja la plantilla de la vista
inicioCabecera("pruebas");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($dat);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo(array $datos)
{
?>
   esta en pruebas arrays
<?php
  foreach ($datos["array"] as $indice=>$valor)
      echo "en el array posicion $indice, valor $valor<br>".PHP_EOL;

  echo "la variable auxiliar vale {$datos["aux"]} <br>";
  
  foreach ($datos["capi"] as $indice=>$valor)
      echo "en el array capital posicion $indice, valor $valor<br>".PHP_EOL;

}

function prueba($a){
      $a[0]=18;
}