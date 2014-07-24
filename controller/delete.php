<?php
/*******************************************
 *
 * 2014 - Programaci�n Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Este c�digo elimina un registro de la base de datos, es com�n para todas las 
 * entidades, ya que convierte el nombre de la tabla a la entidad para instanciarla
 * as� reutilizamos el c�digo, ya que la eliminaci�n es un proceso similar en todas 
 *
 ******************************************************************************/
?>
<?php

// Incluimos el fichero de configurac�on (por el __autoload)
require_once "../config.php";

// Comprobamos que hayamos recibido datos
if (!empty($_POST)) {


	// Comprobamos que sea una peticion ajax (para que no se nos cuelen)
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
 	     // Salimos del script devolviendo un array de datos JSON
			$output = json_encode(
			array(
				'response'=>'error', 
				'message' => 'Request must come from Ajax'
			));

			die($output);
	} 

	// Capitalizamos el nombre de la tabla, ya que ser� el nombre de la clase en el Modelo
	$table = ucfirst($_POST["table"]);

	// Obtenemos el id a eliminar
	$id = $_POST["id"];

	// Creamos un objeto en base al nombre de la tabla pasado, as� podemos usar las mismas funciones para todas las entidades
	$instance = new $table();

	// Eliminamos el registro
	$result = $instance->delete($id);

	if (!$result) {

		// Ha dado un error 
		$output = json_encode(array('response'=>'error', 'message' => 'Cannot delete row!'));
		die($output);

	} else {

		// Registro eliminado correctamente de la base de datos
		$output = json_encode(array('response'=>'success', 'message' => 'OK'));
		die($output);

	}
}

?>