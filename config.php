<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * 
 *
 *******************************************
 *
 * 	En este fichero se guardan los datos de acceso a la base de datos, así como
 *	la fución común de __autoload de clases
 *
 ******************************************************************************/
?>
<?php

// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);

// Definimos los valores estáticos de la página
define("SITE_NAME", "Trivia Question Manager");

define("DB_HOST", "localhost");
define("DB_USER", "ejercicio_pw");
define("DB_PASSWORD", "pass_ejercicio_pw");
define("DB_NAME", "74003802");
define("TQM_DIR_PATH", "/74003802/"); //Introduzca aqui la ruta del directorio donde esté TQM dentro de apache (acabado en /)
							 		//por ejemplo, si tqm está dentro del directorio 74003802 introduzca /74003802/

define("SUPPORT_MAIL", "info@ernesto.es"); //ATENCIÓN!! Asegurese de haber configurado sendmail o el smtp correctamente
										   //en la configuración de su fichero php.ini


//La funcion __autoload de PHP5 automáticamente carga un fichero .php cuando se hace referencia a
//su clase, por definicion nuestra pondremos el archivo en minúscula
function __autoload($class) {

	// Establecemos el nombre que debería tener el archivo
	$file_name = $_SERVER["DOCUMENT_ROOT"].TQM_DIR_PATH."model/".strtolower($class).".php";

	// Comprobamos si el fichero existe
    if (file_exists($file_name )){

    	// Lo incluimos
        require_once $file_name;

    }

}

?>
