<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Devuelve los datos para rellenar la gráfica en formato JSON
 *
 ******************************************************************************/
?>
<?php
// Set the JSON header
//header("Content-type: text/json");

// Incluimos el fichero de configuracíon (por el __autoload)
require_once "../config.php";

// Creamos un objeto de la clase
$entity = new Users();

// Obtenemos los datos
$rows = $entity->getAll();

$array = Array();
// Recorremos las filas (hacemos un cast de $rows a (array) para evitar comprobar si viene vacio)
foreach ((array)$rows as $row): 

    array_push($array, "['".$row["name"]."', ".$row["total_questions"]."]");

endforeach;

// Unimos todos los valores usando "," como separador
echo "[".implode(", ", $array)."]";

?>