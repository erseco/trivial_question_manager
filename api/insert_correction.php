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
 * 	Est� p�gina ser� llamada desde la aplicacion m�vil para insertar correcciones
 *
 ******************************************************************************/
?>
<?php

// Establecemos el nombre de la entidad para poder instanciar su clase
$_GET["table"] = "corrections";

// Establecemos el id del usuario a 0, ya que las sugeridas son de usuarios externos
$_POST["id_user"] = 0;

// Llamamos al fichero de insert, que se encargar� del resto
require_once "../controller/insert.php";

?>