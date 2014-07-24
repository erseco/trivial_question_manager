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
 * Genera un archivo .js con las preguntas 
 *
 ******************************************************************************/
?>
<?php

// Requerimos la comprobación de que la sesión esté iniciada, si no redirigirá a la ventana de login
require_once "../session.php";

require_once "../config.php";

// Creamos una nueva instancia de la clase y llamamos al método generar
$export = new Export_Js();
$export->GenerateFile();

?>