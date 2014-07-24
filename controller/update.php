<?php
/*******************************************
 *
 * 2014 - Programaci�n Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * 
 *
 *******************************************
 *
 * 	Desde aqui se controla la actualizacion de registros
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

	$id = $_GET["id"];

	$array = array();

	if ((ucfirst($_GET["table"]) == "Users") && (!isset($_POST["role"]))) {
		$_POST["role"] = false;
	}

	foreach($_POST as $key => $value) {
		
		// Saneamos las variables pasadas, para que no nos cuelen un XSS
		switch ($key) {
		    case "name":
		        $value = filter_var($value, FILTER_SANITIZE_STRING);

				if(strlen($value)<4) // If length is less than 4 it will throw an HTTP error.
				{
					$output = json_encode(array('response'=>'error', 'message' => 'Name is too short or empty!'));
					die($output);
				}

		        break;
		    case "email":
		    	$value = filter_var($value, FILTER_SANITIZE_EMAIL);
				if(!filter_var($value, FILTER_VALIDATE_EMAIL)) //email validation
				{
					$output = json_encode(array('response'=>'error', 'message' => 'Please enter a valid email!'));
					die($output);
				}
		        break;
		   	case "password":
		   		break;
		   		
		   	case "role":

		   		// Los checkbox cuando no se marcan no se env�an
		   		if ($value == true) { 
		   			$value = 1;
		   		} else {
		   			$value = 0;
		   		}
		   		
		        break;
		    default:

			    break;

		}
		
		$array[$key] = $value;


	}

	// Validaci�n de los campos en la parte servidor






	// Capitalizamos el nombre de la tabla, ya que ser� el nombre de la clase en el Modelo
	$table = ucfirst($_GET["table"]);
	
	// Creamos un objeto en base al nombre de la tabla pasado, as� podemos usar las mismas funciones para todas las entidades
	$instance = new $table();

	// Establecemos los datos
	$instance->setFields($array);

	// Lo insertamos en la base de datos
	$result = $instance->update($id);

	if(!$result){

		$output = json_encode(array('response'=>'error', 'message' => 'Could not insert!'));
		die($output);

	}else{
		
		$output = json_encode(array('response'=>'success', 'message' => 'OK'));
		die($output);
	
	}

}

?>