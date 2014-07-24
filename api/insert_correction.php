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
 * 	Está página será llamada desde la aplicacion móvil para insertar correcciones
 *
 ******************************************************************************/
?>
<?php

// Establecemos el nombre de la entidad para poder instanciar su clase
$_GET["table"] = "corrections";

// Establecemos el id del usuario a 0, ya que las sugeridas son de usuarios externos
$_POST["id_user"] = 0;

// Llamamos al fichero de insert, que se encargará del resto
require_once "../controller/insert.php";

?>