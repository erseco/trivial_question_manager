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
 * 	En este fichero se guardan los datos de acceso a la base de datos, as� como
 *	la fuci�n com�n de __autoload de clases
 *
 ******************************************************************************/
?>
<?php

// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);

// Definimos los valores est�ticos de la p�gina
define("SITE_NAME", "Trivia Question Manager");

define("DB_HOST", "localhost");
define("DB_USER", "ejercicio_pw");
define("DB_PASSWORD", "pass_ejercicio_pw");
define("DB_NAME", "74003802");
define("TQM_DIR_PATH", "/74003802/"); //Introduzca aqui la ruta del directorio donde est� TQM dentro de apache (acabado en /)
							 		//por ejemplo, si tqm est� dentro del directorio 74003802 introduzca /74003802/

define("SUPPORT_MAIL", "info@ernesto.es"); //ATENCI�N!! Asegurese de haber configurado sendmail o el smtp correctamente
										   //en la configuraci�n de su fichero php.ini


//La funcion __autoload de PHP5 autom�ticamente carga un fichero .php cuando se hace referencia a
//su clase, por definicion nuestra pondremos el archivo en min�scula
function __autoload($class) {

	// Establecemos el nombre que deber�a tener el archivo
	$file_name = $_SERVER["DOCUMENT_ROOT"].TQM_DIR_PATH."model/".strtolower($class).".php";

	// Comprobamos si el fichero existe
    if (file_exists($file_name )){

    	// Lo incluimos
        require_once $file_name;

    }

}

?>
